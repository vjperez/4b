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
	$timestamp = strtotime($timeString);
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
	  $exp = date("F j, Y", $timestamp) . '.';	
	}
    return $exp;
  }
  
function setDbQueries(){
  $dbQueryInit = "SELECT id, deporte, area, tag3, tag4, tag5, (EXTRACT(EPOCH FROM CURRENT_TIMESTAMP - tiempo))/60, comentario, tiempo 
  FROM entrada WHERE ver=1 xxyyzz ORDER BY tiempo DESC;"; 
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
	      $rotuloLiteral = $arreglo[1];
	      $dbQuery0 = str_replace("xxyyzz", "AND (tag3 like '%$rotuloLiteral%' OR tag4 like '%$rotuloLiteral%' OR tag5 like '%$rotuloLiteral%') AND (deporte=$deporte AND area=$area)", $dbQueryInit);
	      $dbQuery1 = str_replace("xxyyzz", "AND (tag3 like '%$rotuloLiteral%' OR tag4 like '%$rotuloLiteral%' OR tag5 like '%$rotuloLiteral%') AND ((deporte<>$deporte AND area=$area) OR (deporte=$deporte AND area<>$area))", $dbQueryInit);
	      $dbQuery2 = str_replace("xxyyzz", "AND (tag3 like '%$rotuloLiteral%' OR tag4 like '%$rotuloLiteral%' OR tag5 like '%$rotuloLiteral%') AND (deporte<>$deporte AND area<>$area)", $dbQueryInit);
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
	}
  }else{ // q NO esta seteado
    $dbQuery0 = str_replace("xxyyzz", "", $dbQueryInit); 
	$dbQuery1 = "";
	$dbQuery2 = "";	
  }	
  return array($dbQuery0, $dbQuery1, $dbQuery2);
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
