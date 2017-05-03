<?php

require_once '../modelo/mantenimientoDaoImpl.php';

session_start();

$opcion = isset($_POST['opcion']) ? $_POST['opcion'] : '';
$id_user_reg = isset($_POST['idUserReg']) ? $_POST['idUserReg'] : '';
$nombre_grado = isset($_POST['nombreGrado']) ? $_POST['nombreGrado'] : '';
$nombre_grado_edit = isset($_POST['nombreEdit']) ? $_POST['nombreEdit'] : '';
$id_grado_edit = isset($_POST['idGradoEdit']) ? $_POST['idGradoEdit'] : '';
$id_user_edit = isset($_POST['idUserRegEdit']) ? $_POST['idUserRegEdit'] : '';

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

if (true) {
    
}
?>

