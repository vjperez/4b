<?php

define('DEBUG',TRUE);
//define('HOST_FS_ROOT','C:\\wamp\\www\\4b\\');
//define('SITE_ROOT' , 'http://localhost/4b');

define('HOST_FS_ROOT', '/var/www/htdocs/4b/');
define('SITE_ROOT' , 'http://yeco/4b/');

//define('HOST_FS_ROOT', '/var/www/4b/');
//define('SITE_ROOT' , 'http://localhost/4b/');  

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
?>
