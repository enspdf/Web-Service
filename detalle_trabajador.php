<?php
/**
 * Created by PhpStorm.
 * User: shackox
 * Date: 23/10/15
 * Time: 12:24 AM
 */

require 'Trabajador.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET')
{

    if (isset($_GET['id']))
    {

        $parametro = $_GET['id'];

        $retorno = Trabajador::getById($parametro);

        if ($retorno)
        {

            $trabajador["estado"] = "1";

            $trabajador["trabajador"] = $retorno;

            print json_encode($trabajador);

        } else
        {

            print json_encode(

                array(

                    'estado' => '2',

                    'mensaje' => 'No se obtuvo el registro'

                )

            );

        }

    } else
    {

        print json_encode(

            array(

                'estado' => '3',
                'mensaje' => 'Se necesita un identificador'

            )

        );

    }

}