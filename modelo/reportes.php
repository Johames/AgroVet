<?php

require_once 'database/dataBase.php';

class ReportesVentas {

  function __construct(){

  }

  // Cantidad de Ventas Diarias
     public static function VentasD(){
        $query = "SELECT count(venta_id) as venta FROM venta where fecha=CURDATE()";
        try {
            //Preparar la sentencia
            $comando = Database::getInstance()->getDb()->prepare($query);

            //ejecutar
            $comando->execute();

            return $comando->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return false;
        }
    }
    
    // Cantidad de Ventas Semanal
     public static function VentasS(){
        $query = "SELECT count(venta_id) as venta FROM venta where YEARWEEK(fecha) = YEARWEEK(CURDATE())";
        try {
            //Preparar la sentencia
            $comando = Database::getInstance()->getDb()->prepare($query);

            //ejecutar
            $comando->execute();

            return $comando->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return false;
        }
    }
    
    // Cantidad de Ventas Mensual
     public static function VentasM(){
        $query = "SELECT count(venta_id) as venta FROM venta where MONTH(fecha)=5";
        try {
            //Preparar la sentencia
            $comando = Database::getInstance()->getDb()->prepare($query);

            //ejecutar
            $comando->execute();

            return $comando->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            return false;
        }
    }
      
 }
?>


