<?php
if (empty($_GET['c']) && empty($_GET['ct'])) {header('Location:/');}
$categoriaid = $_GET['c'];
$categoria = $_GET['ct'];
?>
<!doctype html>
<html>
<head>
<title><?php if (isset($_SERVER['HTTP_USER_AGENT']) && (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false)) { echo utf8_encode($categoria); } else { echo $categoria; } ?> - Baudoin Arquitectos</title>
<meta name="keywords" content="categoria, <?php echo $categoria ?>, arquitectura, arquitectos, baudoin, proyectos, planos, construcción, estructura" />
<meta name="description" content="Listado de Proyectos. Categoria: <?php echo $categoria ?>. Baudoin Arquitectos." />
<?php include("includes/header-code.php") ?>
<link href="css/flexslider-in.css" rel="stylesheet" type="text/css" />
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

function titChange(ind) {
	document.getElementsByClassName('sTitle')[ind].style.color = '#00AEEF';
}

function titChangeBack(ind) {
	document.getElementsByClassName('sTitle')[ind].style.color = '#fff';
}
</script>
<?php include_once("includes/analyticstracking.php") ?>
</head>

<body>
<?php include("includes/header-menu.php") ?>

<div class="flexslider carousel">
<ul class="slides">
<?php
    $menu = simplexml_load_file('structure-menu.xml');
    foreach ($menu->categoria[intval($categoriaid)] as $sitemenu) {
    $titulo = $sitemenu['name'];
	$ruta = $sitemenu['carpeta'];
	$imagen = $sitemenu['foto'];
	$pid = $sitemenu['id'];
?>
<li>
<div class="sTitle"><?php echo $titulo; ?></div>
<img src="<?php echo $ruta; echo $imagen; ?>" title="<?php echo $titulo ?>" alt="<?php echo $titulo ?>" onclick="window.location.href='proyecto.php?c=<?php echo $categoriaid ?>&proyid=<?php echo $pid ?>&proytit=<?php echo $titulo ?>';" onMouseOver="titChange(<?php echo $pid ?>);" onMouseOut="titChangeBack(<?php echo $pid ?>);" class="m-cursor black-white imgH" />
</li>
<?php } ?>
</ul>
</div>

<?php include("includes/footer-menu.php") ?>

<script type="text/javascript">

var windowWidth = $(window).width();
//var documentWidth = $(document).width();
//var layerwidth = $(".flexslider").width();
var ix4 = (windowWidth/4);

$(window).load(function(){
	$('.flexslider').flexslider({
		
namespace: "flex-",             // String: Prefix string attached to the class of every element generated by the plugin
selector:  ".slides > li",       // Selector: Must match a simple pattern. '{container} > {slide}' -- Ignore pattern at your own peril
animation: "slide",              //String: Select your animation type, "fade" or "slide"
easing: "swing",               // String: Determines the easing method used in jQuery transitions. jQuery easing plugin is supported!
direction: "horizontal",        //String: Select the sliding direction, "horizontal" or "vertical"
reverse: false,                 // Boolean: Reverse the animation direction
animationLoop: false,             //Boolean: Should the animation loop? If false, directionNav will received "disable" classes at either end
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
itemWidth: ix4,                   // Integer: Box-model width of individual carousel items, including horizontal borders and padding.
itemMargin: 0,                  // Integer: Margin between carousel items.
minItems: 0,                    // Integer: Minimum number of carousel items that should be visible. Items will resize fluidly when below this.
maxItems: 0,                    // Integer: Maxmimum number of carousel items that should be visible. Items will resize fluidly when above this limit.
move: 0                         // Integer: Number of carousel items that should move on animation. If 0, slider will move all visible items.
                                 
      });
    });
</script>

</body>
</html>