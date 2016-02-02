<?php
  function getDeporteFotopath($deporte){
    if($deporte == 0){
      $path = 'baloncesto.png';
    }else if($deporte == 1){
      $path =  'beisbol.png';
    }else if($deporte == 2){
      $path = 'futbol-soccer.png';
    }else if($deporte == 3){
      $path = 'volibol.png';  
    }
    return $path;
  }
  function getAreaExpression($area){
    if($area == 0){
      $exp = '  Norte';
    }else if($area == 1){
      $exp =  '  Sur';
    }else if($area == 2){
      $exp = '  Oeste';
    }else if($area == 3){
      $exp = '  Este';  
    }
    return $exp;
  }
 function getTimeExpression($minuteDiff, $timeString){
	$minuteDiff = (int)$minuteDiff; 
    if($minuteDiff < 60){
	  if ($minuteDiff == 0) $minuteDiff = 1;	
      $exp = 'Hace ' . $minuteDiff . ' minuto' . ($minuteDiff > 1?'s':'') . '.';	  
	}else if ($minuteDiff < (24 * 60) ){  
		$horas = (int)($minuteDiff / 60);    $minutes = $minuteDiff % 60;
        $exp = 'Hace ' . $horas . ' hora' . ($horas > 1?'s':'') . ($minutes == 0?'':' y ' . $minutes . ' minuto' . ($minutes > 1?'s':'')) . '.';
    }else if($minuteDiff < (7 * 24 * 60) ){
	    $dias = (int)($minuteDiff / (24 * 60));    $horas = ((int)($minuteDiff / 60)) - (24 * $dias);	
        $exp = 'Hace ' . $dias . ' dia' . ($dias > 1?'s':'') . ($horas == 0?'':' y ' . $horas . ' hora' . ($horas > 1?'s':'')) . '.';
    }else{
	  $timestamp = strtotime($timeString);
	  $exp = date("F j, Y", $timestamp) . '.';	
	}
    return $exp;
  }
  
function setDbQueries(){
  $dbQueryInit = "SELECT id, deporte, area, tag3, tag4, tag5, (EXTRACT(EPOCH FROM CURRENT_TIMESTAMP - tiempo))/60, comentario, tiempo FROM entrada WHERE ver=1 xxyyzz ORDER BY tiempo DESC;"; 
  if(isset($_REQUEST['q'])){
	$q = $_REQUEST['q'];
	if(urlQueryFormat($q)){  // q esta seteado y con buen format
	    $deporte = $q[1]; 
	    $area = $q[3]; 
	  if($q[0] == '2' || $q[0] == '4'){   
	    $dbQuery0 = str_replace("xxyyzz", "AND deporte=$deporte AND area=$area", $dbQueryInit); 
	    switch($q[0]){
	    case('2'): // cliqueo deporte so el extra ... es el mismo deporte pero en OTROS lugares 
	      $dbQuery1 = str_replace("xxyyzz", "AND deporte=$deporte AND area<>$area", $dbQueryInit); 	   	  
	      $dbQuery2 = '';
	      break;
	    case('4'): // cliqueo area so el extra ... es la misma area pero en OTROS deportes 
	      $dbQuery1 = str_replace("xxyyzz", "AND deporte<>$deporte AND area=$area", $dbQueryInit); 
	      $dbQuery2 = '';
	      break;
	    }
	  }else{ // aqui se q $q[0] es '8' pq ya se q es un query que paso los test de queryFormat()
		  //tienes q explotar $q   ($var = tag literal del url q viene dado como 80808:tag literal:partes de tags) y sacar 'tag literal'
		  $arreglo = explode(':', $q);
	      $rotuloLiteral = strtolower($arreglo[1]);
	      $dbQuery0 = str_replace("xxyyzz", "AND (LOWER(tag3) like '%$rotuloLiteral%' OR LOWER(tag4) like '%$rotuloLiteral%' OR LOWER(tag5) like '%$rotuloLiteral%') AND (deporte=$deporte AND area=$area)", $dbQueryInit);
	      $dbQuery1 = str_replace("xxyyzz", "AND (LOWER(tag3) like '%$rotuloLiteral%' OR LOWER(tag4) like '%$rotuloLiteral%' OR LOWER(tag5) like '%$rotuloLiteral%') AND ((deporte<>$deporte AND area=$area) OR (deporte=$deporte AND area<>$area))", $dbQueryInit);
	      $dbQuery2 = str_replace("xxyyzz", "AND (LOWER(tag3) like '%$rotuloLiteral%' OR LOWER(tag4) like '%$rotuloLiteral%' OR LOWER(tag5) like '%$rotuloLiteral%') AND (deporte<>$deporte AND area<>$area)", $dbQueryInit);
            /* deberia sacar entries que tengan el rotulo en el comentario, aunque no en los LIKE tags ??? 
             * $dbQuery3 ???
             */
	   /*  
		  $index = 2; //chequeando solo los rotulos explotados q son los q estan del index 2 pa lante
          while( $index < count($arreglo) ){
            $rotulo = $arreglo[$index];
            $extraQueryConditionRotuloExplotado += ":WHERE ver=1 AND (tag3 like '%$rotulo%' OR tag4 like '%$rotulo%' OR tag5 like '%$rotulo%') AND (deporte=$deporte OR area=$area)";
            $index++;
          }  
	   */
       
	  } // hasta aqui $q[0] es '8'
	  
    }else{ // q esta seteado pero con bad format (un hacker);
      $dbQuery0 = str_replace("xxyyzz", "", $dbQueryInit); 
	  $dbQuery1 = "";
	  $dbQuery2 = "";
	/*
	 * Aqui tambien podria enviarlo a la pagina de error EN VEZ de correr el query basico.
	 * pero creo q es mejor seguir un flujo donde vea entries y no error.
      $mensaje1 = "D'Oh!  No lo encontre.<br>Ni el acento de la e.";
      $mensaje2 = "No se encontro ninguna entrada, deberia ser buscando tag.";
      brega_error($mensaje1, $mensaje2);
     * 			
    */
	}
  }else{ // q NO esta seteado
    $dbQuery0 = str_replace("xxyyzz", "", $dbQueryInit); 
	$dbQuery1 = "";
	$dbQuery2 = "";	
  }	
  return array($dbQuery0, $dbQuery1, $dbQuery2);
}

