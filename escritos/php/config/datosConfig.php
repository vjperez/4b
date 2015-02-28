<?php

define('DEBUG',TRUE);
//define('HOST_FS_ROOT','C:\\wamp\\www\\11-4bolas\\');
define('HOST_FS_ROOT', '/var/www/4b/11-4bolas-jsmQueries/');
define('SITE_ROOT' , 'http://localhost/4b/11-4bolas-jsmQueries/');  

function debug_print(){
  echo '<br><br><br><br>';
  if( isset($_REQUEST['error1']) ){
    echo '<p class="warning">' . $_REQUEST['error1'] . '</p>'; 
  }else{
    echo '<p class="warning">error1 was not set. </p>';
  }
  echo '<br>';
  echo '<img src="icon/error.png" alt="error-foto">';
  echo '<br><br><hr>';
  if(DEBUG){
    if(isset($_REQUEST['error2'])){
      echo '<br>' . $_REQUEST['error2'];    
    }else{
      echo '<p>error2 was not set. </p>';
    }
  }
}

function brega_error($mensaje1, $mensaje2){
  header('Location:' . SITE_ROOT . 'error.php' . '?error1=' . $mensaje1 . '&error2=' . $mensaje2);
  exit();
}

function queryFormat($q){
  $result = FALSE;
  $arreglo = explode(':', $q);
  
  $numeros = $arreglo[0];
  
  $test1 = (strlen($numeros) == 5);
  if($test1) { ; } 
  else return $result; // false
  
  $test2 = ($numeros[0] == '2' || $numeros[0] == '4' || $numeros[0] == '8') && (($numeros[0] == $numeros[2]) && ($numeros[0] == $numeros[4]));
  $test3 = ($numeros[1] >= 0 && $numeros[1] <= 3) && ($numeros[3] >= 0 && $numeros[3] <= 3);
  if ($test2 && $test3) { ; }
  else return $result; // false
  
  $index = 2; // index 0 son los numeros y ya los chequee arriba; index 1 ignoralo pq ese es el rorulo literal; chequeando solo los rotulos explotados q son los q estan del index 2 pa lante
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
