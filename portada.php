<?php 
require_once                'escritos/php/config/datosConfig.php';
require_once HOST_FS_ROOT . 'escritos/php/sacalo/sacalo.php'; 
?>


<!doctype html>
<html>


<head>
<meta charset="utf-8" name="4 bolas" description="">
<title>4 bolas | Deporte Infantil Y Juvenil en Puerto Rico | Baloncesto Beisbol Volibol Futbol Soccer</title>
<link rel="icon"       type="image/png" href="icon/baloncesto.png">
<link rel="stylesheet" type="text/css"  href="escritos/estilo/comun.css">
<link rel="stylesheet" type="text/css" href="escritos/estilo/portada.css">

<link rel="stylesheet" type="text/css" media='screen and (max-width: 700px)' href="escritos/estilo/portadaSmall.css">
<link rel='stylesheet' type="text/css" media='screen and (min-width: 701px) and (max-width: 1200px)' href='escritos/estilo/portadaMedium.css'>
<link rel='stylesheet' type="text/css" media='screen and (min-width: 1201px)' href='escritos/estilo/portadaBig.css'>

<script type="text/javascript" src="escritos/js/portada.js"></script>
</head>




<body>
<div id="papel">    




<!---------------------------------------------------------------------------------------------------->
<div id="titulo">
<ul>
<li><a href='portada.php'><img src="icon/beisbol.png" alt="puerto rico beisbol infantil"></a></li>
<li><a href='portada.php'><img src="icon/futbol-soccer.png" alt="puerto rico futbol soccer infantil"></a></li>
<li><a href='portada.php'><img src="icon/baloncesto.png" alt="puerto rico baloncesto infantil"></a></li>
<li><a href='portada.php'><img src="icon/volibol.png" alt="puerto rico volibol infantil"></a></li>
<li id="titulo-text">Infantil y Juvenil</li>
</ul>
</div>
<!--end of titulo--> 




<!---------------------------------------------------------------------------------------------------->
<!--
<div id="links">
<div class="link">
<a href="ponlo.php"><img src="icon/upload.png" alt="load-icon"></a>
</div>
</div>
-->
<!-- end of links-->




<!---------------------------------------------------------------------------------------------------->
<div id="mensaje">
<div class="fotoentradas" id="uno"></div>
<div class="fotoentradas" id="dos"></div>
<div class="fotoentradas" id="tres"></div>

<script type="text/javascript">
//si el arreglo php no esta secuencialmente completo, no lo convierte a JS array, si no a JS Object
//array_values() will give you a JS array
var entries  = <?php echo json_encode($entries);  ?>;
  console.log(entries);
var orderedEntries  = <?php echo json_encode($orderedEntries);  ?>;
  console.log(orderedEntries);
  
  var isSmallScreen = window.matchMedia("screen and (max-width: 700px)");
  var isMediumScreen = window.matchMedia("screen and (min-width: 701px) and (max-width: 1200px)");
  var isBigScreen = window.matchMedia("screen and (min-width: 1201px)");  
  
 // the function is a listener; the function listen to changes of the VARIABLE
  isMediumScreen.addListener( cambia ); 

  cambia( isSmallScreen, isMediumScreen, isBigScreen ); 
</script>
<noscript>
  This site is non functional withouth Javascript.
</noscript>
</div><!-- end mensaje-->




<!---------------------------------------------------------------------------------------------------->
<div id="despedida">
4 bolas&copy; Hecho en Puerto Rico. Feito em Puerto Rico. Made in Puerto Rico.
</div><!--end of despedida-->




</div><!-- end of papel-->
</body>


</html>