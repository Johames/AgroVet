<?php

require '../modelo/mantenimientoDaoImpl.php';

session_start();

$estadoPersona = isset($_POST['estadoPersona']) ? $_POST['estadoPersona'] : '1';
$idUnidadEdit = isset($_POST['idUnidadEdit']) ? $_POST['idUnidadEdit'] : '';

?>
<div class="col-sm-12">
    <br>
    <section id="lista" class="col-sm-12 well well-sm backcolor" style="display: block; margin-bottom: -50px;">
        <article class="col-sm-6" style="color: white">
            <h4><b>Lista de Unidades de Medida</b></h4>
        </article>
        <article align="right" class="col-sm-6">
            <div class="col-sm-3"></div>
            <a class="btn btn-primary" onclick="AgregarUnidadMedida()">Nuevo &nbsp;<i class="glyphicon glyphicon-plus"></i></a><!--  data-toggle="modal" data-target="#addPersona" -->
        </article>
    </section>
    <div id="listaUnMed" class="col-md-12" style="padding: 0px; margin-top: 60px;">
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
                            url: "vistas-mantenimiento/unidad_medida.php",
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
                            <option value="1" <?php if($estadoPersona == 1){ ?>selected<?php } ?> >Activos</option>
                            <option value="0" <?php if($estadoPersona == 0){ ?>selected<?php } ?> >Inactivos</option>
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
                                <th hidden>Id Persona</th>
                                <th>Medida</th>
                                <th>Abreviatura</th>
                                <th>Estado</th>
                                <th colspan="2">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $count = 0;
                            $ListaUnidadMedida = Mantenimiento::ListaUnidadMedidaEstado($estadoPersona);

                            foreach ($ListaUnidadMedida as $uni) {
                                $count++;
                                ?>
                                <tr>
                                    <td><?php echo $count; ?></td>
                                    <td hidden><?php echo $uni['unidad_medida_id']; ?></td>
                                    <td><?php echo $uni['nomb_uni_med']; ?></td>
                                    <td><?php echo $uni['abreviatura']; ?></td>
                                    <td><?php echo $uni['estado']; ?></td>
                                    <td align="center">
                                        <a style="cursor: pointer;" onclick="Editar<?php echo $uni['unidad_medida_id']; ?>(<?php echo $uni['unidad_medida_id']; ?>)">
                                            <i data-toggle="tooltip" data-placement="top" title="Modificar Persona" class="glyphicon glyphicon-pencil"></i>
                                        </a>
                                    </td>
                                    <td align="center">
                                        <?php if ($estadoPersona==1){?>
                                        <a style="cursor: pointer;" onclick="" data-toggle="modal" data-target="#delete">
                                            <i data-toggle="tooltip" data-placement="top" title="Eliminar Persona" class="glyphicon glyphicon-remove"></i>
                                        </a><?php } if($estadoPersona==0){?>
                                        <a style="cursor: pointer;" onclick="" data-toggle="modal" data-target="#activar">
                                            <i data-toggle="tooltip" data-placement="top" title="Activar Persona" class="glyphicon glyphicon-ok"></i>
                                        </a>
                                        <?php }?>
                                    </td>
                            <script>
                                function Editar<?php echo $uni['unidad_medida_id']; ?>(idUnidadEdit) {
                                    $.ajax({
                                        stype: 'POST',
                                        url: "vistas-mantenimiento/unidad_medida.php",
                                        data: "idUnidadEdit=" + idUnidadEdit,
                                        success: function (data) {
                                            $("#mantenimiento").html(data);
                                            document.getElementById('lista').style.display = 'none';
                                            document.getElementById('listaUnMed').style.display = 'none';
                                            document.getElementById('agregarUnMed').style.display = 'none';
                                            document.getElementById('editarUnMed').style.display = 'block';
                                            document.getElementById("nombresEdit").focus();
                                        }
                                    });
                                }

                                function cancelarEditUniMed() {
                                    document.getElementById("formUnMedEdit").reset();
                                    document.getElementById('lista').style.display = 'block';
                                    document.getElementById('listaUnMed').style.display = 'block';
                                    document.getElementById('editarUnMed').style.display = 'none';
                                    document.getElementById("buscador").focus();
                                }
                            </script>
                            </tr><?php } ?>
                            <?php if($count == 0 & $estadoPersona == 0){?><tr><td colspan="12" style="font-family: oblique bold cursive; font-size: 18px" class="text-center">No Hay Unidades de Medida Inactivos</td></tr>
                            <?php } if($count == 0 & $estadoPersona == 1){?><tr><td colspan="12" style="font-family: oblique bold cursive; font-size: 18px" class="text-center">No Hay Unidades de Medida Activos</td></tr><?php }?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div id="agregarUnMed" class="col-md-12" style="padding: 0px; display: none;">
        <div data-brackets-id="733" class="panel panel-primary">
            <div data-brackets-id="734" class="panel-heading">
                <h4><b>Ingresar los Datos la Unidad de Medida</b></h4>
            </div>
            <div data-brackets-id="736" class="panel-body">
                <form id="formUnimedReg" name="formUnimedReg" method="post" accept-charset="utf-8">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group has-feedback">
                                <label for="nombres">Unidad</label>
                                <input required id="nombreUMed" name="nombreUMed" type="text" pattern="^[A-Za-záéíóúÑñ ][A-Za-záéíóúÑñ ]*"  maxlength="39" class="form-control" placeholder="Unidad de Medida" data-error="Solo se permite letras no numeros">
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group has-feedback">
                                <label for="abreviatura">Abreviatura</label>
                                <input required id="abreviaturaUMed" name="abreviaturaUMed" type="text" maxlength="39" class="form-control" placeholder="Abreviatura">
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>
                    
                    <input type="hidden" id="opcion" name="opcion" value="UMedidaReg">
                    <input type="hidden" id="idUserReg" name="idUserReg" value="<?php $_SESSION['usuario_id'];?>">

                    <div class="row hidden">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="imagen">Seleccione su Imagen</label>
                                <input type="file" disabled id="imagen" name="img">
                                <p class="help-block">Vayase a la ...</p>
                            </div>
                        </div>
                    </div>
                    <hr style="border-color: #3b5998;">
                    <h4 align="center">
                        <button type="button" class="btn btn-default" onclick="CancelarUnidadMedida()"><!--  data-dismiss="modal" -->
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
    
    <div id="editarUnMed" class="col-md-12" style="padding: 0px; display: none;">
        <div data-brackets-id="733" class="panel panel-primary">
            <div data-brackets-id="734" class="panel-heading">
                <h4><b>Modificar los Datos de la Unidad de Medida</b></h4>
                <input value="<?php echo $idUnidadEdit ?>" required type="text" >
            </div>

            <div data-brackets-id="736" class="panel-body">
                <form id="formUnMedEdit" name="formUnMedEdit" accept-charset="utf-8" method="post">
                    <?php 
                        $ListUMEdit = Mantenimiento::ListaUnidadMedida($idUnidadEdit)
                    ?>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group has-feedback">
                                <label for="nombres">Nombres</label>
                                <input required id="nombresEdit" name="nombresEdit"  value="<?php echo $ListUMEdit['nomb_uni_med']; ?>" type="text" pattern="^[A-Za-záéíóúñÑ ][A-Za-záéíóúñÑ ]*" maxlength="39" class="form-control" placeholder="Nombres" data-error="Solo se permite letras no numeros">
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group has-feedback">
                                <label for="apellidos">Apellidos</label>
                                <input required  id="abreviaturaEdit" name="abreviaturaEdit" value="<?php echo $ListUMEdit['abreviatura']; ?>" type="text" pattern="^[A-Za-záéíóúñÑ ][A-Za-záéíóúñÑ ]*" maxlength="39" class="form-control" placeholder="Apellidos" data-error="Solo se permite letras no numeros">
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>

                    <input type="text" id="opcion" name="opcion" value="EditUniMed">
                    <input type="text" id="idEdit" name="idEdit" value="<?php echo $ListUMEdit['unidad_medida_id'];?>">

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
                        <button type="button" class="btn btn-default" onclick="cancelarEditUniMed()"><!--  data-dismiss="modal" -->
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
<div class="modal fade" id="delete">
    <section class="modal-dialog modal-md">
        <section class="modal-content">
            <section class="modal-header" style="border-top-left-radius: 5px; border-top-right-radius: 5px; background: #c71c22; color: white;">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: white;"><span aria-hidden="true">&times;</span></button>
                <h3 align="center"><span><b>¿Está seguro de Eliminar esta Persona?</b></span></h3>
            </section>
            <section class="modal-body">
                <form class="form-signin" role="form" method="post" action="mantenimiento">
                    <div class="row">
                        <input type="hidden" id="perDelete" name="id">
                        <input type="hidden" name="opcion" value="DeletePersona">
                    </div>
                    <h4 align="center">
                        <button type="button" class="btn btn-default" data-dismiss="modal">
                            Cancelar &nbsp;&nbsp; <i class="glyphicon glyphicon-remove-circle"></i>
                        </button>
                        <button class="btn btn-danger" type="submit">
                            Eliminar &nbsp;&nbsp; <i class="glyphicon glyphicon-ok-circle"></i>
                        </button>
                    </h4>
                </form>
            </section>
        </section>
    </section>
</div>
<div class="modal fade" id="activar">
    <section class="modal-dialog modal-md">
        <section class="modal-content">
            <section class="modal-header" style="border-top-left-radius: 5px; border-top-right-radius: 5px; background: #3b5998; color: white;">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: white;"><span aria-hidden="true">&times;</span></button>
                <h3 align="center"><span><b>¿Está seguro de Activar esta Persona?</b></span></h3>
            </section>
            <section class="modal-body">
                <form class="form-signin" role="form" method="post" action="mantenimiento">
                    <div class="row">
                        <input type="hidden" id="perActive" name="id">
                        <input type="hidden" name="opcion" value="ActivarPersona">
                    </div>
                    <h4 align="center">
                        <button type="button" class="btn btn-default" data-dismiss="modal">
                            Cancelar &nbsp;&nbsp; <i class="glyphicon glyphicon-remove-circle"></i>
                        </button>
                        <button class="btn btn-primary" type="submit">
                            Activar &nbsp;&nbsp; <i class="glyphicon glyphicon-ok-circle"></i>
                        </button>
                    </h4>
                </form>
            </section>
        </section>
    </section>
</div>

<script type="text/javascript" src="res/js/funcionesAjaxMantenimiento.js"></script>
