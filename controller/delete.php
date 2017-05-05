<?php

  require_once ("../modelo/mantenimientoDaoImpl.php");

  session_start();

  
  $id_area = isset($_POST['id_area']) ? $_POST['id_area'] : '';
  
 
  $id_grado_instruccion = isset($_POST['id_grado_instruccion']) ? $_POST['id_grado_instruccion'] : '';

  if($id_categoria != null){
    $retorno = Mantenimiento::EliminarCategoria($id_categoria);
  }

  if($id_area != null){
    $retorno2 = Mantenimiento::EliminarArea($id_area);
  }
  
  if($id_estado_civil!=null){
      $retorno3 = Mantenimiento::EliminarEstadoCivil($id_estado_civil);
  }

  if($id_marca!=null){
      $retorno3 = Mantenimiento::EliminarMarca($id_marca);
  }
  
  if($id_grado_instruccion!=null){
      $id_grado_instruccion = Mantenimiento::EliminarGradoInstruccion($id_grado_instruccion);
  }
?>
