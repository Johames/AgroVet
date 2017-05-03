/* Funcion para filtrar */
function filter(phrase, _id) {
    var words = phrase.value.toLowerCase().split(" ");
    var table = document.getElementById(_id);
    var ele;
    for (var r = 1; r < table.rows.length; r++) {
        ele = table.rows[r].innerHTML.replace(/<[^>]+>/g, "");
        var displayStyle = 'none';
        for (var i = 0; i < words.length; i++) {
            if (ele.toLowerCase().indexOf(words[i]) >= 0)
                displayStyle = '';
            else {
                displayStyle = 'none';
                break;
            }
        }
        table.rows[r].style.display = displayStyle;
    }
}

// MANTENIMIENTO// Categoría
function ir9() {
    $.ajax({
        type: "POST",
        url: "vistas-mantenimiento/categoria.php",
        success: function (data) {
            $("#mantenimiento").html(data);
            $('#menu9').css({"background": "#000000"});
            $('#menu10').css({"background": ""});
            $('#menu11').css({"background": ""});
            $('#menu12').css({"background": ""});
            $('#menu13').css({"background": ""});
            $('#menu14').css({"background": ""});
            $('#menu15').css({"background": ""});
            $('#menu16').css({"background": ""});
            $('#menu17').css({"background": ""});
            $('#menu18').css({"background": ""});
            $('#menu19').css({"background": ""});
            $('#menu20').css({"background": ""});
            $('#menu21').css({"background": ""});
            $('#menu22').css({"background": ""});
            $('#menu26').css({"background": ""});
            $('#menu27').css({"background": ""});
        }
    });
}

// Estado Civil
function ir10() {
    $.ajax({
        type: "POST",
        url: "vistas-mantenimiento/estado_civil.php",
        success: function (data) {
            $("#mantenimiento").html(data);
            $('#menu9').css({"background": ""});
            $('#menu10').css({"background": "#000000"});
            $('#menu11').css({"background": ""});
            $('#menu12').css({"background": ""});
            $('#menu13').css({"background": ""});
            $('#menu14').css({"background": ""});
            $('#menu15').css({"background": ""});
            $('#menu16').css({"background": ""});
            $('#menu17').css({"background": ""});
            $('#menu18').css({"background": ""});
            $('#menu19').css({"background": ""});
            $('#menu20').css({"background": ""});
            $('#menu21').css({"background": ""});
            $('#menu22').css({"background": ""});
            $('#menu26').css({"background": ""});
            $('#menu27').css({"background": ""});
        }
    });
}

// Marca
function ir11() {
    $.ajax({
        type: "POST",
        url: "vistas-mantenimiento/marca.php",
        success: function (data) {
            $("#mantenimiento").html(data);
            $('#menu9').css({"background": ""});
            $('#menu10').css({"background": ""});
            $('#menu11').css({"background": "#000000"});
            $('#menu12').css({"background": ""});
            $('#menu13').css({"background": ""});
            $('#menu14').css({"background": ""});
            $('#menu15').css({"background": ""});
            $('#menu16').css({"background": ""});
            $('#menu17').css({"background": ""});
            $('#menu18').css({"background": ""});
            $('#menu19').css({"background": ""});
            $('#menu20').css({"background": ""});
            $('#menu21').css({"background": ""});
            $('#menu22').css({"background": ""});
            $('#menu26').css({"background": ""});
            $('#menu27').css({"background": ""});
        }
    });
}

// Grado de Instrucción
function ir12() {
    $.ajax({
        type: "POST",
        url: "vistas-mantenimiento/grado_instruccion.php",
        success: function (data) {
            $("#mantenimiento").html(data);
            $('#menu9').css({"background": ""});
            $('#menu10').css({"background": ""});
            $('#menu11').css({"background": ""});
            $('#menu12').css({"background": "#000000"});
            $('#menu13').css({"background": ""});
            $('#menu14').css({"background": ""});
            $('#menu15').css({"background": ""});
            $('#menu16').css({"background": ""});
            $('#menu17').css({"background": ""});
            $('#menu18').css({"background": ""});
            $('#menu19').css({"background": ""});
            $('#menu20').css({"background": ""});
            $('#menu21').css({"background": ""});
            $('#menu22').css({"background": ""});
            $('#menu26').css({"background": ""});
            $('#menu27').css({"background": ""});
        }
    });
}