function urlQueryFormat($q){
  $result = FALSE;
  $arreglo = explode(':', $q);
  
  $numeros = $arreglo[0];
  
  $test1 = (strlen($numeros) == 5);
  if($test1) { ; } 
  else return $result; // false
  
  $test2 = ($numeros[0] == '2' || $numeros[0] == '4' || $numeros[0] == '8') && (($numeros[0] == $numeros[2]) && ($numeros[0] == $numeros[4]));
  if ($test2) { ; }
  else return $result; // false
  
  $test3 = ($numeros[1] >= 0 && $numeros[1] <= 3) && ($numeros[3] >= 0 && $numeros[3] <= 3);
  if ($test3) { ; }
  else return $result; // false

  if($numeros[0] == '8'){
    $test4 = count($arreglo) > 1;
    if ($test4) { ; }
    else return $result; // false
  }elseif($numeros[0] == '2'  || $numeros[0] == '4'){
    $test4 = count($arreglo) == 1;
    if ($test4) { ; }
    else return $result; // false	  
  }
    
  $index = 2; // index 0 son los numeros y ya los chequee arriba; index 1 ignoralo pq ese es el rotulo literal; chequeando solo los rotulos explotados q son los q estan del index 2 pa lante
  while( $index < count($arreglo) ){
    $rotulo = $arreglo[$index];
    if (ctype_alnum($rotulo)) { //Returns TRUE if every character in text is either a letter or a digit, FALSE otherwise.
      ; 
    }else{
      return $result; // false  si los rotulos explotados
    }
    $index++;
  }
  
  $result = TRUE;
  return $result;
}


//usado para crear el fotopath en sacalo.php, usando el fotoentradaid y el tipo de la foto
//ambos vienen del DB (foto[4] y foto[3])
//Tambien definido en masajein (bad?)
  $fotoTipo = array(
    1 => "gif",
    2 => "jpg",
    3 => "png",
    4 => "swf",
    5 => "psd",
    6 => "bmp",
    7 => "tiff",
    8 => "tiff"
  );
?>
