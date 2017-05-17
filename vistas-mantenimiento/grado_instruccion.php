<?php
require '../modelo/mantenimientoDaoImpl.php';
session_start();

$estadoPersona = isset($_POST['estadoPersona']) ? $_POST['estadoPersona'] : '1';
$IdEditGradoInstruccion = isset($_POST['EditGrado']) ? $_POST['EditGrado'] : '';
?>
<div class="col-sm-12">
    <br>
    <section id="lista" class="col-sm-12 well well-sm backcolor" style="display: block; margin-bottom: -50px;">
        <article class="col-sm-6" style="color: white">
            <h4><b>Lista de Grados de Instrucción</b></h4>
        </article>
        <article align="right" class="col-sm-6">
            <div class="col-sm-3"></div>
            <a class="btn btn-primary" onclick="AgregarGrado()">Nuevo &nbsp;<i class="glyphicon glyphicon-plus"></i></a><!--  data-toggle="modal" data-target="#addPersona" -->
        </article>
    </section>
    <div id="listaGrado" class="col-md-12" style="padding: 0px; margin-top: 60px;">
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
                            url: "vistas-mantenimiento/grado_instruccion.php",
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
                                <th hidden>Id Grado de Instruccion</th>
                                <th>Grado de Instrucción</th>
                                <th>Estado</th>
                                <th colspan="2">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $count = 0;
                            $ListaGrado = Mantenimiento::ListaGradoInstruccionEstado($estadoPersona);

                            foreach ($ListaGrado as $gra) {
                                $count++;
                                ?>
                                <tr>
                                    <td><?php echo $count; ?></td>
                                    <td hidden><?php echo $gra['grado_instruccion_id']; ?></td>
                                    <td><?php echo $gra['nombre_grado']; ?></td>
                                    <td><?php echo $gra['estado']; ?></td>
                                    <td align="center">
                                        <a style="cursor: pointer;" onclick="Editar<?php echo $gra['grado_instruccion_id']; ?>(<?php echo $gra['grado_instruccion_id']; ?>)">
                                            <i data-toggle="tooltip" data-placement="top" title="Modificar Persona" class="glyphicon glyphicon-pencil"></i>
                                        </a>
                                    </td>
                                    <td align="center">
                                        <?php if ($estadoPersona == 1) { ?>
                                            <a style="cursor: pointer;" onclick="eliminar<?php echo $gra['grado_instruccion_id']; ?>()" data-toggle="modal" data-target="#deleteGrado">
                                                <i data-toggle="tooltip" data-placement="top" title="Eliminar Persona" class="glyphicon glyphicon-remove"></i>
                                            </a><?php } if ($estadoPersona == 0) { ?>
                                            <a style="cursor: pointer;" onclick="activar<?php echo $gra['grado_instruccion_id']; ?>()" data-toggle="modal" data-target="#activarGrado">
                                                <i data-toggle="tooltip" data-placement="top" title="Activar Persona" class="glyphicon glyphicon-ok"></i>
                                            </a>
                                        <?php } ?>
                                    </td>
                            <script>
                                function eliminar<?php echo $gra['grado_instruccion_id']; ?>() {
                                    $("#graDelete").val("<?php echo $gra['grado_instruccion_id']; ?>");
                                }
                                
                                function activar<?php echo $gra['grado_instruccion_id']; ?>() {
                                    $("#graActive").val("<?php echo $gra['grado_instruccion_id']; ?>");
                                }
                                
                                function Editar<?php echo $gra['grado_instruccion_id']; ?>(EditGrado) {
                                    $.ajax({
                                        type: 'POST',
                                        url: "vistas-mantenimiento/grado_instruccion.php",
                                        data: "EditGrado=" + EditGrado,
                                        success: function (data) {
                                            $("#mantenimiento").html(data);
                                            document.getElementById('lista').style.display = 'none';
                                            document.getElementById('listaGrado').style.display = 'none';
                                            document.getElementById('agregarGra').style.display = 'none';
                                            document.getElementById('editarGra').style.display = 'block';
                                            document.getElementById("nombreEdit").focus();
                                        }
                                    });
                                }

                                function cancelarEditGrado() {
                                    document.getElementById("formEditGra").reset();
                                    document.getElementById('lista').style.display = 'block';
                                    document.getElementById('listaGrado').style.display = 'block';
                                    document.getElementById('editarGra').style.display = 'none';
                                    document.getElementById("buscador").focus();
                                }
                            </script>
                            </tr><?php } ?>
                        <?php if ($count == 0 & $estadoPersona == 0) { ?><tr><td colspan="12" style="font-family: oblique bold cursive; font-size: 18px" class="text-center">No Hay Grados de Intrucción Inactivos</td></tr>
                        <?php } if ($count == 0 & $estadoPersona == 1) { ?><tr><td colspan="12" style="font-family: oblique bold cursive; font-size: 18px" class="text-center">No Hay Grados de Instrucción Activos</td></tr><?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div id="agregarGra" class="col-md-12" style="padding: 0px; display: none">
        <div data-brackets-id="733" class="panel panel-primary">
            <div data-brackets-id="734" class="panel-heading">
                <h4><b>Ingresar los Datos del Grado de Instrucción</b></h4>
            </div>
            <div data-brackets-id="736" class="panel-body">
                <form accept-charset="utf-8" id="FormAddGra" name="FormAddGra" method="post">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group has-feedback">
                                <label for="nombres">Nombres</label>
                                <input required type="text" id="nombreGrado" name="nombreGrado" pattern="^[A-Za-záéíóúÑñ ][A-Za-záéíóúÑñ ]*"  maxlength="40" class="form-control" placeholder="Nombres" data-error="Solo se permite letras no numeros">
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" id="opcion" name="opcion" value="GradoReg">
                    <input type="hidden" id="idUserReg" name="idUserReg" value="<?php echo $_SESSION['usuario_id']; ?>">

                    <hr style="border-color: #3b5998;">
                    <h4 align="center">
                        <button type="button" class="btn btn-default" onclick="CancelarGrado()"><!--  data-dismiss="modal" -->
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

    <div id="editarGra" class="col-md-12" style="padding: 0px; display: none;">
        <div data-brackets-id="733" class="panel panel-primary">
            <div data-brackets-id="734" class="panel-heading">
                <h4><b>Modificar los Datos de la Persona</b></h4>
                <input value="<?php echo $IdEditGradoInstruccion ?>" required type="text" >
            </div>

            <div data-brackets-id="736" class="panel-body">
                <form id="formEditGra"name="formEditGra" method="post" accept-charset="utf-8">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group has-feedback">
                                <?php
                                $EditGrado = Mantenimiento::ListaGradoInstruccion($IdEditGradoInstruccion);
                                ?>
                                <label for="nombres">Nombres</label>
                                <input required id="nombreEdit" name="nombreEdit" value="<?php echo $EditGrado['nombre_grado']; ?>" pattern="^[A-Za-záéíóúñÑ ][A-Za-záéíóúñÑ ]*" maxlength="39" class="form-control" placeholder="Nombres" data-error="Solo se permite letras no numeros">
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" id="opcion" name="opcion" value="EditGrado">
                    <input type="text" id="idGradoEdit" name="idGradoEdit" value="<?php echo $EditGrado['grado_instruccion_id']; ?>">
                    <input type="text" id="idUserRegEdit" name="idUserRegEdit" value="<?php echo $_SESSION['usuario_id']; ?>">

                    <hr style="border-color: #3b5998;">
                    <h4 align="center">
                        <button type="button" class="btn btn-default" onclick="cancelarEditGrado()"><!--  data-dismiss="modal" -->
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

<div class="modal fade" id="deleteGrado">
    <section class="modal-dialog modal-md">
        <section class="modal-content">
            <section class="modal-header" style="border-top-left-radius: 5px; border-top-right-radius: 5px; background: #c71c22; color: white;">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: white;"><span aria-hidden="true">&times;</span></button>
                <h3 align="center"><span><b>¿Está seguro de Eliminar esta Categoría?</b></span></h3>
            </section>
            <section class="modal-body">
                <div class="row">
                    <input type="hidden" id="graDelete" name="id" value="1">
                </div>
                <h4 align="center">
                    <button type="button" class="btn btn-default" data-dismiss="modal">
                        Cancelar &nbsp;&nbsp; <i class="glyphicon glyphicon-remove-circle"></i>
                    </button>
                    <button class="btn btn-danger" type="submit" onclick="eliminarGradoInstruccion()">
                        Eliminar &nbsp;&nbsp; <i class="glyphicon glyphicon-ok-circle"></i>
                    </button>
                </h4>
            </section>
        </section>
    </section>
</div>

<div class="modal fade" id="activarGrado">
    <section class="modal-dialog modal-md">
        <section class="modal-content">
            <section class="modal-header" style="border-top-left-radius: 5px; border-top-right-radius: 5px; background: #3b5998; color: white;">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: white;"><span aria-hidden="true">&times;</span></button>
                <h3 align="center"><span><b>¿Está seguro de Activar esta Categoría?</b></span></h3>
            </section>
            <section class="modal-body">
                <div class="row">
                    <input type="hidden" id="graActive" name="id">
                </div>
                <h4 align="center">
                    <button type="button" class="btn btn-default" data-dismiss="modal">
                        Cancelar &nbsp;&nbsp; <i class="glyphicon glyphicon-remove-circle"></i>
                    </button>
                    <button class="btn btn-primary" type="submit" onclick="activarGradoInstruccion()">
                        Activar &nbsp;&nbsp; <i class="glyphicon glyphicon-ok-circle"></i>
                    </button>
                </h4>
            </section>
        </section>
    </section>
</div>

<script type="text/javascript" src="res/js/funcionesAjaxMantenimiento.js"></script>
