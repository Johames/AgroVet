<?php
  session_start();
  session_destroy();
?>
<!DOCTYPE html>
<html class=''>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Inicio de Sesión</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Agroveterinaria -- No se como se llama">
    <meta name="author" content="Juan -- Pedro -- Natalia -- Leydi -- Leidy -- Antony -- Deyvi -- Johann ">
    <meta name="robots" content="noindex">
    <link rel="stylesheet" type="text/css" href="recursos/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="res/css/log-in.css">
    <script type="text/javascript" src="res/js/log-in.js"></script>
  </head>

  <body onload="mueveReloj()">
    <h1>
      <form name="form_reloj">
        <input type="text" name="reloj" size="10" style="background-color: transparent; color : White; font-family : Verdana, Arial, Helvetica; font-size : 48pt; text-align : center;" onfocus="window.document.form_reloj.reloj.blur()">
      </form>
    </h1>
    <h3 style="font-size: 30px;" id="fecha">
      <script>
        var meses = new Array ("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
        var diasSemana = new Array("Domingo","Lunes","Martes","Miércoles","Jueves","Viernes","Sábado");
        var f=new Date();
        document.write(diasSemana[f.getDay()] + ", " + f.getDate() + " de " + meses[f.getMonth()] + " de " + f.getFullYear());
      </script>
    </h3>
    <form id="valid" role="form" method="post" action="controller/validacion.php">
      <div id="capa" class="flip">
        <div class="content">
          <ul>
            <li>
              <input name="usuario" type="text" placeholder="Usuario" required/>
            </li>
            <li>
              <input name="contrasena" type="password" placeholder="Contraseña" required/>
            </li>
          </ul>
        </div>
        <ul class="button">
          <li class="front" onclick="iniciar()">
            Iniciar Sesión
          </li>
          <li class="back">
            <h5 align="center">
              <button type="submit" class="btn btn-primary btn-lg">Iniciar Sesión</button>
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <button type="reset" class="btn btn-default btn-lg pull-xs-right btn-close" onclick="cerrar()">Cancelar</button>
            </h5>
          </li>
        </ul>
      </div>
    </form>

    <script type="text/javascript" src="recursos/js/jquery-3.2.0.min.js"></script>
  </body>
</html>
