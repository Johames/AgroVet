<?php
require_once '../modelo/mantenimientoDaoImpl.php';

session_start();


$opcion = isset($_POST['opcion']) ? $_POST['opcion'] : '';
$id_user_reg = isset($_POST['idUserReg']) ? $_POST['idUserReg'] : '';
$nombre_estado = isset($_POST['nombreEstReg']) ? $_POST['nombreEstReg'] : '';
$nombre_edit = isset($_POST['nombreEstEdit']) ? $_POST['nombreEstEdit'] : '';
$id_nom_edi = isset($_POST['idEstEdit']) ? $_POST['idEstEdit'] : '';
$id_estado_civil = isset($_POST['id_estado_civil']) ? $_POST['id_estado_civil'] : '';
$id_estado_civil_edit = isset($_POST['id_estado_civil_edit']) ? $_POST['id_estado_civil_edit'] : '';

if($id_estado_civil!=null){
    $eliminar = Mantenimiento::EliminarEstadoCivil($id_estado_civil);
}
if ($id_estado_civil_edit !=null){
    $activar = Mantenimiento::ActivarEstadoCivil($id_estado_civil_edit);
}

switch ($opcion) {
    case 'addEstadoCivil':
        $retorno1 = Mantenimiento::AgregarEstadCivil($nombre_estado, $id_user_reg);
        break;
    case 'editEstadoCiv':
        $retorno1 = Mantenimiento::EditarEstadoCivil($nombre_edit, $id_user_reg, $id_nom_edi);
    default:
        break;
}



