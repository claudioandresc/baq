<div class="footer-menu">

<div class="progress"><span class="red" style="width:0%;"></span></div>

<div id="fm1">
<div id="tap-items-cat" style="position:absolute; width:100%; height:20px; cursor:pointer;"></div>
<?php
    $menu = simplexml_load_file('structure-menu.xml');
    foreach ($menu->categoria as $sitemenu) {
    $catId = $sitemenu['idcat'];
	$cat = $sitemenu['titulo']; ?>
<div class="fm-items">
<a onclick="window.location.href='categoria.php?c=<?php echo $catId; ?>&ct=<?php echo $cat; ?>';" class="ft-tit m-cursor" <?php if($categoriaid==$catId) { echo 'style="color:#00AEEF;"'; } ?>><?php echo $cat; ?></a></div>
<?php } ?>
</div>

<div id="fm2">
<?php 
	$result = count($menu->categoria);
	for ($i=0; $i<$result; $i++) {
?>
<div class="fm-items">
<?php
    foreach ($menu->categoria[intval($i)] as $sitemenu) {
	//$idc = $sitemenu['idcat'];
    $titulo = $sitemenu['name'];
	$pid = $sitemenu['id'];
	$lugar = $sitemenu['pais'];
?>
<a onclick="window.location.href='proyecto.php?c=<?php echo $i; ?>&proyid=<?php echo $pid; ?>&proytit=<?php echo $titulo; ?>';" class="m-cursor" <?php if($categoriaid==$i && $proyectid==$pid) { echo 'style="color:#00AEEF;"'; } ?>><?php echo $titulo; ?> &nbsp; <img src="images/<?php echo $lugar; ?>" border="0" /></a>
<?php } ?>
</div>
<?php } ?>
</div>

</div>

<script src="scripts/jquery.flexslider-min.js" type="text/javascript"></script>
<script src="scripts/jquery.easing.js" type="text/javascript"></script>
<script src="scripts/jquery.mousewheel.js" type="text/javascript"></script>

<script type="text/javascript">
$(".footer-menu").click(function () {
	$("#fm2").slideToggle("slow");
});
$("#tap-items-cat").click(function () {
	$(this).fadeOut("fast");
});
</script>

<script type='text/javascript'>
	function loading(percent){
		$('.progress span').animate({width:percent},2000,function(){
			$(this).children().html(percent);
		})
	}
</script>
<!--[if lt IE 9]><script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
<?php if(isset($categoriaid)) { // $porcentaje = (($categoriaid/100)*100).'%'; 
if ($categoriaid==0) { $porcentaje = '25%'; }
if ($categoriaid==1) { $porcentaje = '50%'; }
if ($categoriaid==2) { $porcentaje = '75%'; }
if ($categoriaid==3) { $porcentaje = '100%'; }
?>
<script type="text/javascript">loading('<?php echo $porcentaje; ?>');</script>
<?php } ?>
<!--script type="text/javascript">loading('5%');</script>
<script type="text/javascript">loading('50%');</script>
<script type="text/javascript">loading('75%');</script>
<script type="text/javascript">loading('100%');</script-->