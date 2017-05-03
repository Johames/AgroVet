<?php

require_once '../modelo/mantenimientoDaoImpl.php';

session_start();

$opcion = isset($_POST['opcion']) ? $_POST['opcion'] : '';
$id_user_reg = isset($_POST['idUserReg']) ? $_POST['idUserReg'] : '';
$nombre_unidad = isset($_POST['nombreUMed']) ? $_POST['nombreUMed'] : '';
$abreviatura_unidad = isset($_POST['abreviaturaUMed']) ? $_POST['abreviaturaUMed'] : '';

switch ($opcion){
    case 'UMedidaReg':
        $registrar = Mantenimiento::AgregarUnidadMedida($nombre_unidad, $abreviatura_unidad, $id_user_reg);
            break;
    default :
        break;
}


?>
