




<html>
  <head>
    <title>Registro Nacional de Identificaci&oacute;n y Estado Civil</title>
    <link href="css/general.css" rel="stylesheet" type="text/css"/>
    <link href="css/tecla.css" rel="stylesheet" type="text/css"/>
    <script language="JavaScript" type="text/JavaScript" src="script/js/imagen.js"></script>
    <script language="JavaScript" type="text/JavaScript" src="script/js/seguridad.js"></script>
    <script language="JavaScript" type="text/JavaScript" src="script/js/validar.js"></script>
    <script language="JavaScript" type="text/JavaScript" src="script/js/teclado.js"></script>
    <script language="JavaScript" type="text/JavaScript" src="script/js/valreg.js"></script>
  </head>
  <body bgcolor="#ffffff" onload="inicializar();">
    <form name="valRegForm" method="post" action="/valreg/valreg.do" onsubmit="return validar();">
      <input type="hidden" name="accion" value="ini">
      <table border="0" cellpadding="0" cellspacing="0" width="600">
        <tr>
          <td><img src="imagenes/spacer.gif" width="183" height="1" border="0" alt=""/></td>
          <td><img src="imagenes/spacer.gif" width="411" height="1" border="0" alt=""/></td>
          <td><img src="imagenes/spacer.gif" width="6" height="1" border="0" alt=""/></td>
          <td><img src="imagenes/spacer.gif" width="1" height="1" border="0" alt=""/></td>
        </tr>
        <tr>
          <td colspan="3"><img name="consulta_r1_c1" src="imagenes/consulta_r1_c1.gif" width="600" height="95" border="0" alt=""/></td>
          <td><img src="imagenes/spacer.gif" width="1" height="95" border="0" alt=""/></td>
        </tr>
        <tr>
          <td rowspan="3" valign="top"><input type="image" name="consulta_r2_c1" src="imagenes/roll01.jpg" onclick="accion.value='seguridad';" onmouseover="MM_swapImage('consulta_r2_c1','','imagenes/roll02.jpg',1)" onmouseout="MM_swapImgRestore()"></td>
          <td colspan="2"><img name="consulta_r2_c2" src="imagenes/consulta_r2_c2.jpg" width="417" height="22" border="0" alt=""/></td>
          <td><img src="imagenes/spacer.gif" width="1" height="22" border="0" alt=""/></td>
        </tr>
        <tr>
          <td background="imagenes/consulta_r3_c2.gif" align="center">
            <table width="95%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td colspan="2">
                  <table width="100%" border="0" cellspacing="0" cellpadding="5">
                    <tr>
                      <td width="33%" height="47" align="right" class="style1">Ingrese el n&uacute;mero de DNI utilizando<br>el teclado virtual<br>y el mouse</td>
                      <td width="33%">
                        <table width="89" border="0" align="center" cellpadding="1" cellspacing="1" bgcolor="#2B55AB">
                          <tr align="center" bgcolor="#F3F3F3" class="txt03">
                            <td width="33%" height="25">
                              <a href="javascript:pulsaTecla(%207,%208,document.forms[0].nuDni);">
                                <input type="text" name="tecla_7" class="tecla" onmouseout="this.style.color='#000066'" onmouseover="this.style.cursor='hand';this.style.color='#FF8533';return true;" value="" readonly size="1" tabindex="-1"/>
                              </a>
                            </td>
                            <td width="33%" height="25" align="center">
                              <a href="javascript:pulsaTecla(%208,%208,document.forms[0].nuDni);">
                                <input type="text" name="tecla_8" class="tecla" onmouseout="this.style.color='#000066'" onmouseover="this.style.cursor='hand';this.style.color='#FF8533';return true;" value="" readonly size="1" tabindex="-1"/>
                              </a>
                            </td>
                            <td width="33%" height="25">
                              <a href="javascript:pulsaTecla(%209,%208,document.forms[0].nuDni);">
                                <input type="text" name="tecla_9" class="tecla" onmouseout="this.style.color='#000066'" onmouseover="this.style.cursor='hand';this.style.color='#FF8533';return true;" value="" readonly size="1" tabindex="-1"/>
                              </a>
                            </td>
                          </tr>
                          <tr align="center" bgcolor="#F3F3F3" class="txt03">
                            <td width="33%" height="25">
                              <a href="javascript:pulsaTecla(%204,%208,document.forms[0].nuDni);">
                                <input type="text" name="tecla_4" class="tecla" onmouseout="this.style.color='#000066'" onmouseover="this.style.cursor='hand';this.style.color='#FF8533';return true;" value="" readonly size="1" tabindex="-1"/>
                              </a>
                            </td>
                            <td width="33%" height="25" align="center">
                              <a href="javascript:pulsaTecla(%205,%208,document.forms[0].nuDni);">
                                <input type="text" name="tecla_5" class="tecla" onmouseout="this.style.color='#000066'" onmouseover="this.style.cursor='hand';this.style.color='#FF8533';return true;" value="" readonly size="1" tabindex="-1"/>
                              </a>
                            </td>
                            <td width="33%" height="25">
                              <a href="javascript:pulsaTecla(%206,%208,document.forms[0].nuDni);">
                                <input type="text" name="tecla_6" class="tecla" onmouseout="this.style.color='#000066'" onmouseover="this.style.cursor='hand';this.style.color='#FF8533';return true;" value="" readonly size="1" tabindex="-1"/>
                              </a>
                            </td>
                          </tr>
                          <tr align="center" bgcolor="#F3F3F3" class="txt03">
                            <td width="33%" height="25">
                              <a href="javascript:pulsaTecla(%201,%208,document.forms[0].nuDni);">
                                <input type="text" name="tecla_1" class="tecla" onmouseout="this.style.color='#000066'" onmouseover="this.style.cursor='hand';this.style.color='#FF8533';return true;" value="" readonly size="1" tabindex="-1"/>
                              </a>
                            </td>
                            <td width="33%" height="25" align="center">
                              <a href="javascript:pulsaTecla(%202,%208,document.forms[0].nuDni);">
                                <input type="text" name="tecla_2" class="tecla" onmouseout="this.style.color='#000066'" onmouseover="this.style.cursor='hand';this.style.color='#FF8533';return true;" value="" readonly size="1" tabindex="-1"/>
                              </a>
                            </td>
                            <td width="33%" height="25">
                              <a href="javascript:pulsaTecla(%203,%208,document.forms[0].nuDni);">
                                <input type="text" name="tecla_3" class="tecla" onmouseout="this.style.color='#000066'" onmouseover="this.style.cursor='hand';this.style.color='#FF8533';return true;" value="" readonly size="1" tabindex="-1"/>
                              </a>
                            </td>
                          </tr>
                          <tr align="center" bgcolor="#FFFFFF" class="txt03">
                            <td width="33%" height="25" bgcolor="#F3F3F3">
                              <a href="javascript:pulsaTecla(%200,%208,document.forms[0].nuDni);">
                                <input type="text" name="tecla_0" class="tecla" onmouseout="this.style.color='#000066'" onmouseover="this.style.cursor='hand';this.style.color='#FF8533';return true;" value="" readonly size="1" tabindex="-1"/>
                              </a>
                            </td>
                            <td height="25" colspan="2" bgcolor="#F3F3F3" class="txt03">
                              <a href="javascript:pulsaTecla(%20-1,%208,document.forms[0].nuDni);" class="tecla" onmouseout="this.style.color='#000066'" onmouseover="this.style.color='#FF8533';return true;">limpiar</a>
                            </td>
                          </tr>
                        </table>
                      </td>
                      <td width="33%">
                        <input type="text" name="nuDni" maxlength="8" size="10" value="" onkeypress="ValidarTeclaNumero();" readonly="readonly" style="text-align:center">
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>
              <tr>
                <td height="88" colspan="2" align="center">
                  <table width="96%" border="0" cellspacing="0" cellpadding="2">
                    <tr>
                      <td width="33%" class="style4" align="center">Ingrese el c&oacute;digo que se muestra en la Imagen</td>
                      <td width="33%" align="center">
                        <img id="imagcodigo" width="156" height="53"/>
                      </td>
                      <td width="33%">
                        <input type="text" name="imagen" maxlength="4" size="10" value="" onkeypress="ValidarTeclaCodigo();" style="text-align:center">
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>
              <tr>
                <td align="center"><input type="image" name="bot_consultar" src="imagenes/bot_consultar.gif" onclick="accion.value='buscar';" onmouseover="MM_swapImage('bot_consultar','','imagenes/bot_consultar_f2.gif',1)" onmouseout="MM_swapImgRestore()"></td>
                <td align="center"><input type="image" name="bot_limpiar01" src="imagenes/bot_limpiar01.gif" onclick="accion.value='limpiar';" onmouseover="MM_swapImage('bot_limpiar01','','imagenes/bot_limpiar01_f2.gif',1)" onmouseout="MM_swapImgRestore()"></td>
              </tr>
            </table>

          </td>
          <td><img name="consulta_r3_c3" src="imagenes/consulta_r3_c3.jpg" width="6" height="242" border="0" alt=""/></td>
          <td><img src="imagenes/spacer.gif" width="1" height="242" border="0" alt=""/></td>
        </tr>
        <tr>
          <td colspan="2">
          <img name="consulta_r4_c2" src="imagenes/consulta_r4_c2.jpg" width="417" height="21" border="0" alt=""/></td>
          <td><img src="imagenes/spacer.gif" width="1" height="21" border="0" alt=""/></td>
        </tr>
        <tr>
          <td colspan="3"><img name="consulta_r5_c1" src="imagenes/consulta_r5_c1.jpg" width="600" height="28" border="0" alt=""/></td>
          <td><img src="imagenes/spacer.gif" width="1" height="28" border="0" alt=""/></td>
        </tr>
      </table>
    </form>
  </body>
</html>
