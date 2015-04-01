<?php
  require_once 'datosConectarDb.php';
  
  if(DB_DBMS == 'MySQL'){
    $cxn = mysqli_connect(DB_HOST, DB_USUARIO, DB_PASSWORD, DB_NOMBRE);
    if(! $cxn){
      $mensaje1 = 'Error logueando a base de datos.';
      $mensaje2 =  'Attempting to log into ' . DB_DBMS . ' at <br>' . HOST_FS_ROOT . 'escritos/php/config/conecta.php: ' . mysqli_connect_error(); 
      brega_error($mensaje1, $mensaje2);
    }else{
      echo '<p>' . DB_USUARIO . ' esta logueado en ' . DB_DBMS . ', usando base de datos ' . DB_NOMBRE . '.</p>';
    }
  }elseif(DB_DBMS == 'Postgre'){
    $cxn_string = "port=5432" . " host=" . DB_HOST . " dbname=" . DB_NOMBRE . " user=" . DB_USUARIO . " password=" . DB_PASSWORD; 
    $cxn = pg_connect($cxn_string);
    if(pg_connection_status($cxn) === PGSQL_CONNECTION_OK){
	  echo '<p>' . DB_USUARIO . ' esta logueado en ' . DB_DBMS . ', usando base de datos ' . DB_NOMBRE . '.</p>';
    }else{
      $mensaje1 = 'Error logueando a base de datos.';
      $mensaje2 = 'Attempting to log into ' . DB_DBMS . ' at <br>' . HOST_FS_ROOT . 'escritos/php/config/conecta.php. '; 
      brega_error($mensaje1, $mensaje2);
    }      
  }else{
      $mensaje1 = 'Error de configuracion.';
      $mensaje2 =  HOST_FS_ROOT . 'escritos/php/config/conecta.php: No haz escogido correctamente el DBMS en datosConectarDb.php.'; 
      brega_error($mensaje1, $mensaje2);	    
  }
?>
