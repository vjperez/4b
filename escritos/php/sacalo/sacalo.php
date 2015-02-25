<?php
$mensaje1 = '';
$mensaje2 = '';
$entry = array();
//columnas en entry[tal]
// 0 alto    1 fecha    2 deporte foto path    3 area exp     4 tag3     5 tag4     6 tag5     7 comentario   8 fotopath

//columnas en fotoentrada
//$id = $row[0];  $deporte = $row[1];  //$area = $row[2];  //$tag3 = $row[3];  //$tag4 = $row[4];  //$tag5 = $row[5];  //$tiempo-diff = $row[6];  //$comentario = $row[7]   //tiempo = $row[8]; 

//columnas en foto   
//id = foto[0]     ancho = foto[1]     alto = foto[2]   tipo = foto[3]     fotoentradaid = foto[4]
require_once 'escritos/php/config/datosConfig.php';  //    ../config/datosConfig.php
require_once HOST_FS_ROOT . 'escritos/php/config/conecta.php';
require_once HOST_FS_ROOT . 'escritos/php/sacalo/sacalo_masajeout.php';

if(isset($_REQUEST['deporte'])) { 
	$var = $_REQUEST['deporte']; 
	$var = $var % 4;    
	$elQuery = "SELECT id, deporte, area, tag3, tag4, tag5, TIMESTAMPDIFF(MINUTE, tiempo, CURRENT_TIMESTAMP), comentario, tiempo 
	FROM fotoentrada WHERE ver=1 && deporte=$var;"; 
}else if(isset($_REQUEST['area'])) { 
	$var = $_REQUEST['area'];
	$var = $var % 4;   
	$elQuery = "SELECT id, deporte, area, tag3, tag4, tag5, TIMESTAMPDIFF(MINUTE, tiempo, CURRENT_TIMESTAMP), comentario, tiempo 
	FROM fotoentrada WHERE ver=1 && area=$var;"; 
}else if(isset($_REQUEST['rotulo'])) { 
	$var = $_REQUEST['rotulo'];
	$elQuery = "SELECT id, deporte, area, tag3, tag4, tag5, TIMESTAMPDIFF(MINUTE, tiempo, CURRENT_TIMESTAMP), comentario, tiempo 
	FROM fotoentrada WHERE ver=1 && (tag3 like '%$var%' || tag4 like '%$var%' || tag5 like '%$var%');"; 
}else{
    $elQuery = "SELECT id, deporte, area, tag3, tag4, tag5, TIMESTAMPDIFF(MINUTE, tiempo, CURRENT_TIMESTAMP), comentario, tiempo  
	FROM fotoentrada WHERE ver=1;";	
}

if( ! $entradasarray = mysqli_query($cxn, $elQuery) ){
  $mensaje1 = 'No entries.';
  $mensaje2 = 'No tengo arreglo de entradas. (Ni vacio!)' . '<br>' . HOST_FS_ROOT . 'escritos/php/sacalo/sacalo.php: ' . mysqli_error($cxn);    
  mysqli_close($cxn);  
  brega_error($mensaje1,$mensaje2);  
}
$tal = 0;
while($row = mysqli_fetch_array($entradasarray, MYSQLI_NUM)){
  if( ! $fotosarray = mysqli_query($cxn, sprintf("SELECT * FROM foto WHERE fotoentradaid=%s;" , $row[0])) ){
    $mensaje1 = 'No se encontro la foto.';
    $mensaje2 = 'No tengo arreglo de fotos. (Ni vacio!)' . '<br>' . HOST_FS_ROOT . 'escritos/php/sacalo/sacalo.php: ' . mysqli_error($cxn); 
    mysqli_free_result($entradasarray);
    mysqli_close($cxn);
    brega_error($mensaje1,$mensaje2); 
  }      
  //este if asume que tengo 1 o ninguna foto    
  if($foto = mysqli_fetch_array($fotosarray, MYSQLI_NUM)){
    $entry[$tal][0] = $foto[2]; // alto de la foto
    $entry[$tal][8] = $foto[4] . '.' . $fotoTipo[$foto[3]]; // usar el id de la fotoentrada como path de la foto tambien asume q hay solo una foto por fotoentrada
  }else{
    $entry[$tal][0] = 0;  
    $entry[$tal][8] = '';
  }    
  $entry[$tal][1] = getTimeExpression($row[6], $row[8]);
  $entry[$tal][2] = getDeporteFotopath($row[1]);
  $entry[$tal][3] = getAreaExpression($row[2]); 
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