// Persona
function ir13() {
    $.ajax({
        type: "POST",
        url: "vistas-mantenimiento/persona.php",
        success: function (data) {
            $("#mantenimiento").html(data);
            $('#menu9').css({"background": ""});
            $('#menu10').css({"background": ""});
            $('#menu11').css({"background": ""});
            $('#menu12').css({"background": ""});
            $('#menu13').css({"background": "#000000"});
            $('#menu14').css({"background": ""});
            $('#menu15').css({"background": ""});
            $('#menu16').css({"background": ""});
            $('#menu17').css({"background": ""});
            $('#menu18').css({"background": ""});
            $('#menu19').css({"background": ""});
            $('#menu20').css({"background": ""});
            $('#menu21').css({"background": ""});
            $('#menu22').css({"background": ""});
            $('#menu26').css({"background": ""});
            $('#menu27').css({"background": ""});
        }
    });
}

// Producto
function ir14() {
    $.ajax({
        type: "POST",
        url: "vistas-mantenimiento/producto.php",
        success: function (data) {
            $("#mantenimiento").html(data);
            $('#menu9').css({"background": ""});
            $('#menu10').css({"background": ""});
            $('#menu11').css({"background": ""});
            $('#menu12').css({"background": ""});
            $('#menu13').css({"background": ""});
            $('#menu14').css({"background": "#000000"});
            $('#menu15').css({"background": ""});
            $('#menu16').css({"background": ""});
            $('#menu17').css({"background": ""});
            $('#menu18').css({"background": ""});
            $('#menu19').css({"background": ""});
            $('#menu20').css({"background": ""});
            $('#menu21').css({"background": ""});
            $('#menu22').css({"background": ""});
            $('#menu26').css({"background": ""});
            $('#menu27').css({"background": ""});
        }
    });
}

// Unidad de Medida
function ir15() {
    $.ajax({
        type: "POST",
        url: "vistas-mantenimiento/unidad_medida.php",
        success: function (data) {
            $("#mantenimiento").html(data);
            $('#menu9').css({"background": ""});
            $('#menu10').css({"background": ""});
            $('#menu11').css({"background": ""});
            $('#menu12').css({"background": ""});
            $('#menu13').css({"background": ""});
            $('#menu14').css({"background": ""});
            $('#menu15').css({"background": "#000000"});
            $('#menu16').css({"background": ""});
            $('#menu17').css({"background": ""});
            $('#menu18').css({"background": ""});
            $('#menu19').css({"background": ""});
            $('#menu20').css({"background": ""});
            $('#menu21').css({"background": ""});
            $('#menu22').css({"background": ""});
            $('#menu26').css({"background": ""});
            $('#menu27').css({"background": ""});
        }
    });
}

// Unidad de Venta
function ir16() {
    $.ajax({
        type: "POST",
        url: "vistas-mantenimiento/unidad_empaque.php",
        success: function (data) {
            $("#mantenimiento").html(data);
            $('#menu9').css({"background": ""});
            $('#menu10').css({"background": ""});
            $('#menu11').css({"background": ""});
            $('#menu12').css({"background": ""});
            $('#menu13').css({"background": ""});
            $('#menu14').css({"background": ""});
            $('#menu15').css({"background": ""});
            $('#menu16').css({"background": "#000000"});
            $('#menu17').css({"background": ""});
            $('#menu18').css({"background": ""});
            $('#menu19').css({"background": ""});
            $('#menu20').css({"background": ""});
            $('#menu21').css({"background": ""});
            $('#menu22').css({"background": ""});
            $('#menu26').css({"background": ""});
            $('#menu27').css({"background": ""});
        }
    });
}

// Sucursal
function ir17() {
    $.ajax({
        type: "POST",
        url: "vistas-mantenimiento/sucursal.php",
        success: function (data) {
            $("#mantenimiento").html(data);
            $('#menu9').css({"background": ""});
            $('#menu10').css({"background": ""});
            $('#menu11').css({"background": ""});
            $('#menu12').css({"background": ""});
            $('#menu13').css({"background": ""});
            $('#menu14').css({"background": ""});
            $('#menu15').css({"background": ""});
            $('#menu16').css({"background": ""});
            $('#menu17').css({"background": "#000000"});
            $('#menu18').css({"background": ""});
            $('#menu19').css({"background": ""});
            $('#menu20').css({"background": ""});
            $('#menu21').css({"background": ""});
            $('#menu22').css({"background": ""});
            $('#menu26').css({"background": ""});
            $('#menu27').css({"background": ""});
        }
    });
}

