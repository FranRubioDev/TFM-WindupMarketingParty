<?php

namespace Controllers;

use Model\EventoHorario;

class APIEventosController
{

    public static function index()
    {
        $dia_id = $_GET['dia_id'] ?? '';
        $categoria_id = $_GET['categoria_id'] ?? '';

        $dia_id = filter_var($dia_id, FILTER_VALIDATE_INT);
        $categoria_id = filter_var($categoria_id, FILTER_VALIDATE_INT);

        if (!$dia_id || !$categoria_id) {
            echo json_encode([]);
            return;
        }

        // Consulta DDBB
        $eventos = EventoHorario::whereArray(['dia_id' => $dia_id, 'categoria_id' => $categoria_id]) ?? [];
        echo json_encode($eventos);
    }
}

/** Explicación del código: **/
/*
El fragmento de código proporcionado define una clase APIEventosController dentro del espacio de nombres Controllers. Esta clase parece ser parte de una aplicación web que utiliza PHP para el backend, específicamente diseñada para manejar solicitudes a una API relacionada con eventos. La clase utiliza dos clases importadas: Router del espacio de nombres MVC y EventoHorario del espacio de nombres Model. Esto sugiere que la aplicación sigue el patrón de diseño MVC (Modelo-Vista-Controlador), un patrón común en el desarrollo web para separar la lógica de la aplicación, la interfaz de usuario y el control de acceso a los datos.
La función index dentro de APIEventosController es un método estático, lo que significa que puede ser llamado sin necesidad de instanciar la clase. Este método está diseñado para manejar solicitudes GET, específicamente buscando dos parámetros: dia_id y categoria_id. Estos parámetros son obtenidos del array superglobal $_GET, que almacena los datos enviados a través de la URL. Si alguno de estos parámetros no está presente o no es un entero válido (como se verifica mediante filter_var con el filtro FILTER_VALIDATE_INT), el método responde con un array vacío en formato JSON.
Si ambos parámetros son válidos, el método procede a consultar la base de datos para obtener eventos que coincidan con los criterios especificados por dia_id y categoria_id. Esto se hace mediante el llamado al método whereArray de la clase EventoHorario, pasando un array asociativo con los criterios de búsqueda. El resultado de esta consulta se almacena en la variable $eventos. Si no se encuentran eventos que coincidan con los criterios, se asigna un array vacío a $eventos como valor predeterminado (esto se logra mediante el operador de coalescencia nula ??).
Finalmente, el método index devuelve los eventos encontrados (o un array vacío si no se encontró ninguno) en formato JSON mediante echo json_encode($eventos). Esto permite que la respuesta sea fácilmente consumida por clientes de la API, como aplicaciones web frontend que utilizan JavaScript.
Este enfoque de manejar solicitudes API es bastante común en aplicaciones web modernas, permitiendo una separación clara entre la lógica del servidor y la del cliente, y facilitando el desarrollo de aplicaciones más modulares y mantenibles. */