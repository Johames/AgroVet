<?php

  require_once ("../modelo/mantenimientoDaoImpl.php");

  session_start();

  $id_user_reg = isset($_POST['idUserReg']) ? $_POST['idUserReg'] : '';
  $nombre_cat = isset($_POST['nombreCatReg']) ? $_POST['nombreCatReg'] : '';
  $opcion = isset($_POST['opcion']) ? $_POST['opcion'] : '';

  switch ($opcion) {
    case 'categ':
        $retorno = Mantenimiento::AgregarCategoria($nombre_cat, $id_user_reg);
      break;

    default:
      # code...
      break;
  }

?>
