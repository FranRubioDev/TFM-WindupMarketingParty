<?php

namespace Controllers;

use Model\Evento;
use Model\Registro;
use Model\Usuario;
use MVC\Router;

class DashboardController {

    public static function index(Router $router) {

        // Obtener ultimos registros
        $registros = Registro::get(5);
        foreach($registros as $registro) {
            $registro->usuario = Usuario::find($registro->usuario_id);
        }

        // Calcular los ingresos
        $premium = Registro::total('pack_id', 1);
        $presenciales = Registro::total('pack_id', 2);

        $ingresos = ($premium * 30) + ($presenciales * 15);

        // Obtener eventos con más y menos lugares disponibles
        $menos_disponibles = Evento::ordenarLimite('disponibles', 'ASC', 5);
        $mas_disponibles = Evento::ordenarLimite('disponibles', 'DESC', 5);


        $router->render('admin/dashboard/index', [
            'titulo' => 'Panel de Administración',
            'registros' => $registros,
            'ingresos' => $ingresos,
            'menos_disponibles' => $menos_disponibles,
            'mas_disponibles' => $mas_disponibles
        ]);
    }
}

/*
El código que estás viendo es una clase llamada DashboardController en un archivo llamado DashboardController.php. Esta clase es parte de un proyecto que utiliza Composer, JavaScript, npm y PHP.

Dentro de la clase DashboardController, hay un método estático llamado index que recibe un objeto Router como parámetro. Este método se encarga de manejar la lógica para mostrar el panel de administración en un dashboard.

En este método, se realizan varias operaciones. Primero, se obtienen los últimos registros de la base de datos utilizando el método estático get de la clase Registro. Luego, se itera sobre cada registro y se busca el usuario correspondiente utilizando el método estático find de la clase Usuario. Esto se hace para asociar cada registro con su respectivo usuario.

A continuación, se calculan los ingresos sumando el total de registros con un pack_id igual a 1 multiplicado por 30, y el total de registros con un pack_id igual a 2 multiplicado por 15.

Después, se obtienen los eventos con más y menos lugares disponibles utilizando los métodos estáticos ordenarLimite de la clase Evento. Se obtienen los 5 eventos con menos lugares disponibles y los 5 eventos con más lugares disponibles.

Finalmente, se llama al método render del objeto Router para renderizar la vista del panel de administración. Se pasan varios datos a la vista, como el título, los registros, los ingresos, los eventos con menos lugares disponibles y los eventos con más lugares disponibles.

En resumen, este código muestra cómo se maneja la lógica para generar el panel de administración en un dashboard, obteniendo registros de la base de datos, calculando ingresos y obteniendo eventos con más y menos lugares disponibles
*/