// Tipo de Comprobante
function ir18() {
    $.ajax({
        type: "POST",
        url: "vistas-mantenimiento/tipo_comprobante.php",
        success: function (data) {
            $("#mantenimiento").html(data);
            $('#menu9').css({"background": ""});
            $('#menu10').css({"background": ""});
            $('#menu11').css({"background": ""});
            $('#menu12').css({"background": ""});
            $('#menu13').css({"background": ""});
            $('#menu14').css({"background": ""});
            $('#menu15').css({"background": ""});
            $('#menu16').css({"background": ""});
            $('#menu17').css({"background": ""});
            $('#menu18').css({"background": "#000000"});
            $('#menu19').css({"background": ""});
            $('#menu20').css({"background": ""});
            $('#menu21').css({"background": ""});
            $('#menu22').css({"background": ""});
            $('#menu26').css({"background": ""});
            $('#menu27').css({"background": ""});
        }
    });
}

// Tipo de Movimiento
function ir19() {
    $.ajax({
        type: "POST",
        url: "vistas-mantenimiento/tipo_movimiento.php",
        success: function (data) {
            $("#mantenimiento").html(data);
            $('#menu9').css({"background": ""});
            $('#menu10').css({"background": ""});
            $('#menu11').css({"background": ""});
            $('#menu12').css({"background": ""});
            $('#menu13').css({"background": ""});
            $('#menu14').css({"background": ""});
            $('#menu15').css({"background": ""});
            $('#menu16').css({"background": ""});
            $('#menu17').css({"background": ""});
            $('#menu18').css({"background": ""});
            $('#menu19').css({"background": "#000000"});
            $('#menu20').css({"background": ""});
            $('#menu21').css({"background": ""});
            $('#menu22').css({"background": ""});
            $('#menu26').css({"background": ""});
            $('#menu27').css({"background": ""});
        }
    });
}


// Tipo de Documento
function ir20() {
    $.ajax({
        type: "POST",
        url: "vistas-mantenimiento/tipo_documento.php",
        success: function (data) {
            $("#mantenimiento").html(data);
            $('#menu9').css({"background": ""});
            $('#menu10').css({"background": ""});
            $('#menu11').css({"background": ""});
            $('#menu12').css({"background": ""});
            $('#menu13').css({"background": ""});
            $('#menu14').css({"background": ""});
            $('#menu15').css({"background": ""});
            $('#menu16').css({"background": ""});
            $('#menu17').css({"background": ""});
            $('#menu18').css({"background": ""});
            $('#menu19').css({"background": ""});
            $('#menu20').css({"background": "#000000"});
            $('#menu21').css({"background": ""});
            $('#menu22').css({"background": ""});
            $('#menu26').css({"background": ""});
            $('#menu27').css({"background": ""});
        }
    });
}

// Tipo de Transacción
function ir21() {
    $.ajax({
        type: "POST",
        url: "vistas-mantenimiento/tipo_transaccion.php",
        success: function (data) {
            $("#mantenimiento").html(data);
            $('#menu9').css({"background": ""});
            $('#menu10').css({"background": ""});
            $('#menu11').css({"background": ""});
            $('#menu12').css({"background": ""});
            $('#menu13').css({"background": ""});
            $('#menu14').css({"background": ""});
            $('#menu15').css({"background": ""});
            $('#menu16').css({"background": ""});
            $('#menu17').css({"background": ""});
            $('#menu18').css({"background": ""});
            $('#menu19').css({"background": ""});
            $('#menu20').css({"background": ""});
            $('#menu21').css({"background": "#000000"});
            $('#menu22').css({"background": ""});
            $('#menu26').css({"background": ""});
            $('#menu27').css({"background": ""});
        }
    });
}

// Área
function ir22() {
    $.ajax({
        type: "POST",
        url: "vistas-mantenimiento/area.php",
        success: function (data) {
            $("#mantenimiento").html(data);
            $('#menu9').css({"background": ""});
            $('#menu10').css({"background": ""});
            $('#menu11').css({"background": ""});
            $('#menu12').css({"background": ""});
            $('#menu13').css({"background": ""});
            $('#menu14').css({"background": ""});
            $('#menu15').css({"background": ""});
            $('#menu16').css({"background": ""});
            $('#menu17').css({"background": ""});
            $('#menu18').css({"background": ""});
            $('#menu19').css({"background": ""});
            $('#menu20').css({"background": ""});
            $('#menu21').css({"background": ""});
            $('#menu22').css({"background": "#000000"});
            $('#menu26').css({"background": ""});
            $('#menu27').css({"background": ""});
        }
    });
}

