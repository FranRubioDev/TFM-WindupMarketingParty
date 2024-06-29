<?php

namespace Controllers;

use MVC\Router;
use Model\Ponente;
use Classes\Paginacion;
use Intervention\Image\Image;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class PonentesController {

    public static function index(Router $router) {
        if(!is_admin()) {
            header('Location: /login');
        }
        
        $pagina_actual = $_GET['page'];
        $pagina_actual = filter_var($pagina_actual, FILTER_VALIDATE_INT);

        if(!$pagina_actual || $pagina_actual < 1) {
            header('Location: /admin/ponentes?page=1');
        }
        $registros_por_pagina = 5;
        $total = Ponente::total();
        $paginacion = new Paginacion($pagina_actual, $registros_por_pagina, $total);

        if($paginacion->total_paginas() < $pagina_actual) {
            header('Location: /admin/ponentes?page=1');
        }

        $ponentes = Ponente::paginar($registros_por_pagina, $paginacion->offset());



        $router->render('admin/ponentes/index', [
            'titulo' => 'Ponentes',
            'ponentes' => $ponentes,
            'paginacion' => $paginacion->paginacion()
        ]);
    }

    public static function crear(Router $router) {
        if(!is_admin()) {
            header('Location: /login');
        }
        $alertas = [];
        $ponente = new Ponente;


        if($_SERVER['REQUEST_METHOD'] === 'POST') {

            if(!is_admin()) {
                header('Location: /login');
            }

            if(!empty($_FILES['imagen']['tmp_name'])) {   

                $carpeta_imagenes = '../public/img/ponentes';

                if(!is_dir($carpeta_imagenes)) {
                    mkdir($carpeta_imagenes, 0755, true);
                }

                $imagen_png = Image::make($_FILES['imagen']['tmp_name'])->fit(800,800)->encode('png', 80);
                $imagen_webp = Image::make($_FILES['imagen']['tmp_name'])->fit(800,800)->encode('webp', 80);

                $nombre_imagen = md5( uniqid( rand(), true));

                $_POST['imagen'] = $nombre_imagen;
            }

            $_POST['redes'] = json_encode( $_POST['redes'], JSON_UNESCAPED_SLASHES );

            $ponente->sincronizar($_POST);

            $alertas = $ponente->validar();

            if(empty($alertas)){


                $imagen_png->save($carpeta_imagenes . '/' . $nombre_imagen . ".png" ); 
                $imagen_png->save($carpeta_imagenes . '/' . $nombre_imagen . ".webp" ); 

                $resultado = $ponente->guardar();

                if($resultado) {
                    header('Location: /admin/ponentes');
                }

            }
        }

        $redes = json_decode($ponente->redes);

        $router->render('admin/ponentes/crear', [
            'titulo' => 'Registrar Ponente',
            'alertas' => $alertas,
            'ponente' => $ponente,
            'redes' => $redes
        ]);
    }


    public static function editar(Router $router) {
    
        if(!is_admin()) {
            header('Location: /login');
        }

        $alertas = [];

        
        $id = $_GET['id'];
        $id = filter_var($id, FILTER_VALIDATE_INT);

        if(!$id){
            header('Location: /admin/ponentes');
        }

        $ponente = Ponente::find($id);
        if(!$ponente){
            header('Location: /admin/ponentes');
        }

        $ponente->imagen_actual = $ponente ->imagen;
        $ponente->imagen_empresa = $ponente ->imagenempresa;

        if($_SERVER['REQUEST_METHOD'] === 'POST') {

      if(!is_admin()) {
        header('Location: /login');
        }

            if(!empty($_FILES['imagen']['tmp_name'])) {   

                $carpeta_imagenes = '../public/img/ponentes';

                if(!is_dir($carpeta_imagenes)) {
                    mkdir($carpeta_imagenes, 0755, true);
                }

                $imagen_png = Image::make($_FILES['imagen']['tmp_name'])->fit(800,800)->encode('png', 80);
                $imagen_webp = Image::make($_FILES['imagen']['tmp_name'])->fit(800,800)->encode('webp', 80);

                $nombre_imagen = md5( uniqid( rand(), true));

                $_POST['imagen'] = $nombre_imagen;
            } else {
                $_POST['imagen'] = $ponente->imagen_actual;
            }


            $_POST['redes'] = json_encode( $_POST['redes'], JSON_UNESCAPED_SLASHES );
            $ponente->sincronizar($_POST);

            $alertas = $ponente->validar();
            if(empty($alertas)) {
                if(isset($nombre_imagen)) {
                    $imagen_png->save($carpeta_imagenes . '/' . $nombre_imagen . ".png" ); 
                    $imagen_png->save($carpeta_imagenes . '/' . $nombre_imagen . ".webp" ); 
                }

                $resultado = $ponente->guardar();

                if($resultado) {
                    header('Location: /admin/ponentes');
                }
            }

        }

        $router->render('admin/ponentes/editar', [
            'titulo' => 'Actualizar Ponente',
            'alertas' => $alertas,
            'ponente' => $ponente,
            'redes' => json_decode($ponente->redes)
        ]);

    }




    public static function eliminar(Router $router) {
 
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            if(!is_admin()) {
                header('Location: /login');
            }
            
            $id = $_POST['id'];
            $ponente = Ponente::find($id);
            if(!isset($ponente) ) {
                header('Location: /admin/ponentes');
            }
            $resultado = $ponente->eliminar();
            if($resultado) {
                header('Location: /admin/ponentes');
            }
        }

    }
}

