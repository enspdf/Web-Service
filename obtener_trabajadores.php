<?php
/**
 * Created by PhpStorm.
 * User: shackox
 * Date: 22/10/15
 * Time: 11:58 PM
 */

require 'Trabajador.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET')
{

    $trabajadores = Trabajador::getAll();

    if ($trabajadores)
    {

        $datos['estado'] = 1;

        $datos['trabajadores'] = $trabajadores;

        print json_encode($trabajadores);

    } else
    {

        print json_encode(

            array(

                'estado' => 2,

                'mensaje' => 'Ha ocurrido un error'

            )

        );

    }

}