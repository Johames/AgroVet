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

// SEGURIDAD
// Usuario
function ir23() {
    $.ajax({
        type: "POST",
        url: "vistas-seguridad/usuario.php",
        success: function (data) {
            $("#seguridad").html(data);
            $('#menu23').css({"background": "#000000"});
            $('#menu24').css({"background": ""});
            $('#menu25').css({"background": ""});
            $('#menu26').css({"background": ""});
        }
    });
}

// opciones
function ir24() {
    $.ajax({
        type: "POST",
        url: "vistas-seguridad/opciones.php",
        success: function (data) {
            $("#seguridad").html(data);
            $('#menu23').css({"background": ""});
            $('#menu24').css({"background": "#000000"});
            $('#menu25').css({"background": ""});
            $('#menu26').css({"background": ""});
        }
    });
}

// Perfil
function ir25() {
    $.ajax({
        type: "POST",
        url: "vistas-seguridad/perfil.php",
        success: function (data) {
            $("#seguridad").html(data);
            $('#menu23').css({"background": ""});
            $('#menu24').css({"background": ""});
            $('#menu25').css({"background": "#000000"});
            $('#menu26').css({"background": ""});
        }
    });
}

//funcion para mostar el cuadro de agregar usuarios 
   function AgregarUsuario() {
    document.getElementById('lista').style.display = 'none';
    document.getElementById('listaUser').style.display = 'none';
    document.getElementById('agregarPersona').style.display = 'block';
    document.getElementById('nombres').focus();
    
}

//funcion para mostrar el cuadro de agregar perfil
function AgregarPerfil() {
    document.getElementById('lista').style.display = 'none';
    document.getElementById('listaPerfil').style.display = 'none';
    document.getElementById('agregarPerfil').style.display = 'block';
    document.getElementById('nombres').focus();
}

//funcion para mostrar el cuadro de agregar Opciones
function AgregarOpciones() {
    document.getElementById('lista').style.display = 'none';
    document.getElementById('listaPers').style.display = 'none';
    document.getElementById('agregarPers').style.display = 'block';
    document.getElementById('nombres').focus();

}

$("#formOpcReg").on("submit", function(e){
  e.preventDefault();
  var formOpcReg = new FormData(document.getElementById("formOpcReg"));
  $.ajax({
    url: "controller/agregarUser.php",
    type: "POST",
    dataType: "HTML",
    data: formOpcReg,
    cache: false,
    contentType: false,
    processData: false
  }).done(function(data){
    ir24();
  }).fail(function(data){

  });
});