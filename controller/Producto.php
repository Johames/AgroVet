<?php
require '../modelo/mantenimientoDaoImpl.php';
session_start();

$opcion = isset($_POST['opcion']) ? $_POST['opcion'] : '';
$id_user_reg = isset($_POST['idUserReg']) ? $_POST['idUserReg'] : '';
$nombre_producto = isset($_POST['nombreProd']) ? $_POST['nombreProd'] : '';
$descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : '';
$marca_id = isset($_POST['marca']) ? $_POST['marca'] : '';
$categoria_id = isset($_POST['categoria']) ? $_POST['categoria'] : '';
$presentacion_id = isset($_POST['presentacion']) ? $_POST['presentacion'] : '';

switch ($opcion){
    
    case 'agregarProducto':
        $agregar = Mantenimiento::AgregarProducto($nombre_producto, $descripcion, $categoria_id, $marca_id, $presentacion_id, $id_user_reg);
        break;
    default :
        break;
}

