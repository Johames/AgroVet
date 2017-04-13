<?php

  require_once ("../modelo/mantenimientoDaoImpl.php");

  session_start();

  $id_categoria = isset($_POST['id_categoria']) ? $_POST['id_categoria'] : '';
  $id_area = isset($_POST['id_area']) ? $_POST['id_area'] : '';

  if($id_categoria != null){
    $retorno = Mantenimiento::ActivarCategoria($id_categoria);
  }

  if($id_area != null){
    $retorno2 = Mantenimiento::ActivarArea($id_area);
  }

?>