function ir26() {
    $.ajax({
        type: "POST",
        url: "vistas-mantenimiento/lote.php",
        success: function (data) {
            $("#mantenimiento").html(data);
            $('#menu9').css({"background": ""});
            $('#menu10').css({"background": ""});
            $('#menu11').css({"background": ""});
            $('#menu12').css({"background": ""});
            $('#menu13').css({"background": ""});
            $('#menu14').css({"background": ""});
            $('#menu15').css({"background": ""});
            $('#menu16').css({"background": ""});
            $('#menu17').css({"background": ""});
            $('#menu18').css({"background": ""});
            $('#menu19').css({"background": ""});
            $('#menu20').css({"background": ""});
            $('#menu21').css({"background": ""});
            $('#menu22').css({"background": ""});
            $('#menu26').css({"background": "#000000"});
            $('#menu27').css({"background": ""});
        }
    });
}

function ir27() {
    $.ajax({
        type: "POST",
        url: "vistas-mantenimiento/presentacion.php",
        success: function (data) {
            $("#mantenimiento").html(data);
            $('#menu9').css({"background": ""});
            $('#menu10').css({"background": ""});
            $('#menu11').css({"background": ""});
            $('#menu12').css({"background": ""});
            $('#menu13').css({"background": ""});
            $('#menu14').css({"background": ""});
            $('#menu15').css({"background": ""});
            $('#menu16').css({"background": ""});
            $('#menu17').css({"background": ""});
            $('#menu18').css({"background": ""});
            $('#menu19').css({"background": ""});
            $('#menu20').css({"background": ""});
            $('#menu21').css({"background": ""});
            $('#menu22').css({"background": ""});
            $('#menu26').css({"background": ""});
            $('#menu27').css({"background": "#000000"});
        }
    });
}


function AgregarCategoria() {
    document.getElementById('lista').style.display = 'none';
    document.getElementById('listaCat').style.display = 'none';
    document.getElementById('agregarCat').style.display = 'block';
    document.getElementById("nombreCatReg").focus();
}

function CancelarCategoria() {
    document.getElementById("formCatReg").reset();
    document.getElementById("lista").style.display = 'block';
    document.getElementById("listaCat").style.display = 'block';
    document.getElementById("agregarCat").style.display = 'none';
    document.getElementById("buscador").focus();
}

// function addCategoria() {
//     var id_user_reg = document.getElementById('idUserReg').value;
//     var nombre_cat = document.getElementById('nombreCatReg').value;
//     $.ajax({
//         type: "POST",
//         url: "controller/agregar.php",
//         data: "nombre_cat=" + nombre_cat + "&id_user_reg=" + id_user_reg,
//         success: function (data) {
//           ir9();
//         }
//     });
// }

$("#formCatReg").on("submit", function (e) {
    e.preventDefault();
    var formCateg = new FormData(document.getElementById("formCatReg"));
    $.ajax({
        url: "controller/Categoria.php",
        type: "POST",
        dataType: "HTML",
        data: formCateg,
        cache: false,
        contentType: false,
        processData: false
    }).done(function (data) {
        ir9();
    }).fail(function (data) {
        
    });
});

$("#formCatEdit").on("submit", function (e) {
    e.preventDefault();
    var formCategEdit = new FormData(document.getElementById("formCatEdit"));
    $.ajax({
        url: "controller/Categoria.php",
        type: "POST",
        dataType: "HTML",
        data: formCategEdit,
        cache: false,
        contentType: false,
        processData: false
    }).done(function (data) {
        ir9();
        
    }).fail(function (data) {
        
    });
});

function eliminarCategoria() {
    var id_categoria = document.getElementById('catDelete').value;
    $.ajax({
        type: "POST",
        url: "controller/delete.php",
        data: "id_categoria=" + id_categoria,
        success: function (data) {
            ir9();
        }
    });
    $('#deleteCateg').modal('hide');
    if ($('.modal-backdrop').is(':visible')) {
        $('body').removeClass('modal-open');
        $('.modal-backdrop').remove();
    }
}

