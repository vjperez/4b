<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>4 bolas</title>
<link rel="stylesheet" type="text/css" href="estilo/comun.css">
<link rel="stylesheet" type="text/css" href="estilo/portada.css">

<link rel="stylesheet" type="text/css" media='screen and (max-width: 700px)' href="estilo/portadaSmall.css">
<link rel='stylesheet' type="text/css" media='screen and (min-width: 701px) and (max-width: 1200px)' href='estilo/portadaMedium.css'>
<link rel='stylesheet' type="text/css" media='screen and (min-width: 1201px)' href='estilo/portadaBig.css'>
<!--
<link rel='stylesheet' type="text/css" media='screen and (min-width: 1025px)' href='estilo/portada-1000.css'>
<link rel='stylesheet' type="text/css" media='screen and (min-width: 1260px)' href='estilo/portada-1250.css'>
-->
<script type="text/javascript" src="escritos/js/portada.js"></script>
</head>
<body>
    
    
<div class="papel">
    
    
<div id="titulo" class="palcentro">
<a href='portada.php'><img src="foto/bkt.png" alt="foto"></a>
<a href='portada.php'><img src="foto/bsbl.png" alt="foto"></a>
<a href='portada.php'><img src="foto/ftbl.png" alt="foto"></a>
<a href='portada.php'><img src="foto/vlly.png" alt="foto"></a>
</div><!--end of titulo--> 


<div id="mensaje" class="palcentro">


<div class="aclara"></div>
<div class="vaciocien"></div>
<div class="aclara"></div>
<div class="vaciocien"></div>

  
<!---------------------------------------------------------------------------------------------------->
<div class="vaciocien"></div>
<div class="vacio2ymedio"></div>
<div class="lkentry1-2 palaizq lk">
<a href="ponlo.htm"><img src="foto/camera.png" alt="foto"><span>Ponlo en 4bolas.</span></a>
</div>
<div class="vacio2ymedio"></div>
<div class="lkentry1-2 palaizq lk">
<a href="ponlocomentario.htm"><img src="foto/pencil.png" alt="foto"><span>Ponlo en 4bolas.</span></a>
</div>
<div class="vacio2ymedio"></div>
<div class="aclara"></div>
<div class="vaciocien"></div>
<!---------------------------------------------------------------------------------------------------->


<div class="aclara"></div>
<div class="vaciocien"></div>


<!---------------------------------------------------------------------------------------------------->
<form action="#" method="POST">    
<fieldset id="sefue">
<div class="aclara"></div>
<div class="vaciocien"></div>
<div class="vacio2ymedio"></div>
<div class="lkentry1-2 palaizq" id="bktckbx">
<input type="checkbox" name="deporte" id="baloncestock" value="baloncesto" onclick="escogeDeporte()" checked>
<label for="baloncestock">Baloncesto Infantil y Juvenil</label>
<img src="foto/bkt.png" alt="foto" class="sportimg">
</div>
<div class="vacio2ymedio"></div>
<div class="lkentry1-2 palaizq" id="bsblckbx">
<input type="checkbox" name="deporte" id="beisbolck" value="beisbol" onclick="escogeDeporte()">
<label for="beisbolck">Beisbol Infantil y Juvenil</label>
<img src="foto/bsbl.png" alt="foto" class="sportimg">
</div>
<div class="vacio2ymedio"></div>

<div class="aclara"></div>
<div class="vaciocien"></div>

<div class="vacio2ymedio"></div>
<div class="lkentry1-2 palaizq" id="ftblckbx">
<input type="checkbox" name="deporte" id="futbolck" value="futbol" onclick="escogeDeporte()">
<label for="futbolck">Futbol Infantil y Juvenil</label>
<img src="foto/ftbl.png" alt="foto" class="sportimg">
</div>
<div class="vacio2ymedio"></div>
<div class="lkentry1-2 palaizq" id="vllyckbx">
<input type="checkbox" name="deporte" id="volyck" value="voly" onclick="escogeDeporte()" checked>            
<label for="volyck">Volleyball Infantil y Juvenil</label>
<img src="foto/vlly.png" alt="foto" class="sportimg">
</div>
<div class="vacio2ymedio"></div>
<div class="aclara"></div>
<div class="vaciocien"></div> 
</fieldset>
</form>
<script type="text/javascript">
  escogeDeporte();
</script>
 
<!---------------------------------------------------------------------------------------------------->

