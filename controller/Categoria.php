<?php
require '../modelo/mantenimientoDaoImpl.php';
session_start();

$opcion = isset($_POST['opcion']) ? $_POST['opcion'] : '';
$id_user_reg = isset($_POST['idUserReg']) ? $_POST['idUserReg'] : '';
$nombre_cat = isset($_POST['nombreCatReg']) ? $_POST['nombreCatReg'] : '';
$id_cat_edit = isset($_POST['idCatEdit']) ? $_POST['idCatEdit'] : '';
$nombre_edit = isset($_POST['nombreEditCat']) ? $_POST['nombreEditCat'] : '';
$id_categoria = isset($_POST['id_categoria']) ? $_POST['id_categoria'] : '';

if($id_categoria != null){
    $retorno = Mantenimiento::EliminarCategoria($categoria_id);
}

switch ($opcion) {
    case 'addCategoria':
    $retorno = Mantenimiento::AgregarCategoria($nombre_cat, $id_user_reg);
        break;
    case 'editCategoria':
    $retorno = Mantenimiento::EditarCategoria($id_cat_edit, $nombre_edit, $id_user_reg);
        break;
    default:
        break;
}



/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

