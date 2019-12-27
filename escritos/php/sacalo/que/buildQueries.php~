<?php
require_once HOST_FS_ROOT . 'escritos/php/sacalo/valida/urlQueryFormat.php';

function buildQueries(){
  $dbQueryInit = "SELECT id, deporte, area, tag3, tag4, tag5, (EXTRACT(EPOCH FROM CURRENT_TIMESTAMP - tiempo))/60, comentario, tiempo FROM entrada WHERE ver=1 xxyyzz ORDER BY tiempo DESC;"; 
  if(isset($_REQUEST['q'])){
    $q = $_REQUEST['q'];
    if(urlQueryFormat($q)){  // q esta seteado y con buen format
        $deporte = $q[1]; 
        $area = $q[3]; 
        if($q[0] == '2'){ 
          $dbQuery0 = str_replace("xxyyzz", "AND deporte=$deporte AND area=$area", $dbQueryInit);
          $dbQuery1 = str_replace("xxyyzz", "AND deporte=$deporte AND area<>$area", $dbQueryInit);
          $dbQuery2 = "";
          //$dbQuery2 = str_replace("xxyyzz", "AND deporte<>$deporte AND area<>$area", $dbQueryInit);          
        }elseif($q[0] == '4'){
          $dbQuery0 = str_replace("xxyyzz", "AND deporte=$deporte AND area=$area", $dbQueryInit);
          $dbQuery1 = str_replace("xxyyzz", "AND deporte<>$deporte AND area=$area", $dbQueryInit);
          $dbQuery2 = "";
          //$dbQuery2 = str_replace("xxyyzz", "AND deporte<>$deporte AND area<>$area", $dbQueryInit);         
        }elseif($q[0] == '8'){ // aqui se q $q[0] es '8' pq ya se q es un query que paso los test de queryFormat()
          //tienes q explotar $q   ($var = tag literal del url q viene dado como 80808:tag literal:partes de tags) y sacar 'tag literal'
          $arreglo = explode(':', $q);
            $rotuloLiteral = strtolower($arreglo[1]);
            $dbQuery0 = str_replace("xxyyzz", "AND (LOWER(tag3) like '%$rotuloLiteral%' OR LOWER(tag4) like '%$rotuloLiteral%' OR LOWER(tag5) like '%$rotuloLiteral%') AND (deporte=$deporte AND area=$area)", $dbQueryInit);
            $dbQuery1 = str_replace("xxyyzz", "AND (LOWER(tag3) like '%$rotuloLiteral%' OR LOWER(tag4) like '%$rotuloLiteral%' OR LOWER(tag5) like '%$rotuloLiteral%') AND ((deporte<>$deporte AND area=$area) OR (deporte=$deporte AND area<>$area))", $dbQueryInit);
            $dbQuery2 = str_replace("xxyyzz", "AND (LOWER(tag3) like '%$rotuloLiteral%' OR LOWER(tag4) like '%$rotuloLiteral%' OR LOWER(tag5) like '%$rotuloLiteral%') AND (deporte<>$deporte AND area<>$area)", $dbQueryInit);
                /* deberia sacar entries que tengan el rotulo en el comentario, aunque no en los LIKE tags ??? 
                * $dbQuery3 ???
                */
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
        /*
        * Aqui tambien podria enviarlo a la pagina de error EN VEZ de correr el query basico.
        * pero creo q es mejor seguir un flujo donde vea entries y no error.
        $mensaje1 = "D'Oh!  No lo encontre.<br>Ni el acento de la e.";
        $mensaje2 = "No se encontro ninguna entrada, deberia ser buscando tag.";
        brega_error($mensaje1, $mensaje2);
        * 			
        */
      }
  }else{ // q NO esta seteado
    $dbQuery0 = str_replace("xxyyzz", "", $dbQueryInit); 
	  $dbQuery1 = "";
	  $dbQuery2 = "";	
  }	
  return array($dbQuery0, $dbQuery1, $dbQuery2);
}

?>