<?php
$mensaje1 = '';
$mensaje2 = '';
$entries0 = array();
$entries1 = array();
$entries2 = array();

//columnas en baseEntries[tal]
// 0 alto    1 fecha    2 deporte foto path    3 area exp     4 tag3     5 tag4     6 tag5     7 comentario   8 fotopath

//columnas en fotoentrada
//$id = $row[0];  $deporte = $row[1];  //$area = $row[2];  //$tag3 = $row[3];  //$tag4 = $row[4];  //$tag5 = $row[5];  //$tiempo-diff = $row[6];  //$comentario = $row[7]   //tiempo = $row[8]; 

//columnas en foto   
//id = foto[0]     ancho = foto[1]     alto = foto[2]   tipo = foto[3]     fotoentradaid = foto[4]
require_once 'escritos/php/config/datosConfig.php';  //    ../config/datosConfig.php
require_once HOST_FS_ROOT . 'escritos/php/config/conecta.php';
require_once HOST_FS_ROOT . 'escritos/php/sacalo/sacalo_masajeout.php';

$dbQueries = setDbQueries();
$entries = array($entries0, $entries1, $entries2);

$index = 0;
while($index < 3){
if ($dbQueries[$index] != ''){
  if( ! $entradasarray = pg_query($cxn, $dbQueries[$index]) ){
    $mensaje1 = 'Error loading entries.';
    $mensaje2 = $dbQueries[$index] . '<br>' . 'No tengo arreglo de entradas extras. (Ni vacio!)' . '<br>' . HOST_FS_ROOT . 'escritos/php/sacalo/sacalo.php: ' . pg_last_error($cxn);    
    pg_close($cxn);  
    brega_error($mensaje1,$mensaje2);  
  }
  $tal = 0;
  while($row = pg_fetch_row($entradasarray)){
    if( ! $fotosarray = pg_query($cxn, sprintf("SELECT * FROM foto WHERE entradaid=%s;" , $row[0])) ){
      $mensaje1 = 'Error loading fotos.';
      $mensaje2 = 'No tengo arreglo de fotos. (Ni vacio!)' . '<br>' . HOST_FS_ROOT . 'escritos/php/sacalo/sacalo.php: ' . pg_last_error($cxn); 
      pg_free_result($entradasarray);
      pg_close($cxn);
      brega_error($mensaje1,$mensaje2); 
    }      
    //el if funciona pq tengo 1 o ninguna foto, si hubieran mas necesitaba un while    
    if($foto = pg_fetch_row($fotosarray)){
      $entries[$index][$tal][0] = $foto[2]; // alto de la foto
      $entries[$index][$tal][8] = $foto[4] . '.' . $fotoTipo[$foto[3]]; // usar el id de la fotoentrada como path de la foto tambien asume q hay solo una foto por fotoentrada
    }else{
      $entries[$index][$tal][0] = 0;  
      $entries[$index][$tal][8] = '';
    }
    pg_free_result($fotosarray);    
    $entries[$index][$tal][1] = getTimeExpression($row[6], $row[8]);
    $entries[$index][$tal][2] = getDeporteFotopath($row[1]);
    $entries[$index][$tal][3] = getAreaExpression($row[2]); 
    $entries[$index][$tal][4] = $row[3];
    $entries[$index][$tal][5] = $row[4];
    $entries[$index][$tal][6] = $row[5];
    if( is_null($row[7]) )$entries[$index][$tal][7] = '';
    else $entries[$index][$tal][7] = $row[7];
           
    $tal++;
  }// while rows
}
$index++;
}
pg_free_result($entradasarray);
pg_close($cxn);
?>
