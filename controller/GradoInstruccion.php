<?php

require_once '../modelo/mantenimientoDaoImpl.php';

session_start();

$opcion = isset($_POST['opcion']) ? $_POST['opcion'] : '';
$id_user_reg = isset($_POST['idUserReg']) ? $_POST['idUserReg'] : '';
$nombre_grado = isset($_POST['nombreGrado']) ? $_POST['nombreGrado'] : '';
$nombre_grado_edit = isset($_POST['nombreEdit']) ? $_POST['nombreEdit'] : '';
$id_grado_edit = isset($_POST['idGradoEdit']) ? $_POST['idGradoEdit'] : '';
$id_user_edit = isset($_POST['idUserRegEdit']) ? $_POST['idUserRegEdit'] : '';
$id_grado_instruccion = isset($_POST['id_grado_instruccion']) ? $_POST['id_grado_instruccion'] : '';
$id_grado_instruccion_act = isset($_POST['id_grado_instruccion_act']) ? $_POST['id_grado_instruccion_act'] : '';

switch ($opcion){
    case 'GradoReg':
        $grado = Mantenimiento::AgregarGradoInstruccion($nombre_grado, $id_user_reg);
        break;
    case 'EditGrado':
        $grado = Mantenimiento::EditarGradoInstruccion($nombre_grado_edit, $id_user_edit, $id_grado_edit);
        break;
    default :
        break;
}

if ($id_grado_instruccion) {
    $eliminargrado = Mantenimiento::EliminarGradoInstruccion($id_grado_instruccion);
}
if ($id_grado_instruccion_act){
    $activargrado = Mantenimiento::ActivarGradoInstruccion($id_grado_instruccion_act);
}
?>

