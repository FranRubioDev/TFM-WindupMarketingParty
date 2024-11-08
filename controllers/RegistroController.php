<?php
namespace Controllers;

use Model\Dia;
use Model\Hora;
use Model\Pack;
use MVC\Router;
use Model\Evento;
use Model\Regalo;
use Model\Ponente;
use Model\Usuario;
use Model\Registro;
use Model\Categoria;
use Model\EventosRegistros;

class RegistroController {

    public static function crear(Router $router) {



        if(!is_auth()) {
            header('Location: /');
            return;
        }


        // Verificar si el usuario ya esta registrado
        $registro = Registro::where('usuario_id', $_SESSION['id']);



        if(isset($registro) && ($registro->pack_id === "3" || $registro->pack_id === "2" )) {

            header('Location: /entrada?id=' . urlencode($registro->token));

            return;
        }

        if(isset($registro) && $registro->pack_id === "1") {
            header('Location: /entrada?id=' . urlencode($registro->token));
        /*    header('Location: /finalizar-registro/');*/
            return;
        }

        $router->render('registro/crear', [
            'titulo' => 'Finalizar Registro'
        ]);



    }
    public static function gratis(Router $router) {
        error_log("Entrando al método gratis"); // Depuración
    
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            error_log("Solicitud POST recibida"); // Depuración
    
            if(!is_auth()) {
                error_log("Usuario no autenticado"); // Depuración
                header('Location: /login');
                return;
            }

            if(isset($registro) && $registro->pack_id === "1") {
                error_log("Usuario ya registrado con pack_id 1"); // Depuración
                header('Location: /entrada?id=' . urlencode($registro->token));
                return;
            }
    
            $token = substr(md5(uniqid(rand(), true)), 0, 8);
            error_log("Token generado: $token"); // Depuración
    
            // Verifica si el usuario ya esta registrado
            $registro = Registro::where('usuario_id', $_SESSION['id']);
  
    
            // Crea registro
            $datos = array(
                'pack_id' => 1,
                'pago_id' => '',
                'token' => $token,
                'usuario_id' => $_SESSION['id']
            );
            error_log("Datos del nuevo registro: " . json_encode($datos)); // Depuración
    
            $registro = new Registro($datos);
            $resultado = $registro->guardar();
            error_log("Resultado de guardar: " . var_export($resultado, true)); // Depuración
    
            if($resultado) {
                error_log("Redirigiendo a entrada"); // Depuración
                header('Location: /entrada?id=' . urlencode($registro->token));
                return;
            } else {
                error_log("Error al guardar el registro"); // Depuración
            }
        } else {
            error_log("Solicitud no es POST"); // Depuración
        }
    }
    

    public static function entrada(Router $router) {

        // Validar la URL
        $id = $_GET['id'];

        if(!$id || !strlen($id) === 8 ) {
            header('Location: /');
            return;
        }

        // Busca en la BD el token
        $registro = Registro::where('token', $id);
        if(!$registro) {
            header('Location: /');
            return;
        }
        // Llenar las tablas de referencia
        $registro->usuario = Usuario::find($registro->usuario_id);
        $registro->pack = Pack::find($registro->pack_id);

        $router->render('registro/entrada', [
            'titulo'=> 'Asistencia a la Windup Marketing Party',
            'registro' => $registro
        ]);
    }


    
    public static function pagar(Router $router) {

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            if(!is_auth()) {
                header('Location: /login');
                return;
            }

            // Validar POST no venga vacio
            if(empty($_POST)) {
                echo json_encode([]);
                return;
            }

            // Crear el registro
            $datos = $_POST;
            $datos['token'] = substr( md5(uniqid( rand(), true )), 0, 8);
            $datos['usuario_id'] = $_SESSION['id'];
            
            try {
                $registro = new Registro($datos);
          
                $resultado = $registro->guardar();
                echo json_encode($resultado);
            } catch (\Throwable $th) {
                echo json_encode([
                    'resultado' => 'error'
                ]);
            }

        }
    }

    /* Página de ponencias */

    public static function ponencias(Router $router) {

        if(!is_auth()) {
            header('Location: /login');
            return;
        }        

        // Validar que el usuario tenga el plan presencial
        $usuario_id = $_SESSION['id'];
        $registro = Registro::where('usuario_id', $usuario_id);

        if(isset($registro) && $registro->pack_id == "2" || $registro->pack_id == "3") {
            header('Location: /entrada?id=' . urlencode($registro->token));
            return;
        }
        
        if($registro->pack_id == "1") {
            header('Location: /entrada?id=' . urlencode($registro->token));
          /*  header('Location: /'); */
            return;
        }


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
        
        $regalos = Regalo::all('ASC');


        if($_SERVER['REQUEST_METHOD'] === 'POST') {


        if(!is_auth()) {
            header('Location: /login');
            return;
        }     

            $eventos = explode(',', $_POST['eventos']);
            if(empty($eventos)) {
                echo json_encode(['resultado' => false]);
                return;
            }

            // Obtener el registro de usuario
            $registro = Registro::where('usuario_id', $_SESSION['id']);
            if(!isset($registro) || $registro->pack_id !== "1") {
                echo json_encode(['resultado' => false]);
                return;
            }

            $eventos_array = [];
            // Validar la disponibilidad de los eventos seleccionados
            foreach($eventos as $evento_id) {
                $evento = Evento::find($evento_id);
                // Comprobar que el evento exista
                if(!isset($evento) || $evento->disponibles === "0") {
                    echo json_encode(['resultado' => false]);
                    return;
                }
                $eventos_array[] = $evento;
            }

            foreach($eventos_array as $evento) {
                $evento->disponibles -= 1;
                $evento->guardar();

                // Almacenar el registro
                $datos = [
                    'evento_id' =>  (int) $evento->id,
                    'registro_id' => (int)  $registro->id
                ];

                $registro_usuario = new EventosRegistros($datos);
                $registro_usuario->guardar();
            }

            // Almacenar el regalo
            $registro->sincronizar(['regalo_id' => $_POST['regalo_id']]);
            $resultado = $registro->guardar();

            if($resultado) {
                echo json_encode([
                    'resultado' => $resultado, 
                    'token' => $registro->token
                ]);
            } else {
                echo json_encode(['resultado' => false]);
            }

            return;
        }


        $router->render('registro/ponencias', [
            'titulo' => 'Elige Ponencias y Actividades',
            'eventos' => $eventos_formateados,
            'regalos' => $regalos
        ]);
    }



}
