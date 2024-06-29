<?php

namespace Controllers;

use Model\Pack;
use MVC\Router;
use Model\Regalo;
use Model\Usuario;
use Model\Registro;
use Classes\Paginacion;

class RegistradosController {

    public static function index(Router $router) {
        if(!is_admin()) {
            header('Location: /login');
        }
        
      

        $pagina_actual = $_GET['page'];
        $pagina_actual = filter_var($pagina_actual, FILTER_VALIDATE_INT);

        if(!$pagina_actual || $pagina_actual < 1) {
            header('Location: /admin/registrados?page=1');
        }
        $registros_por_pagina = 10;
        $total = Registro::total();
        $paginacion = new Paginacion($pagina_actual, $registros_por_pagina, $total);


        if($paginacion->total_paginas() < $pagina_actual) {
            header('Location: /admin/registrados?page=1');
        } 
        
        

        $registros = Registro::paginar($registros_por_pagina, $paginacion->offset());
        foreach($registros as $registro) {
            $registro->usuario = Usuario::find($registro->usuario_id);
            $registro->pack = Pack::find($registro->pack_id);
            $registro->regalo = Regalo::find($registro->regalo_id);
        }




        $router->render('admin/registrados/index', [
            'titulo' => 'Usuarios Registrados',
            'registros' => $registros,
            'paginacion' => $paginacion->paginacion()
        ]);
    }

}

/*

Este código es un controlador llamado RegistradosController en un proyecto PHP. Un controlador es una parte del patrón de diseño Modelo-Vista-Controlador (MVC) que se utiliza para manejar las solicitudes y las respuestas en una aplicación web.

En este controlador, hay un método estático llamado index que toma un objeto Router como parámetro. El método index se encarga de manejar la solicitud para la página de usuarios registrados.

El código comienza verificando si el usuario no es un administrador. Si no es un administrador, se redirige al usuario a la página de inicio de sesión.

Luego, se obtiene el número de página actual de la variable $_GET['page'] y se valida que sea un número entero. Si no es un número entero o no se proporciona un valor, se redirige al usuario a la primera página de la sección de usuarios registrados.

A continuación, se define la cantidad de registros por página y se obtiene el total de registros utilizando el modelo Registro. Luego, se crea un objeto Paginacion pasando la página actual, la cantidad de registros por página y el total de registros.

Después, se verifica si la página actual es mayor al número total de páginas disponibles. Si es mayor, se redirige al usuario a la primera página de la sección de usuarios registrados.

A continuación, se utiliza el método paginar del modelo Registro para obtener los registros correspondientes a la página actual y se recorren esos registros. Para cada registro, se obtiene el usuario y el paquete asociados utilizando los modelos Usuario y Pack.

Finalmente, se utiliza el método render del objeto Router para renderizar la vista correspondiente a la página de usuarios registrados. Se pasan algunos datos a la vista, como el título, los registros y la información de paginación.

En resumen, este código maneja la solicitud de la página de usuarios registrados, realiza la paginación de los registros y muestra la vista correspondiente con los datos necesarios


*/