function activarCategoria() {
    var id_categoria = document.getElementById('catActive').value;
    $.ajax({
        type: "POST",
        url: "controller/activar.php",
        data: "id_categoria=" + id_categoria,
        success: function (data) {
            ir9();
        }
    });
    $('#activarCateg').modal('hide');
    if ($('.modal-backdrop').is(':visible')) {
        $('body').removeClass('modal-open');
        $('.modal-backdrop').remove();
    }
}

function AgregarEstado() {
    document.getElementById('lista').style.display = 'none';
    document.getElementById('listaEstadoCivil').style.display = 'none';
    document.getElementById('agregarEst').style.display = 'block';
    document.getElementById("nombreEstReg").focus();
}

function CancelarEstado() {
    document.getElementById("formEstCivReg").reset();
    document.getElementById("lista").style.display = 'block';
    document.getElementById("listaEstadoCivil").style.display = 'block';
    document.getElementById("agregarEst").style.display = 'none';
    document.getElementById("buscador").focus();
}

$("#formEstCivReg").on("submit", function (e) {
    e.preventDefault();
    var formEstado = new FormData(document.getElementById("formEstCivReg"));
    $.ajax({
        url: "controller/EstadoCivil.php",
        type: "POST",
        dataType: "HTML",
        data: formEstado,
        cache: false,
        contentType: false,
        processData: false
    }).done(function (data) {
        alert('si');
        ir10();
        
    }).fail(function (data) {
        alert('no');
    });
});

$("#formEstEdit").on("submit", function (e) {
    e.preventDefault();
    var formEstgEdit = new FormData(document.getElementById("formEstEdit"));
    $.ajax({
        url: "controller/EstadoCivil.php",
        type: "POST",
        dataType: "HTML",
        data: formEstgEdit,
        cache: false,
        contentType: false,
        processData: false
    }).done(function (data) {
        ir10();
        
    }).fail(function (data) {
        
    });
});

function eliminarEstado() {
    var id_estado_civil = document.getElementById('estDelete').value;
    $.ajax({
        type: "POST",
        url: "controller/delete.php",
        data: "id_estado_civil=" + id_estado_civil,
        success: function (data) {
            alert(data);
            ir10();
        }
    });
    $('#delEstado').modal('hide');
    if ($('.modal-backdrop').is(':visible')) {
        $('body').removeClass('modal-open');
        $('.modal-backdrop').remove();
    }
}

function activarEstado() {
    var id_estado_civil = document.getElementById('estActive').value;
    $.ajax({
        type: "POST",
        url: "controller/activar.php",
        data: "id_estado_civil=" + id_estado_civil,
        success: function (data) {
            ir10();
        }
    });
    $('#activarEstad').modal('hide');
    if ($('.modal-backdrop').is(':visible')) {
        $('body').removeClass('modal-open');
        $('.modal-backdrop').remove();
    }
}

function AgregarMarca() {
    document.getElementById('lista').style.display = 'none';
    document.getElementById('listaMarca').style.display = 'none';
    document.getElementById('agregarMarca').style.display = 'block';
    document.getElementById("nombMarca").focus();
}

function CancelarMarca() {
    document.getElementById("FormMarcaReg").reset();
    document.getElementById("lista").style.display = 'block';
    document.getElementById("listaMarca").style.display = 'block';
    document.getElementById("agregarMarca").style.display = 'none';
    document.getElementById("buscador").focus();
}

$("#FormMarcaReg").on("submit", function (e) {
    e.preventDefault();
    var formMarca = new FormData(document.getElementById("FormMarcaReg"));
    $.ajax({
        url: "controller/CMarca.php",
        type: "POST",
        dataType: "HTML",
        data: formMarca,
        cache: false,
        contentType: false,
        processData: false
    }).done(function (data) {
        ir11();
        
    }).fail(function (data) {
        
    });
});

$("#FormEditMarca").on("submit", function (e) {
    e.preventDefault();
    var formMarcaEdit = new FormData(document.getElementById("FormEditMarca"));
    $.ajax({
        url: "controller/CMarca.php",
        type: "POST",
        dataType: "HTML",
        data: formMarcaEdit,
        cache: false,
        contentType: false,
        processData: false
    }).done(function (data) {
        ir11();
        
    }).fail(function (data) {
        
    });
});

