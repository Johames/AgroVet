<?php
require '../modelo/mantenimientoDaoImpl.php';

session_start();

$estadoPersona = isset($_POST['estadoPersona']) ? $_POST['estadoPersona'] : '1';
$idCategoriaEdit = isset($_POST['idCategoriaEdit']) ? $_POST['idCategoriaEdit'] : '';
?>
<div class="col-sm-12">
    <br>
    <section id="lista" class="col-sm-12 well well-sm backcolor" style="display: block; margin-bottom: -50px;">
        <article class="col-sm-6" style="color: white">
            <h4><b>Lista de Categorías</b></h4>
        </article>
        <article align="right" class="col-sm-6">
            <div class="col-sm-3"></div>
            <a onclick="AgregarCategoria()" class="btn btn-primary">Nuevo &nbsp;<i class="glyphicon glyphicon-plus"></i></a><!--  data-toggle="modal" data-target="#addPersona" -->
        </article>
    </section>
    <div id="listaCat" class="col-md-12" style="padding: 0px; margin-top: 60px;">
        <div  class="panel panel-primary">
            <div class="panel-heading">
                <article class="col-sm-8" style="color: white;">
                    <div class="input-group">
                        <span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-search"></i></span>
                        <input id="buscador" autofocus name="filt" onkeyup="filter(this, 'categoria', '1')" type="text" class="form-control" placeholder="Buscar Persona." aria-describedby="basic-addon1">
                    </div>
                </article>
                <script>
                    function enviar() {
                        $.ajax({
                            type: "POST",
                            url: "vistas-mantenimiento/categoria.php",
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
                        <select id="estadoPersona" class="form-control" name="estadoCategoria" onchange="enviar()">
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
                    <table style="" id="categoria" class="table table-bordered table-condensed table-hover table-responsive">
                        <thead class="bg-primary">
                            <tr>
                                <th class="col-md-1">#</th>
                                <th hidden>Id Categoria</th>
                                <th>Nombre</th>
                                <th>Estado</th>
                                <th colspan="2" class="col-md-1">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $count = 0;
                            $ListaCategoria = Mantenimiento::ListaCategoriaEstado($estadoPersona);

                            foreach ($ListaCategoria as $cat) {
                                $count++;
                                ?>
                                <tr>
                                    <td><?php echo $count; ?></td>
                                    <td hidden><?php echo $cat['categoria_id']; ?></td>
                                    <td><?php echo $cat['nombre']; ?></td>
                                    <td><?php echo $cat['estado']; ?></td>
                                    <td align="center">
                                        <a style="cursor: pointer;" onclick="Editar<?php echo $cat['categoria_id']; ?>(<?php echo $cat['categoria_id']; ?>)">
                                            <i data-toggle="tooltip" data-placement="top" title="Modificar Categoria" class="glyphicon glyphicon-pencil"></i>
                                        </a>
                                    </td>
                                    <td align="center">
                                        <?php if ($estadoPersona == 1) { ?>
                                            <a style="cursor: pointer;" onclick="eliminar<?php echo $cat['categoria_id']; ?>()" data-toggle="modal" data-target="#deleteCateg">
                                                <i data-toggle="tooltip" data-placement="top" title="Eliminar Persona" class="glyphicon glyphicon-remove"></i>
                                            </a><?php } if ($estadoPersona == 0) { ?>
                                            <a style="cursor: pointer;" onclick="activar<?php echo $cat['categoria_id']; ?>()" data-toggle="modal" data-target="#activarCateg">
                                                <i data-toggle="tooltip" data-placement="top" title="Activar Persona" class="glyphicon glyphicon-ok"></i>
                                            </a>
                                        <?php } ?>
                                    </td>
                            <script>
                                function eliminar<?php echo $cat['categoria_id']; ?>() {
                                    $("#catDelete").val("<?php echo $cat['categoria_id']; ?>");
                                }
                                function activar<?php echo $cat['categoria_id']; ?>() {
                                    $("#catActive").val("<?php echo $cat['categoria_id']; ?>");
                                }
                                function Editar<?php echo $cat['categoria_id']; ?>($idCategoriaEdit) {
                                    $.ajax({
                                        type: 'POST',
                                        url: "vistas-mantenimiento/categoria.php",
                                        data: "idCategoriaEdit=" + $idCategoriaEdit,
                                        success: function (data) {
                                            $("#mantenimiento").html(data);
                                            document.getElementById('lista').style.display = 'none';
                                            document.getElementById('listaCat').style.display = 'none';
                                            document.getElementById('agregarCat').style.display = 'none';
                                            document.getElementById('editarCat').style.display = 'block';
                                            document.getElementById("nombreEditCat").focus();
                                        }
                                    });
                                }

                                function cancelarEditCat() {
                                    document.getElementById("formCatEdit").reset();
                                    document.getElementById('lista').style.display = 'block';
                                    document.getElementById('listaCat').style.display = 'block';
                                    document.getElementById('editarCat').style.display = 'none';
                                    document.getElementById("buscador").focus();
                                }
                            </script>
                            </tr><?php } ?>
                        <?php if ($count == 0 & $estadoPersona == 0) { ?><tr><td colspan="12" style="font-family: oblique bold cursive; font-size: 18px" class="text-center">No Hay Categoria Inactivos</td></tr>
                        <?php } if ($count == 0 & $estadoPersona == 1) { ?><tr><td colspan="12" style="font-family: oblique bold cursive; font-size: 18px" class="text-center">No Hay Categoria Activos</td></tr><?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div id="agregarCat" class="col-md-12" style="padding: 0px; display: none">
        <div data-brackets-id="733" class="panel panel-primary">
            <div data-brackets-id="734" class="panel-heading">
                <h4><b>Ingresar los Datos de la Categoria</b></h4>
            </div>
            <div data-brackets-id="736" class="panel-body">
                <form accept-charset="utf-8" method="post" id="formCatReg" name="formCatReg">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group has-feedback">
                                <label for="nombres">Nombres</label>
                                <input required id="nombreCatReg" name="nombreCatReg" type="text" pattern="^[A-Za-záéíóúÑñ ][A-Za-záéíóúÑñ ]*"  maxlength="39" class="form-control" placeholder="Nombre de la Categoria" data-error="Solo se permite letras no numeros">
                                <input style="color: black;" type="hidden" name="idUserReg" id="idUserReg" value="<?php echo $_SESSION['usuario_id']; ?>">
                                <input style="color: black;" type="hidden" name="opcion" id="opcion" value="addCategoria">
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>
                    <hr style="border-color: #3b5998;">
                    <h4 align="center">
                        <button type="button" class="btn btn-default" onclick="CancelarCategoria()"><!--  data-dismiss="modal" -->
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

    <div id="editarCat" class="col-md-12" style="padding: 0px; display: none;">
        <div data-brackets-id="733" class="panel panel-primary">
            <div data-brackets-id="734" class="panel-heading">
                <h4><b>Modificar los Datos de la Categoría</b></h4>
            </div>
            <input value="<?php echo $idCategoriaEdit ?>">
            <div data-brackets-id="736" class="panel-body">
                <form id="formCatEdit" name="formCatEdit" method="post" accept-charset="utf-8">
                    <?php
                    $ListCatId = Mantenimiento::ListaCategoria($idCategoriaEdit);
                    ?>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group has-feedback">
                                <label for="nombres">Nombres</label>
                                <input value="<?php echo $ListCatId['nombre']; ?>" name="nombreEditCat" id="nombreEditCat" required type="text" pattern="^[A-Za-záéíóúñÑ ][A-Za-záéíóúñÑ ]*" maxlength="39" class="form-control" placeholder="Nombres" data-error="Solo se permite letras no numeros">
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>

                    <input style="color: black;" name="idCatEdit" id="idCatEdit" type="text" value="<?php echo $ListCatId['categoria_id']; ?>">
                    <input style="color: black;" type="text" name="idUserReg" id="idUserReg" value="<?php echo $_SESSION['usuario_id']; ?>">
                    <input style="color: black;" type="hidden" name="opcion" id="opcion" value="editCategoria">

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
                        <button type="button" class="btn btn-default" onclick="cancelarEditCat()"><!--  data-dismiss="modal" -->
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

<div class="modal fade" id="deleteCateg">
    <section class="modal-dialog modal-md">
        <section class="modal-content">
            <section class="modal-header" style="border-top-left-radius: 5px; border-top-right-radius: 5px; background: #c71c22; color: white;">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: white;"><span aria-hidden="true">&times;</span></button>
                <h3 align="center"><span><b>¿Está seguro de Eliminar esta Categoría?</b></span></h3>
            </section>
            <section class="modal-body">
                <div class="row">
                    <input type="hidden" id="catDelete" name="id" value="1">
                </div>
                <h4 align="center">
                    <button type="button" class="btn btn-default" data-dismiss="modal">
                        Cancelar &nbsp;&nbsp; <i class="glyphicon glyphicon-remove-circle"></i>
                    </button>
                    <button class="btn btn-danger" type="submit" onclick="eliminarCategoria()">
                        Eliminar &nbsp;&nbsp; <i class="glyphicon glyphicon-ok-circle"></i>
                    </button>
                </h4>
            </section>
        </section>
    </section>
</div>

<div class="modal fade" id="activarCateg">
    <section class="modal-dialog modal-md">
        <section class="modal-content">
            <section class="modal-header" style="border-top-left-radius: 5px; border-top-right-radius: 5px; background: #3b5998; color: white;">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: white;"><span aria-hidden="true">&times;</span></button>
                <h3 align="center"><span><b>¿Está seguro de Activar esta Categoría?</b></span></h3>
            </section>
            <section class="modal-body">
                <div class="row">
                    <input type="hidden" id="catActive" name="id">
                </div>
                <h4 align="center">
                    <button type="button" class="btn btn-default" data-dismiss="modal">
                        Cancelar &nbsp;&nbsp; <i class="glyphicon glyphicon-remove-circle"></i>
                    </button>
                    <button class="btn btn-primary" type="submit" onclick="activarCategoria()">
                        Activar &nbsp;&nbsp; <i class="glyphicon glyphicon-ok-circle"></i>
                    </button>
                </h4>
            </section>
        </section>
    </section>
</div>

<script type="text/javascript" src="res/js/funcionesAjaxMantenimiento.js"></script>
