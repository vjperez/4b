<?php
  function getdeportefotopath($deporte){
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
  

  function getnivelexpression($nivel){
    if($nivel == 0){
      $exp = ' Practica Fogueo Fun';
    }else if($nivel == 1){
      $exp =  ' Nivel Local';
    }else if($nivel == 2){
      $exp = ' Nivel Isla';
    }else if($nivel == 3){
      $exp = ' Nivel Internacional';  
    }
    return $exp;
  }

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