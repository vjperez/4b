<?php
$mensaje1 = '';
$mensaje2 = '';
$baseEntries = array();
$extraEntries1 = array();
$extraEntries2 = array();

//columnas en baseEntries[tal]
// 0 alto    1 fecha    2 deporte foto path    3 area exp     4 tag3     5 tag4     6 tag5     7 comentario   8 fotopath

//columnas en fotoentrada
//$id = $row[0];  $deporte = $row[1];  //$area = $row[2];  //$tag3 = $row[3];  //$tag4 = $row[4];  //$tag5 = $row[5];  //$tiempo-diff = $row[6];  //$comentario = $row[7]   //tiempo = $row[8]; 

//columnas en foto   
//id = foto[0]     ancho = foto[1]     alto = foto[2]   tipo = foto[3]     fotoentradaid = foto[4]
require_once 'escritos/php/config/datosConfig.php';  //    ../config/datosConfig.php
require_once HOST_FS_ROOT . 'escritos/php/config/conecta.php';
require_once HOST_FS_ROOT . 'escritos/php/sacalo/sacalo_masajeout.php';

if(isset($_REQUEST['q'])){
	$q = $_REQUEST['q'];
	if(queryFormat($q)){  // q esta seteado y con buen format
	    $deporte = $q[1]; 
	    $area = $q[3]; 	
	  if($q[0] == '2' || $q[0] == '4'){   
	    $baseQuery = "SELECT id, deporte, area, tag3, tag4, tag5, TIMESTAMPDIFF(MINUTE, tiempo, CURRENT_TIMESTAMP), comentario, tiempo 
	    FROM fotoentrada WHERE ver=1 AND deporte=$deporte AND area=$area ORDER BY tiempo DESC;"; 
	    if($q[0] == '2'){ // cliqueo deporte so el extra ... es el mismo deporte pero en OTROS lugares 
	      $extraQuery1 = "SELECT id, deporte, area, tag3, tag4, tag5, TIMESTAMPDIFF(MINUTE, tiempo, CURRENT_TIMESTAMP), comentario, tiempo 
	      FROM fotoentrada WHERE ver=1 AND deporte=$deporte AND area<>$area ORDER BY tiempo DESC;"; 	   	  
	      $extraQuery2 = '';
	    }else if($q[0] == '4'){ // cliqueo area so el extra ... es la misma area pero en OTROS deportes 
	      $extraQuery1 = "SELECT id, deporte, area, tag3, tag4, tag5, TIMESTAMPDIFF(MINUTE, tiempo, CURRENT_TIMESTAMP), comentario, tiempo 
	      FROM fotoentrada WHERE ver=1 AND deporte<>$deporte AND area=$area ORDER BY tiempo DESC;"; 
	      $extraQuery2 = '';	 
	    }
	  }else{ // aqui se q $q[0] es '8' pq ya se q es un query que paso los test de queryFormat()
	  //tienes q explotar $q   ($var = tag literal del url q viene dado como 80808:tag literal:partes de tags) y sacar 'tag literal' 
	  //para usarlo en baseQuery y sacar partes de tags para usarlo en extraQuery
	  
	  //Si no defines $rotulo, php lo define como $rotulo=''; y machea todo
		  $arreglo = explode(':', $q);
	      $rotuloLiteral = $arreglo[1];
	      $baseQuery = "SELECT id, deporte, area, tag3, tag4, tag5, TIMESTAMPDIFF(MINUTE, tiempo, CURRENT_TIMESTAMP), comentario, tiempo 
	      FROM fotoentrada WHERE ver=1 AND (tag3 like '%$rotuloLiteral%' OR tag4 like '%$rotuloLiteral%' OR tag5 like '%$rotuloLiteral%') AND (deporte=$deporte AND area=$area) ORDER BY tiempo DESC;"; 
	      $extraQuery1 = "SELECT id, deporte, area, tag3, tag4, tag5, TIMESTAMPDIFF(MINUTE, tiempo, CURRENT_TIMESTAMP), comentario, tiempo 
	      FROM fotoentrada WHERE ver=1 AND (tag3 like '%$rotuloLiteral%' OR tag4 like '%$rotuloLiteral%' OR tag5 like '%$rotuloLiteral%') AND ((deporte<>$deporte AND area=$area) OR (deporte=$deporte AND area<>$area)) ORDER BY tiempo DESC;";	
	      //$extraQuery2 = "SELECT id, deporte, area, tag3, tag4, tag5, TIMESTAMPDIFF(MINUTE, tiempo, CURRENT_TIMESTAMP), comentario, tiempo 
	      //FROM fotoentrada WHERE ver=1 AND (tag3 like '%$rotuloLiteral%' OR tag4 like '%$rotuloLiteral%' OR tag5 like '%$rotuloLiteral%') AND (deporte<>$deporte AND area<>$area) ORDER BY tiempo DESC;";
	      $extraQuery2 = "SELECT id, deporte, area, tag3, tag4, tag5, TIMESTAMPDIFF(MINUTE, tiempo, CURRENT_TIMESTAMP), comentario, tiempo 
	      FROM fotoentrada WHERE ver=1 AND (tag3 like '%$rotuloLiteral%' OR tag4 like '%$rotuloLiteral%' OR tag5 like '%$rotuloLiteral%') AND (deporte<>$deporte AND area<>$area) ORDER BY tiempo DESC;";
	   
	   /*  
		  $index = 2; //chequeando solo los rotulos explotados q son los q estan del index 2 pa lante
          while( $index < count($arreglo) ){
            $rotulo = $arreglo[$index];
            $extraQueryConditionRotuloExplotado += ":WHERE ver=1 AND (tag3 like '%$rotulo%' OR tag4 like '%$rotulo%' OR tag5 like '%$rotulo%') AND (deporte=$deporte OR area=$area)";
            $index++;
          }  
	   */
	     
	      //cuando MySQL machea tags es CASE SENSITIVE? 
	      //la funcion ctype_alnum() en queryFormat no protesta si cambian una letra en el URL por mayuscula mientras q los rotulos explotados llos defines como minusculas en explota
	  }
	  
    }else{ // q esta seteado pero con bad format (un hacker);
      $baseQuery = "SELECT id, deporte, area, tag3, tag4, tag5, TIMESTAMPDIFF(MINUTE, tiempo, CURRENT_TIMESTAMP), comentario, tiempo  
	  FROM fotoentrada WHERE ver=1 ORDER BY tiempo DESC;";
	  $extraQuery1 = '';
	  $extraQuery2 = '';		
	}
}else{ // q NO esta seteado
    $baseQuery = "SELECT id, deporte, area, tag3, tag4, tag5, TIMESTAMPDIFF(MINUTE, tiempo, CURRENT_TIMESTAMP), comentario, tiempo  
	FROM fotoentrada WHERE ver=1 ORDER BY tiempo DESC;";
	$extraQuery1 = '';
	$extraQuery2 = '';	
}

