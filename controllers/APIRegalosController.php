<?php

namespace Controllers;

use Model\Regalo;
use Model\Registro;

class APIRegalosController
{

    public static function index()
    {

        if (!is_admin()) {
            echo json_encode([]);
            return;
        }

        $regalos = Regalo::all();

        foreach ($regalos as $regalo) {

            $regalo->total = Registro::totalArray(['regalo_id' => $regalo->id, 'pack_id' => "1"]);
        }

        echo json_encode($regalos);
        return;
    }
}
/* 
En este archivo, se define una clase llamada APIRegalosController dentro del namespace Controllers. Esta clase contiene un método estático llamado index().

Dentro del método index(), se realiza lo siguiente:

Se verifica si el usuario no es un administrador utilizando la función is_admin(). Si el usuario no es un administrador, se envía una respuesta JSON vacía y se termina la ejecución del método utilizando return.

Si el usuario es un administrador, se obtienen todos los registros de la tabla Regalo utilizando el método estático all() de la clase Regalo. Estos registros se almacenan en la variable $regalos.

A continuación, se itera sobre cada uno de los registros de $regalos utilizando un bucle foreach. Dentro de este bucle, se realiza lo siguiente:

Se accede a la propiedad id de cada registro de $regalos y se utiliza junto con el valor "1" para llamar al método estático totalArray() de la clase Registro. Este método recibe un array asociativo como argumento, donde la clave 'regalo_id' tiene el valor de id del regalo actual y la clave 'pack_id' tiene el valor "1". El resultado de este método se asigna a la propiedad total del regalo actual.
Después de completar el bucle foreach, se envía una respuesta JSON que contiene todos los registros de $regalos utilizando la función json_encode(). Luego, se termina la ejecución del método utilizando return.

En resumen, este código verifica si el usuario es un administrador y, en caso afirmativo, obtiene todos los registros de la tabla Regalo. Luego, itera sobre cada registro y calcula el valor de la propiedad total utilizando el método totalArray() de la clase Registro. Finalmente, devuelve una respuesta JSON que contiene todos los registros de Regalo con la propiedad total actualizada.
*/