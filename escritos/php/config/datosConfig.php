<?php

define('DEBUG',TRUE);

define('HOST_FS_ROOT','C:\\Users\\victor\\lighttpd\\htdocs\\4b\\');
define('SITE_ROOT' , 'http://localhost/4b');

//define('HOST_FS_ROOT', '/var/www/htdocs/4b/');
//define('SITE_ROOT' , 'http://yeco/4b/');

//define('HOST_FS_ROOT', '/srv/http/4b/');
//define('SITE_ROOT' , 'http://localhost/4b/');  

//define('HOST_FS_ROOT', '/var/www/4b/');
//define('SITE_ROOT' , 'http://localhost/4b/');

function debug_print(){
  //echo '<br><br><br><br>';
  //echo '<br>';
  echo '<img src="icon/error-homer.png" alt="error-foto">';
  
  if( isset($_REQUEST['error1']) ){
    echo '<p class="warning">' . $_REQUEST['error1'] . '</p>'; 
  }else{
    echo '<p class="warning">Don\'t hack my site, i\'m still learning.<br>Error1 was not set ! </p>';
  }
  echo '<br>';
  if(DEBUG){
    if(isset($_REQUEST['error2'])){
      echo '<hr><br>' . $_REQUEST['error2'];    
    }else{
      echo '<hr><br>' . '<p>error2 was not set. </p>';
    }
  }
}

function brega_error($mensaje1, $mensaje2){
	header('Location:' . SITE_ROOT . 'error.php?error1=' . $mensaje1 . '&error2=' . $mensaje2);
	exit();
}


// why here ?
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
