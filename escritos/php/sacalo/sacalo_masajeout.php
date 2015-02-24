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
 function getTimeExpression($dayDiff, $timeString){
    if($dayDiff < 1){
      $exp = 'Hace menos de 24 horas.';
    }else if($dayDiff < 7){
      $exp =  'Hace menos de ' . ($dayDiff + 1) . ' dias.';
    }else{
	  $timestamp = strtotime($timeString);	
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