function eliminarMarca() {
    var id_marca = document.getElementById('marDelete').value;
    $.ajax({
        type: "POST",
        url: "controller/delete.php",
        data: "id_marca=" + id_marca,
        success: function (data) {
            ir11();
        }
    });
    $('#deleteMarca').modal('hide');
    if ($('.modal-backdrop').is(':visible')) {
        $('body').removeClass('modal-open');
        $('.modal-backdrop').remove();
    }
}

function activarMarca() {
    var id_marca = document.getElementById('marActive').value;
    $.ajax({
        type: "POST",
        url: "controller/activar.php",
        data: "id_marca=" + id_marca,
        success: function (data) {
            ir11();
        }
    });
    $('#activarMarca').modal('hide');
    if ($('.modal-backdrop').is(':visible')) {
        $('body').removeClass('modal-open');
        $('.modal-backdrop').remove();
    }
}

function AgregarGrado() {
    document.getElementById('lista').style.display = 'none';
    document.getElementById('listaGrado').style.display = 'none';
    document.getElementById('agregarGra').style.display = 'block';
    document.getElementById("nombreGrado").focus();
}

function CancelarGrado() {
    document.getElementById("FormAddGra").reset();
    document.getElementById("lista").style.display = 'block';
    document.getElementById("listaGrado").style.display = 'block';
    document.getElementById("agregarGra").style.display = 'none';
    document.getElementById("buscador").focus();
}

$("#FormAddGra").on("submit", function (e) {
    e.preventDefault();
    var formGrado = new FormData(document.getElementById("FormAddGra"));
    $.ajax({
        url: "controller/GradoInstruccion.php",
        type: "POST",
        dataType: "HTML",
        data: formGrado,
        cache: false,
        contentType: false,
        processData: false
    }).done(function (data) {
        alert(data);
        ir12();
        
    }).fail(function (data) {
        
    });
});

$("#formEditGra").on("submit", function (e) {
    e.preventDefault();
    var formGradoEdit = new FormData(document.getElementById("formEditGra"));
    $.ajax({
        url: "controller/GradoInstruccion.php",
        type: "POST",
        dataType: "HTML",
        data: formGradoEdit,
        cache: false,
        contentType: false,
        processData: false
    }).done(function (data) {
        ir12();
        
    }).fail(function (data) {
        
    });
});

function eliminarGradoInstruccion() {
    var id_grado_instruccion = document.getElementById('graDelete').value;
    $.ajax({
        type: "POST",
        url: "controller/delete.php",
        data: "id_grado_instruccion=" + id_grado_instruccion,
        success: function (data) {
            ir12();
        }
    });
    $('#deleteMarca').modal('hide');
    if ($('.modal-backdrop').is(':visible')) {
        $('body').removeClass('modal-open');
        $('.modal-backdrop').remove();
    }
}

function activarGradoInstruccion() {
    var id_grado_instruccion = document.getElementById('graActive').value;
    $.ajax({
        type: "POST",
        url: "controller/activar.php",
        data: "id_grado_instruccion=" + id_grado_instruccion,
        success: function (data) {
            ir12();
        }
    });
    $('#activarGrado').modal('hide');
    if ($('.modal-backdrop').is(':visible')) {
        $('body').removeClass('modal-open');
        $('.modal-backdrop').remove();
    }
}

function AgregarPer() {
    document.getElementById('lista').style.display = 'none';
    document.getElementById('listaPer').style.display = 'none';
    document.getElementById('agregarPer').style.display = 'block';
    document.getElementById("nombresPer").focus();
}

function noPer() {
    document.getElementById("addper").reset();
    document.getElementById("lista").style.display = 'block';
    document.getElementById("listaPer").style.display = 'block';
    document.getElementById("agregarPer").style.display = 'none';
    document.getElementById("buscador").focus();
}

function AgregarProducto() {
    document.getElementById('lista').style.display = 'none';
    document.getElementById('listaProducto').style.display = 'none';
    document.getElementById('agregarProd').style.display = 'block';
    document.getElementById("nombreProd").focus();
}

function CancelarProducto() {
    document.getElementById("formProdReg").reset();
    document.getElementById("lista").style.display = 'block';
    document.getElementById("listaProducto").style.display = 'block';
    document.getElementById("agregarProd").style.display = 'none';
    document.getElementById("buscador").focus();
}

