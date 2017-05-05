<?php
require '../modelo/mantenimientoDaoImpl.php';

session_start();

$estadoPersona = isset($_POST['estadoPersona']) ? $_POST['estadoPersona'] : '1';
$idProductoEdit = isset($_POST['idProductoEdit']) ? $_POST['idProductoEdit'] : '';
?>

<div class="col-sm-12">
    <br>
    <section id="lista" class="col-sm-12 well well-sm backcolor" style="display: block; margin-bottom: -50px;">
        <article class="col-sm-6" style="color: white">
            <h4><b>Lista de Productos</b></h4>
        </article>
        <article align="right" class="col-sm-6">
            <div class="col-sm-3"></div>
            <a class="btn btn-primary" onclick="AgregarProducto()">Nuevo &nbsp;<i class="glyphicon glyphicon-plus"></i></a><!--  data-toggle="modal" data-target="#addPersona" -->
        </article>
    </section>
    <div id="listaProducto" class="col-md-12" style="padding: 0px; margin-top: 60px;">
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
                            url: "vistas-mantenimiento/producto.php",
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
                                <th hidden>Id Producto</th>
                                <th>Nombre</th>
                                <th>Descripcion</th>
                                <th>Imagen</th>
                                <th>Estado</th>
                                <th hidden>Id Marca</th>
                                <th>Marca</th>
                                <th hidden>Id Categoria</th>
                                <th>Categoria</th>
                                <th hidden>Id Presentacion</th>
                                <th>Presentacion</th>
                                <th colspan="2">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $count = 0;
                            $ListaProducto = Mantenimiento::ListaProductoEstado($estadoPersona);

                            foreach ($ListaProducto as $pro) {
                                $count++;
                                ?>
                                <tr>
                                    <td><?php echo $count; ?></td>
                                    <td hidden><?php echo $pro['producto_id']; ?></td>
                                    <td><?php echo $pro['nombre']; ?></td>
                                    <td><?php echo $pro['descripcion']; ?></td>
                                    <td><?php echo $pro['imagen']; ?></td>
                                    <td><?php echo $pro['estado']; ?></td>
                                    <td hidden><?php echo $pro['marca_id']; ?></td>
                                    <td><?php echo $pro['marca']; ?></td>
                                    <td hidden><?php echo $pro['categoria_id']; ?></td>
                                    <td><?php echo $pro['categoria']; ?></td>
                                    <td hidden><?php echo $pro['presentacion_id']; ?></td>
                                    <td><?php echo $pro['presentacion']; ?></td>
                                    <td align="center">
                                        <a style="cursor: pointer;" onclick="Editar<?php echo $pro['producto_id']; ?>(<?php echo $pro['producto_id']; ?>)">
                                            <i data-toggle="tooltip" data-placement="top" title="Modificar Producto" class="glyphicon glyphicon-pencil"></i>
                                        </a>
                                    </td>
                                    <td align="center">
                                        <?php if ($estadoPersona == 1) { ?>
                                            <a style="cursor: pointer;" onclick="" data-toggle="modal" data-target="#delete">
                                                <i data-toggle="tooltip" data-placement="top" title="Eliminar Producto" class="glyphicon glyphicon-remove"></i>
                                            </a><?php } if ($estadoPersona == 0) { ?>
                                            <a style="cursor: pointer;" onclick="" data-toggle="modal" data-target="#activar">
                                                <i data-toggle="tooltip" data-placement="top" title="Activar Producto" class="glyphicon glyphicon-ok"></i>
                                            </a>
                                        <?php } ?>
                                    </td>
                            <script>
                                function Editar<?php echo $pro['producto_id']; ?>(idProductoEdit) {
                                    $.ajax({
                                        type: 'POST',
                                        url: 'vistas-mantenimiento/producto.php',
                                        data: 'idProductoEdit=' + idProductoEdit,
                                        success: function (data) {
                                            $('#mantenimiento').html(data);
                                            document.getElementById('lista').style.display = 'none';
                                            document.getElementById('listaProducto').style.display = 'none';
                                            document.getElementById('agregarProd').style.display = 'none';
                                            document.getElementById('editarPro').style.display = 'block';
                                            document.getElementById('nombreProdEdit').focus();
                                        }
                                    });
                                }

                                function cancelarEditPer() {
                                    document.getElementById("formProdEdit").reset();
                                    document.getElementById('lista').style.display = 'block';
                                    document.getElementById('listaProducto').style.display = 'block';
                                    document.getElementById('editarPro').style.display = 'none';
                                    document.getElementById("buscador").focus();
                                }
                            </script>
                            </tr><?php } ?>
                        <?php if ($count == 0 & $estadoPersona == 0) { ?><tr><td colspan="12" style="font-family: oblique bold cursive; font-size: 18px" class="text-center">No Hay Productos Inactivos</td></tr>
                        <?php } if ($count == 0 & $estadoPersona == 1) { ?><tr><td colspan="12" style="font-family: oblique bold cursive; font-size: 18px" class="text-center">No Hay Productos Activos</td></tr><?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div id="agregarProd" class="col-md-12" style="padding: 0px; display: none;">
        <div data-brackets-id="733" class="panel panel-primary">
            <div data-brackets-id="734" class="panel-heading">
                <h4><b>Ingresar los Datos del Producto</b></h4>
            </div>
            <div data-brackets-id="736" class="panel-body">
                <form id="formProdReg" name="formProdReg" accept-charset="utf-8" method="post">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group has-feedback">
                                <label for="nombre">Nombre</label>
                                <input required id="nombreProd" name="nombreProd" type="text" pattern="^[A-Za-záéíóúÑñ ][A-Za-záéíóúÑñ ]*"  maxlength="39" class="form-control" placeholder="Nombres" data-error="Solo se permite letras no numeros">
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group has-feedback">
                                <label for="Descripcion">Descripcion</label>
                                <input required id="descripcion" name="descripcion" type="text" pattern="^[A-Za-záéíóúñÑ ][A-Za-záéíóúñÑ ]*" maxlength="39" class="form-control" placeholder="Descripción" data-error="Solo se permite letras no numeros">
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group has-feedback">
                                <label for="Marca">Marca</label>
                                <select required class="form-control" id="marca" name="marca">
                                    <option hidden>Seleccionar Marca</option>
                                    <?php
                                    $e = 1;
                                    $ListaMarca = Mantenimiento::ListaMarcaEstado($e);
                                    foreach ($ListaMarca as $lmar) {
                                        ?>
                                        <option value="<?php echo $lmar['marca_id'] ?>"><?php echo $lmar['nombre']; ?></option>
                                    <?php } ?>
                                </select>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group has-feedback">
                                <label for="Categoria">Categoria</label>
                                <select required class="form-control" id="categoria" name="categoria">
                                    <option hidden>Seleccionar Categoria</option>
                                    <?php
                                    $e = 1;
                                    $ListaCategoria = Mantenimiento::ListaCategoriaEstado($e);
                                    foreach ($ListaCategoria as $lcat) {
                                        ?>
                                        <option value="<?php echo $lcat['categoria_id'] ?>"><?php echo $lcat['nombre']; ?></option>
                                    <?php } ?>
                                </select>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group has-feedback">
                                <label for="presentacion">Presentación</label>
                                <select required class="form-control" id="presentacion" name="presentacion">
                                    <option hidden>Seleccionar Presentación</option>
                                    <?php
                                    $e = 1;
                                    $ListaPresentacion = Mantenimiento::ListaPresentacion($e);
                                    foreach ($ListaPresentacion as $lcat) {
                                        ?>
                                        <option value="<?php echo $lcat['presentacion_id'] ?>"><?php echo $lcat['nombre_presentacion']; ?></option>
                                    <?php } ?>
                                </select>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" id="opcion" name="opcion" value="agregarProducto">
                    <input type="hidden" id="idUserReg" name="idUserReg" value="<?php echo $_SESSION['usuario_id']; ?>">

                    <div class="row hidden">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="imagen">Imagen</label>
                                <input type="file" disabled id="imagen" name="img">
                                <p class="help-block"></p>
                            </div>
                        </div>
                    </div>
                    <hr style="border-color: #3b5998;">
                    <h4 align="center">
                        <button type="button" class="btn btn-default" onclick="CancelarProducto()"><!--  data-dismiss="modal" -->
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

    <div id="editarPro" class="col-md-12" style="padding: 0px; display: none;">
        <div data-brackets-id="733" class="panel panel-primary">
            <div data-brackets-id="734" class="panel-heading">
                <h4><b>Modificar los Datos del Producto</b></h4>
                <input value="<?php echo $idProductoEdit ?>" required type="text" >
            </div>

            <div data-brackets-id="736" class="panel-body">
                <?php
                    $listPEdit = Mantenimiento::ListaProducto($idProductoEdit)
                    ?>
                <form id="formProdEdit" name="formProdEdit" accept-charset="utf-8" method="post">
                    
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group has-feedback">
                                <label for="nombre">Nombre</label>
                                <input required id="nombreProdEdit" name="nombreProdEdit" value="<?php echo $listPEdit['nombre']; ?>" type="text" pattern="^[A-Za-záéíóúÑñ ][A-Za-záéíóúÑñ ]*"  maxlength="39" class="form-control" placeholder="Nombres" data-error="Solo se permite letras no numeros">
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group has-feedback">
                                <label for="Descripcion">Descripcion</label>
                                <input required id="descripcionEdit" name="descripcionEdit" value="<?php echo $listPEdit['descripcion']; ?>" type="text" pattern="^[A-Za-záéíóúñÑ ][A-Za-záéíóúñÑ ]*" maxlength="39" class="form-control" placeholder="Descripción" data-error="Solo se permite letras no numeros">
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group has-feedback">
                                <label for="Marca">Marca</label>
                                <select required class="form-control" id="marcaEdit" name="marcaEdit">
                                    <option></option>
                                    
                                </select>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group has-feedback">
                                <label for="Categoria">Categoria</label>
                                <select required class="form-control" id="categoriaEdit" name="categoriaEdit">
                                    <option hidden>Seleccionar Categoria</option>
                                    
                                </select>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group has-feedback">
                                <label for="presentacion">Presentación</label>
                                <select required class="form-control" id="presentacionEdit" name="presentacionEdit">
                                    <option hidden>Seleccionar Presentación</option>
                                    
                                </select>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>

                    <input type="text" id="opcion" name="opcion" value="EditProducto">
                    <input type="text" id="idProdEdit" name="idProdEdit" value="<?php echo $listPEdit['producto_id']; ?>">
                    <input type="text" id="idUserReg" name="idUserReg" value="<?php echo $_SESSION['usuario_id']; ?>">

                    <div class="row hidden">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="imagen">Imagen</label>
                                <input type="file" disabled id="imagen" name="img">
                                <p class="help-block"></p>
                            </div>
                        </div>
                    </div>
                    <hr style="border-color: #3b5998;">
                    <h4 align="center">
                        <button type="button" class="btn btn-default" onclick="cancelarEditPer()"><!--  data-dismiss="modal" -->
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