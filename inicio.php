<?php
require_once 'modelo/perfil.php';
require 'modelo/reportes.php';

session_start();

if ($_SESSION["usuario_id"] == '' || $_SESSION["usuario_id"] == null) {
    header('Location: index.php');
}

$ListOpc = PerfilOpciones::ListaOpciones($_SESSION["perfil_id"] . '');
$ventasD = ReportesVentas::VentasD();
$ventasS = ReportesVentas::VentasS();
$ventasM= ReportesVentas::VentasM();
?>
<!DOCTYPE html>
<html ng-app="MyApp">
    <head>
        <meta charset="utf-8">
        <title>Inicio -- Greyli</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Agroveterinaria -- No se como se llama">
        <meta name="author" content="Juan -- Pedro -- Natalia -- Leydi -- Leidy -- Antony -- Deyvi -- Johann ">
        <link rel="stylesheet" type="text/css" href="recursos/CircleHoverEffects/css/common.css" />
        <link rel="stylesheet" type="text/css" href="recursos/CircleHoverEffects/css/style3.css" />

        <link rel="stylesheet" type="text/css" href="recursos/bootstrap/css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="recursos/font-awesome/css/font-awesome.min.css" />
        <link rel="stylesheet" type="text/css" href="recursos/css/local.css" />
        <link rel="stylesheet" type="text/css" href="res/css/perfil.css" />
        <link rel="stylesheet" type="text/css" href="res/css/barra.css" />

        <script type="text/javascript" src="recursos/js/jquery-1.10.2.min.js"></script>
        <script type="text/javascript" src="recursos/bootstrap/js/bootstrap.min.js"></script>

        <script type="text/javascript" src="res/angular/angular.js"></script>
        <script type="text/javascript" src="res/angular/angular.min.js"></script>
        <script type="text/javascript" src="res/js/inicio.js"></script>

        <!-- you need to include the shieldui css and js assets in order for the charts to work -->
        <link rel="stylesheet" type="text/css" href="http://www.shieldui.com/shared/components/latest/css/light-bootstrap/all.min.css" />
        <script type="text/javascript" src="http://www.shieldui.com/shared/components/latest/js/shieldui-all.min.js"></script>
        <script type="text/javascript" src="http://www.prepbootstrap.com/Content/js/gridData.js"></script>
    </head>
    <body ng-controller="MyController">
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
                    <!-- SubMenu -->
                    <ul class="nav navbar-nav side-nav">
                        <li class="active"><a>Inicio</a></li>
                    </ul>
                    <!-- Menus -->
                    <ul class="nav navbar-nav navbar-left navbar-user">
                        <?php foreach ($ListOpc as $opc) { ?>
                            <li id="menu<?php echo $opc['opciones_id'] ?>" style="cursor: pointer;">
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

            <div id="page-wrapper" style="margin-top: -20px;">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="panel panel-default ">
                            <div class="panel-body alert-info">
                                <div class="col-xs-5">
                                    <i class="fa fa-truck fa-5x"></i>
                                </div>
                                <div class="col-xs-5 text-right">
                                    <p class="alerts-heading"><?php echo $ventasD['venta']; ?></p>
                                    <p class="alerts-text">Ventas Diarias</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="panel panel-default ">
                            <div class="panel-body alert-info">
                                <div class="col-xs-5">
                                    <i class="fa fa-money fa-5x"></i>
                                </div>
                                <div class="col-xs-5 text-right">
                                    <p class="alerts-heading"><?php echo $ventasS['venta']; ?></p>
                                    <p class="alerts-text">Venta Semanal</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="panel panel-default ">
                            <div class="panel-body alert-info">
                                <div class="col-xs-5">
                                    <i class="fa fa-twitter fa-5x"></i>
                                </div>
                                <div class="col-xs-5 text-right">
                                    <p class="alerts-heading"><?php echo $ventasM['venta']; ?></p>
                                    <p class="alerts-text">Venta Mensual</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-bar-chart-o"></i> Sales Data</h3>
                            </div>
                            <div class="panel-body">
                                <div id="shieldui-chart3"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /#wrapper -->

        <!-- Modal -->
        <div class="modal fade" id="perfil" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header fondo-imagen" style="background-image: url(res/img/fondo.jpg);">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h3 class="modal-title" id="myModalLabel">Perfil del Usuario</h3>
                        <section class="main">
                            <ul class="ch-grid">
                                <li>
                                    <div class="ch-item">
                                        <div class="ch-info">
                                            <h3></h3>
                                            <span class="glyphicon  glyphicon-camera" style="font-size: 300% ;"></span>
                                            <br>
                                            <br>
                                            <a data-dismiss="modal"  data-toggle="modal" data-target="#editarperfil" style="font-size: 120%;">Editar Perfil</a>
                                        </div>
                                        <div class="ch-thumb ch-img-2"></div>
                                    </div>
                                </li>
                            </ul>
                        </section>
                    </div>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                    <div class="modal-body text-center">
                        <h5 class="panel-title" style="margin: 5px;"><kbd>Johann James Valles Paz</kbd></h5>
                        <p class="m-b">Design at GitHub. Creator of Bootstrap. Previously at Twitter. Huge nerd.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="editarperfil" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content" align="center">
<img src="res/img/<?php echo $_SESSION["imagen"];?>" width="50%" height="50%">
                    <div class="modal-body text-center">
                        
                        <h5 class="panel-title" style="margin: 5px;"><kbd>Johann James Valles Paz</kbd></h5>
                        <p class="m-b">Design at GitHub. Creator of Bootstrap. Previously at Twitter. Huge nerd.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- /#Modal -->

        <script type="text/javascript">
                    jQuery(function ($) {
                        var performance = [12, 43, 34, 22, 12, 33, 4, 17, 22, 34, 54, 67],
                                visits = [123, 323, 143, 132, 274, 223, 143, 156, 223, 223],
                                budget = [23, 19, 11, 34, 42, 52, 35, 22, 37, 45, 55, 57],
                                sales = [11, 9, 31, 34, 42, 52, 35, 22, 37, 45, 55, 57],
                                targets = [17, 19, 5, 4, 62, 62, 75, 12, 47, 55, 65, 67],
                                avrg = [117, 119, 95, 114, 162, 162, 175, 112, 147, 155, 265, 167];

                        $("#shieldui-chart1").shieldChart({
                            primaryHeader: {
                                text: "Visitors"
                            },
                            exportOptions: {
                                image: false,
                                print: false
                            },
                            dataSeries: [{
                                    seriesType: "area",
                                    collectionAlias: "Q Data",
                                    data: performance
                                }]
                        });

                        $("#shieldui-chart2").shieldChart({
                            primaryHeader: {
                                text: "Login Data"
                            },
                            exportOptions: {
                                image: false,
                                print: false
                            },
                            dataSeries: [
                                {
                                    seriesType: "polarbar",
                                    collectionAlias: "Logins",
                                    data: visits
                                },
                                {
                                    seriesType: "polarbar",
                                    collectionAlias: "Avg Visit Duration",
                                    data: avrg
                                }
                            ]
                        });

                        $("#shieldui-chart3").shieldChart({
                            primaryHeader: {
                                text: "Sales Data"
                            },
                            dataSeries: [
                                {
                                    seriesType: "bar",
                                    collectionAlias: "Budget",
                                    data: budget
                                },
                                {
                                    seriesType: "bar",
                                    collectionAlias: "Sales",
                                    data: sales
                                },
                                {
                                    seriesType: "spline",
                                    collectionAlias: "Targets",
                                    data: targets
                                }
                            ]
                        });

                        $("#shieldui-grid1").shieldGrid({
                            dataSource: {
                                data: gridData
                            },
                            sorting: {
                                multiple: true
                            },
                            paging: {
                                pageSize: 7,
                                pageLinksCount: 4
                            },
                            selection: {
                                type: "row",
                                multiple: true,
                                toggle: false
                            },
                            columns: [
                                {field: "id", width: "70px", title: "ID"},
                                {field: "name", title: "Person Name"},
                                {field: "company", title: "Company Name"},
                                {field: "email", title: "Email Address", width: "270px"}
                            ]
                        });
                    });
        </script>
    </body>
</html>
