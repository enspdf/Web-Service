<?php
/**
 * Created by PhpStorm.
 * User: shackox
 * Date: 23/10/15
 * Time: 12:24 AM
 */

require 'Trabajador.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{

    $body = json_decode(file_get_contents("php://input"), true);

    $retorno = Trabajador::insert(

        $body['cargo'],
        $body['nombre'],
        $body['apellido'],
        $body['edad'],
        $body['lugarTrabajo']

    );

    if ($retorno)
    {

        print json_encode(

          array(

              'estado' => '1',
              'mensaje' => 'Creación exitosa'

          )

        );

    } else
    {

        print json_encode(

            array(

                'estado' => '2',
                'mensaje' => 'Creación fallida'

            )

        );

    }

}