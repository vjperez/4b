<?php
  require_once 'datosConectarDb.php';
  /*
  mysql_connect(DB_HOST, DB_USUARIO, DB_PASSWORD)
  or
  die('<p>Usuario ' . DB_USUARIO . 'no pudo loguearse a MySQL. <br>' . mysql_error() . '</p>');
  echo '<p>' . DB_USUARIO . ' esta logueado en MySQL.</p>';
  
  mysql_select_db(DB_NOMBRE)
  or
  die('<p>Problema con base de datos, ' . DB_NOMBRE . '<br>' . mysql_error() . '</p>');
  echo '<p>Usando base de datos, ' . DB_NOMBRE . '.</p>';
  */
  $cxn = mysqli_connect(DB_HOST, DB_USUARIO, DB_PASSWORD, DB_NOMBRE);
  if(! $cxn){
    $mensaje1 = 'Error logueando a base de datos ' . DB_NOMBRE . '.';
    $mensaje2 =  HOST_FS_ROOT . 'escritos/php/config/conecta.php: ' . mysqli_connect_error(); 
    brega_error($mensaje1, $mensaje2);
  }else{
    echo '<p>' . DB_USUARIO . ' esta logueado en MySQL, usando base de datos ' . DB_NOMBRE . '.</p>';
  }
?>
