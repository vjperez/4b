<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>4 bolas Deporte Infantil Y Juvenil en Puerto Rico Baloncesto Beisbol Volibol Futbol Soccer</title>
<link rel="stylesheet" type="text/css" href="escritos/estilo/comun.css">
<link rel="stylesheet" type="text/css" href="escritos/estilo/portada.css">

<link rel="stylesheet" type="text/css" media='screen and (max-width: 700px)' href="escritos/estilo/portadaSmall.css">
<link rel='stylesheet' type="text/css" media='screen and (min-width: 701px) and (max-width: 1200px)' href='escritos/estilo/portadaMedium.css'>
<link rel='stylesheet' type="text/css" media='screen and (min-width: 1201px)' href='escritos/estilo/portadaBig.css'>
<!--
<link rel='stylesheet' type="text/css" media='screen and (min-width: 1025px)' href='estilo/portada-1000.css'>
<link rel='stylesheet' type="text/css" media='screen and (min-width: 1260px)' href='estilo/portada-1250.css'>
-->
<script type="text/javascript" src="escritos/js/comun.js"></script>
<script type="text/javascript" src="escritos/js/portada.js"></script>
</head>


<body>


<div id="papel">    



<!---------------------------------------------------------------------------------------------------->
<div id="titulo">
<ul>
<li><a href='portada.php'><img src="icon/baloncesto.png" alt="puerto rico baloncesto infantil"></a></li>
<li><a href='portada.php'><img src="icon/beisbol.png" alt="puerto rico beisbol infantil"></a></li>
<li><a href='portada.php'><img src="icon/futbol-soccer.png" alt="puerto rico futbol soccer infantil"></a></li>
<li><a href='portada.php'><img src="icon/volibol.png" alt="puerto rico volibol infantil"></a></li>
<li id="titulo-text">Infantil y Juvenil</li>
</ul>
</div><!--end of titulo--> 



<!---------------------------------------------------------------------------------------------------->
<div id="selecciona">
<form action="#" method="POST">    
<fieldset>

<div id="norte-inputbox-div">
<input type="radio" name="area" id="norte-boton" value="norte" onclick="escogeArea()" checked>
<label for="norte-boton">Norte</label>
</div>

<div  id="sur-inputbox-div">
<input type="radio" name="area" id="sur-boton" value="sur" onclick="escogeArea()">
<label for="sur-boton">Sur</label>
</div>

<div  id="oeste-inputbox-div">
<input type="radio" name="area" id="oeste-boton" value="oeste" onclick="escogeArea()">
<label for="oeste-boton">Oeste</label>
</div>

<div  id="este-inputbox-div">
<input type="radio" name="area" id="este-boton" value="este" onclick="escogeArea()" checked>            
<label for="este-boton">Este</label>
</div>
</fieldset>

<fieldset>
<div id="baloncesto-inputbox-div">
<input type="radio" name="deporte" id="baloncesto-boton" value="baloncesto" onclick="escogeDeporte()" checked>
<!-- <label for="baloncesto-boton">Baloncesto Infantil y Juvenil</label> -->
<img src="icon/baloncesto.png" alt="puerto rico baloncesto infantil" class="select-img">
</div>

<div  id="beisbol-inputbox-div">
<input type="radio" name="deporte" id="beisbol-boton" value="beisbol" onclick="escogeDeporte()">
<!-- <label for="beisbol-boton">Beisbol Infantil y Juvenil</label> -->
<img src="icon/beisbol.png" alt="puerto rico beisbol infantil" class="select-img">
</div>

<div  id="futbol-soccer-inputbox-div">
<input type="radio" name="deporte" id="futbol-soccer-boton" value="futbol" onclick="escogeDeporte()">
<!-- <label for="futbol-boton">Futbol Infantil y Juvenil</label> -->
<img src="icon/futbol-soccer.png" alt="puerto rico futbol soccer infantil" class="select-img">
</div>

<div  id="volibol-inputbox-div">
<input type="radio" name="deporte" id="volibol-boton" value="voly" onclick="escogeDeporte()" checked>            
<!-- <label for="volibol-boton">Volibol Infantil y Juvenil</label> -->
<img src="icon/volibol.png" alt="puerto rico voleibol infantil" class="select-img">
</div>

</fieldset>
</form>

<script type="text/javascript">
  escogeDeporte();
  escogeArea();
</script>
</div><!-- end of selecciona -->



<!---------------------------------------------------------------------------------------------------->
<div id="links">
<fieldset>
<div class="link">
<a href="ponlo.htm"><img src="icon/camera.png" alt="camera-icon"><span>Ponlo en 4bolas.</span><img src="icon/pencil.png" alt="pencil-icon"></a>
</div>
</fieldset>
</div><!-- end of postea -->



<!---------------------------------------------------------------------------------------------------->
<div id="mensaje">
<div class="fotoentradas" id="uno"></div>
<div class="fotoentradas" id="dos"></div>
<div class="fotoentradas" id="tres"></div>
<script type="text/javascript">
  <?php require_once 'escritos/php/portada.php'; ?>
  var entry  = <?php echo json_encode($entry); ?>;
  var mqSmall = window.matchMedia("screen and (max-width: 700px)");
  var mqMedium = window.matchMedia("screen and (min-width: 701px) and (max-width: 1200px)");
  var mqBig = window.matchMedia("screen and (min-width: 1201px)");  
  mqSmall.addListener( cambioSmall );
  mqMedium.addListener( cambioMedium );
  mqBig.addListener( cambioBig );
  showing = 0;
  cambioSmall( mqSmall ); 
  cambioMedium( mqMedium );
  cambioBig( mqBig );
  //showArray();
</script>
</div><!-- end mensaje-->



<!---------------------------------------------------------------------------------------------------->
<div id="despedida">
4 bolas. Hecho en Puerto Rico. Feito em Puerto Rico. Made in Puerto Rico.
</div><!--end of despedida-->


          
</div><!-- end of papel-->
</body>
</html>