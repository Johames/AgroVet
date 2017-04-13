<?php

require_once '../database/dataBase.php';

class Seguridad {

    function __construct() {
        
    }
//usuario
 public static function getUsuario($estado) {
        $query = "SELECT p.persona_id,  case p.estado when 1 then 'Activo' when 2 then 'Inactivo' END as estado, p.nombres, p.apellidos, u.usuario_id,u.usuario, u.contrasena, u.perfil_id, u.area_id
 FROM persona p, usuario u where p.persona_id=u.usuario_id and u.estado=".$estado;
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

     // perfil
 public static function getPerfil($estado) {
        $query = "SELECT perfil_id, nombre_perfil, usuario_id_reg, case estado when 1 then 'Activo' when 2 then 'Inactivo' END as estado FROM perfil where estado=".$estado;
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
        $query = "SELECT persona_id, nombres, apellidos, procedencia, date_format(fech_nac,'%d/%m/%y') as f_nac, case estado when 1 then 'Activo' when 2 then 'Inactivo' END as estado FROM persona where estado=".$estado;
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
    
    
    public static function getOpcion($estado) {
        $query = "select * from opciones where estado=".$estado;
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
}

 ?>