<?php
if (empty($_GET['c']) && empty($_GET['proyid']) && empty($_GET['proytit'])) {header('Location:/');}
$categoriaid = $_GET['c'];
$proyectid = $_GET['proyid'];
$proyecttit = $_GET['proytit'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php if (isset($_SERVER['HTTP_USER_AGENT']) && (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)) { echo utf8_encode($proyecttit); } else { echo $proyecttit; } ?> - Baudoin Arquitectos</title>
<meta name="keywords" content="<?php echo $proyecttit ?>, arquitectura, arquitectos, baudoin, proyectos, planos, construcción, estructura" />
<meta name="description" content="<?php echo $proyecttit ?>. Proyecto desarrollado por Baudoin Arquitectos." />
<?php include("includes/header-code.php") ?>
<link href="css/flexslider.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
//Initial load of page
$(document).ready(hContent);

//Every resize of window
$(window).resize(hContent);

//Dynamically assign height
function hContent() {
    var windowHeight = ($(window).height()-1) + "px";
    $(".imgH").css("height", windowHeight);
}
</script>
<link href="css/jquery.mCustomScrollbar.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="fancybox/jquery.fancybox.js?v=2.1.5"></script>
<link rel="stylesheet" type="text/css" href="fancybox/jquery.fancybox.css?v=2.1.5" media="screen" />
<script type="text/javascript">
	$(document).ready(function() {
		
		$('.fancybox').fancybox({
		type: 'iframe',
		padding: 2,
		width: 450,
		height: 185,
		autoSize    : false,
		closeClick  : false,
		fitToView   : false,
		scrolling: 'no',
		helpers: {
    		overlay: {
        		locked: false
    		}
		}
		});

	});
</script>
<?php include_once("includes/analyticstracking.php") ?>
</head>

<body>
<?php include("includes/header-menu.php") ?>
<?php
    $menu = simplexml_load_file('structure-menu.xml');
    $ref = $menu->categoria[intval($categoriaid)]->item[intval($proyectid)];
	$ruta = $ref['carpeta'];
	$video = $ref['video'];
	$titulo = $ref['name'];
	$pdf = $ref['pdf'];
	$fotocat = $ref['foto'];
?>

<?php
$ftitle=urlencode($titulo);
$furl=urlencode('http://baudoinarquitectos.com/proyecto.php?c='.$categoriaid.'&proyid='.$proyectid.'&proytit='.$titulo);
$fsummary=urlencode('Proyecto de: Baudoin Arquitectos | Siguenos por Twitter: @baudoinarquitec');
$fimage=urlencode('http://baudoinarquitectos.com/'.$ruta.$fotocat);
?>

<div class="tit-proyects"><?php echo $titulo; ?></div>
<div class="proyect-icons"><a class="m-cursor" id="txtCont"><img src="images/icon-txt.jpg" /></a><?php if ($pdf!='') { ?><a class="m-cursor fancybox" href="pdf-form.php?ubicacion=<?php echo $ruta; ?>&archivo=<?php echo $pdf; ?>&proytit=<?php echo $titulo; ?>" data-fancybox-type="iframe"><img src="images/icon-pdf.jpg" /></a><?php } ?><a onclick="window.open('http://www.facebook.com/sharer.php?s=100&amp;p[title]=<?php echo $ftitle; ?>&amp;p[summary]=<?php echo $fsummary; ?>&amp;p[url]=<?php echo $furl; ?>&amp;p[images][0]=<?php echo $fimage; ?>','facebook','toolbar=0,status=0,width=550,height=325');" href="javascript: void(0);"><img src="images/icon-fb.jpg" /></a><!-- a onclick="window.open('http://twitter.com/share?text=<?php // echo 'Baudoin Arquitectos - Proyecto: '.$ftitle ?>','twitter','toolbar=0,status=0,width=550,height=325');" href="javascript: void(0);"><img src="images/icon-tw.jpg" /></a --><?php if ($video!='') { ?><a onclick="window.open('<?php echo $video; ?>')" class="m-cursor"><img src="images/icon-tube.jpg" /></a><?php } ?></div>
<div id="proyect-txt">
	<div class="proyect-content">
<?php
$texto = file_get_contents($ruta.'texto.html');
echo $texto;
?>
	</div>
</div>
<div class="flexslider">
<ul class="slides">
<?php 
$imgdir = $ruta; //Pick your folder
$allowed_types = array('png','jpg','jpeg','gif'); //Allowed types of files
$dimg = opendir($imgdir);//Open directory

while($imgfile = readdir($dimg))
{
  if( in_array(strtolower(substr($imgfile,-3)),$allowed_types) OR
	  in_array(strtolower(substr($imgfile,-4)),$allowed_types) )
/*If the file is an image add it to the array*/
  {$a_img[] = $imgfile;}
}

sort($a_img);
$totimg = count($a_img);  //The total count of all the images
//Echo out the images and their paths incased in an li.
for($x=0; $x < $totimg; $x++) {
	 echo '<li><img src="'.$imgdir.$a_img[$x].'" alt="'.$titulo.'" title="'.$titulo.'" class="black-white imgH lazy" /></li>';
	 }
?> 
</ul>
</div>
<?php include("includes/footer-menu.php") ?>
<script src="scripts/jquery.mCustomScrollbar.concat.min.js"></script>
<script>
		(function($){
			$(window).load(function(){
				$(".proyect-content").mCustomScrollbar({
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

<script type="text/javascript">
$(window).load(function(){
	$('.flexslider').flexslider({
		
namespace: "flex-",             // String: Prefix string attached to the class of every element generated by the plugin
selector: ".slides > li",       // Selector: Must match a simple pattern. '{container} > {slide}' -- Ignore pattern at your own peril
animation: "slide",              //String: Select your animation type, "fade" or "slide"
easing: "swing",               // String: Determines the easing method used in jQuery transitions. jQuery easing plugin is supported!
direction: "horizontal",        //String: Select the sliding direction, "horizontal" or "vertical"
reverse: false,                 // Boolean: Reverse the animation direction
animationLoop: true,             //Boolean: Should the animation loop? If false, directionNav will received "disable" classes at either end
smoothHeight: false,            // Boolean: Allow height of the slider to animate smoothly in horizontal mode  
startAt: 0,                     //Integer: The slide that the slider should start on. Array notation (0 = first slide)
slideshow: true,                //Boolean: Animate slider automatically
slideshowSpeed: 10000,           //Integer: Set the speed of the slideshow cycling, in milliseconds
animationSpeed: 1000,            //Integer: Set the speed of animations, in milliseconds
initDelay: 0,                   // Integer: Set an initialization delay, in milliseconds
randomize: false,               //Boolean: Randomize slide order
 
// Usability features
pauseOnAction: true,            //Boolean: Pause the slideshow when interacting with control elements, highly recommended.
pauseOnHover: false,            //Boolean: Pause the slideshow when hovering over slider, then resume when no longer hovering
useCSS: true,                   // Boolean: Slider will use CSS3 transitions if available
touch: true,                    // Boolean: Allow touch swipe navigation of the slider on touch-enabled devices
video: false,                   // Boolean: If using video in the slider, will prevent CSS3 3D Transforms to avoid graphical glitches
 
// Primary Controls
controlNav: false,               //Boolean: Create navigation for paging control of each clide? Note: Leave true for manualControls usage
directionNav: true,             //Boolean: Create navigation for previous/next navigation? (true/false)
prevText: "Previous",           //String: Set the text for the "previous" directionNav item
nextText: "Next",               //String: Set the text for the "next" directionNav item
 
// Secondary Navigation
keyboard: false,                 //Boolean: Allow slider navigating via keyboard left/right keys
multipleKeyboard: false,        // Boolean: Allow keyboard navigation to affect multiple sliders. Default behavior cuts out keyboard navigation with more than one slider present.
mousewheel: true,              // Boolean: Requires jquery.mousewheel.js (https://github.com/brandonaaron/jquery-mousewheel) - Allows slider navigating via mousewheel
pausePlay: false,               //Boolean: Create pause/play dynamic element
pauseText: 'Pause',             //String: Set the text for the "pause" pausePlay item
playText: 'Play',               //String: Set the text for the "play" pausePlay item
 
// Special properties
controlsContainer: "",          // Selector: USE CLASS SELECTOR. Declare which container the navigation elements should be appended too. Default container is the FlexSlider element. Example use would be ".flexslider-container". Property is ignored if given element is not found.
manualControls: "",             //Selector: Declare custom control navigation. Examples would be ".flex-control-nav li" or "#tabs-nav li img", etc. The number of elements in your controlNav should match the number of slides/tabs.
sync: "",                       // Selector: Mirror the actions performed on this slider with another slider. Use with care.
asNavFor: "",                   // Selector: Internal property exposed for turning the slider into a thumbnail navigation for another slider
 
// Carousel Options
itemWidth: 0,                   // Integer: Box-model width of individual carousel items, including horizontal borders and padding.
itemMargin: 0,                  // Integer: Margin between carousel items.
minItems: 0,                    // Integer: Minimum number of carousel items that should be visible. Items will resize fluidly when below this.
maxItems: 0,                    // Integer: Maxmimum number of carousel items that should be visible. Items will resize fluidly when above this limit.
move: 0,                         // Integer: Number of carousel items that should move on animation. If 0, slider will move all visible items.
                                 
// Callback API
//start: function(){},            //Callback: function(slider) - Fires when the slider loads the first slide
//before: function(){},           //Callback: function(slider) - Fires asynchronously with each slider animation
//after: function(){},            //Callback: function(slider) - Fires after each slider animation completes
//end: function(){},              //Callback: function(slider) - Fires when the slider reaches the last slide (asynchronous)
//added: function(){},            // Callback: function(slider) - Fires after a slide is added
//removed: function(){},           // Callback: function(slider) - Fires after a slide is removed
		
        /*start: function(slider){
          $('body').removeClass('loading');
        }*/
      });
    });
</script>

<script>
/*
	$("img.lazy").lazyload({ 
		event : "click"
	});
*/
	function updateScrollbar() {
    $('.proyect-content').mCustomScrollbar("update");
	}
    $("#txtCont").click(function () {
	$("#proyect-txt").slideToggle("slow",updateScrollbar);
    });
</script>
</body>
</html>