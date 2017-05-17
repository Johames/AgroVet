<?php

require_once '../modelo/ventaDaoImpl.php';

$data = json_decode(file_get_contents("php://input"));

switch ($data->accion) {

    case 0;

    session_start();
        $venta = $_SESSION["detalleventa"];
        if ($venta == 0) {

        } else {
            $ListaDetalleVenta = $_SESSION["detalleventa"];
            echo json_encode($ListaDetalleVenta);
        }
    break;
    case '1':

        //Se realiza la insercion de un detalle venta
        session_start();
        $listaproducto=Venta::Buscador($data->campo);
        echo json_encode($listaproducto);

    break;
    case '2';
        session_start();
        // reaiza el subtotal
        $subtotal=($data->cantidad*$data->precio)-$data->descuento;

                $count= 0;

        //carga la lista que hay en session
        $ListaDetalleVenta = $_SESSION["detalleventa"];
        if ($ListaDetalleVenta == 0) {
            $ListaDetalleVenta = array();
              $count= 0;
        }else {
          foreach ($ListaDetalleVenta as $lista) {
              if ($lista['productosucursalid'] == $data->productosucursalid) {
                  $count = 1;
              }
          }
        }

          if ($count == 0) {

            array_push($ListaDetalleVenta, array("productosucursalid" => $data->productosucursalid, "cantidad" => $data->cantidad, "nombre" => $data->nombre,  "precio" => $data->precio, "descuento" => $data->descuento, "subtotal" => $subtotal, "stockactual" => $data->stockactual));
              //carga la nueva lista en seession
            $_SESSION["detalleventa"] = $ListaDetalleVenta;
            // inprime la lista y envia
            echo json_encode($ListaDetalleVenta);
          }else {
              echo json_encode($ListaDetalleVenta);
          }
      break;
      case '3';


      //Actualiza el detalle venta
        session_start();
        $count             = 0;
        $ListaDetalleVenta = $_SESSION["detalleventa"];
        foreach ($ListaDetalleVenta as $lista) {
            if ($lista['productosucursalid'] == $data->productosucursalid) {
                $ListaDetalleVenta[$count]['productosucursalid']  = $lista['productosucursalid'];
                $ListaDetalleVenta[$count]['cantidad']    = $data->cantidad;
                $ListaDetalleVenta[$count]['nombre']    = $lista['nombre'];
              //  $ListaDetalleVenta[$count]['codigo']      = "";
                $ListaDetalleVenta[$count]['precio'] = $lista['precio'];
                $ListaDetalleVenta[$count]['descuento']   = $data->descuento;
                $ListaDetalleVenta[$count]['subtotal']    = ((($data->cantidad)*($lista['precio']))-($data->descuento));
                $ListaDetalleVenta[$count]['stockactual'] = $lista['stockactual'];
            }
            $count = $count + 1;
        }
        $_SESSION["detalleventa"] = $ListaDetalleVenta;
        echo json_encode($ListaDetalleVenta);
      break;
      case '4';

      //eliminar detalle venta
      session_start();
        $count             = 0;
        $eliminar          = 0;
        $ListaDetalleVenta = $_SESSION["detalleventa"];
        foreach ($ListaDetalleVenta as $lista) {
            if ($lista['productosucursalid'] == $data->productosucursalid) {
                $eliminar = $count;
            }
            $count = $count + 1;
        }
        array_splice($ListaDetalleVenta, $eliminar, 1);
        $_SESSION["detalleventa"] = $ListaDetalleVenta;
        echo json_encode($ListaDetalleVenta);
      break;
      case '5';

              //Se realiza la insercion de un detalle venta
              session_start();
              $listacliente=Venta::BuscadorCliente($data->campo);
              echo json_encode($listacliente);

      break;
      case '6';

      //Se realiza la insercion de un detalle venta
      session_start();
      $_SESSION["detalleventa"]=0;

      break;

      case '7';
      //Finaliza la venta que fue al contado y solo actualiza los datos de la venta de una venta al credito
        session_start();

        $listacuotas = array();
        $año        = date("Y");
        $mes         = date("m");
        $dia         = date("d");
        $fecha       = "" . $año . "-" . $mes . "-" . $dia . "";
        $fechaactual = date("Y-m-d", strtotime($fecha));
        $cliente     = '';
        $idventaa     = 0;
        $totalventa  = 0;
        $count       = 0;
        if ($data->personaid == '' || $data->personaid == null) {
            $cliente = 1;

        } else {
            $cliente = $data->personaid;

        }

        if ($data->transaccion == 1) {
            $ListaDetalleVenta = $_SESSION["detalleventa"];
            foreach ($ListaDetalleVenta as $lista) {

                $id= Venta::RegistrarVenta($idventaa,$lista['cantidad'],$lista['descuento'],$lista['precio'],$data->transaccion,$cliente,$_SESSION["usuario_id"],$lista['productosucursalid']);
                $idventaa   = $id['idventa'];
                $totalventa = $totalventa + ($lista['cantidad'] * $lista['precio'] - $lista['descuento']);

            }
            Venta::RealizarCuotaVenta($idventaa,$totalventa,$fechaactual,$_SESSION["usuario_id"]);
            $_SESSION['detalleventa']=0;

        } else {
            $ListaVenta = $_SESSION["listaventa"];
            foreach ($ListaVenta as $lista) {
                if ($lista['idcliente'] == 0) {
                    $ListaVenta[$count]['totalventa']       = $lista['totalventa'];
                    $ListaVenta[$count]['descuentos']       = $lista['descuentos'];
                    $ListaVenta[$count]['valorventa']       = $lista['valorventa'];
                    $ListaVenta[$count]['cantidadproducto'] = $lista['cantidadproducto'];
                    $ListaVenta[$count]['idcliente']        = $cliente;
                    $ListaVenta[$count]['tipotransaccion']  = $data->transaccion;
                }
                $count = $count + 1;
            }
            $_SESSION["listaventa"] = $ListaVenta;
        }


      break;




}

?>
