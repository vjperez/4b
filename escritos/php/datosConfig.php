<?php
define('DEBUG',TRUE);
//define('HOST_FS_ROOT','C:\\wamp\\www\\11-4bolas\\');
define('HOST_FS_ROOT','/var/www/11-4bolas-jsmQueries/');
define('SITE_ROOT' , '/localhost/11-4bolas-jsmQueries/');  
function debug_print(){
  if( isset($_REQUEST['error1']) ){
    echo '<p class="warning">' . $_REQUEST['error1'] . '</p>'; 
  }else{
    echo '<p>Ningun error, todavia ... </p>';
  }
  echo '<br>';
  echo '<img src="../../foto/error.png" alt="foto">';
  echo '<br><br><hr>';
  if(DEBUG){
    if(isset($_REQUEST['error2'])){
      echo '<br>' . $_REQUEST['error2'];    
    }            
  }
}
function brega_error($mensaje1, $mensaje2){
  header('Location:error.php?error1=' . $mensaje1 . '&error2=' . $mensaje2);
  exit();
}
?>