/////////////////////////////////////  do baseQuery  ////////////////////// 
if( ! $entradasarray = mysqli_query($cxn, $baseQuery) ){
  $mensaje1 = 'No entries.';
  $mensaje2 = 'No tengo arreglo de entradas bases. (Ni vacio!)' . '<br>' . HOST_FS_ROOT . 'escritos/php/sacalo/sacalo.php: ' . mysqli_error($cxn);    
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
    $baseEntries[$tal][0] = $foto[2]; // alto de la foto
    $baseEntries[$tal][8] = $foto[4] . '.' . $fotoTipo[$foto[3]]; // usar el id de la fotoentrada como path de la foto tambien asume q hay solo una foto por fotoentrada
  }else{
    $baseEntries[$tal][0] = 0;  
    $baseEntries[$tal][8] = '';
  }
  mysqli_free_result($fotosarray);    
  $baseEntries[$tal][1] = getTimeExpression($row[6], $row[8]);
  $baseEntries[$tal][2] = getDeporteFotopath($row[1]);
  $baseEntries[$tal][3] = getAreaExpression($row[2]); 
  $baseEntries[$tal][4] = $row[3];
  $baseEntries[$tal][5] = $row[4];
  $baseEntries[$tal][6] = $row[5];
  if( is_null($row[7]) )$baseEntries[$tal][7] = '';
  else $baseEntries[$tal][7] = $row[7];
           
  $tal++;
}// while rows

