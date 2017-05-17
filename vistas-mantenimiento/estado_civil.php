<?php
require '../modelo/mantenimientoDaoImpl.php';
session_start();

$estadoPersona = isset($_POST['estadoPersona']) ? $_POST['estadoPersona'] : '1';
$IdEstadoEdit = isset($_POST['IdEstadoCivil']) ? $_POST['IdEstadoCivil'] : '';
?>
<div class="col-sm-12">
    <br>
    <section id="lista" class="col-sm-12 well well-sm backcolor" style="display: block; margin-bottom: -50px;">
        <article class="col-sm-6" style="color: white">
            <h4><b>Lista de Estados Civiles</b></h4>
        </article>
        <article align="right" class="col-sm-6">
            <div class="col-sm-3"></div>
            <a class="btn btn-primary" onclick="AgregarEstado()">Nuevo &nbsp;<i class="glyphicon glyphicon-plus"></i></a><!--  data-toggle="modal" data-target="#addPersona" -->
        </article>
    </section>
    <div id="listaEstadoCivil" class="col-md-12" style="padding: 0px; margin-top: 60px;">
        <div  class="panel panel-primary">
            <div class="panel-heading">
                <article class="col-sm-8" style="color: white;">
                    <div class="input-group">
                        <span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-search"></i></span>
                        <input id="buscador" autofocus name="filt" onkeyup="filter(this, 'persona', '1')" type="text" class="form-control" placeholder="Buscar Persona." aria-describedby="basic-addon1">
                    </div>
                </article>
                <script>
                    function enviar() {
                        $.ajax({
                            type: "POST",
                            url: "vistas-mantenimiento/estado_civil.php",
                            data: "estadoPersona=" + document.getElementById('estadoPersona').value,
                            success: function (data) {
                                $("#mantenimiento").html(data);
                            }
                        });
                    }
                    ;
                </script>
                <article align="right" class="col-sm-4">
                    <div class="input-group col-sm-12">
                        <select id="estadoPersona" class="form-control" name="estadoPersona" onchange="enviar()">
                            <option hidden>Seleccionar el Estado</option>
                            <option value="1" <?php if ($estadoPersona == 1) { ?>selected<?php } ?> >Activos</option>
                            <option value="0" <?php if ($estadoPersona == 0) { ?>selected<?php } ?> >Inactivos</option>
                        </select>
                    </div>
                </article>
                <div class="row"></div>
            </div>
            <div class="panel-body">
                <div class="col-md-12" style="overflow: auto; padding: 0px;">
                    <table style="" id="persona" class="table table-bordered table-condensed table-hover table-responsive">
                        <thead class="bg-primary">
                            <tr>
                                <th>#</th>
                                <th hidden>Id Categoria</th>
                                <th>Nombre</th>
                                <th>Estado</th>
                                <th colspan="2">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $count = 0;

                            $ListaEstadoCivil = Mantenimiento::ListaEstadoCivilEstado($estadoPersona);

                            foreach ($ListaEstadoCivil as $est) {
                                $count++;
                                ?>
                                <tr>
                                    <td><?php echo $count; ?></td>
                                    <td hidden><?php echo $est['estado_civil_id']; ?></td>
                                    <td><?php echo $est['nombre_estado']; ?></td>
                                    <td hidden></td>
                                    <td><?php echo $est['estado']; ?></td>
                                    <td align="center">
                                        <a style="cursor: pointer;" onclick="Editar<?php echo $est['estado_civil_id']; ?>(<?php echo $est['estado_civil_id']; ?>)">
                                            <i data-toggle="tooltip" data-placement="top" title="Modificar Persona" class="glyphicon glyphicon-pencil"></i>
                                        </a>
                                    </td>
                                    <td align="center">
                                        <?php if ($estadoPersona == 1) { ?>
                                            <a style="cursor: pointer;" onclick="eliminar<?php echo $est['estado_civil_id']; ?>()" data-toggle="modal" data-target="#delEstado">
                                                <i data-toggle="tooltip" data-placement="top" title="Eliminar Estado Civil" class="glyphicon glyphicon-remove"></i>
                                            </a><?php } if ($estadoPersona == 0) { ?>
                                            <a style="cursor: pointer;" onclick="activar<?php echo $est['estado_civil_id']; ?>()" data-toggle="modal" data-target="#activarEstad">
                                                <i data-toggle="tooltip" data-placement="top" title="Activar Estado Civil" class="glyphicon glyphicon-ok"></i>
                                            </a>
                                        <?php } ?>
                                    </td>
                            <script>
                                
                                function eliminar<?php echo $est['estado_civil_id']; ?>() {
                                    $("#estDelete").val("<?php echo $est['estado_civil_id']; ?>");
                                }
                                function activar<?php echo $est['estado_civil_id']; ?>() {
                                    $("#estActive").val("<?php echo $est['estado_civil_id']; ?>");
                                }
                                
                                function Editar<?php echo $est['estado_civil_id']; ?>($IdEstadoCivil) {
                                    $.ajax({
                                        type: 'POST',
                                        url: "vistas-mantenimiento/estado_civil.php",
                                        data: "IdEstadoCivil=" + $IdEstadoCivil,
                                        success: function (data) {
                                            $("#mantenimiento").html(data);
                                            document.getElementById('lista').style.display = 'none';
                                            document.getElementById('listaEstadoCivil').style.display = 'none';
                                            document.getElementById('agregarEst').style.display = 'none';
                                            document.getElementById('editarEst').style.display = 'block';
                                            document.getElementById("nombreEstEdit").focus();
                                        }
                                    });
                                }

                                function CancelarEditEst() {
                                    document.getElementById("formEstEdit").reset();
                                    document.getElementById('lista').style.display = 'block';
                                    document.getElementById('listaEstadoCivil').style.display = 'block';
                                    document.getElementById('editarEst').style.display = 'none';
                                    document.getElementById("buscador").focus();
                                }
                            </script>
                            </tr><?php } ?>
                        <?php if ($count == 0 & $estadoPersona == 0) { ?><tr><td colspan="12" style="font-family: oblique bold cursive; font-size: 18px" class="text-center">No Hay Estados Civiles Inactivos</td></tr>
                        <?php } if ($count == 0 & $estadoPersona == 1) { ?><tr><td colspan="12" style="font-family: oblique bold cursive; font-size: 18px" class="text-center">No Hay Estados Civiles Activos</td></tr><?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div id="agregarEst" class="col-md-12" style="padding: 0px; display: none;">
        <div data-brackets-id="733" class="panel panel-primary">
            <div data-brackets-id="734" class="panel-heading">
                <h4><b>Ingresar Estado Civil</b></h4>
            </div>
            <div class="panel-body">
                <form accept-charset="utf-8" method="post" id="formEstCivReg" name="formEstCivReg">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group has-feedback">
                                <label for="nombres">Nombre</label>
                                <input name="nombreEstReg" id="nombreEstReg" required type="text" pattern="^[A-Za-záéíóúÑñ ][A-Za-záéíóúÑñ ]*"  maxlength="39" class="form-control" placeholder="Nombre" data-error="Solo se permite letras no numeros">
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>

                    <input style="color: black;" type="hidden" name="idUserReg" id="idUserReg" value="<?php echo $_SESSION['usuario_id']; ?>">
                    <input style="color: black;" type="hidden" name="opcion" id="opcion" value="addEstadoCivil">

                    <hr style="border-color: #3b5998;">
                    <h4 align="center">
                        <button type="button" class="btn btn-default" onclick="CancelarEstado()"><!--  data-dismiss="modal" -->
                            Cancelar &nbsp;&nbsp; <i class="glyphicon glyphicon-remove-circle"></i>
                        </button>
                        <button class="btn btn-primary" type="submit">
                            Registrar &nbsp;&nbsp; <i class="glyphicon glyphicon-ok-circle"></i>
                        </button>
                    </h4>
                </form>
            </div>
        </div>
    </div>

    <div id="editarEst" class="col-md-12" style="padding: 0px; display: none;">
        <div data-brackets-id="733" class="panel panel-primary">
            <div data-brackets-id="734" class="panel-heading">
                <h4><b>Modificar los Datos de la Persona</b></h4>
                <input value="<?php echo $IdEstadoEdit ?>">
            </div>
            <div data-brackets-id="736" class="panel-body">
                <form id="formEstEdit" name="formEstEdit" method="post" accept-charset="utf-8">
                    <?php
                    $ListEstEdit = Mantenimiento::ListaEstadoCivil($IdEstadoEdit)
                    ?>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group has-feedback">
                                <label for="nombres">Nombre</label>
                                <input value="<?php echo $ListEstEdit['nombre_estado']; ?>" id="nombreEstEdit" name="nombreEstEdit" required type="text" pattern="^[A-Za-záéíóúñÑ ][A-Za-záéíóúñÑ ]*" maxlength="39" class="form-control"  placeholder="Nombres" data-error="Solo se permite letras no numeros">
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>

                    <input style="color: black;" name="idEstEdit" id="idEstEdit" type="text" value="<?php echo $ListEstEdit['estado_civil_id']; ?>">
                    <input style="color: black;" type="text" name="idUserReg" id="idUserReg" value="<?php echo $_SESSION['usuario_id']; ?>">
                    <input style="color: black;" type="hidden" name="opcion" id="opcion" value="editEstadoCiv">

                    <div class="row hidden">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="imagen">Seleccione su Imagen</label>
                                <input type="file" disabled id="imagen" name="img">
                                <p class="help-block">Vayase a la ... jajaja</p>
                            </div>
                        </div>
                    </div>
                    <hr style="border-color: #3b5998;">
                    <h4 align="center">
                        <button type="button" class="btn btn-default" onclick="CancelarEditEst()"><!--  data-dismiss="modal" -->
                            Cancelar &nbsp;&nbsp; <i class="glyphicon glyphicon-remove-circle"></i>
                        </button>
                        <button class="btn btn-primary" type="submit">
                            Modificar &nbsp;&nbsp; <i class="glyphicon glyphicon-ok-circle"></i>
                        </button>
                    </h4>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="delEstado">
    <section class="modal-dialog modal-md">
        <section class="modal-content">
            <section class="modal-header" style="border-top-left-radius: 5px; border-top-right-radius: 5px; background: #c71c22; color: white;">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: white;"><span aria-hidden="true">&times;</span></button>
                <h3 align="center"><span><b>¿Está seguro de Eliminar este Estado Civil?</b></span></h3>
            </section>
            <section class="modal-body">
                <div class="row">
                    <input type="hidden" id="estDelete" name="id" value="1">
                </div>
                <h4 align="center">
                    <button type="button" class="btn btn-default" data-dismiss="modal">
                        Cancelar &nbsp;&nbsp; <i class="glyphicon glyphicon-remove-circle"></i>
                    </button>
                    <button class="btn btn-danger" type="submit" onclick="eliminarEstado()">
                        Eliminar &nbsp;&nbsp; <i class="glyphicon glyphicon-ok-circle"></i>
                    </button>
                </h4>
            </section>
        </section>
    </section>
</div>

<div class="modal fade" id="activarEstad">
    <section class="modal-dialog modal-md">
        <section class="modal-content">
            <section class="modal-header" style="border-top-left-radius: 5px; border-top-right-radius: 5px; background: #3b5998; color: white;">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: white;"><span aria-hidden="true">&times;</span></button>
                <h3 align="center"><span><b>¿Está seguro de Activar esta Categoría?</b></span></h3>
            </section>
            <section class="modal-body">
                <div class="row">
                    <input type="hidden" id="estActive" name="id">
                </div>
                <h4 align="center">
                    <button type="button" class="btn btn-default" data-dismiss="modal">
                        Cancelar &nbsp;&nbsp; <i class="glyphicon glyphicon-remove-circle"></i>
                    </button>
                    <button class="btn btn-primary" type="submit" onclick="activarEstado()">
                        Activar &nbsp;&nbsp; <i class="glyphicon glyphicon-ok-circle"></i>
                    </button>
                </h4>
            </section>
        </section>
    </section>
</div>

<script type="text/javascript" src="res/js/funcionesAjaxMantenimiento.js"></script>
