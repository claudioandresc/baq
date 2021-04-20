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

<table width="1200" border="0" cellspacing="10" cellpadding="0" align="center" style="margin:0 auto;">
  <tr>
    <td colspan="3" align="center" class="adminTit">Visitas y Estadísticas</td>
  </tr>
  <tr>
    <td width="400" align="center" valign="middle"><iframe src="http://www.seethestats.com/stats/10180/NewVisits_22b5fb2e1_ifr.html" style="width:400px;height:210px;border:none;" scrolling="no" frameborder="0"></iframe></td>
    <td width="400" align="center" valign="middle"><iframe src="http://www.seethestats.com/stats/10180/Visitors_a94ba8f66_ifr.html" style="width:400px;height:210px;border:none;" scrolling="no" frameborder="0"></iframe></td>
    <td width="400" align="center" valign="middle"><iframe src="http://www.seethestats.com/stats/10180/VisitsByBrowser_fc1b445df_ifr.html" style="width:400px;height:210px;border:none;" scrolling="no" frameborder="0"></iframe></td>
  </tr>
  <tr>
    <td align="center" valign="middle"><iframe src="http://www.seethestats.com/stats/10180/VisitsByCountry_006b711ff_ifr.html" style="width:400px;height:210px;border:none;" scrolling="no" frameborder="0"></iframe></td>
    <td align="center" valign="middle"><iframe src="http://www.seethestats.com/stats/10180/Visits_1c6b238ae_ifr.html" style="width:400px;height:210px;border:none;" scrolling="no" frameborder="0"></iframe></td>
    <td align="center" valign="middle">&nbsp;</td>
  </tr>
  <tr>
    <td colspan="3" align="center" valign="middle" style="color:#ccc; word-spacing:3px; font-size:13px; padding-top:20px;">Para ver información mucho más detallada de las estadíticas de tu sitio web, visita <a href="http://www.google.com/intl/es/analytics/" target="_blank" style="font-weight:bold; color:#fff;">Google Analytics</a><br />
      e ingresa con los datos de tu cuenta <strong style="color:#fff;">baudoinarquitectos@gamil.com</strong></td>
  </tr>
</table>

<?php include ('includes/footer.php') ?>
</body>
</html>