$("#formProdReg").on("submit", function (e) {
    e.preventDefault();
    var formProducto = new FormData(document.getElementById("formProdReg"));
    $.ajax({
        url: "controller/Producto.php",
        type: "POST",
        dataType: "HTML",
        data: formProducto,
        cache: false,
        contentType: false,
        processData: false
    }).done(function (data) {
        alert(data);
        ir14();
        
    }).fail(function (data) {
        
    });
});

$("#formProdEdit").on("submit", function (e) {
    e.preventDefault();
    var formProdEdit = new FormData(document.getElementById("formProdEdit"));
    $.ajax({
        url: "controller/Producto.php",
        type: "POST",
        dataType: "HTML",
        data: formProdEdit,
        cache: false,
        contentType: false,
        processData: false
    }).done(function (data) {
        ir14();
        
    }).fail(function (data) {
        
    });
});

function AgregarUnidadMedida() {
    document.getElementById('lista').style.display = 'none';
    document.getElementById('listaUnMed').style.display = 'none';
    document.getElementById('agregarUnMed').style.display = 'block';
    document.getElementById("nombre").focus();
}

function CancelarUnidadMedida() {
    document.getElementById("formUnimedReg").reset();
    document.getElementById("lista").style.display = 'block';
    document.getElementById("listaUnMed").style.display = 'block';
    document.getElementById("agregarUnMed").style.display = 'none';
    document.getElementById("buscador").focus();
}

$("#formUnimedReg").on("submit", function (e) {
    e.preventDefault();
    var formUnMedida = new FormData(document.getElementById("formUnimedReg"));
    $.ajax({
        url: "controller/UnidadMedida.php",
        type: "POST",
        dataType: "HTML",
        data: formUnMedida,
        cache: false,
        contentType: false,
        processData: false
    }).done(function (data) {
        ir15();
        
    }).fail(function (data) {
        
    });
});

$("#FormAddGra").on("submit", function (e) {
    e.preventDefault();
    var formGrado = new FormData(document.getElementById("FormAddGra"));
    $.ajax({
        url: "controller/GradoInstruccion.php",
        type: "POST",
        dataType: "HTML",
        data: formGrado,
        cache: false,
        contentType: false,
        processData: false
    }).done(function (data) {
        alert(data);
        ir12();
        
    }).fail(function (data) {
        
    });
});

function AgregarSucursal() {
    document.getElementById('lista').style.display = 'none';
    document.getElementById('listaSucursal').style.display = 'none';
    document.getElementById('agregarSucursal').style.display = 'block';
    document.getElementById("nombre").focus();
}

function CancelarSucursal() {
    document.getElementById("addsuc").reset();
    document.getElementById("lista").style.display = 'block';
    document.getElementById("listaSucursal").style.display = 'block';
    document.getElementById("agregarSucursal").style.display = 'none';
    document.getElementById("buscador").focus();
}

function AgregarTipoComprobante() {
    document.getElementById('lista').style.display = 'none';
    document.getElementById('listaTipComprobante').style.display = 'none';
    document.getElementById('agregarTipoComprobante').style.display = 'block';
    document.getElementById("nombre").focus();
}

function CancelarTipoComprobante() {
    document.getElementById("addtcom").reset();
    document.getElementById("lista").style.display = 'block';
    document.getElementById("listaTipComprobante").style.display = 'block';
    document.getElementById("agregarTipoComprobante").style.display = 'none';
    document.getElementById("buscador").focus();
}

function AgregarTipoMovimiento() {
    document.getElementById('lista').style.display = 'none';
    document.getElementById('listaTipMovimiento').style.display = 'none';
    document.getElementById('agregarTipoMovimiento').style.display = 'block';
    document.getElementById("nombre").focus();
}

function CancelarTipoMovimiento() {
    document.getElementById("addtmov").reset();
    document.getElementById("lista").style.display = 'block';
    document.getElementById("listaTipMovimiento").style.display = 'block';
    document.getElementById("agregarTipoMovimiento").style.display = 'none';
    document.getElementById("buscador").focus();
}

function AgregarTipoDocumento() {
    document.getElementById('lista').style.display = 'none';
    document.getElementById('listaTipoDocumento').style.display = 'none';
    document.getElementById('agregarTipoDocumento').style.display = 'block';
    document.getElementById("nombre").focus();
}