<div class="fotoentradas" id="uno"></div>
<div class="fotoentradas" id="dos"></div>
<div class="fotoentradas" id="tres"></div>
<!----------------------------------------------------------------------------------------------------> 
<?php
$mensaje1 = '';
$mensaje2 = '';
$entry = array();
//columnas en entry[tal]
// 0 alto    1 fecha    2 deporte foto path    3 nivel exp     4 tag3     5 tag4     6 tag5     7 comentario   8 fotopath

//columnas en fotoentrada
//$id = $row[0];  $deporte = $row[1];  //$nivel = $row[2];  //$tag3 = $row[3];  //$tag4 = $row[4];  //$tag5 = $row[5];  //$tiempo = $row[6];  //$comentario = $row[7]; 

//columnas en foto   
//id = foto[0]     ancho = foto[1]     alto = foto[2]   tipo = foto[3]     fotoentradaid = foto[4]
require_once 'escritos/php/datosConfig.php';
require_once 'escritos/php/conecta.php';
require_once 'escritos/php/muestralo_masajeout.php';



$elQuery = "SELECT * FROM fotoentrada;";
if(isset($_REQUEST['x'])) { $var = $_REQUEST['x'];   $elQuery = "SELECT * FROM fotoentrada WHERE deporte=$var;"; }
if(isset($_REQUEST['y'])) { $var = $_REQUEST['y'];   $elQuery = "SELECT * FROM fotoentrada WHERE nivel=$var;"; }



if( ! $entradasarray = mysqli_query($cxn, $elQuery) ){
  $mensaje1 = 'No tengo arreglo de entradas.';
  $mensaje2 = 'portada.php: ' . mysqli_error($cxn);    
  mysqli_close($cxn);  
  brega_error($mensaje1,$mensaje2);  
}
$tal = 0;
while($row = mysqli_fetch_array($entradasarray, MYSQLI_NUM)){
  if( ! $fotosarray = mysqli_query($cxn, sprintf("SELECT * FROM foto WHERE fotoentradaid=%s;" , $row[0])) ){
    $mensaje1 = 'No tengo arreglo de fotos.';
    $mensaje2 = 'portada.php: ' . mysqli_error($cxn); 
    mysqli_free_result($entradasarray);
    mysqli_close($cxn);
    brega_error($mensaje1,$mensaje2); 
  }          
  if($foto = mysqli_fetch_array($fotosarray, MYSQLI_NUM)){
    $entry[$tal][0] = $foto[2]; // alto de la foto
    $entry[$tal][8] = $foto[4] . '.' . $fotoTipo[$foto[3]]; // usar el id de la fotoentrada como path de la foto tambien asume q hay solo una foto por fotoentrada
  }else{
    $entry[$tal][0] = 0;  
    $entry[$tal][8] = '';
  }    
  $entry[$tal][1] = $row[6];
  $entry[$tal][2] = getdeportefotopath($row[1]);
  $entry[$tal][3] = getnivelexpression($row[2]); 
  $entry[$tal][4] = $row[3];
  $entry[$tal][5] = $row[4];
  $entry[$tal][6] = $row[5];
  if( is_null($row[7]) )$entry[$tal][7] = '';
  else $entry[$tal][7] = $row[7];
           
  $tal++;
}// while rows
mysqli_free_result($fotosarray);
mysqli_free_result($entradasarray);
mysqli_close($cxn);
?> 
<script type="text/javascript">
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
<!---------------------------------------------------------------------------------------------------->


<div class="aclara"></div>
<div class="vaciocien"></div>
<div class="aclara"></div>
<div class="vaciocien"></div>
<div class="aclara"></div>
<div class="vaciocien"></div>
<div class="aclara"></div>
<div class="vaciocien"></div>


<!---------------------------------------------------------------------------------------------------->
<form action="#">
<legend></legend>
<div class="aclara"></div>
<div class="vaciocien"></div>
<div id="bt">
<button type="submit" id="lessbtn"><img src="foto/l.png" alt=""></button>
<button type="submit" id="morebtn"><img src="foto/r.png" alt=""></button>
</div>
</form>    
<!---------------------------------------------------------------------------------------------------->


<div class="aclara"></div>
<div class="vaciocien"></div>
<div class="aclara"></div>
<div class="vaciocien"></div>
<div class="aclara"></div>
<div class="vaciocien"></div>
<div class="aclara"></div>
<div class="vaciocien"></div>


</div><!-- end mensaje-->


<div id="despedida" class="palcentro">
4 bolas. Hecho en Puerto Rico. Feito em Puerto Rico. Made in Puerto Rico.
</div><!--end of despedida-->
          

</div><!-- end papel-->
</body>
</html>
