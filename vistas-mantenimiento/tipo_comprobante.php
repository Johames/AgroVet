<?php
  require '../modelo/mantenimientoDaoImpl.php';
  
  $EditTipComp = isset($_POST['tipo_comprobante_id']) ? $_POST['tipo_comprobante_id'] : '';
  $estadoPersona = isset($_POST['estadoPersona']) ? $_POST['estadoPersona'] : '1';
  
?>
<div class="col-sm-12">
    <br>
    <section id="lista" class="col-sm-12 well well-sm backcolor" style="display: block; margin-bottom: -50px;">
        <article class="col-sm-6" style="color: white">
            <h4><b>Lista de Tipos de Combrobante</b></h4>
        </article>
        <article align="right" class="col-sm-6">
            <div class="col-sm-3"></div>
            <a class="btn btn-primary" onclick="AgregarTipoComprobante()">Nuevo &nbsp;<i class="glyphicon glyphicon-plus"></i></a><!--  data-toggle="modal" data-target="#addPersona" -->
        </article>
    </section>
    <div id="listaTipComprobante" class="col-md-12" style="padding: 0px; margin-top: 60px;">
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
                            url: "vistas-mantenimiento/tipo_comprobante.php",
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
                                <th hidden>Id Tipo de coprobante</th>
                                <th>Comprobante</th>
                                <th>Estado</th>
                                <th colspan="2">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $count = 0;
                            $ListaTComprobante = Mantenimiento::ListaTipoComprobanteEstado($estadoPersona);

                            foreach ($ListaTComprobante as $tcom) {
                                $count++;
                                ?>
                                <tr>
                                    <td><?php echo $count; ?></td>
                                    <td hidden><?php echo $tcom['tipo_comprobante_id']; ?></td>
                                    <td><?php echo $tcom['descripcion']; ?></td>
                                    <td><?php echo $tcom['estado']; ?></td>
                                    <td align="center">
                                        <a style="cursor: pointer;" onclick="Editar<?php echo $tcom['tipo_comprobante_id']; ?>(<?php echo $tcom['tipo_comprobante_id']; ?>)">
                                            <i data-toggle="tooltip" data-placement="top" title="Modificar Persona" class="glyphicon glyphicon-pencil"></i>
                                        </a>
                                    </td>
                                    <td align="center">
                                        <a style="cursor: pointer;" onclick="" data-toggle="modal" data-target="#delete">
                                            <i data-toggle="tooltip" data-placement="top" title="Eliminar Persona" class="glyphicon glyphicon-remove"></i>
                                        </a>
                                        <a style="cursor: pointer;" onclick="" data-toggle="modal" data-target="#activar">
                                            <i data-toggle="tooltip" data-placement="top" title="Activar Persona" class="glyphicon glyphicon-ok"></i>
                                        </a>
                                    </td>
                                    <script>
                                function Editar<?php echo $tcom['tipo_comprobante_id']; ?>(tcomprobante) {
                                    $.ajax({
                                        stype: 'POST',
                                        url: "vistas-mantenimiento/tipo_comprobante.php",
                                        data: "EditPersona=" + tcomprobante,
                                        success: function (data) {
                                            $("#mantenimiento").html(data);
                                            document.getElementById('lista').style.display = 'none';
                                            document.getElementById('listaTipComprobante').style.display = 'none';
                                            document.getElementById('agregarTipoComprobante').style.display = 'none';
                                            document.getElementById('editarTipComprobante').style.display = 'block';
                                            document.getElementById("nombresEdit").focus();
                                        }
                                    });
                                }

                                function cancelarEditTipoComprobante() {
                                    document.getElementById("edittcom").reset();
                                    document.getElementById('lista').style.display = 'block';
                                    document.getElementById('listaTipComprobante').style.display = 'block';
                                    document.getElementById('editarTipComprobante').style.display = 'none';
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
    <div id="agregarTipoComprobante" class="col-md-12" style="padding: 0px; display: none">
        <div data-brackets-id="733" class="panel panel-primary">
            <div data-brackets-id="734" class="panel-heading">
                <h4><b>Ingresar los Datos del Tipo de Comprobante</b></h4>
            </div>
            <div data-brackets-id="736" class="panel-body">
                <form id="addtcom" class="form-signin" role="form" method="post" action="mantenimiento">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group has-feedback">
                                <label for="nombres">Comprobante</label>
                                <input required type="text" pattern="^[A-Za-záéíóúÑñ ][A-Za-záéíóúÑñ ]*"  maxlength="39" class="form-control" id="nombres" placeholder="Nombres" name="nombres" data-error="Solo se permite letras no numeros">
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>
                    
                    <input type="hidden" name="opcion" value="AddPersona">
                    <input type="hidden" name="idUserReg" value="<%=idUsuario%>">

                    <hr style="border-color: #3b5998;">
                    <h4 align="center">
                        <button type="button" class="btn btn-default" onclick="CancelarTipoComprobante()"><!--  data-dismiss="modal" -->
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
    <div id="editarTipComprobante" class="col-md-12" style="padding: 0px; display: none;">
        <div data-brackets-id="733" class="panel panel-primary">
            <div data-brackets-id="734" class="panel-heading">
                <h4><b>Modificar los Datos de la Persona</b></h4>
                <input value="<%=idPersonaEdit%>" required type="text" >
            </div>

            <div data-brackets-id="736" class="panel-body">
                <form id="edittcom" class="form-signin" role="form" method="post" action="mantenimiento">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group has-feedback">
                                <label for="nombres">Comprobante</label>
                                <input value="" required type="text" pattern="^[A-Za-záéíóúñÑ ][A-Za-záéíóúñÑ ]*" maxlength="39" class="form-control" id="nombresEdit" placeholder="Comprobante" name="nombres" data-error="Solo se permite letras no numeros">
                                <span class="glyphicon form-control-feedback" aria-hidden="true"></span>
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>
                    </div>
                    
                    <input type="hidden" name="opcion" value="EditPersona">
                    <input type="hidden" name="id" value="<%=idPersonaEdit%>">
                    <input type="hidden" name="idUserReg" value="<%=idUsuario%>">

                    <hr style="border-color: #3b5998;">
                    <h4 align="center">
                        <button type="button" class="btn btn-default" onclick="cancelarEditTipoComprobante()"><!--  data-dismiss="modal" -->
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
