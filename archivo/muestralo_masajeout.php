<?php
  function getdeportefotopath($deporte){
    if($deporte == 0){
      $path = 'bkt.png';
    }else if($deporte == 1){
      $path =  'bsbl.png';
    }else if($deporte == 2){
      $path = 'ftbl.png';
    }else if($deporte == 3){
      $path = 'vlly.png';  
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
?>