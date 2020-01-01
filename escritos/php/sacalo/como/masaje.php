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
    /*
    else if($deporte == 9){
      $path = 'x.png';  
    }
   */ 
    return $path;
  }
  
  function getAreaExpression($area){
    if($area == 0){
      $exp = '  Norte, PR';
    }else if($area == 1){
      $exp =  '  Sur, PR';
    }else if($area == 2){
      $exp = '  Oeste, PR';
    }else if($area == 3){
      $exp = '  Este, PR';  
    }else if($area == 4){
      $exp = '  Metro, PR';
    }else if($area == 5){
      $exp = '  Centro, PR';  
    }
    /*
    else if($area == 6){
      $exp = '  U.S.A';
    }else if($area == 7){
      $exp = 'Representando PR';  
    }
    */
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
  
  function getTagWordFromQuery($query){
    return trim( substr($query, (4+strpos($query, 'like')), strpos($query, 'OR') - (4+strpos($query, 'like'))) ); // 4 is size of like
  }

  function getTagWordValueFromQueryIndex($index){ // tagWord on tags == tagWord on comentario
    if    ($index%4 == 0) return 1.0; // 4 is the amount of queries per every tagWord // this is the query INTERSECTING tagword with deporte and area
    elseif($index%4 == 1) return 0.9; // 4 is the amount of queries per every tagWord // this is the query INTERSECTING tagword with deporte 
    elseif($index%4 == 2) return 0.9; // 4 is the amount of queries per every tagWord // this is the query INTERSECTING tagword with area 
    else                  return 0.7; // 4 is the amount of queries per every tagWord // this is the query NOT INTERSECTING tagword  
  } 
 
$fotoTipo = array(
    1 => "gif",
    2 => "jpg",
    3 => "png",
    4 => "swf",
    5 => "psd",
    6 => "bmp",
    7 => "tiff"
);
  
?>
