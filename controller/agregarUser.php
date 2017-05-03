<?php

  require_once ("../modelo/seguridadDaoImpl.php");

  session_start();

  $id_opc_reg = isset($_POST['idOpcReg']) ? $_POST['idOpcReg'] : '';
  $nombre_opc_reg = isset($_POST['nombreOpcReg']) ? $_POST['nombreOpcReg'] : '';
  $opcion = isset($_POST['opcion']) ? $_POST['opcion'] : '';

  switch ($opcion) {
    case 'addOpc':
        $retorno = Mantenimiento::AgregarCategoria($nombre_opc_reg, $id_opc_reg);
      break;

    default:
      # code...
      break;
  }

?>

