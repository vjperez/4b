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
require_once 'escritos/php/config/datosConfig.php';
require_once 'escritos/php/config/conecta.php';
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