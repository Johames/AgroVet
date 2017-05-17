<?php
require_once '../database/dataBase.php';

/**
 *
 */
class Venta {

  function __construct(){

  }


//sirve para buscar los productos

public static function Buscador($a)
{
//  $consulta = "select * FROM producto where nombre like '%$a%'";
$consulta="select ps.producto_sucursal_id, CONCAT(p.nombre, ' ', um.abreviatura) As nombre,p.producto_id as producto_id,
            CONCAT(p.nombre, ' stock ' ,ps.stock_actual) As nomb, ps.precio_mayor as precio, ps.stock_actual,ps.stock_minimo
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



////////////////////////////////////////////////////////////



  public static function AgreCarritoIni($usuarioid, $personaid,$cantidad,$precioventa,$descuento,$productosucursalid){
      $query ="select carroini(".$usuarioid.", ".$personaid.",".$cantidad.",".$precioventa.",".$descuento.",".$productosucursalid.") as idventa from dual";
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

  public static function ListaCarritoVenta($idventa){
      $query = "select ps.producto_sucursal_id,p.nombre, dv.*, ps.stock_actual , round(((dv.cantidad*dv.precio_venta)-dv.descuento),2) as subtotal
                from producto p,producto_sucursal ps,detalle_venta dv
                where p.producto_id=ps.producto_id and ps.producto_sucursal_id=dv.producto_sucursal_id and dv.venta_id=".$idventa;
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

  public static function TotalVenta($idventa){
      $query = "select sum(round(((dv.cantidad*dv.precio_venta)-dv.descuento),2)) as total from detalle_venta dv where dv.venta_id=".$idventa;
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


  public static function AgregarDetalleVenta($idventa,$cantidad,$precioventa,$descuento,$productosucursalid) {
      try {
          $query = "call agregardetalleventa(".$idventa.",".$cantidad.",".$precioventa.",".$descuento.",".$productosucursalid.")";
          //Preparar la sentencia
          $comando = Database::getInstance()->getDb()->prepare($query);

          //ejecutar
          $comando->execute();

          return $comando;
      } catch (PDOException $e) {
          return false;
      }
  }

  public static function EditarDetalleVenta($idventa,$cantidad,$descuento,$productosucursalid) {
      try {
          $query = "call editardetalleventa(".$idventa.",".$cantidad.",".$descuento.",".$productosucursalid.")";
          //Preparar la sentencia
          $comando = Database::getInstance()->getDb()->prepare($query);

          //ejecutar
          $comando->execute();

          return $comando;
      } catch (PDOException $e) {
          return false;
      }
  }

  public static function elimiprodetlle($idventa,$productosucursalid) {
      try {
          $query = "call elimiprodetlle(".$idventa.",".$productosucursalid.")";
          //Preparar la sentencia
          $comando = Database::getInstance()->getDb()->prepare($query);

          //ejecutar
          $comando->execute();

          return $comando;
      } catch (PDOException $e) {
          return false;
      }
  }


  public static function anularventa($idventa) {
      try {
          $query = "call anularventa(".$idventa.")";
          //Preparar la sentencia
          $comando = Database::getInstance()->getDb()->prepare($query);

          //ejecutar
          $comando->execute();

          return $comando;
      } catch (PDOException $e) {
          return false;
      }
  }



//buscdor de cliente
public static function BuscadorCliente($cliente)
{
$consulta="select p.persona_id as persona_id,concat(p.nombres,' ',p.apellidos) as nombrec, pger.num_documento,pger.direccion
 from persona p, persona_grad_est_reg pger
where p.persona_id=pger.persona_id and p.nombres like '%$cliente%'";
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

public static function RegistrarVenta($idventaa, $cantidad,$descuento,$precioventa,$tipotransaccion,$cliente,$idpersonal,$productosucursalid){

    $query ="select InsertarVentaDetalleVenta(".$idventaa.", ".$cantidad.",".$descuento.",".$precioventa.",".$tipotransaccion.",".$cliente.",".$idpersonal.",".$productosucursalid.") as idventa from dual";
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


public static function RealizarCuotaVenta($idventa,$totalventa,$fechaactual,$idpersonal) {
    try {
        $query = "call RealizarCuotaVenta(".$idventa.",".$totalventa.",'".$fechaactual."',".$idpersonal.")";
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
