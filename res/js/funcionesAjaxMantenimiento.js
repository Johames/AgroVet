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

// MANTENIMIENTO
// Categoría
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
        }
    });
}

// Unidad de Venta
function ir16() {
    $.ajax({
        type: "POST",
        url: "vistas-mantenimiento/unidad_venta.php",
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
        }
    });
}
