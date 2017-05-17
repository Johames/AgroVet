<?php

  require_once 'modelo/perfil.php';
session_start();
  if ($_SESSION["usuario_id"] == '' || $_SESSION["usuario_id"] == null) {
    header('Location: index.php');
  }

  $ListOpc = PerfilOpciones::ListaOpciones($_SESSION["perfil_id"].'');
$PHPvariable="";

?>
<!DOCTYPE html>
<html ng-app="myApp">
    <head>
        <meta charset="utf-8">
        <title>Venta -- Greyli</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Agroveterinaria -- No se como se llama">
        <meta name="author" content="Juan -- Pedro -- Natalia -- Leydi -- Leidy -- Antony -- Deyvi -- Johann ">

        <link rel="stylesheet" type="text/css" href="recursos/bootstrap/css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="recursos/font-awesome/css/font-awesome.min.css" />
        <link rel="stylesheet" type="text/css" href="recursos/css/local.css" />
        <link rel="stylesheet" type="text/css" href="res/css/perfil.css" />
        <link rel="stylesheet" type="text/css" href="res/css/barra.css" />
        <link rel="stylesheet" type="text/css" href="res/angular-material/angular-material.css" />

        <link rel="stylesheet" type="text/css" href="recursos/css/jquery-ui.min.css"/>

        <script type="text/javascript" src="recursos/js/jquery-1.10.2.min.js"></script>
        <script type="text/javascript" src="recursos/bootstrap/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="recursos/js/jquery-3.2.0.min.js"></script>
        <script type="text/javascript" src="recursos/js/jquery-ui.min.js"></script>


        <script type="text/javascript" src="res/angular/angular.js"></script>
        <script type="text/javascript" src="res/angular/angular.min.js"></script>
        <script type="text/javascript" src="res/angular-material/angular-material.min.js"></script>
        <script type="text/javascript" src="res/angular-aria/angular-aria.min.js"></script>
        <script type="text/javascript" src="res/angular-animate/angular-animate.min.js"></script>
        <script type="text/javascript" src="res/angular-route/angular-route.min.js"></script>
        <script type="text/javascript" src="res/js/funcionesAjaxVenta.js"></script>
        <!-- you need to include the shieldui css and js assets in order for the charts to work -->
        <link rel="stylesheet" type="text/css" href="http://www.shieldui.com/shared/components/latest/css/light-bootstrap/all.min.css" />
        <script type="text/javascript" src="http://www.shieldui.com/shared/components/latest/js/shieldui-all.min.js"></script>
        <script type="text/javascript" src="http://www.prepbootstrap.com/Content/js/gridData.js"></script>
    </head>
    <body id="menu" ng-controller="venta">
        <div id="wrapper">
            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="inicio.php">Agroveterinaria -- <kbd>"GREYLI"</kbd></a>
                </div>
                <div class="collapse navbar-collapse navbar-ex1-collapse">
                    <!-- SubMenus -->
                    <ul class="nav navbar-nav side-nav">
                        <li class="active"><a>Venta</a></li>
                    </ul>
                    <!-- Menus -->
                    <ul class="nav navbar-nav navbar-left navbar-user">
                        <?php foreach ($ListOpc as $opc) { ?>
                        <li id="menu<?php echo $opc['opciones_id']?>" style="cursor: pointer;">
                          <a onclick="javascript:ir<?php echo $opc['opciones_id'] ?>()">
                            <?php echo $opc['nombre_opcion'] ?>
                          </a>
                        </li>
                        <?php } foreach ($ListOpc as $opc) { ?>
                          <form role="form" method="post" action="<?php echo $opc['url'] ?>" name="<?php echo $opc['nombre_opcion'] ?>">
                              <input type="hidden" name="id_menu" value="<?php echo $opc['opciones_id'] ?>">
                          </form>
                          <script>
                              function ir<?php echo $opc['opciones_id'] ?>() {
                                  document.<?php echo $opc['nombre_opcion'] ?>.submit();
                              }
                          </script>
                        <?php } ?>
                    </ul>
                    <!-- Usuario -->
                    <ul class="nav navbar-nav navbar-right navbar-user">
                        <li class="dropdown user-dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $_SESSION['usuario'] ?><b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li style="cursor: pointer;">
                                  <a data-toggle="modal" data-target="#perfil">
                                    <i class="fa fa-user"></i>
                                    Perfil
                                  </a>
                                </li>
                                <li class="divider"></li>
                                <li><a href="index.php"><i class="fa fa-power-off"></i> Log Out</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
          <br/>
          <br/>
          <br/>
          <br/>
            <div id="page-wrapper" style="margin-top: -20px;" >
                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-search"></i> Elegir los Productos</h3>
                            </div>

                            <div class="panel-body">
                              <div class="form-group">


                                  <md-autocomplete
                                            ng-disabled="false"
                                            md-no-cache="false"
                                            md-search-text-change="ListaProducto(buscar)"
                                            md-search-text="buscar"
                                            md-selected-item-change="AgregarDetalle(listaproducto.producto_sucursal_id,listaproducto.nombre,listaproducto.precio,listaproducto.stock_actual,listaproducto.stock_minimo)"
                                            md-items="listaproducto in Producto"
                                            md-item-text="listaproducto.nombre"
                                            md-min-length="0"
                                            md-autoselect="true"
                                            placeholder="Buscar producto">
                                          <md-item-template ng-if="listaproducto.stock_actual<=listaproducto.stock_minimo">
                                            <span  md-highlight-text="buscar" md-highlight-flags="^i">{{listaproducto.nomb}})</span>
                                          </md-item-template>
                                          <md-not-found>
                                            El producto "{{buscar}}" no fue encontrado.
                                          </md-not-found>
                                        </md-autocomplete>

                              </div>
                              <form role="form" ng-show="ventaagregar==1"  ng-submit="ListaDetalleVenta(agregardetalle)">
                                 <input type="hidden" ng-model="agregardetalle.productosucursalid=productosucursalid">
                                 <input type="hidden" ng-model="agregardetalle.stockactual=stockactual">
                                 <input type="hidden" ng-model="agregardetalle.stockminimo=stockminimo">
                                <div class="row" >
                                  <div class="form-group col-lg-3">
                                      <label>Producto</label>
                                      <input ng-model="agregardetalle.nombre=nombre"  class="form-control" placeholder="Producto" disabled>
                                  </div>

                                  <div class="form-group col-lg-2">
                                      <label>Precio</label>
                                      <input  ng-model="agregardetalle.precio=precio" class="form-control" placeholder="Precio" disabled>
                                      <input type="hidden" ng-model="agregardetalle.accion=accion" >
                                  </div>
                                  <div class="form-group col-lg-2">
                                      <label>Cant.<label>
                                      <input ng-model="agregardetalle.cantidad" ng-value="cantidad" class="form-control" placeholder="0">
                                  </div>
                                  <div class="form-group col-lg-2">
                                      <label>Desc.</label>
                                      <input  ng-model="agregardetalle.descuento" ng-value="descuento"  class="form-control" placeholder="0.00" >
                                  </div>
                                <div class=" col-lg-2">
                                    <h2   aling="center" >
                                    <button ng-click="ventaagregar=0"   ng-disabled="agregardetalle.cantidad<=0 || agregardetalle.descuento<0" class="btn btn-success" type="submit">
                                        Agregar al Carrito<i class="fa fa-shopping-cart"></i>
                                    </button>
                                </div>
                                </div>
                              </form>
                            </div>
                        </div>
                    </div>
                </div>




                <div class="row">
                    <div class="col-lg-7" >
                        <div class="panel panel-primary" id="listacarventa"  ng-if="venta==true">
                          <div class="panel-heading" >
                            <h3 class="panel-title" ><i class="fa fa-shopping-cart"></i> Carrito de Venta</h3>
                          </div>
                          <div class="panel-body">
                            <table class="table table-stripped table-hover table-resposive" ng-init="ListaDetalleVentaInicial()">
                              <thead class="bg-primary">
                                <tr>
                                  <th>Item</th>
                                  <th>Producto</th>
                                  <th>Cant.</th>
                                  <th>Pre. Unit</th>
                                  <th>Desc.</th>
                                  <th>SubTotal</th>
                                  <th colspan="2">Opciones</th>
                                </tr>
                              </thead>
                              <tbody ng-repeat=" listadetalle in detalle_venta">
                                <tr>
                                  <td ng-bind="$index+1"></td>
                                  <td ng-bind="listadetalle.nombre"></td>
                                  <td>{{listadetalle.cantidad}}</td>
                                  <td ng-bind="listadetalle.precio"></td>
                                  <td ng-bind="listadetalle.descuento"></td>
                                  <td ng-bind="listadetalle.subtotal"></td>
                                  <td align="center">
                                    <a style="cursor: pointer;" ng-click="selecteditdetalle(listadetalle);">
                                      <i class="fa fa-pencil"></i>
                                    </a>
                                  </td>
                                  <td>
                                    <a style="cursor: pointer;" ng-click="elimiprodetlle(listadetalle.productosucursalid);">
                                      <i class="fa fa-trash"></i>
                                    </a>
                                  </td>
                                </tr>
                               </tbody>
                               <tfoot>
                                 <tr class="bg-primary">
                                   <td colspan="5" align="left">Total: </td>
                                   <td colspan="3" align="left">60.00</td>
                                 </tr>
                               </tfoot>
                             </table>
                              </div>
                            </div>

                              <h4 align="center" ng-if="venta==true">
                                  <button type="button" class="btn btn-default" ng-click="cancelarVentas()"><!--  data-dismiss="modal" -->
                                      Cancelar &nbsp;&nbsp; <i class="glyphicon glyphicon-remove-circle"></i>
                                  </button>
                                  <button class="btn btn-primary" type="button" ng-if="transaccion==1" ng-click="InsertaDetalleventa()">
                                      Terminar la Venta &nbsp;&nbsp;<i class="glyphicon glyphicon-ok-circle"></i>
                                  </button>
                                  <button class="btn btn-primary" type="button" ng-if="transaccion==2" ng-click="detallesgeneralesventa(<?php $_SESSION["venta_id"].''; ?>)">
                                      Continuar la Venta &nbsp;&nbsp; <i class="glyphicon glyphicon-ok-circle"></i>
                                  </button>
                              </h4>
                      </div>

                  <div  id="datosCliente" >
                      <div class="col-lg-5">
                          <div class="panel panel-primary">
                              <div class="panel-heading">
                                  <h3 class="panel-title"><i class="fa fa-bar-chart-o"></i> Datos del Cliente</h3>
                              </div>
                              <div class="panel-body">

                                <div class="form-group">


                                    <md-autocomplete
                                              ng-disabled="false"
                                              md-no-cache="false"
                                              md-search-text-change="ListaCliente(busca)"
                                              md-search-text="busca"
                                              md-selected-item-change="AgregarCliente(ListaCliente.persona_id,ListaCliente.nombrec,ListaCliente.num_documento,ListaCliente.direccion)"
                                              md-items="ListaCliente in Cliente"
                                              md-item-text="ListaCliente.nombrec"
                                              md-min-length="0"
                                              md-autoselect="true"
                                              placeholder="Buscar Cliente">
                                            <md-item-template>
                                              <span  md-highlight-text="busca" md-highlight-flags="^i">{{ListaCliente.nombrec}}</span>
                                            </md-item-template>
                                            <md-not-found>
                                              El cliente "{{busca}}" no fue encontrado.
                                            </md-not-found>
                                          </md-autocomplete>

                                </div>


                                <form role="form" >
                                  <input type="hidden" ng-model="personaid">
                                  <div class="row">
                                    <div class="form-group col-lg-4">
                                        <!-- <label>DNI</label> -->
                                        <input ng-model="num_documento" class="form-control" placeholder="N° DNI" disabled>
                                    </div>
                                    <div class="form-group col-lg-8">
                                        <input ng-model="nombrec" class="form-control" placeholder="Nombres y Apellidos" disabled>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="form-group col-lg-4">
                                        <!-- <label>Teléfono</label> -->
                                        <input ng-model="telefono" class="form-control" placeholder="N° Télefono" disabled>
                                    </div>
                                    <div class="form-group col-lg-8">
                                        <!-- <label>Dirección</label> -->
                                        <input ng-model="direccion" class="form-control" placeholder="Dirección" disabled>
                                    </div>
                                  </div>
                                  <div class="row">
                                      <!--  <article class="col-lg-4">
                                          <select id="" class="form-control" name="">
                                              <option hidden>Tipo de Comprobante</option>
                                              <option value="2">Pendiente</option>
                                              <option value="3">Inactivo</option>
                                          </select>
                                      </article>-->
                                      <article class="col-lg-4">
                                        <h4>Tipo de Venta:</h4>
                                      </article>
                                      <article class="col-lg-4">
                                          <select  ng-model="transaccion" ng-init="transaccion=1" class="form-control" >
                                              <option ng-value="1" ng-selected="transaccion==1">Contado</option>
                                              <option ng-value="2" ng-selected="transaccion==2">Credito</option>
                                          </select>
                                      </article>
                                      <!--   <article class="col-lg-4">
                                          <select id="" class="form-control" name="">
                                              <option hidden>Tipo de Pago</option>
                                              <option value="2">Efectivo</option>
                                              <option value="3">Tarjeta</option>
                                          </select>
                                      </article>-->
                                  </div>
                                  <br>
                                </form>
                              </div>
                          </div>
                      </div>
                  </div>
                </div>

            </div>

            <!-- Modal -->
            <div class="modal fade" id="perfil" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header fondo-imagen" style="background-image: url(res/img/fondo.jpg);">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h3 class="modal-title" id="myModalLabel">Perfil del Usuario</h3>
                  </div>
                  <div class="modal-body text-center">
                    <img class="panel-profile-img" src="res/img/perfil.svg">
                    <h5 class="panel-title" style="margin: 5px;"><kbd>Johann James Valles Paz</kbd></h5>
                    <p class="m-b">Design at GitHub. Creator of Bootstrap. Previously at Twitter. Huge nerd.</p>
                  </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- /#Modal -->
        </div>
    </body>
</html>
