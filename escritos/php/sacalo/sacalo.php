<?php
$mensaje1 = '';
$mensaje2 = '';
$entries  = array(array(), array(), array());
//columnas en entries[index][tal]
// 0 alto    1 fecha    2 deporte foto path    3 area exp     4 tag3     5 tag4     6 tag5     7 comentario   8 fotopath

//columnas en entrada
//$id = $entrada[0];  $deporte = $entrada[1];  //$area = $entrada[2];  //$tag3 = $entrada[3];  //$tag4 = $entrada[4];  //$tag5 = $entrada[5];  //$tiempo-diff = $entrada[6];  //$comentario = $entrada[7]   //tiempo = $entrada[8]; 

//columnas en foto   
//id = foto[0]     ancho = foto[1]     alto = foto[2]   tipo = foto[3]     entradaid = foto[4]
require_once 'escritos/php/config/datosConfig.php';  //    ../config/datosConfig.php
require_once HOST_FS_ROOT . 'escritos/php/config/conecta.php';
require_once HOST_FS_ROOT . 'escritos/php/sacalo/sacalo_masajeout.php';

$dbQueries = setDbQueries();


// do pg queries
$index = 0;
while($index < count($entries)){
  if ($dbQueries[$index] != ''){
      if( ! $entradasarray = pg_query($cxn, $dbQueries[$index]) ){
          $mensaje1 = 'Error loading entries.';
          $mensaje2 = 'No tengo el PHP resource para sacar entradas. ' . HOST_FS_ROOT . 'escritos/php/sacalo/sacalo.php: ' . pg_result_error($cxn);    
          pg_close($cxn);  
          brega_error($mensaje1,$mensaje2);  
      }
      $tal = 0;
      while($entrada = pg_fetch_row($entradasarray)){
          if( ! $fotosarray = pg_query($cxn, sprintf("SELECT * FROM foto WHERE entradaid=%s;" , $entrada[0])) ){
            $mensaje1 = 'Error loading fotos.';
            $mensaje2 = 'No tengo el PHP resource para sacar fotos. ' . HOST_FS_ROOT . 'escritos/php/sacalo/sacalo.php: ' . pg_result_error($cxn); 
            pg_free_result($entradasarray);
            pg_close($cxn);
            brega_error($mensaje1,$mensaje2); 
          }      
          //el if funciona pq tengo 1 row con foto o ningun row con foto, si hubieran mas necesitaba un while    
          if($foto = pg_fetch_row($fotosarray)){
            $entries[$index][$tal][0] = $foto[2]; // alto de la foto
            $entries[$index][$tal][8] = str_pad($foto[4], 9, '0', STR_PAD_LEFT) . '.' . $fotoTipo[$foto[3]]; // usar el id de la entrada como path de la foto tambien asume q hay solo una foto por fotoentrada
            //postGre Integer goes from -2GB to -1+2Gb, usare 1Gb de espacios, from 0 to 999,999,999 that requires nine decimal digits
            //STR_PAD_LEFT rellena de ceros hasta 9 digitos 
          }else{
            $entries[$index][$tal][0] = 0;  
            $entries[$index][$tal][8] = '';
          }
          pg_free_result($fotosarray);    
          $entries[$index][$tal][1] = getTimeExpression($entrada[6], $entrada[8]);
          $entries[$index][$tal][2] = getDeporteFotopath($entrada[1]);
          $entries[$index][$tal][3] = getAreaExpression($entrada[2]); 
          $entries[$index][$tal][4] = $entrada[3];
          $entries[$index][$tal][5] = $entrada[4];
          $entries[$index][$tal][6] = $entrada[5];
          if( is_null($entrada[7]) )$entries[$index][$tal][7] = '';
          else $entries[$index][$tal][7] = $entrada[7];   
          $tal++;
      }// while rows
  }
$index++;
}// end do pg queries
pg_free_result($entradasarray);
pg_close($cxn);
if(count($entries[0]) == 0 && count($entries[1]) == 0  && count($entries[2]) == 0){
  $mensaje1 = 'D\'Oh!<br>No lo encontre.<br>Ni el acento de la e.';
  $mensaje2 = 'No se encontro ninguna entrada, deberia ser buscando tag.';
  brega_error($mensaje1, $mensaje2);
}
?>
