<?php

require_once ("../modelo/mantenimientoDaoImpl.php");

session_start();

$id_categoria = isset($_POST['id_categoria']) ? $_POST['id_categoria'] : '';
$id_area = isset($_POST['id_area']) ? $_POST['id_area'] : '';
$id_estado_civil = isset($_POST['id_estado_civil']) ? $_POST['id_estado_civil'] : '';
$id_marca = isset($_POST['id_marca']) ? $_POST['id_marca'] : '';
$id_grado_instruccion = isset($_POST['id_grado_instruccion']) ? $_POST['id_grado_instruccion'] : '';


if ($id_categoria != null) {
    $retorno = Mantenimiento::ActivarCategoria($id_categoria);
}

if ($id_area != null) {
    $retorno2 = Mantenimiento::ActivarArea($id_area);
}

if ($estado_civil_id != null) {
    $retorno3 = Mantenimiento::ActivarEstadoCivil($estado_civil_id);
}

if($id_marca!=null){
      $retorno3 = Mantenimiento::ActivarMarca($id_marca);
  }
  
  if($id_grado_instruccion!=null){
      $retorno3 = Mantenimiento::ActivarGradoInstruccion($id_grado_instruccion);
  }
?>
