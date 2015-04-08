<?php
  require_once '../config/datosConfig.php'; //'escritos/php/config/datosConfig.php'; 
  //los masajeo
  require_once HOST_FS_ROOT . 'escritos/php/ponlo/ponlo_masajein.php';  
  
  
  
// check if actually i am uploading a foto at all 
//si foto es falso es pq no estoy uploading any foto 
if($foto){  
  //posible errors loading foto
  if( $foto['error'] > 0 ){
    $mensaje1 = 'Error subiendo foto.';
    $mensaje2 = HOST_FS_ROOT . 'escritos/php/ponlo/ponlo.php: ' . $errorLoadingFile[ $foto['error'] ];
    brega_error($mensaje1,$mensaje2);
  }
  
  //posible errors loading foto
  if( ! @is_uploaded_file($foto['tmp_name']) ){
    $mensaje1 = 'Error subiendo foto.';
    $mensaje2 = HOST_FS_ROOT . 'escritos/php/ponlo/ponlo.php: ' . $foto['tmp_name'] . ' :: No es un uploaded file.';
    brega_error($mensaje1,$mensaje2);
  }
  
  //analizando ancho y alto de la foto
  if( $fotoinfo = @getimagesize($foto['tmp_name']) ){
    $ancho = $fotoinfo[0];
    $alto = $fotoinfo[1];    
    //aqui podrias buscar el size  
  }else{
    $mensaje1 = 'Error subiendo foto.';
    $mensaje2 = HOST_FS_ROOT . 'escritos/php/ponlo/ponlo.php :: getimagesize() no pudo sacar info de la foto y ponerla en $fotoinfo';
    brega_error($mensaje1,$mensaje2);
  }
  
  //analizando el tipo de la foto        
  if( $tipo = @exif_imagetype($foto['tmp_name']) ){
    if($tipo == 2 || $tipo == 7 || $tipo == 8){
	  //aqui podrias sacar otra info de la foto
      //exif_read_data() reads the EXIF headers from a JPEG or TIFF image file.    
    }
    if($tipo == 1 || $tipo == 3 || $tipo == 4 || $tipo == 5 || $tipo == 6){
	  //aqui podrias sacar otra info de la foto  
    }      	  
    if($tipo > 8 || $tipo < 1){
      $mensaje1 = 'Error subiendo foto.';
      $mensaje2 = HOST_FS_ROOT . 'escritos/php/ponlo/ponlo.php: ' . 'El formato de la foto no es uno de los 8 en ponlo_masajein';
      brega_error($mensaje1,$mensaje2);          
    }                
  }else{
      $mensaje1 = 'Error subiendo foto.';
      $mensaje2 = HOST_FS_ROOT . 'escritos/php/ponlo/ponlo.php:  exif_imagetype() no pudo sacar info de la foto. Esto no es una foto....';
      brega_error($mensaje1,$mensaje2);
  }
}//if foto
  
  
  
  
  
  //insertando texto en fotoentrada table
  require_once HOST_FS_ROOT . 'escritos/php/config/conecta.php';
  $query = "INSERT INTO fotoentrada (deporte,area,tag3,tag4,tag5,comentario) VALUES ($deporte, $area, '$tag3', '$tag4', '{$tag5}', '{$comentario}' );";
  $insert_query1_result = mysqli_query($cxn, $query);
  if( ! $insert_query1_result ){
    $mensaje1 = 'Error insertando a la base de datos.';
    $mensaje2 = HOST_FS_ROOT . 'escritos/php/ponlo/ponlo.php:insert_query1 ' . '<br>' . mysqli_error($cxn);
    brega_error($mensaje1,$mensaje2);
  }
      
  //tengo foto? then muevela e insertala
  if($foto){
    $fotoentradaid = mysqli_insert_id($cxn);
    
    //muevo la foto; antes de insertar en foto table
    $directorio = HOST_FS_ROOT . 'loaded/';
    if(@move_uploaded_file($foto['tmp_name'], $directorio . str_pad($fotoentradaid, 8, '0', STR_PAD_LEFT) . '.' . $fotoTipo[$tipo] )){
      // existe una nueva foto 00000008.jpg ; ya puedes insertar en foto table un entry q apunte a fotoentrada 00000008
    }else{
      $mensaje1 = 'Error moviendo foto.';
      $mensaje2 = HOST_FS_ROOT . 'escritos/php/ponlo/ponlo.php: error moviendo foto hacia ' . $directorio ;
      brega_error($mensaje1,$mensaje2);
    }    
    
    //inserto info de foto en foto table
    $query = "INSERT INTO foto (ancho,alto,tipo,fotoentradaid) VALUES ($ancho, $alto, $tipo, $fotoentradaid);";
    $insert_query2_result = mysqli_query($cxn, $query);
    if( ! $insert_query2_result ){
      $mensaje1 = 'Error insertando a la base de datos.';
      $mensaje2 = HOST_FS_ROOT . 'escritos/php/ponlo/ponlo.php:insert_query2 ' . mysqli_error($cxn);
      brega_error($mensaje1,$mensaje2);
    }else{
	  // cree un entry en foto table que apunta a fotoentrada 00000008, la fotoentrada 00000008 usara 00000008.jpg
	}
  }
  
  header('Location:' . SITE_ROOT . 'escritos/php/sacalo/muestralo.php?id=' . $fotoentradaid);	  
?>
