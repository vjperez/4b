<?php

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
  
  $test3 = (($numeros[1] >= 0 && $numeros[1] <= 3) || ($numeros[1] == 9)) && ($numeros[3] >= 0 && $numeros[3] <= 7);
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

?>