/*
Este código es un controlador llamado PonentesController que maneja las diferentes acciones relacionadas con los ponentes en una aplicación web. Veamos cada una de las funciones en detalle:

La función index es responsable de mostrar una lista paginada de los ponentes en la página de administración. Primero verifica si el usuario es un administrador, de lo contrario, lo redirige a la página de inicio de sesión. Luego, obtiene el número de página actual de la variable $_GET['page'] y lo valida. Si no se proporciona un número de página válido, redirige al usuario a la primera página. A continuación, establece la cantidad de registros por página y obtiene el total de ponentes. Luego, crea una instancia de la clase Paginacion para generar la paginación y obtiene los ponentes correspondientes a la página actual utilizando el método paginar de la clase Ponente. Finalmente, renderiza la vista correspondiente con los datos necesarios.

La función crear se encarga de mostrar el formulario para crear un nuevo ponente y procesar los datos enviados a través del método POST. Al igual que en la función anterior, verifica si el usuario es un administrador y lo redirige a la página de inicio de sesión si no lo es. Crea una instancia de la clase Ponente y, si se envían datos a través del método POST, realiza algunas validaciones y guarda los datos del ponente. Si no hay errores de validación, guarda la imagen del ponente en una carpeta específica y finalmente redirige al usuario a la página de administración de ponentes.

La función editar es similar a la función crear, pero en este caso se encarga de mostrar el formulario para editar un ponente existente y procesar los datos enviados a través del método POST. Verifica si el usuario es un administrador y si se proporciona un ID válido para el ponente a editar. Luego, obtiene el ponente correspondiente al ID proporcionado y muestra los datos actuales del ponente en el formulario. Si se envían datos a través del método POST, realiza algunas validaciones y guarda los cambios en el ponente. Si se proporciona una nueva imagen, la guarda en la carpeta correspondiente. Finalmente, redirige al usuario a la página de administración de ponentes.

La función eliminar se encarga de eliminar un ponente. Verifica si se envió una solicitud POST y si el usuario es un administrador. Luego, obtiene el ID del ponente a eliminar y realiza la eliminación. Si la eliminación es exitosa, redirige al usuario a la página de administración de ponentes.

En resumen, este controlador maneja las acciones relacionadas con los ponentes en una aplicación web, como mostrar una lista paginada de ponentes, crear nuevos ponentes, editar ponentes existentes y eliminar ponentes. También realiza algunas validaciones y redireccionamientos según sea necesario.

*/