<?php
require '../modelo/mantenimientoDaoImpl.php';

$EditCategoria = isset($_POST['categoria_id']) ? $_POST['categoria_id'] : '';
$estadoPersona = isset($_POST['estadoPersona']) ? $_POST['estadoPersona'] : '1';

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
                                <th hidden>Id Categoria</th>
                                <th>Nombre</th>
                                <th>Estado</th>
                                <th colspan="2">Opciones</th>
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
                                        <a style="cursor: pointer;" onclick="" data-toggle="modal" data-target="#delete">
                                            <i data-toggle="tooltip" data-placement="top" title="Eliminar Categoria" class="glyphicon glyphicon-remove"></i>
                                        </a>
                                        <a style="cursor: pointer;" onclick="" data-toggle="modal" data-target="#activar">
                                            <i data-toggle="tooltip" data-placement="top" title="Activar Categoria" class="glyphicon glyphicon-ok"></i>
                                        </a>
                                    </td>
                            <script>
                                function Editar<?php echo $cat['categoria_id']; ?>(categoria) {
                                    $.ajax({
                                        stype: 'POST',
                                        url: "vistas-mantenimiento/categoria.php",
                                        data: "EditCategoria=" + categoria,
                                        success: function (data) {
                                            $("#mantenimiento").html(data);
                                            document.getElementById('lista').style.display = 'none';
                                            document.getElementById('listaCat').style.display = 'none';
                                            document.getElementById('agregarCat').style.display = 'none';
                                            document.getElementById('editarCat').style.display = 'block';
                                            document.getElementById("nombresEdit").focus();
                                        }
                                    });
                                }

                                function cancelarEditCat() {
                                    document.getElementById("editcat").reset();
                                    document.getElementById('lista').style.display = 'block';
                                    document.getElementById('listaCat').style.display = 'block';
                                    document.getElementById('editarCat').style.display = 'none';
                                    document.getElementById("buscador").focus();
                                }
                            </script>
                            </tr><?php } ?>
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
                <form id="addcat" class="form-signin" role="form" method="post" action="mantenimiento">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group has-feedback">
                                <label for="nombres">Nombres</label>
                                <input required type="text" pattern="^[A-Za-záéíóúÑñ ][A-Za-záéíóúÑñ ]*"  maxlength="39" class="form-control" id="nombres" placeholder="Nombres" name="nombres" data-error="Solo se permite letras no numeros">
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <!--<div class="col-sm-6">
                            <div class="form-group has-feedback">
                                <label for="apellidos">Apellidos</label>
                                <input required type="text" pattern="^[A-Za-záéíóúñÑ ][A-Za-záéíóúñÑ ]*" maxlength="39" class="form-control" id="apellidos" placeholder="Apellidos" name="apellidos" data-error="Solo se permite letras no numeros">
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group has-feedback">
                                <label for="direccion">Dirección</label>
                                <input required type="text" maxlength="39" class="form-control" id="direccion" placeholder="Dirección" name="direccion">
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group has-feedback">
                                <label for="procedencia">Procedencia</label>
                                <input required type="text" maxlength="39" class="form-control" id="procedencia" placeholder="Procedencia" name="procedencia" data-error="Solo se permite letras no numeros">
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="tipo">Tipo de Documento</label>
                                <select required class="form-control" id="tipo" name="tipoDocumentoId">
                                    <option hidden>Seleccionar Tipo de Documento</option>

                                    <option  value=""></option>

                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group has-feedback">
                                <label for="numeroDoc">N° Documento</label>
                                <input required type="text" pattern="^[A-Za-z0-9]*" class="form-control"  data-minlength="8" maxlength="16" id="numeroDoc" placeholder="numero de Documento" name="numeroDoc">
                                <div class="help-block">Minimo 8 números</div>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group has-feedback">
                                <label for="telefono">Teléfono</label>
                                <input  type="text" pattern="^[#*0-9]*" maxlength="15" class="form-control" id="telefono" placeholder="Teléfono" name="telefono">
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="genero">Género</label>
                                <select required class="form-control" id="genero" name="genero">
                                    <option hidden>Seleccionar su Género</option>
                                    <option value="F">Mujer</option>
                                    <option value="M">Varón</option>
                                </select>
                            </div>
                        </div>-->
                    </div>

                    <input type="hidden" name="opcion" value="">
                    <input type="hidden" name="idUserReg" value="">

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
                <h4><b>Modificar los Datos de la Persona</b></h4>
                <input value="" required type="text" >
            </div>

            <div data-brackets-id="736" class="panel-body">
                <form id="editcat" class="form-signin" role="form" method="post" action="mantenimiento">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group has-feedback">
                                <label for="nombres">Nombres</label>
                                <input value="" required type="text" pattern="^[A-Za-záéíóúñÑ ][A-Za-záéíóúñÑ ]*" maxlength="39" class="form-control" id="nombresEdit" placeholder="Nombres" name="nombres" data-error="Solo se permite letras no numeros">
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <!--<div class="col-sm-6">
                            <div class="form-group has-feedback">
                                <label for="apellidos">Apellidos</label>
                                <input value="" required type="text" pattern="^[A-Za-záéíóúñÑ ][A-Za-záéíóúñÑ ]*" maxlength="39" class="form-control" id="apellidosEdit" placeholder="Apellidos" name="apellidos" data-error="Solo se permite letras no numeros">
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group has-feedback">
                                <label for="direccion">Dirección</label>
                                <input value="" required type="text" maxlength="39" class="form-control" id="direccionEdit" placeholder="Dirección" name="direccion">
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group has-feedback">
                                <label for="procedencia">Procedencia</label>
                                <input value="" required type="text" maxlength="39" class="form-control" id="procedenciaEdit" placeholder="Procedencia" name="procedencia" data-error="Solo se permite letras no numeros">
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="tipoEdit">Tipo de Documento</label>
                                <select required class="form-control" id="tipoEdit" name="tipoDocumentoId">
                                    <option hidden>Seleccionar Tipo de Documento</option>
                                    
                                    <option selected value=""></option>

                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group has-feedback">
                                <label for="numeroDoc">N° Documento</label>
                                <input value="" required type="text" pattern="^[A-Za-z0-9]*" class="form-control"  data-minlength="8" maxlength="16" id="numeroDocEdit" placeholder="numero de Documento" name="numeroDoc">
                                <div class="help-block">Minimo 8 números</div>
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group has-feedback">
                                <label for="telefono">Teléfono</label>
                                <input value="" type="text" pattern="^[#*0-9]*" maxlength="15" class="form-control" id="telefonoEdit" placeholder="Teléfono" name="telefono">
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="genero">Género</label>
                                <select required class="form-control" id="genero" name="genero">
                                    <option hidden>Seleccionar su Género</option>
                                    <option>Mujer</option>
                                    <option>Varón</option>
                                </select>
                            </div>
                        </div>-->
                    </div>

                    <input type="hidden" name="opcion" value="EditPersona">
                    <input type="hidden" name="id" value="">
                    <input type="hidden" name="idUserReg" value="">

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
