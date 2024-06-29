<?php

namespace Model;
class ActiveRecord
{

    // Base DE DATOS
    protected static $db;
    protected static $tabla = '';
    protected static $columnasDB = [];

    // Alertas y Mensajes
    protected static $alertas = [];

    // Definir la conexión a la BD - includes/database.php
    public static function setDB($database)
    {
        self::$db = $database;
    }

    // Setear un tipo de Alerta
    public static function setAlerta($tipo, $mensaje)
    {
        static::$alertas[$tipo][] = $mensaje;
    }

    // Obtener las alertas
    public static function getAlertas()
    {
        return static::$alertas;
    }

    // Validación que se hereda en modelos
    public function validar()
    {
        static::$alertas = [];
        return static::$alertas;
    }

    // Consulta SQL para crear un objeto en Memoria (Active Record)
    public static function consultarSQL($query)
    {
        // Consultar la base de datos
        $resultado = self::$db->query($query);

        // Iterar los resultados
        $array = [];
        while ($registro = $resultado->fetch_assoc()) {
            $array[] = static::crearObjeto($registro);
        }

        // liberar la memoria
        $resultado->free();

        // retornar los resultados
        return $array;
    }

    // Crea el objeto en memoria que es igual al de la BD
    protected static function crearObjeto($registro)
    {
        $objeto = new static;

        foreach ($registro as $key => $value) {
            if (property_exists($objeto, $key)) {
                $objeto->$key = $value;
            }
        }
        return $objeto;
    }

    // Identificar y unir los atributos de la BD
    public function atributos()
    {
        $atributos = [];
        foreach (static::$columnasDB as $columna) {
            if ($columna === 'id') continue;
            $atributos[$columna] = $this->$columna;
        }
        return $atributos;
    }

    // Sanitizar los datos antes de guardarlos en la BD
    public function sanitizarAtributos()
    {
        $atributos = $this->atributos();
        $sanitizado = [];
        foreach ($atributos as $key => $value) {
            $sanitizado[$key] = self::$db->escape_string($value);
        }
        return $sanitizado;
    }

    // Sincroniza BD con Objetos en memoria
    public function sincronizar($args = [])
    {
        foreach ($args as $key => $value) {
            if (property_exists($this, $key) && !is_null($value)) {
                $this->$key = $value;
            }
        }
    }

    // Registros - CRUD
    public function guardar()
    {
        $resultado = '';
        if (!is_null($this->id)) {
            // actualizar
            $resultado = $this->actualizar();
        } else {
            // Creando un nuevo registro
            $resultado = $this->crear();
        }
        return $resultado;
    }

    // Obtener todos los Registros
    public static function all($orden = 'DESC')
    {
        $query = "SELECT * FROM " . static::$tabla . " ORDER BY id {$orden}";
        $resultado = self::consultarSQL($query);
        return $resultado;
    }

    // Busca un registro por su id
    public static function find($id)
    {
        $query = "SELECT * FROM " . static::$tabla  . " WHERE id = {$id}";
        $resultado = self::consultarSQL($query);
        return array_shift($resultado);
    }

    // Obtener Registros con cierta cantidad
    public static function get($limite)
    {
        $query = "SELECT * FROM " . static::$tabla . " ORDER BY id DESC LIMIT {$limite} ";
        $resultado = self::consultarSQL($query);
        return $resultado;
    }

    // Paginar los registros
    public static function paginar($por_pagina, $offset)
    {
        $query = "SELECT * FROM " . static::$tabla . " ORDER BY id DESC LIMIT {$por_pagina} OFFSET {$offset} ";
        $resultado = self::consultarSQL($query);
        return $resultado;
    }

    // Busqueda Where con Columna 
    public static function where($columna, $valor)
    {
        $query = "SELECT * FROM " . static::$tabla . " WHERE {$columna} = '{$valor}'";
        $resultado = self::consultarSQL($query);
        return array_shift($resultado);
    }

    // Retornar los registros por un orden
    public static function ordenar($columna, $orden)
    {
        $query = "SELECT * FROM " . static::$tabla . " ORDER BY {$columna} {$orden} ";
        $resultado = self::consultarSQL($query);
        return $resultado;
    }
    // Retornar por orden y con un limite
    public static function ordenarLimite($columna, $orden, $limite)
    {
        $query = "SELECT * FROM " . static::$tabla . " ORDER BY {$columna} {$orden} LIMIT {$limite} ";
        $resultado = self::consultarSQL($query);
        return $resultado;
    }

    // Busqueda Where con Múltiples opciones
    public static function whereArray($array = [])
    {
        $query = "SELECT * FROM " . static::$tabla . " WHERE ";
        foreach ($array as $key => $value) {
            if ($key == array_key_last($array)) {
                $query .= " {$key} = '{$value}'";
            } else {
                $query .= " {$key} = '{$value}' AND ";
            }
        }
        $resultado = self::consultarSQL($query);
        return $resultado;
    }

    // Traer un total de registros
    public static function total($columna = '', $valor = '')
    {
        $query = "SELECT COUNT(*) FROM " . static::$tabla;
        if ($columna) {
            $query .= " WHERE {$columna} = {$valor}";
        }
        $resultado = self::$db->query($query);
        $total = $resultado->fetch_array();

        return array_shift($total);
    }

    // Total de Registros con un Array Where
    public static function totalArray($array = [])
    {
        $query = "SELECT COUNT(*) FROM " . static::$tabla . " WHERE ";
        foreach ($array as $key => $value) {
            if ($key == array_key_last($array)) {
                $query .= " {$key} = '{$value}' ";
            } else {
                $query .= " {$key} = '{$value}' AND ";
            }
        }
        $resultado = self::$db->query($query);
        $total = $resultado->fetch_array();
        return array_shift($total);
    }