function CancelarTipoDocumento() {
    document.getElementById("addtdoc").reset();
    document.getElementById("lista").style.display = 'block';
    document.getElementById("listaTipoDocumento").style.display = 'block';
    document.getElementById("agregarTipoDocumento").style.display = 'none';
    document.getElementById("buscador").focus();
}

function AgregarTipoTransaccion() {
    document.getElementById('lista').style.display = 'none';
    document.getElementById('listaTipoTransaccion').style.display = 'none';
    document.getElementById('agregarTipoTransaccion').style.display = 'block';
    document.getElementById("nombre").focus();
}

function CancelarTipoTransaccion() {
    document.getElementById("addtrans").reset();
    document.getElementById("lista").style.display = 'block';
    document.getElementById("listaTipoTransaccion").style.display = 'block';
    document.getElementById("agregarTipoTransaccion").style.display = 'none';
    document.getElementById("buscador").focus();
}

function AgregarArea() {
    document.getElementById('lista').style.display = 'none';
    document.getElementById('listaArea').style.display = 'none';
    document.getElementById('agregarArea').style.display = 'block';
    document.getElementById("nombre").focus();
}

function CancelarArea() {
    document.getElementById("FormAreaReg").reset();
    document.getElementById("lista").style.display = 'block';
    document.getElementById("listaArea").style.display = 'block';
    document.getElementById("agregarArea").style.display = 'none';
    document.getElementById("buscador").focus();
}

$("#FormAreaReg").on("submit", function (e) {
    e.preventDefault();
    var FormAreaReg = new FormData(document.getElementById("FormAreaReg"));
    $.ajax({
        url: "controller/agregar.php",
        type: "POST",
        dataType: "HTML",
        data: FormAreaReg,
        cache: false,
        contentType: false,
        processData: false
    }).done(function (data) {
        ir22();
    }).fail(function (data) {
        ir22();
    });
});

function eliminarArea() {
    var id_area = document.getElementById('areDelet').value;
    $.ajax({
        type: "POST",
        url: "controller/delete.php",
        data: "id_area=" + id_area,
        success: function (data) {
            ir22();
        }
    });
    $('#deleteAre').modal('hide');
    if ($('.modal-backdrop').is(':visible')) {
        $('body').removeClass('modal-open');
        $('.modal-backdrop').remove();
    }
}

function activarArea() {
    var id_area = document.getElementById('areActiv').value;
    $.ajax({
        type: "POST",
        url: "controller/activar.php",
        data: "id_area=" + id_area,
        success: function (data) {
            ir22();
        }
    });
    $('#activarAre').modal('hide');
    if ($('.modal-backdrop').is(':visible')) {
        $('body').removeClass('modal-open');
        $('.modal-backdrop').remove();
    }
}

function AgregarUnidadEmpaque() {
    document.getElementById('lista').style.display = 'none';
    document.getElementById('listaUnPaq').style.display = 'none';
    document.getElementById('agregarUnPaq').style.display = 'block';
    document.getElementById("nombre").focus();
}

function CancelarUnidadEmpaque() {
    document.getElementById("addunpaq").reset();
    document.getElementById("lista").style.display = 'block';
    document.getElementById("listaUnPaq").style.display = 'block';
    document.getElementById("agregarUnPaq").style.display = 'none';
    document.getElementById("buscador").focus();
}

function AgregarLote() {
    document.getElementById('lista').style.display = 'none';
    document.getElementById('listaLote').style.display = 'none';
    document.getElementById('agregarLote').style.display = 'block';
    document.getElementById("nombre").focus();
}

function CancelarLote() {
    document.getElementById("addlote").reset();
    document.getElementById("lista").style.display = 'block';
    document.getElementById("listaLote").style.display = 'block';
    document.getElementById("agregarLote").style.display = 'none';
    document.getElementById("buscador").focus();
}

function AgregarPresentacion() {
    document.getElementById('lista').style.display = 'none';
    document.getElementById('listaPresentacion').style.display = 'none';
    document.getElementById('agregarPresentacion').style.display = 'block';
    document.getElementById("nombre").focus();
}

function CancelarPresentacion() {
    document.getElementById("addpre").reset();
    document.getElementById("lista").style.display = 'block';
    document.getElementById("listaPresentacion").style.display = 'block';
    document.getElementById("agregarPresentacion").style.display = 'none';
    document.getElementById("buscador").focus();
}
