<?php

require_once '../database/dataBase.php';

class Mantenimiento {

    function __construct() {
        
    }

    //para obtener la lista de la persona
    public static function getPersona() {
        $query = "SELECT persona_id, nombres, apellidos, procedencia, date_format(fech_nac,'%d/%m/%y') as f_nac, case estado when 1 then 'Activo' when 2 then 'Inactivo' END as estado FROM persona";
        try {
            //Preparar la sentencia
            $comando = Database::getInstance()->getDb()->prepare($query);

            //ejecutar
            $comando->execute();

            return $comando->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return false;
        }
    }

    //obtener lista de la persona por estado
    public static function getPersonaEst($estado) {
        $query = "SELECT persona_id, nombres, apellidos, procedencia, date_format(fech_nac,'%d/%m/%y') as f_nac, case estado when 1 then 'Activo' when 2 then 'Inactivo' END as estado FROM persona WHERE estado=".$estado;
        try {
            //Preparar la sentencia
            $comando = Database::getInstance()->getDb()->prepare($query);

            //ejecutar
            $comando->execute();

            return $comando->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return false;
        }
    }

    //obtener lista de la persona por id
    public static function getPersonaId($id) {
        $query = "SELECT persona_id, nombres, apellidos, procedencia, date_format(fech_nac,'%d/%m/%y') as f_nac, case estado when 1 then 'Activo' when 2 then 'Inactivo' END as estado FROM persona WHERE estado=".$id;
        try {
            //Preparar la sentencia
            $comando = Database::getInstance()->getDb()->prepare($query);

            //ejecutar
            $comando->execute();

            return $comando->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return false;
        }
    }
    
    //eliminar un registro de la persona, en realida cambiar el estado a 0 :)
    public static function deletePersona($persona_id) {
        try {
            $query = "UPDATE persona SET estado=0 WHERE persona_id=".$persona_id;
            //Preparar la sentencia
            $comando = Database::getInstance()->getDb()->prepare($query);

            //ejecutar
            $comando->execute();

            return $comando;
        } catch (PDOException $e) {
            return false;
        }
        
    }
    
    //Editar los datos de una persona :D
    public static function editPersona($direccion) {
        try {
            $query = "UPDATE persona SET estado=0 WHERE persona_id=".$persona_id;
            //Preparar la sentencia
            $comando = Database::getInstance()->getDb()->prepare($query);

            //ejecutar
            $comando->execute();

            return $comando;
        } catch (PDOException $e) {
            return false;
        }
        
    }
}
?>

