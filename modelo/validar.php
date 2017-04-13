<?php

  require_once '../database/dataBase.php';

  class Logeo{

    function __construct(){}

    public static function getLogin($user, $clave) {

        $consulta = "select * from usuario where usuario = '".$user."' and contrasena = '".$clave."' and estado='1' ";
        try {
            // Preparar sentencia
            $comando = Database::getInstance()->getDb()->prepare($consulta);
            // Ejecutar sentencia preparada
            $comando->execute();

            return $comando->fetch(PDO::FETCH_ASSOC);

        } catch (PDOException $e) {
            return false;
        }
    }

  }

?>
