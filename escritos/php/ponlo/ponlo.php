<?php
  require_once '../config/datosConfig.php'; //'escritos/php/config/datosConfig.php'; 
  //los masajeo
  require_once HOST_FS_ROOT . 'escritos/php/ponlo/ponlo_masajein.php';  
  
  
  
// check if actually i am uploading a foto at all 
//si foto es falso es pq no estoy uploading any foto 
if( ! empty($_FILES['laFoto']['name']) ){
  //posible errors loading foto
  if( $_FILES['laFoto']['error'] > 0 ){
    $mensaje1 = 'Error subiendo foto.';
    $mensaje2 = HOST_FS_ROOT . 'escritos/php/ponlo/ponlo.php: ' . $errorLoadingFile[ $_FILES['laFoto']['error'] ];
    brega_error($mensaje1,$mensaje2);
  }
  
  //posible errors loading foto
  if( ! @is_uploaded_file($_FILES['laFoto']['tmp_name']) ){
    $mensaje1 = 'Error subiendo foto.';
    $mensaje2 = HOST_FS_ROOT . 'escritos/php/ponlo/ponlo.php: ' . $_FILES['laFoto']['tmp_name'] . ' :: No es un uploaded file.';
    brega_error($mensaje1,$mensaje2);
  }
  
  //analizando ancho y alto de la foto
  if( $fotoinfo = @getimagesize($_FILES['laFoto']['tmp_name']) ){
    $ancho = $fotoinfo[0];
    $alto = $fotoinfo[1];    
    //aqui podrias buscar el size  
  }else{
    $mensaje1 = 'Error subiendo foto.';
    $mensaje2 = HOST_FS_ROOT . 'escritos/php/ponlo/ponlo.php :: getimagesize() no pudo sacar info sobre ' . $_FILES['laFoto']['tmp_name'] . ' y ponerla en $fotoinfo';
    brega_error($mensaje1,$mensaje2);
  }
  
  //analizando el tipo de la foto        
  if( $tipo = @exif_imagetype($_FILES['laFoto']['tmp_name']) ){
    if($tipo == 2 || $tipo == 7 || $tipo == 8){
	  //aqui podrias sacar otra info de la foto
      //exif_read_data() reads the EXIF headers from a JPEG or TIFF image file.    
    }
    if($tipo == 1 || $tipo == 3 || $tipo == 4 || $tipo == 5 || $tipo == 6){
	  //aqui podrias sacar otra info de la foto  
    }      	  
    if($tipo > 8 || $tipo < 1){
      $mensaje1 = 'Error subiendo foto.';
      $mensaje2 = HOST_FS_ROOT . 'escritos/php/ponlo/ponlo.php: ' . 'El formato de ' . $_FILES['laFoto']['tmp_name'] . ' no es uno de los 8 en ponlo_masajein';
      brega_error($mensaje1,$mensaje2);          
    }                
  }else{
      $mensaje1 = 'Error subiendo foto.';
      $mensaje2 = HOST_FS_ROOT . 'escritos/php/ponlo/ponlo.php:  exif_imagetype() no pudo sacar info sobre ' . $_FILES['laFoto']['tmp_name'] .  ' Esto no es una foto....';
      brega_error($mensaje1,$mensaje2);
  }
}//if escogio foto
  
  
  
  
  
  //insertando texto en entrada table
  require_once HOST_FS_ROOT . 'escritos/php/config/conecta.php';
  if($comentario == FALSE){ // con === me cubre solo el caso de unset en masajein; con == cubre unset en masajein y tambien set en masajein pero vacio
    $query = "INSERT INTO entrada (deporte,area,tag3,tag4,tag5) VALUES ($deporte, $area, '$tag3', '$tag4', '{$tag5}' );"; // comentario will be set to NULL since thats the default in postgre
  }else{
	$query = "INSERT INTO entrada (deporte,area,tag3,tag4,tag5,comentario) VALUES ($deporte, $area, '$tag3', '$tag4', '{$tag5}', '{$comentario}' );";
  }	
  $insert_query1_result = pg_query($cxn, $query);
  if( ! $insert_query1_result ){
    $mensaje1 = 'Error insertando a la base de datos.';
    $mensaje2 = HOST_FS_ROOT . 'escritos/php/ponlo/ponlo.php:insert_query1 ' . '<br>' . pg_last_error($cxn);
    brega_error($mensaje1,$mensaje2);
  }
      
  //tengo foto? then muevela e insertala
  if( ! empty($_FILES['laFoto']['name']) ){
	$query = "SELECT currval(pg_get_serial_sequence('entrada', 'id'));";  
    $entradaid_query_result = pg_query($cxn, $query);
    if( ! $entradaid_query_result ){
      $mensaje1 = 'Error con la base de datos.';
      $mensaje2 = HOST_FS_ROOT . 'escritos/php/ponlo/ponlo.php:insert_query1 ' . '<br>' . pg_last_error($cxn);
      brega_error($mensaje1,$mensaje2);
    }else{
	  $entradaid = pg_fetch_result($entradaid_query_result, 0, 0);
	}
    
    //muevo la foto; antes de insertar en foto table
    $directorio = HOST_FS_ROOT . 'loaded/';
    if(@move_uploaded_file(  $_FILES['laFoto']['tmp_name']  , $directorio . str_pad($entradaid, 10, '0', STR_PAD_LEFT) . '.' . $fotoTipo[$tipo] )){
      // existe una nueva foto 00000008.jpg ; ya puedes insertar en foto table un entry q apunte a fotoentrada 00000008
    }else{
      $mensaje1 = 'Error moviendo foto.';
      $mensaje2 = HOST_FS_ROOT . 'escritos/php/ponlo/ponlo.php: error moviendo ' . $_FILES['laFoto']['tmp_name'] . ' hacia ' . $directorio ;
      brega_error($mensaje1,$mensaje2);
    }    
    
    //inserto info de foto en foto table
    $query = "INSERT INTO foto (ancho,alto,tipo,entradaid) VALUES ($ancho, $alto, $tipo, $entradaid);";
    $insert_query2_result = pg_query($cxn, $query);
    if( ! $insert_query2_result ){
      $mensaje1 = 'Error insertando a la base de datos.';
      $mensaje2 = HOST_FS_ROOT . 'escritos/php/ponlo/ponlo.php:insert_query2 ' . pg_last_error($cxn);
      brega_error($mensaje1,$mensaje2);
    }else{
	  // cree un entry en foto table que apunta a entrada 00000008, la entrada 00000008 usara 00000008.jpg
	}
  }
  
  // redirect view
  $random = rand(0,3) % 2;
  if($random == 0){
    header('Location:' . SITE_ROOT . 'portada.php?q=2' . $deporte . '2' . $area . '2');	 
  }else{
	header('Location:' . SITE_ROOT . 'portada.php?q=4' . $deporte . '4' . $area . '4');	  
  }   
?>
