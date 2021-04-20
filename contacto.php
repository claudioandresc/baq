<?php
if($_GET['act']==1) { 

$to = "";
$asunto = "";
$msg = "";
$encabezado = "";

$to = "contacto@baudoinarquitectos.com";
$asunto = "Consulta ".$_POST['Nombre']." desde BaudoinArquitectos.com";
						
$msg.= "- NOMBRE:  ".$_POST['Nombre']."\n";
$msg.= "- E-MAIL:  ".$_POST['Email']."\n";
$msg.= "- TELEFONO:  ".$_POST['Telefono']."\n";
$msg.= "- COMENTARIOS:  ".$_POST['Comentarios']."\n";

$encabezado = "From: ".$_POST['Email']."\r\n";
$encabezado.= "Bcc: baudoinarquitectos@gmail.com,facundobaudointeran@gmail.com \r\n";

mail($to, $asunto, $msg, $encabezado);
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Contacto - Baudoin Arquitectos</title>
<meta name="keywords" content="contacto, contáctenos, oficina, dirección, teléfonos, arquitectura, arquitectos, baudoin, proyectos, planos, construcción, estructura" />
<meta name="description" content="Información de contacto, teléfonos, email y dirección de nuestra oficina. Baudoin Arquitectos. Caracas. Venezuela." />
<?php include("includes/header-code.php") ?>
<?php include_once("includes/analyticstracking.php") ?>
</head>

<body>
<?php include("includes/header-menu.php") ?>
<div id="main" class="black-white" style="background-image:url(images/contacto.jpg)">
<?php include("includes/socials.php") ?>
<div class="content-1-3" style="float:right; position:relative;">
<h1>Contacto</h1>
<?php if ($_GET['act']==1) { ?>
<p align="center" style="margin:75px auto; text-align:center;">Gracias por su tiempo.<br />A la brevedad le responderemos.</p>
<?php } else { ?>
<form id="contactForm" name="contactForm" method="post" action="?act=1">
<table width="100%" border="0" align="center" cellpadding="5" cellspacing="0">
  <tr>
    <td height="10"></td>
  </tr>
  <tr>
    <td class="txt-error"><input name="Nombre" type="text" class="fields-contact required" id="Nombre" value=" * Nombre" onblur="if (this.value=='') this.value = ' * Nombre'" onfocus="if (this.value==' * Nombre') this.value = ''" /></td>
    </tr>
  <tr>
    <td class="txt-error"><input name="Email" type="text" class="fields-contact required email" id="Email" value=" * Email" onblur="if (this.value=='') this.value = ' * Email'" onfocus="if (this.value==' * Email') this.value = ''" /></td>
    </tr>
  <tr>
    <td class="txt-error"><input name="Telefono" type="text" class="fields-contact" id="Telefono" value=" Telf." onblur="if (this.value=='') this.value = ' Telf.'" onfocus="if (this.value==' Telf.') this.value = ''" /></td>
    </tr>
  <tr>
    <td valign="top" class="txt-error"><textarea name="Comentarios" cols="45" rows="5" class="fields-contact required" id="Comentarios" onblur="if (this.value=='') this.value = ' * Comentarios'" onfocus="if (this.value==' * Comentarios') this.value = ''"> * Comentarios</textarea></td>
    </tr>
  <tr>
    <td align="right"><input name="button" type="submit" class="but-form m-cursor" id="button" value="Enviar" /></td>
    </tr>
</table>
</form>
<?php } ?>
<p align="left" style="font-size:14px; padding-top:20px; line-height:18px; color:#ddd; display: block; border-top:dotted 1px #333;">
<!-- Cel. +58 416 6116435<br / -->
Calle Río Totaitu #9.<br />
Santa Cruz de la Sierra. Bolivia.<br /><br />
Tel. 591 3 3428182<br />
Cel. 591 76301402<br /><br />
<a href="mailto:contacto@baudoinarquitectos.com" style="text-decoration:none; color:#ddd;">contacto@baudoinarquitectos.com</a>
</p>
</div>
</div>
<?php include("includes/footer-menu.php") ?>
<script type="text/javascript" src="scripts/jquery-validate.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
	jQuery.validator.addMethod("defaultInvalid", function(value, element) {
    return !(element.value == element.defaultValue);
  	});
	
    $("#contactForm").validate({
      rules: { 
	  Nombre: "required defaultInvalid",
	  Email: "required defaultInvalid",
	  Telefono: "required defaultInvalid",
	  Comentarios: "required defaultInvalid"
	  },
      messages: {
	  Nombre: "*Requerido",
	  Email: "*Email invalido",
	  Telefono: "*Requerido",
	  Comentarios: "*Requerido"
	  }
    });
  });
</script>
</body>
</html>