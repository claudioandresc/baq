<?php include("../conexion.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>BaudoinArquitectos.com - Administrador</title>
<script src="../scripts/jquery.js"></script>
<link href="../css/styles.css" rel="stylesheet" type="text/css" />
<link href="../css/jquery.mCustomScrollbar.css" rel="stylesheet" type="text/css" />
</head>

<body style="background-color:#333;">
<?php include ('includes/header.php') ?>

<table width="850" border="0" cellspacing="0" cellpadding="0" align="center" style="margin:0 auto;">
  <tr>
    <td align="center" class="adminTit">Listado de Descargas PDF</td>
  </tr>
  <tr>
    <td style="padding-top:20px;">
    <div id="contentBox">
<table width="850" border="0" cellspacing="0" cellpadding="0" style="color:#999; font-size:13px;">
<?php $buscar=mysql_query("SELECT * FROM proyectosPDF");
	while($datos=mysql_fetch_array($buscar)){?>
  <tr>
    <td align="left" style="border-bottom:solid 1px #444; padding:10px 0; color:#999;">
	<span style="font-weight:bold; color:#ddd;"><?=$datos['Proyecto']?></span> &nbsp; &#8212; &nbsp; 
    Descargó: <span style="color:#ccc;"><?=$datos['Usuario']?></span> &nbsp;-&nbsp; <span style="color:#ccc;"><?=$datos['email']?></span>
     &nbsp; &#8212; &nbsp; Fecha: <span style="color:#ccc;"><?=$datos['fechaHr']?></span>
    </td>
  </tr>
<? } ?>
</table>

    </div>
    </td>
  </tr>
</table>

<?php include ('includes/footer.php') ?>
	<script src="../scripts/jquery.mCustomScrollbar.concat.min.js"></script>
	<script>
		(function($){
			$(window).load(function(){
				$("#contentBox").mCustomScrollbar({
					mouseWheel:true,
					horizontalScroll:false,
					theme:"light",
					advanced:{
						updateOnContentResize: true
					}
				});
			});
		})(jQuery);
	</script>
</body>
</html>
