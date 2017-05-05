<?php

require_once '../modelo/mantenimientoDaoImpl.php';

session_start();

$opcion = isset($_POST['opcion']) ? $_POST['opcion'] : '';
$id_user_reg = isset($_POST['idUserReg']) ? $_POST['idUserReg'] : '';
$nombre_marca = isset($_POST['nombMarca']) ? $_POST['nombMarca'] : '';
$nombre_marca_edit = isset($_POST['nombresMarcaEdit']) ? $_POST['nombresMarcaEdit'] : '';
$id_marca_edit = isset($_POST['idEditMarca']) ? $_POST['idEditMarca'] : '';
$id_user_edit = isset($_POST['idUserRegEdit']) ? $_POST['idUserRegEdit'] : '';
$id_marca = isset($_POST['id_marca']) ? $_POST['id_marca'] : '';
$id_marca_act = isset($_POST['id_marca_act']) ? $_POST['id_marca_act'] : '';

if($id_marca!=null){
    $eliminarmarca = Mantenimiento::EliminarMarca($id_marca);
}
if($id_marca_act!=null){
    $activarmarca = Mantenimiento::ActivarMarca($id_marca_act);
}

switch ($opcion){
    case 'addMarca':
        $retorno = Mantenimiento::AgregarMarca($nombre_marca, $id_user_reg);
        break;
    case 'EditarMarca':
        $retorno = Mantenimiento::EditarMarca($nombre_marca_edit, $id_user_edit, $id_marca_edit) ; 
    default :
        break;
}

?>