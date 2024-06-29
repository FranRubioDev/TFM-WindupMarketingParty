<?php

namespace Controllers;

use Classes\Paginacion;
use Model\Categoria;
use Model\Dia;
use Model\Evento;
use Model\Hora;
use Model\Ponente;
use MVC\Router;

class EventosController {

    public static function index(Router $router) {
        if(!is_admin()) {
            header('Location: /login');
        }
        
        $pagina_actual = $_GET['page'];
        $pagina_actual = filter_var($pagina_actual, FILTER_VALIDATE_INT);

        if(!$pagina_actual || $pagina_actual < 1) {
            header('Location: /admin/eventos?page=1');
        }

        $por_pagina = 10;
        $total = Evento::total();
        $paginacion = new Paginacion($pagina_actual, $por_pagina, $total);

        $eventos = Evento::paginar($por_pagina, $paginacion->offset());

        foreach($eventos as $evento) {
            $evento->categoria = Categoria::find($evento->categoria_id);
            $evento->dia = Dia::find($evento->dia_id);
            $evento->hora = Hora::find($evento->hora_id);
            $evento->ponente = Ponente::find($evento->ponente_id);
        }

        $router->render('admin/eventos/index', [
            'titulo' => 'Eventos y Actividades',
            'eventos' => $eventos,
            'paginacion' => $paginacion->paginacion()
        ]);
    }

    public static function crear(Router $router) {
        if(!is_admin()) {
            header('Location: /login');
            return;
        }

        $alertas = [];

        $categorias = Categoria::all('ASC');
        $dias = Dia::all('ASC');
        $horas = Hora::all('ASC');

        $evento = new Evento;

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            if(!is_admin()) {
                header('Location: /login');
                return;
            }
            
            $evento->sincronizar($_POST);

            $alertas = $evento->validar();

            if(empty($alertas)) {
                $resultado = $evento->guardar();
                if($resultado) {
                    header('Location: /admin/eventos');
                    return;
                }
            }
        }

        $router->render('admin/eventos/crear', [
            'titulo' => 'Registrar Evento',
            'alertas' => $alertas,
            'categorias' => $categorias,
            'dias' => $dias,
            'horas' => $horas,
            'evento' => $evento
        ]);
    }

    public static function editar(Router $router) {

        if(!is_admin()) {
            header('Location: /login');
            return;
        }

        $alertas = [];

        $id = $_GET['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);

        if(!$id) {
            header('Location: /admin/eventos');
            return;
        }

        $categorias = Categoria::all('ASC');
        $dias = Dia::all('ASC');
        $horas = Hora::all('ASC');

        $evento = Evento::find($id);
        if(!$evento) {
            header('Location: /admin/eventos');
            return;
        }

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            if(!is_admin()) {
                header('Location: /login');
                return;
            }
            
            $evento->sincronizar($_POST);

            $alertas = $evento->validar();

            if(empty($alertas)) {
                $resultado = $evento->guardar();
                if($resultado) {
                    header('Location: /admin/eventos');
                    return;
                }
            }
        }

        $router->render('admin/eventos/editar', [
            'titulo' => 'Editar Evento',
            'alertas' => $alertas,
            'categorias' => $categorias,
            'dias' => $dias,
            'horas' => $horas,
            'evento' => $evento
        ]);
    }


    public static function eliminar() {

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            if(!is_admin()) {
                header('Location: /login');
                return;
            }

            $id = $_POST['id'];
            $evento = Evento::find($id);
            if(!isset($evento) ) {
                header('Location: /admin/eventos');
                return;
            }
            $resultado = $evento->eliminar();
            if($resultado) {
                header('Location: /admin/eventos');
                return;
            }
        }

    }
}

/*
Este código es un controlador de eventos en PHP que forma parte de un proyecto más grande. Un controlador es una clase que maneja las solicitudes y las respuestas en una aplicación web.

En este controlador de eventos, hay varios métodos estáticos que se encargan de diferentes acciones relacionadas con los eventos. Permíteme explicarte cada uno de ellos:

El método index se encarga de mostrar una lista de eventos en la página de administración. Primero verifica si el usuario es un administrador, y si no lo es, redirige al usuario a la página de inicio de sesión. Luego, obtiene el número de página actual de la variable $_GET['page'] y lo valida. Si no se proporciona un número de página válido, redirige al usuario a la primera página. A continuación, se crea un objeto de paginación para manejar la paginación de los eventos. Luego, se obtienen los eventos de la base de datos utilizando el método paginar de la clase Evento. Después, se obtienen y asignan las categorías, días, horas y ponentes correspondientes a cada evento. Finalmente, se renderiza una vista con los eventos, la paginación y otros datos relevantes.

El método crear se encarga de mostrar el formulario para crear un nuevo evento. Al igual que en el método anterior, verifica si el usuario es un administrador y redirige al usuario a la página de inicio de sesión si no lo es. Luego, se obtienen las categorías, días y horas de la base de datos. A continuación, se crea un nuevo objeto de evento. Si se envía una solicitud POST, se sincronizan los datos del formulario con el objeto de evento y se validan los datos. Si no hay errores de validación, se guarda el evento en la base de datos y se redirige al usuario a la página de eventos.

El método editar se encarga de mostrar el formulario para editar un evento existente. Al igual que en los métodos anteriores, verifica si el usuario es un administrador y redirige al usuario a la página de inicio de sesión si no lo es. Luego, se obtienen las categorías, días y horas de la base de datos. A continuación, se obtiene el ID del evento de la variable $_GET['id'] y se valida. Si no se proporciona un ID válido, se redirige al usuario a la página de eventos. Luego, se busca el evento correspondiente en la base de datos. Si se envía una solicitud POST, se sincronizan los datos del formulario con el objeto de evento y se validan los datos. Si no hay errores de validación, se guarda el evento actualizado en la base de datos y se redirige al usuario a la página de eventos.

El método eliminar se encarga de eliminar un evento. Solo se puede acceder a este método a través de una solicitud POST. Primero verifica si el usuario es un administrador y redirige al usuario a la página de inicio de sesión si no lo es. Luego, obtiene el ID del evento de la variable $_POST['id'] y busca el evento correspondiente en la base de datos. Si se encuentra el evento, se elimina de la base de datos y se redirige al usuario a la página de eventos.

En resumen, este controlador maneja las acciones relacionadas con los eventos, como mostrar una lista de eventos, crear un nuevo evento, editar un evento existente y eliminar un evento. También se encarga de verificar la autenticación del usuario antes de realizar cualquier acción.
*/