<?php

require_once '../modelo/mantenimientoDaoImpl.php';

session_start();

$opcion = isset($_POST['opcion']) ? $_POST['opcion'] : '';
$id_user_reg = isset($_POST['idUserReg']) ? $_POST['idUserReg'] : '';
$nombre_unidad = isset($_POST['nombreUMed']) ? $_POST['nombreUMed'] : '';
$abreviatura_unidad = isset($_POST['abreviaturaUMed']) ? $_POST['abreviaturaUMed'] : '';
$nombre_edit = isset($_POST['nombresEdit']) ? $_POST['nombresEdit'] : '';
$abreviatura_edit = isset($_POST['abreviaturaEdit']) ? $_POST['abreviaturaEdit'] : '';
$unidad_medida_id = isset($_POST['idEdit']) ? $_POST['idEdit'] : '';

switch ($opcion) {
    case 'UMedidaReg':
        $registrar = Mantenimiento::AgregarUnidadMedida($nombre_unidad, $abreviatura_unidad, $id_user_reg);
        break;
    case 'EditUniMed':
        $edite = Mantenimiento::EditarUnidadMedida($unidad_medida_id, $nombre_edit, $abreviatura_edit, $_SESSION['usuario_id']);
        break;
    default :
        break;
}
?>
