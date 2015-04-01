<?php

define('DEBUG',TRUE);
//define('HOST_FS_ROOT','C:\\wamp\\www\\4b\\');
//define('SITE_ROOT' , 'http://localhost/4b');

//define('HOST_FS_ROOT', '/var/www/htdocs/4b/');
//define('SITE_ROOT' , 'http://yeco/4b/');

define('HOST_FS_ROOT', '/var/www/4b/');
define('SITE_ROOT' , 'http://localhost/4b/');  

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



function setDbQuery(){
  $dbQueryInit = "SELECT id, deporte, area, tag3, tag4, tag5, TIMESTAMPDIFF(MINUTE, tiempo, CURRENT_TIMESTAMP), comentario, tiempo 
  FROM entrada WHERE ver=1 xxyyzz ORDER BY tiempo DESC;"; 
  if(isset($_REQUEST['q'])){
	$q = $_REQUEST['q'];
	if(urlQueryFormat($q)){  // q esta seteado y con buen format
	    $deporte = $q[1]; 
	    $area = $q[3]; 
	  if($q[0] == '2' || $q[0] == '4'){   
	    $dbQuery0 = str_replace('xxyyzz', 'AND deporte=$deporte AND area=$area', $dbQueryInit); 
	    switch($q[0]){
	    case('2'): // cliqueo deporte so el extra ... es el mismo deporte pero en OTROS lugares 
	      $dbQuery1 = str_replace('xxyyzz', 'AND deporte=$deporte AND area<>$area', $dbQueryInit); 	   	  
	      $dbQuery2 = '';
	      break;
	    case('4'): // cliqueo area so el extra ... es la misma area pero en OTROS deportes 
	      $dbQuery1 = str_replace('xxyyzz', 'AND deporte<>$deporte AND area=$area', $dbQueryInit); 
	      $dbQuery2 = '' 
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
      $dbQuery0 = str_replace('xxyyzz', '', $dbQueryInit); 
	  $dbQuery1 = '';
	  $dbQuery2 = '';		
	}
  }else{ // q NO esta seteado
    $dbQuery0 = str_replace('xxyyzz', '', $dbQueryInit); 
	$dbQuery1 = '';
	$dbQuery2 = '';	
  }	
  return array('dbQuery0' => $dbQuery0, 'dbQuery1' => $dbQuery1, 'dbQuery2' => $dbQuery2);
}
?>
