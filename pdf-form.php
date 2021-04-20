<?php
include("conexion.php"); 
//include("includes/funciones.php");
 
$carpeta = $_GET['ubicacion'];
$pdf = $_GET['archivo'];
$proyecttit = $_GET['proytit'];

if($_GET['act']==1) {

$Proyecto = mysql_real_escape_string($_POST['Titulo']);
$Usuario = mysql_real_escape_string($_POST['Nombre']);
$Email = mysql_real_escape_string($_POST['Email']);
$FechaHr = mysql_real_escape_string($_POST['fechaHr']);

if(($Proyecto==NULL) or ($Usuario==NULL) or ($Email==NULL) or ($FechaHr==NULL)) { echo "<script> parent.location = '/' </script>"; }
else {
$insertQuery=mysql_query("INSERT INTO proyectosPDF (Proyecto,Usuario,email,fechaHr) VALUES ('$Proyecto','$Usuario','$Email','$FechaHr')");

// INICIO CORREO

$to = "";
$asunto = "";
$msg = "";
$encabezado = "";

$to = $_POST['Email']; 
$asunto = "BaudoinArquitectos.com - PDF ".$_POST['Titulo'];
						
$msg.= "<p>Hola ".$_POST['Nombre'].",<br>";
$msg.= "a continuación te enviamos la información del proyecto que deseas descargar.</p>";
$msg.= "<p><b>".$_POST['Titulo']."</b><br>";
$msg.= "Para descargar el archivo PDF haz click en el siguiente enlace ó copia y pega el mismo en tu navegador.<br>";
$msg.= "<a href='http://baudoinarquitectos.com/".$_POST['folder'].$_POST['pdffile']."' target='_blank'>http://baudoinarquitectos.com/".$_POST['folder'].$_POST['pdffile']."</a></p>";

$encabezado = "From: baudoinarquitectos@gmail.com \r\n";
$encabezado.= "MIME-Version: 1.0 \r\n";
$encabezado.= "Content-type: text/html; charset=utf-8 \r\n";
//$encabezado.= "Bcc: baudoinarquitectos@gmail.com,facundobaudointeran@gmail.com \r\n";

mail($to, $asunto, $msg, $encabezado);

	}
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>BaudoinArquitectos.com - PDF</title>
<script src="scripts/jquery.min.js" type="text/javascript"></script>
<style type="text/css">
@font-face{ 
	font-family:'corbel';
	src: url('css/corbel.eot');
	src: url('css/corbel.eot?#iefix') format('embedded-opentype'),
		 url('css/corbel.ttf') format('truetype'),
		 url('css/corbel.woff') format('woff'),
		 url('css/corbel.svg#webfont') format('svg');
}
body {
	font-family: corbel, Arial, sans-serif;
	background-color:#000;
	color:#fff;
}
.fields-contact {
	width:80%;
	background-color:#777;
	border:solid 1px #ccc;
	color:#fff;
	font-weight:bold;
	font-size:12px;
	margin-bottom:5px;
	font-family: corbel, Arial, sans-serif;
}

.but-form {
	background-color:#fff;
	font-size:12px;
	color:#000;
	border:dashed 1px #666;
	width:100px;
	font-weight:bold;
	cursor:pointer;
}

.txt-error {
	font-size:11px;
	color:#FFFF00!important;
}
</style>
</head>

<body>
<?php if ($_GET['act']==1) { ?>
<p align="center" style="margin:70px auto; text-align:center;">Gracias por su tiempo.<br />Hemos enviado a su correo la información solicitada.</p>
<?php } else { ?>
<form id="pdfForm" name="pdfForm" method="post" action="?act=1">
<table width="400" border="0" align="center" cellpadding="2" cellspacing="0">
  <tr>
    <td align="center" valign="top" style="padding:10px 0; line-height:16px;">
    <strong><?php echo $proyecttit ?></strong><br />
    - <span style="font-size:12px; color:#ccc;">Solicitud de Memoria (PDF)</span> -    </td>
  </tr>
  <tr>
    <td align="center" class="txt-error"><input name="Nombre" type="text" class="fields-contact required" id="Nombre" value=" * Nombre" onblur="if (this.value=='') this.value = ' * Nombre'" onfocus="if (this.value==' * Nombre') this.value = ''" /></td>
    </tr>
  <tr>
    <td align="center" class="txt-error"><input name="Email" type="text" class="fields-contact required email" id="Email" value=" * Email" onblur="if (this.value=='') this.value = ' * Email'" onfocus="if (this.value==' * Email') this.value = ''" /></td>
    </tr>
  <tr>
    <td align="center" valign="bottom" style="padding-top:10px;"><input name="button" type="submit" class="but-form m-cursor" id="button" value="Descargar »" /></td>
    </tr>
</table>
<input type="hidden" name="Titulo" value="<?php echo $proyecttit; ?>" />
<input type="hidden" name="pdffile" value="<?php echo $pdf; ?>" />
<input type="hidden" name="folder" value="<?php echo $carpeta; ?>" />
<input type="hidden" name="fechaHr" value="<?php echo date('d.m.y, g:i a'); ?>" />
</form>
<?php } ?>
<script type="text/javascript" src="scripts/jquery-validate.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
	jQuery.validator.addMethod("defaultInvalid", function(value, element) {
    return !(element.value == element.defaultValue);
  	});
	
    $("#pdfForm").validate({
      rules: { 
	  Nombre: "required defaultInvalid",
	  Email: "required defaultInvalid"
	  },
      messages: {
	  Nombre: "*Requerido",
	  Email: "*Email invalido"
	  }
    });
  });
</script>
</body>
</html>