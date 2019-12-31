<?php
//columnas en entrada (postgreSQL)
//$id = $entrada[0];           $deporte = $entrada[1];       $area  = $entrada[2];  
//$tag3 = $entrada[3];         $tag4 = $entrada[4];          $tag5  = $entrada[5];  
//$tiempo-diff = $entrada[6];  $comentario = $entrada[7]     tiempo = $entrada[8]; 

//columnas en foto (postgreSQL)   
//id = foto[0]     ancho = foto[1]     alto = foto[2]   tipo = foto[3]     entradaid = foto[4]

//columnas en entries[aQuery][anEntry]
// 0 id     1 fecha    2 deporte foto path  3 area exp     4 tag3
// 5 tag4   6 tag5     7 comentario         8 fotopath     9 alto foto   10 ancho foto

require_once HOST_FS_ROOT . 'escritos/php/sacalo/que/buildQueries.php';
$searchModeAndQueries = buildQueries();
$searchMode     = $searchModeAndQueries[0];
$basicQueries   = $searchModeAndQueries[1];
$tagWordQueries = $searchModeAndQueries[2];

if( strcmp($searchMode, "home") == 0 || strcmp($searchMode, "deporte") == 0 || strcmp($searchMode, "area") == 0) {
    $entries = doQueries($basicQueries, $searchMode);
}elseif( strcmp($searchMode, "tagWord") == 0){                                                                        
    $entries = doQueries($tagWordQueries, $searchMode);
}

/*
use empty ?
if(count($entries[0]) == 0 && count($entries[1]) == 0  && count($entries[2]) == 0){
  $mensaje1 = 'D\'Oh!<br>No lo encontre.<br>Ni el acento de la e.';
  $mensaje2 = 'No se encontro ninguna entrada, deberia ser buscando tag.';
  brega_error($mensaje1, $mensaje2);
}
*/




function doQueries($queriesArray, $searchMode){
$aQuery = 0;
while($aQuery < count($queriesArray)){
  require_once HOST_FS_ROOT . 'escritos/php/config/conecta.php';
  if( ! $entradasarray = pg_query($cxn, $queriesArray[$aQuery]) ){
      $mensaje1 = 'Error loading entries.';
      $mensaje2 = 'No tengo el PHP resource para sacar entradas. ' . HOST_FS_ROOT . 'escritos/php/sacalo/sacalo.php: ' . pg_result_error($cxn);    
      pg_close($cxn);  
      brega_error($mensaje1,$mensaje2);  
      exit();
  }
  $anEntry = 0;
  while($entrada = pg_fetch_row($entradasarray)){
      if( ! $fotosarray = pg_query($cxn, sprintf("SELECT * FROM foto WHERE entradaid=%s;" , $entrada[0])) ){
        $mensaje1 = 'Error loading fotos.';
        $mensaje2 = 'No tengo el PHP resource para sacar fotos. ' . HOST_FS_ROOT . 'escritos/php/sacalo/sacalo.php: ' . pg_result_error($cxn); 
        pg_free_result($entradasarray);
        pg_close($cxn);
        brega_error($mensaje1,$mensaje2); 
        exit();
      }      
      require_once HOST_FS_ROOT . 'escritos/php/sacalo/como/masaje.php';
      $entries[$aQuery][$anEntry][0] = $entrada[0];
      $entries[$aQuery][$anEntry][1] = getTimeExpression($entrada[6], $entrada[8]);
      $entries[$aQuery][$anEntry][2] = getDeporteFotopath($entrada[1]);
      $entries[$aQuery][$anEntry][3] = getAreaExpression($entrada[2]); 
      $entries[$aQuery][$anEntry][4] = $entrada[3];
      $entries[$aQuery][$anEntry][5] = $entrada[4];
      $entries[$aQuery][$anEntry][6] = $entrada[5];
      if( is_null($entrada[7]) )$entries[$aQuery][$anEntry][7] = '';
      else $entries[$aQuery][$anEntry][7] = $entrada[7];  
      //el if funciona pq tengo 1 row con foto o ningun row con foto, si hubieran mas necesitaba un while 
      // usar el id de la entrada como path de la foto ($foto[4]),  tambien asume q hay solo una foto por fotoentrada   
      if($foto = pg_fetch_row($fotosarray)){
        $entries[$aQuery][$anEntry][8] = str_pad($foto[4], 9, '0', STR_PAD_LEFT) . '.' . $fotoTipo[$foto[3]]; 
        //postGre Integer goes from -2GB to -1+2Gb, usare 1Gb de espacios, from 0 to 999,999,999 that requires nine decimal digits
        //STR_PAD_LEFT rellena de ceros hasta 9 digitos 
        $entries[$aQuery][$anEntry][9]  = $foto[1]; // ancho  de la foto
        $entries[$aQuery][$anEntry][10] = $foto[2]; // alto   de la foto
      }else{
        $entries[$aQuery][$anEntry][8]  = ''; //no foto
        $entries[$aQuery][$anEntry][9]  = 0;  //ancho
        $entries[$aQuery][$anEntry][10] = 0;  //alto 
      }
      pg_free_result($fotosarray);    

      $anEntry++;
  }// while fetching entradasarray rows into entrada
  if(!isset($entries[$aQuery]))  $entries[$aQuery] = "no entries for this query. searchMode:" . $searchMode . ". Query index:" . $aQuery;   //to avoid non sequential php arrays, specially in tagWord mode
  $aQuery++;
}// end while aQuery
pg_free_result($entradasarray);
pg_close($cxn);  
return $entries;
} //function


?>
