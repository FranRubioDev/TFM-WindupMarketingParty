<?php

namespace Controllers;

use Model\Ponente;
class APIPonentesController
{

    public static function index() {
        $ponentes = Ponente::all();
        echo json_encode($ponentes);
    }

    public static function ponente()
    {
        $id = $_GET['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);

        if (!$id || $id < 1) {
            echo json_encode([]);
            return;
        }

        $ponente = Ponente::find($id);
        echo json_encode($ponente, JSON_UNESCAPED_SLASHES);
    }
}

/* El fragmento de código proporcionado define una clase APIPonentesController dentro del espacio de nombres Controllers. Esta clase parece ser parte de una aplicación web PHP que utiliza el patrón de diseño MVC (Modelo-Vista-Controlador). La clase se encarga de manejar las solicitudes relacionadas con los "ponentes" en una API, probablemente para una conferencia o evento similar.

La clase APIPonentesController contiene dos métodos estáticos: index y ponente.

Método index: Este método no acepta parámetros y se encarga de recuperar todos los ponentes disponibles utilizando el método all de la clase Ponente, que se asume es un modelo que representa a los ponentes en la base de datos. Luego, convierte el resultado (un array de objetos Ponente) a formato JSON utilizando la función json_encode y lo envía como respuesta. Este método podría ser utilizado para obtener una lista de todos los ponentes de un evento.

Método ponente: Este método se encarga de obtener un ponente específico por su ID. Primero, recupera el ID del ponente desde los parámetros de la solicitud HTTP ($_GET['id']). Luego, valida este ID usando filter_var con el filtro FILTER_VALIDATE_INT para asegurarse de que es un entero válido y positivo. Si el ID no es válido o es menor que 1, el método responde con un array vacío en formato JSON y termina su ejecución. Si el ID es válido, utiliza el método find de la clase Ponente para buscar el ponente correspondiente en la base de datos. Finalmente, convierte el ponente encontrado a formato JSON (usando JSON_UNESCAPED_SLASHES para evitar el escape de slashes) y lo envía como respuesta. Este método sería útil para obtener detalles de un ponente específico por su ID.

En resumen, APIPonentesController es un controlador diseñado para manejar solicitudes API relacionadas con los ponentes de un evento, permitiendo listar todos los ponentes o recuperar información detallada de un ponente específico. Utiliza el modelo Ponente para interactuar con la base de datos y responde a las solicitudes con datos en formato JSON, lo cual es común en las APIs RESTful. */