    // crea un nuevo registro
    public function crear()
    {
        // Sanitizar los datos
        $atributos = $this->sanitizarAtributos();

        // Insertar en la base de datos
        $query = " INSERT INTO " . static::$tabla . " ( ";
        $query .= join(', ', array_keys($atributos));
        $query .= " ) VALUES (' ";
        $query .= join("', '", array_values($atributos));
        $query .= " ') ";

        //debug($query);

        // Resultado de la consulta
        $resultado = self::$db->query($query);
        return [
            'resultado' =>  $resultado,
            'id' => self::$db->insert_id
        ];
    }

    // Actualizar el registro
    public function actualizar()
    {
        // Sanitizar los datos
        $atributos = $this->sanitizarAtributos();

        // Iterar para ir agregando cada campo de la BD
        $valores = [];
        foreach ($atributos as $key => $value) {
            $valores[] = "{$key}='{$value}'";
        }

        // Consulta SQL
        $query = "UPDATE " . static::$tabla . " SET ";
        $query .=  join(', ', $valores);
        $query .= " WHERE id = '" . self::$db->escape_string($this->id) . "' ";
        $query .= " LIMIT 1 ";

        // Actualizar BD
        $resultado = self::$db->query($query);
        return $resultado;
    }

    // Eliminar un Registro por su ID
    public function eliminar()
    {
        $query = "DELETE FROM "  . static::$tabla . " WHERE id = " . self::$db->escape_string($this->id) . " LIMIT 1";
        $resultado = self::$db->query($query);
        return $resultado;
    }
}


/*
El código que estás viendo es una clase llamada ActiveRecord que forma parte de un proyecto en PHP. Esta clase proporciona una funcionalidad común para interactuar con una base de datos y realizar operaciones CRUD (Crear, Leer, Actualizar, Eliminar) en registros de la base de datos.

Aquí hay una explicación detallada de las diferentes partes del código:

Espacio de nombres y declaración de clase:

El código comienza con la declaración del espacio de nombres Model y la clase ActiveRecord.
El espacio de nombres se utiliza para agrupar clases relacionadas y evitar conflictos de nombres.
La clase ActiveRecord es una clase base que se utilizará como plantilla para definir modelos específicos en el proyecto.
Propiedades de la clase:

La clase ActiveRecord tiene varias propiedades protegidas que se utilizan para almacenar información relevante para la interacción con la base de datos.
La propiedad $db se utiliza para almacenar la conexión a la base de datos.
La propiedad $tabla se utiliza para almacenar el nombre de la tabla de la base de datos con la que se va a interactuar.
La propiedad $columnasDB se utiliza para almacenar los nombres de las columnas de la tabla de la base de datos.
Métodos estáticos de configuración:

La clase ActiveRecord tiene varios métodos estáticos que se utilizan para configurar y obtener información relevante.
El método setDB($database) se utiliza para establecer la conexión a la base de datos.
El método setAlerta($tipo, $mensaje) se utiliza para establecer una alerta o mensaje.
El método getAlertas() se utiliza para obtener todas las alertas establecidas.
Métodos de consulta y creación de objetos:

La clase ActiveRecord tiene métodos para realizar consultas SQL y crear objetos en memoria basados en los resultados de las consultas.
El método consultarSQL($query) se utiliza para ejecutar una consulta SQL y devolver un array de objetos creados a partir de los resultados.
El método crearObjeto($registro) se utiliza para crear un objeto en memoria basado en un registro de la base de datos.
Estos métodos son utilizados internamente por otros métodos de la clase para realizar operaciones de consulta y manipulación de datos.
Métodos para manipulación de datos:

La clase ActiveRecord tiene métodos para manipular y sincronizar datos en la base de datos.
El método atributos() se utiliza para obtener un array de los atributos del objeto actual.
El método sanitizarAtributos() se utiliza para sanitizar los atributos antes de guardarlos en la base de datos.
El método sincronizar($args = []) se utiliza para sincronizar los atributos del objeto actual con los valores proporcionados en el array $args.
El método guardar() se utiliza para guardar el objeto en la base de datos. Si el objeto ya tiene un ID asignado, se realiza una actualización; de lo contrario, se crea un nuevo registro.
El método eliminar() se utiliza para eliminar el registro correspondiente al objeto de la base de datos.
Métodos de consulta de registros:

La clase ActiveRecord tiene varios métodos para consultar registros de la base de datos.
El método all($orden = 'DESC') se utiliza para obtener todos los registros de la tabla.
El método find($id) se utiliza para buscar un registro por su ID.
El método get($limite) se utiliza para obtener una cantidad específica de registros.
El método paginar($por_pagina, $offset) se utiliza para paginar los registros.
El método where($columna, $valor) se utiliza para buscar registros que cumplan una condición específica.
El método ordenar($columna, $orden) se utiliza para obtener registros ordenados por una columna específica.
El método ordenarLimite($columna, $orden, $limite) se utiliza para obtener registros ordenados por una columna específica con un límite.
El método whereArray($array = []) se utiliza para buscar registros que cumplan múltiples condiciones especificadas en un array.
El método total($columna = '', $valor = '') se utiliza para obtener el número total de registros en la tabla.
El método totalArray($array = []) se utiliza para obtener el número total de registros que cumplan múltiples condiciones especificadas en un array.
Estos son los aspectos principales del código. La clase ActiveRecord proporciona una interfaz común para interactuar con la base de datos y realizar operaciones CRUD en registros. Los modelos específicos del proyecto pueden heredar de esta clase para aprovechar su funcionalidad
*/