//si el size entradasarray == 0; o sea no tienes rows; entonces alguien hizo un search o alguien cambio el url a mano

//mysqli_free_result($entradasarray);
//mysqli_close($cxn);
/////////////////////////////////////  END OF do baseQuery  ////////////////////// 



/////////////////////////////////////  do extraQuery 1 ////////////////////// 
if ($extraQuery1 == ''){
	;
}else{
	
  if( ! $entradasarray = mysqli_query($cxn, $extraQuery1) ){
    $mensaje1 = 'No entries.';
    $mensaje2 = $extraQuery1 . '<br>' . 'No tengo arreglo de entradas extras. (Ni vacio!)' . '<br>' . HOST_FS_ROOT . 'escritos/php/sacalo/sacalo.php: ' . mysqli_error($cxn);    
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
      $extraEntries1[$tal][0] = $foto[2]; // alto de la foto
      $extraEntries1[$tal][8] = $foto[4] . '.' . $fotoTipo[$foto[3]]; // usar el id de la fotoentrada como path de la foto tambien asume q hay solo una foto por fotoentrada
    }else{
      $extraEntries1[$tal][0] = 0;  
      $extraEntries1[$tal][8] = '';
    }
    mysqli_free_result($fotosarray);    
    $extraEntries1[$tal][1] = getTimeExpression($row[6], $row[8]);
    $extraEntries1[$tal][2] = getDeporteFotopath($row[1]);
    $extraEntries1[$tal][3] = getAreaExpression($row[2]); 
    $extraEntries1[$tal][4] = $row[3];
    $extraEntries1[$tal][5] = $row[4];
    $extraEntries1[$tal][6] = $row[5];
    if( is_null($row[7]) )$extraEntries1[$tal][7] = '';
    else $extraEntries1[$tal][7] = $row[7];
           
    $tal++;
  }// while rows

  //si el size entradasarray == 0; o sea no tienes rows; entonces alguien hizo un search o alguien cambio el url a mano

  //mysqli_free_result($entradasarray);
  //mysqli_close($cxn);
}
/////////////////////////////////////  END OF do extraQuery 1 //////////////////////


/////////////////////////////////////  do extraQuery 2 ////////////////////// 
if ($extraQuery2 == ''){
	;
}else{
	
  if( ! $entradasarray = mysqli_query($cxn, $extraQuery2) ){
    $mensaje1 = 'No entries.';
    $mensaje2 = $extraQuery2 . '<br>' . 'No tengo arreglo de entradas extras. (Ni vacio!)' . '<br>' . HOST_FS_ROOT . 'escritos/php/sacalo/sacalo.php: ' . mysqli_error($cxn);    
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
      $extraEntries2[$tal][0] = $foto[2]; // alto de la foto
      $extraEntries2[$tal][8] = $foto[4] . '.' . $fotoTipo[$foto[3]]; // usar el id de la fotoentrada como path de la foto tambien asume q hay solo una foto por fotoentrada
    }else{
      $extraEntries2[$tal][0] = 0;  
      $extraEntries2[$tal][8] = '';
    }
    mysqli_free_result($fotosarray);    
    $extraEntries2[$tal][1] = getTimeExpression($row[6], $row[8]);
    $extraEntries2[$tal][2] = getDeporteFotopath($row[1]);
    $extraEntries2[$tal][3] = getAreaExpression($row[2]); 
    $extraEntries2[$tal][4] = $row[3];
    $extraEntries2[$tal][5] = $row[4];
    $extraEntries2[$tal][6] = $row[5];
    if( is_null($row[7]) )$extraEntries2[$tal][7] = '';
    else $extraEntries2[$tal][7] = $row[7];
           
    $tal++;
  }// while rows

  //si el size entradasarray == 0; o sea no tienes rows; entonces alguien hizo un search o alguien cambio el url a mano

  mysqli_free_result($entradasarray);
  mysqli_close($cxn);
}
/////////////////////////////////////  END OF do extraQuery2  //////////////////////
 
?>
