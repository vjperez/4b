<?php
require_once HOST_FS_ROOT . 'escritos/php/sacalo/valida/urlQueryFormat.php';

function buildQueries(){
$dbQueryInit = "SELECT id, deporte, area, tag3, tag4, tag5, (EXTRACT(EPOCH FROM CURRENT_TIMESTAMP - tiempo))/60, comentario, tiempo FROM entrada WHERE ver=1 xxyyzz ORDER BY tiempo DESC;"; 
$searchMode;
$basicQueries = array();
$tagWordQueries = array();
if(isset($_REQUEST['q'])){
    $q = $_REQUEST['q'];
    if(urlQueryFormat($q)){  // q esta seteado y con buen format
        $deporte = $q[1]; 
        $area = $q[3]; 
        if($q[0] == '2'){ 
          $searchMode= 'deporte';
          $dbQuery0 = str_replace("xxyyzz", "AND deporte=$deporte AND area=$area", $dbQueryInit);
          $dbQuery1 = str_replace("xxyyzz", "AND deporte=$deporte AND area<>$area", $dbQueryInit);
          //$dbQuery2 = "";
          $basicQueries = array($dbQuery0, $dbQuery1);
          //$dbQuery2 = str_replace("xxyyzz", "AND deporte<>$deporte AND area<>$area", $dbQueryInit);          
        }elseif($q[0] == '4'){
          $searchMode= 'area';
          $dbQuery0 = str_replace("xxyyzz", "AND deporte=$deporte AND area=$area", $dbQueryInit);
          $dbQuery1 = str_replace("xxyyzz", "AND deporte<>$deporte AND area=$area", $dbQueryInit);
          //$dbQuery2 = "";
          $basicQueries = array($dbQuery0, $dbQuery1);
          //$dbQuery2 = str_replace("xxyyzz", "AND deporte<>$deporte AND area<>$area", $dbQueryInit);         
        }elseif($q[0] == '8'){ // aqui se q $q[0] es '8' pq ya se q es un query que paso los test de queryFormat()
          $searchMode= 'tagWord';
          $dbQuery0 = str_replace("xxyyzz ORDER BY tiempo DESC;", "AND deporte=$deporte AND area=$area", $dbQueryInit);
          $dbQuery1 = str_replace("xxyyzz ORDER BY tiempo DESC;", "AND deporte=$deporte AND area<>$area", $dbQueryInit);
          $dbQuery2 = str_replace("xxyyzz ORDER BY tiempo DESC;", "AND deporte<>$deporte AND area=$area", $dbQueryInit);
          //$basicQueries = array($dbQuery0, $dbQuery1, $dbQuery2);

          $tagWordsArray = explode(':', $q);  // incluye en el array los primeros 2 items q en verdad no son tagWords
          $tagWordsIndex = 2;                 // son los numeros y el literal, por eso salto 2 items  
          $tagWordQuery = str_replace("xxyyzz ORDER BY tiempo DESC;", "AND ()", $dbQueryInit); 
          
          //echo $tagWordQuery; exit();

          $theOrs = '';        
          while( $tagWordsIndex < count($tagWordsArray) ){
              $tagWord = $tagWordsArray[$tagWordsIndex];
              if($tagWordsIndex > 2) $theOrs = $theOrs . " OR "; 
              $theOrs = $theOrs . " LOWER(tag3) like '%$tagWord%' OR LOWER(tag4) like '%$tagWord%' OR LOWER(tag5) like '%$tagWord%' OR LOWER(comentario) like '%$tagWord%' ";
              $tagWordsIndex++;
          }
          $tagWordQuery = str_replace("()", "( " . $theOrs . " )", $tagWordQuery);  

          //echo $tagWordQuery; exit();

          array_push($tagWordQueries, $tagWordQuery . " INTERSECT (" . $dbQuery0 . ") ORDER BY tiempo DESC;" ) ;
          array_push($tagWordQueries, $tagWordQuery . " INTERSECT (" . $dbQuery1 . ") ORDER BY tiempo DESC;") ; 
          array_push($tagWordQueries, $tagWordQuery . " INTERSECT (" . $dbQuery2 . ") ORDER BY tiempo DESC;") ;
          array_push($tagWordQueries, $tagWordQuery . " EXCEPT (" . $dbQuery0 . ") EXCEPT (" . $dbQuery1 . ") EXCEPT (" . $dbQuery2 .") ORDER BY tiempo DESC;") ;
        } // hasta aqui $q[0] es '8'
      
    }else{ // q esta seteado pero con bad format
      $mensaje1 = "D'Oh!  No lo encontre.<br>No jodas !";
      $mensaje2 = "q ... with BAD format.";
      brega_error($mensaje1, $mensaje2);
      exit();
    }
}else{ // q NO esta seteado
    if(strpos($_SERVER['REQUEST_URI'], '?') ) {//q no seteado aun with ? present in the url 
      $mensaje1 = "D'Oh!  No lo encontre.<br>No jodas !";
      $mensaje2 = "q ... could NOT be set.";
      brega_error($mensaje1, $mensaje2);
      exit();
    }else{//q no esta seteado pq estoy usando header links por ejemplo
      $searchMode= 'home';
      $dbQuery0 = str_replace("xxyyzz", "", $dbQueryInit); 
      $basicQueries = array($dbQuery0);	
    }
}	
return array($searchMode, $basicQueries, $tagWordQueries);
}

?>