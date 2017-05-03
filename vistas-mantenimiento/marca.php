<?php
require '../modelo/mantenimientoDaoImpl.php';

session_start();

$idEditMarca = isset($_POST['EditMarca']) ? $_POST['EditMarca'] : '';
$estadoPersona = isset($_POST['estadoPersona']) ? $_POST['estadoPersona'] : '1';
?>
<div class="col-sm-12">
    <br>
    <section id="lista" class="col-sm-12 well well-sm backcolor" style="display: block; margin-bottom: -50px;">
        <article class="col-sm-6" style="color: white">
            <h4><b>Lista de Marcas</b></h4>
        </article>
        <article align="right" class="col-sm-6">
            <div class="col-sm-3"></div>
            <a class="btn btn-primary" onclick="AgregarMarca()">Nuevo &nbsp;<i class="glyphicon glyphicon-plus"></i></a><!--  data-toggle="modal" data-target="#addPersona" -->
        </article>
    </section>
    <div id="listaMarca" class="col-md-12" style="padding: 0px; margin-top: 60px;">
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
                            url: "vistas-mantenimiento/marca.php",
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
                                <th hidden>Id Marca</th>
                                <th>Nombre</th>
                                <th>Estado</th>
                                <th colspan="2">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $count = 0;
                            $ListaMarca = Mantenimiento::ListaMarcaEstado($estadoPersona);

                            foreach ($ListaMarca as $mar) {
                                $count++;
                                ?>
                                <tr>
                                    <td><?php echo $count; ?></td>
                                    <td hidden><?php echo $mar['marca_id']; ?></td>
                                    <td><?php echo $mar['nombre']; ?></td>
                                    <td><?php echo $mar['estado']; ?></td>
                                    <td align="center">
                                        <a style="cursor: pointer;" onclick="Editar<?php echo $mar['marca_id']; ?>(<?php echo $mar['marca_id']; ?>)">
                                            <i data-toggle="tooltip" data-placement="top" title="Modificar Persona" class="glyphicon glyphicon-pencil"></i>
                                        </a>
                                    </td>
                                    <td align="center">
                                        <?php if ($estadoPersona == 1) { ?>
                                            <a style="cursor: pointer;" onclick="" data-toggle="modal" data-target="#deleteMarca">
                                                <i data-toggle="tooltip" data-placement="top" title="Eliminar Marca" class="glyphicon glyphicon-remove"></i>
                                            </a><?php } if ($estadoPersona == 0) { ?>
                                            <a style="cursor: pointer;" onclick="" data-toggle="modal" data-target="#activarMarca">
                                                <i data-toggle="tooltip" data-placement="top" title="Activar Marca" class="glyphicon glyphicon-ok"></i>
                                            </a>
                                        <?php } ?>
                                    </td>
                            <script>
                                function eliminar<?php echo $mar['marca_id']; ?>() {
                                    $("#marDelete").val("<?php echo $mar['marca_id']; ?>");
                                }
                                
                                function activar<?php echo $mar['marca_id']; ?>() {
                                    $("#marActive").val("<?php echo $mar['marca_id']; ?>");
                                }
                                
                                function Editar<?php echo $mar['marca_id']; ?>(EditMarca) {
                                    $.ajax({
                                        type: 'POST',
                                        url: "vistas-mantenimiento/marca.php",
                                        data: "EditMarca=" + EditMarca,
                                        success: function (data) {
                                            $("#mantenimiento").html(data);
                                            document.getElementById('lista').style.display = 'none';
                                            document.getElementById('listaMarca').style.display = 'none';
                                            document.getElementById('agregarMarca').style.display = 'none';
                                            document.getElementById('editarMarca').style.display = 'block';
                                            document.getElementById("nombresMarcaEdit").focus();
                                        }
                                    });
                                }

                                function cancelarEditMarca() {
                                    document.getElementById("FormEditMarca").reset();
                                    document.getElementById('lista').style.display = 'block';
                                    document.getElementById('listaMarca').style.display = 'block';
                                    document.getElementById('editarMarca').style.display = 'none';
                                    document.getElementById("buscador").focus();
                                }
                            </script>
                            </tr><?php } ?>
                        <?php if ($count == 0 & $estadoPersona == 0) { ?><tr><td colspan="12" style="font-family: oblique bold cursive; font-size: 18px" class="text-center">No Hay Marcas Inactivos</td></tr>
                        <?php } if ($count == 0 & $estadoPersona == 1) { ?><tr><td colspan="12" style="font-family: oblique bold cursive; font-size: 18px" class="text-center">No Hay Marcas Activos</td></tr><?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div id="agregarMarca" class="col-md-12" style="padding: 0px; display: none;">
        <div data-brackets-id="733" class="panel panel-primary">
            <div data-brackets-id="734" class="panel-heading">
                <h4><b>Ingresar los Datos de la Persona</b></h4>
            </div>
            <div data-brackets-id="736" class="panel-body">
                <form id="FormMarcaReg" name="FormMarcaReg" role="form" method="post" accept-charset="utf-8">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group has-feedback">
                                <label for="nombres">Nombres</label>
                                <input required id="nombMarca" name="nombMarca" type="text" pattern="^[A-Za-záéíóúÑñ ][A-Za-záéíóúÑñ ]*"  maxlength="39" class="form-control"  placeholder="Nombres"  data-error="Solo se permite letras no numeros">
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>

                    <input type="hidden" id="opcion" name="opcion" value="addMarca">
                    <input type="hidden" id="idUserReg" name="idUserReg" value="<?php echo $_SESSION['usuario_id']; ?>">

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
                        <button type="button" class="btn btn-default" onclick="CancelarMarca()"><!--  data-dismiss="modal" -->
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

    <div id="editarMarca" class="col-md-12" style="padding: 0px; display: none;">
        <div data-brackets-id="733" class="panel panel-primary">
            <div data-brackets-id="734" class="panel-heading">
                <h4><b>Modificar los Datos de la Persona</b></h4>
                <input value="<?php echo $idEditMarca; ?>" >
            </div>

            <div data-brackets-id="736" class="panel-body">
                <form id="FormEditMarca" role="form" method="post" accept-charset="utf-8">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group has-feedback">
                                <?php
                                $EditListaMarca = Mantenimiento::ListaMarca($idEditMarca)
                                ?>
                                <label for="Marca">Nombre Marca</label>
                                <input id="nombresMarcaEdit" name="nombresMarcaEdit" value="<?php echo $EditListaMarca['nombre']; ?>">
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>

                    <input id="idEditMarca" name="idEditMarca" value="<?php echo $EditListaMarca['marca_id']; ?>">
                    <input type="text" id="idUserRegEdit" name="idUserRegEdit" value="<?php echo $_SESSION['usuario_id']; ?>">
                    <input type="hidden" id="opcion" name="opcion" value="EditarMarca">

                    <hr style="border-color: #3b5998;">
                    <h4 align="center">
                        <button type="button" class="btn btn-default" onclick="cancelarEditMarca()"><!--  data-dismiss="modal" -->
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

<div class="modal fade" id="deleteMarca">
    <section class="modal-dialog modal-md">
        <section class="modal-content">
            <section class="modal-header" style="border-top-left-radius: 5px; border-top-right-radius: 5px; background: #c71c22; color: white;">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: white;"><span aria-hidden="true">&times;</span></button>
                <h3 align="center"><span><b>¿Está seguro de Eliminar esta Categoría?</b></span></h3>
            </section>
            <section class="modal-body">
                <div class="row">
                    <input type="hidden" id="marDelete" name="id" value="1">
                </div>
                <h4 align="center">
                    <button type="button" class="btn btn-default" data-dismiss="modal">
                        Cancelar &nbsp;&nbsp; <i class="glyphicon glyphicon-remove-circle"></i>
                    </button>
                    <button class="btn btn-danger" type="submit" onclick="eliminarMarca()">
                        Eliminar &nbsp;&nbsp; <i class="glyphicon glyphicon-ok-circle"></i>
                    </button>
                </h4>
            </section>
        </section>
    </section>
</div>

<div class="modal fade" id="activarMarca">
    <section class="modal-dialog modal-md">
        <section class="modal-content">
            <section class="modal-header" style="border-top-left-radius: 5px; border-top-right-radius: 5px; background: #3b5998; color: white;">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: white;"><span aria-hidden="true">&times;</span></button>
                <h3 align="center"><span><b>¿Está seguro de Activar esta Categoría?</b></span></h3>
            </section>
            <section class="modal-body">
                <div class="row">
                    <input type="hidden" id="marActive" name="id">
                </div>
                <h4 align="center">
                    <button type="button" class="btn btn-default" data-dismiss="modal">
                        Cancelar &nbsp;&nbsp; <i class="glyphicon glyphicon-remove-circle"></i>
                    </button>
                    <button class="btn btn-primary" type="submit" onclick="activarMarca()">
                        Activar &nbsp;&nbsp; <i class="glyphicon glyphicon-ok-circle"></i>
                    </button>
                </h4>
            </section>
        </section>
    </section>
</div>

<script type="text/javascript" src="res/js/funcionesAjaxMantenimiento.js"></script>