<?php

  require_once ("../modelo/mantenimientoDaoImpl.php");

  session_start();

  $id_user_reg = isset($_POST['idUserReg']) ? $_POST['idUserReg'] : '';
  $nombre_cat = isset($_POST['nombreCatReg']) ? $_POST['nombreCatReg'] : '';
  $nombre_area = isset($_POST['nomArea']) ?  $_POST['nomArea'] : '';
  $tipo_area = isset($_POST['tipoArea']) ?  $_POST['tipoArea'] : '';
  $opcion = isset($_POST['opcion']) ? $_POST['opcion'] : '';

  switch ($opcion) {
    case 'categ':
        $retorno = Mantenimiento::AgregarCategoria($nombre_cat, $id_user_reg);
      break;
    /*case 'estadocivil':
        $retorno = Mantenimiento::AgregarEstadCivil($nombre, $user);
        break;*/
    case 'area':
        $retorno = Mantenimiento::AgregarArea($nombre_area, $tipo_area, $id_user_reg);
        break;
    default:
      # code...
      break;
  }

?>
