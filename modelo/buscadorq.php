<?php
  require 'database/dataBase.php';

  /**
   *
   */
  class Agrobusca {

    function __construct(){}


    public static function Buscador($a)
    {
    //  $consulta = "select * FROM producto where nombre like '%$a%'";
    $consulta="select p.producto_id as producto_id, CONCAT(p.nombre, ' ', um.abreviatura) As nombre,p.producto_id as producto_id, CONCAT(p.nombre, ' stock ' ,ps.stock_actual) As nomb, ps.precio_mayor as precio
                from producto_sucursal ps, producto p, unidad_medida um,sucursal s
                where ps.sucursal_id= s.sucursal_id and ps.producto_id=p.producto_id and ps.unidad_medida_id=um.unidad_medida_id and p.nombre like '%$a%'";
      try {
          // Preparar sentencia
          $comando = Database::getInstance()->getDb()->prepare($consulta);
          // Ejecutar sentencia preparada
          $comando->execute();

          return $comando->fetchAll(PDO::FETCH_ASSOC);

      } catch (PDOException $e) {
          return false;
      }
    }

     function Buscador1()
    {
      $consulta = "select * FROM producto";
      try {
          // Preparar sentencia
          $comando = Database::getInstance()->getDb()->prepare($consulta);
          // Ejecutar sentencia preparada
          $comando->execute();

          return $comando->fetchAll(PDO::FETCH_ASSOC);

      } catch (PDOException $e) {
          return false;
      }
    }



  } //fin de la clase AgroVet

?>
