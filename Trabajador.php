<?php
/**
 * Created by PhpStorm.
 * User: shackox
 * Date: 22/10/15
 * Time: 11:19 PM
 */

require 'Database.php';

class Trabajador
{

    function __construct()
    {

    }

    public static function getAll()
    {

        $consulta = "SELECT * FROM databasedemon";

        try
        {

            $comando = Database::getInstance()->getDb()->prepare($consulta);

            $comando->execute();

            return $comando->fetchAll(PDO::FETCH_ASSOC);

        } catch (PDOException $e)
        {

            return false;

        }

    }

    public static function getById($id)
    {

        $consulta = "SELECT id,
                            cargo,
                            nombre,
                            apellido,
                            edad,
                            lugarTrabajo
                            FROM databasedemon
                            WHERE id=?";

        try
        {

            $comando = Database::getInstance()->getDb()->prepare($consulta);

            $comando->execute(array($id));

            $row = $comando->fetch(PDO::FETCH_ASSOC);

            return $row;

        } catch (PDOException $e)
        {

            return -1;

        }

    }

    public static function update(
        $id,
        $cargo,
        $nombre,
        $apellido,
        $edad,
        $lugarTrabajo
    )
    {

        $consulta = "UPDATE databasedemon" .
            " SET cargo=?, nombre=?, apellido=?, edad=?, lugarTrabajo=? " .
            "WHERE id=?";

        $cmd = Database::getInstance()->getDb()->prepare($consulta);

        $cmd->execute(array($cargo, $nombre, $apellido, $edad, $lugarTrabajo, $id));

        return $cmd;

    }

    public static function insert (
        $cargo,
        $nombre,
        $apellido,
        $edad,
        $lugarTrabajo
    )
    {

        $comando = "INSERT INTO databasedemon ( " .
            "cargo," .
            "nombre," .
            "apellido," .
            "edad," .
            "lugarTrabajo" .
            "VALUES( ?,?,?,?,?)";

        $sentencia = Database::getInstance()->getDb()->prepare($comando);

        return $sentencia->execute
        (

            array
            (

                $cargo,
                $nombre,
                $apellido,
                $edad,
                $lugarTrabajo,

            )

        );

    }

    public static function delete($id)
    {

        $comando = "DELETE FROM databasedemon";

        $sentencia = Database::getInstance()->getDb()->prepare($comando);

        return $sentencia->execute(array($id));

    }

}