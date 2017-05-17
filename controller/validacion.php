<?php
  require_once '../modelo/validar.php';

  session_start();
  $usuario = isset($_POST['usuario']) ? $_POST['usuario']: '';
  $contrasena = isset($_POST['contrasena']) ? $_POST['contrasena'] : '';

  $ListaUsuario = Logeo::getLogin($usuario, $contrasena);

  if ($ListaUsuario!='' || $ListaUsuario!=null) {

    $_SESSION["usuario_id"] = $ListaUsuario['usuario_id'];
    $_SESSION["usuario"] = $ListaUsuario['usuario'];
    $_SESSION["perfil_id"] = $ListaUsuario['perfil_id'];
    $_SESSION["venta_id"] = 0;
    $_SESSION["detalleventa"] = 0;
    $_SESSION["listaventa"]=0;

    header('Location: ../inicio.php');

  }else {
    header('Location: ../index.php');
  }

?>
