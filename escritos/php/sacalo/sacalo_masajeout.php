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
	$timestamp = strtotime($timeString);
	//$diffHoras = (date("H") - date("H", $timestamp));
	//if ($diffHoras < 0) $diffHoras += 24; 
    if($minuteDiff < 60){
	  if ($minuteDiff == 1 || $minuteDiff == 0) $minuteDiff = 2;	
      $exp = 'Hace ' . $minuteDiff . ' minutos.';	  
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
