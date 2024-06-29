<?php

namespace Controllers;

use MVC\Router;
use Model\Dia;
use Model\Hora;
use Model\Evento;
use Model\Ponente;
use Model\Categoria;

class PaginasController {
    public static function index(Router $router) {

        $eventos = Evento::ordenar('hora_id', 'ASC');

        $eventos_formateados = [];
        foreach($eventos as $evento) {
            $evento->categoria = Categoria::find($evento->categoria_id);
            $evento->dia = Dia::find($evento->dia_id);
            $evento->hora = Hora::find($evento->hora_id);
            $evento->ponente = Ponente::find($evento->ponente_id);
            
            if($evento->dia_id === "1" && $evento->categoria_id === "1") {
                $eventos_formateados['conferencias_v'][] = $evento;
            }

            if($evento->dia_id === "2" && $evento->categoria_id === "1") {
                $eventos_formateados['conferencias_s'][] = $evento;
            }

            if($evento->dia_id === "1" && $evento->categoria_id === "2") {
                $eventos_formateados['actividades_v'][] = $evento;
            }

            if($evento->dia_id === "2" && $evento->categoria_id === "2") {
                $eventos_formateados['actividades_s'][] = $evento;
            }
        }

        // Obtener el total de cada bloque
                $ponentes_total = Ponente::total();
                $conferencias_total = Evento::total('categoria_id', 1);
                $actividades_total = Evento::total('categoria_id', 2);

        // Obtener todos los ponentes
        $ponentes = Ponente::all();


        $router->render('paginas/index', [
            'titulo' => 'Inicio',
            'eventos' => $eventos_formateados,
            'ponentes_total' => $ponentes_total,
            'conferencias_total' => $conferencias_total,
            'actividades_total' => $actividades_total,
            'ponentes' => $ponentes

        ]);
    }


    public static function evento(Router $router) {

        $router->render('paginas/evento', [
            'titulo' => 'Sobre Windup Marketing Party'

        ]);
    }

    public static function packs(Router $router) {

        $router->render('paginas/packs', [
            'titulo' => 'Packs Windup Marketing Party'

        ]);
    }


    public static function ponencias(Router $router) {

        $eventos = Evento::ordenar('hora_id', 'ASC');

        $eventos_formateados = [];
        foreach($eventos as $evento) {
            $evento->categoria = Categoria::find($evento->categoria_id);
            $evento->dia = Dia::find($evento->dia_id);
            $evento->hora = Hora::find($evento->hora_id);
            $evento->ponente = Ponente::find($evento->ponente_id);
            
            if($evento->dia_id === "1" && $evento->categoria_id === "1") {
                $eventos_formateados['conferencias_v'][] = $evento;
            }

            if($evento->dia_id === "2" && $evento->categoria_id === "1") {
                $eventos_formateados['conferencias_s'][] = $evento;
            }

            if($evento->dia_id === "1" && $evento->categoria_id === "2") {
                $eventos_formateados['actividades_v'][] = $evento;
            }

            if($evento->dia_id === "2" && $evento->categoria_id === "2") {
                $eventos_formateados['actividades_s'][] = $evento;
            }
        }

        $router->render('paginas/ponencias', [
            'titulo' => 'Ponencias & Actividades',
            'eventos' => $eventos_formateados
        ]);
    }


    public static function error(Router $router) {

        $router->render('paginas/error', [
            'titulo' => 'Página no encontrada'
        ]);
    }

}

/*
El código que estás viendo es una clase llamada PaginasController en PHP. Esta clase contiene varios métodos estáticos que se utilizan para manejar diferentes rutas en una aplicación web.

El método index es el punto de entrada para la ruta de inicio de la aplicación. En este método, se realiza lo siguiente:

Se obtienen todos los eventos ordenados por la columna hora_id de forma ascendente.
Se crea un arreglo vacío llamado $eventos_formateados para almacenar los eventos formateados.
Se itera sobre cada evento y se realiza lo siguiente:
Se obtiene la categoría, el día, la hora y el ponente correspondiente a cada evento utilizando los métodos find de las respectivas clases.
Se verifica si el evento pertenece al día 1 y a la categoría 1, y si es así, se agrega al arreglo $eventos_formateados['conferencias_v'].
Se verifica si el evento pertenece al día 2 y a la categoría 1, y si es así, se agrega al arreglo $eventos_formateados['conferencias_s'].
Se verifica si el evento pertenece al día 1 y a la categoría 2, y si es así, se agrega al arreglo $eventos_formateados['actividades_v'].
Se verifica si el evento pertenece al día 2 y a la categoría 2, y si es así, se agrega al arreglo $eventos_formateados['actividades_s'].
Se obtiene el total de ponentes, conferencias y actividades utilizando los métodos total de las respectivas clases.
Se obtienen todos los ponentes.
Se renderiza la vista paginas/index pasando los datos necesarios, como el título, los eventos formateados, el total de ponentes, conferencias y actividades, y la lista de ponentes.
Los otros métodos de la clase (evento, packs, ponencias y error) siguen una estructura similar, donde se obtienen los datos necesarios y se renderiza la vista correspondiente.

En resumen, esta clase se encarga de manejar diferentes rutas de una aplicación web, obteniendo los datos necesarios y renderizando las vistas correspondientes
*/