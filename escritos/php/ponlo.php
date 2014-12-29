<?php
  //
  require_once 'datosConfig.php';
  $directorio = HOST_FS_ROOT . 'loaded/';
  //los masajeo
  require_once 'ponlo_masajein.php';
  
if($foto){  
  //posible errors loading foto
  if( $foto['error'] != 0 ){
    $mensaje1 = 'Error subiendo foto.';
    $mensaje2 = 'ponlo.php: ' . $errorLoadingFile[ $foto['error'] ];
    brega_error($mensaje1,$mensaje2);
  }

  //posible errors loading foto
  if( ! @is_uploaded_file($foto['tmp_name']) ){
    $mensaje1 = 'Error subiendo foto.';
    $mensaje2 = 'ponlo.php: ' . $foto['tmp_name'] . ' no es un uploaded file.';
    brega_error($mensaje1,$mensaje2);
  }
  
  //analizando ancho y alto de la foto
  if( $fotoinfo = @getimagesize($foto['tmp_name']) ){
    $ancho = $fotoinfo[0];
    $alto = $fotoinfo[1];      
  }else{
    $mensaje1 = 'Error subiendo foto.';
    $mensaje2 = 'ponlo.php:getimagesize:';
    brega_error($mensaje1,$mensaje2);
  }
  
  //analizando el tipo de la foto        
  if( $tipo = @exif_imagetype($foto['tmp_name']) ){
    if($tipo > 8){
      $mensaje1 = 'Error subiendo foto.';
      $mensaje2 = 'ponlo.php: ' . 'No entiendo el formato de la foto. Sorry.';
      brega_error($mensaje1,$mensaje2);          
    }
    if($tipo == 2 || $tipo == 7 || $tipo == 8){
      //exif_read_data() reads the EXIF headers from a JPEG or TIFF image file.    
    }                    
  }else{
      $mensaje1 = 'Error subiendo foto.';
      $mensaje2 = 'ponlo.php:exif_imagetype: Esto no es una foto....';
      brega_error($mensaje1,$mensaje2);
  }
}//if foto
  
  //los inserto 
  require_once 'conecta.php';
  $insert_query1 = mysqli_query($cxn, "INSERT INTO fotoentrada (deporte,nivel,tag3,tag4,tag5,comentario) VALUES ($deporte, $nivel, '$tag3', '$tag4', '{$tag5}', '{$comentario}' );");
  if( ! $insert_query1 ){
    $mensaje1 = 'Error insertando a la base de datos.';
    $mensaje2 = 'ponlo.php:insert_query1 ' . mysqli_error($cxn);
    brega_error($mensaje1,$mensaje2);
  }
      
  if($foto){
    $fotoentradaid = mysqli_insert_id($cxn);
    $insert_query2 = mysqli_query($cxn, "INSERT INTO foto (ancho,alto,tipo,fotoentradaid) VALUES ($ancho, $alto, $tipo, $fotoentradaid);");
    if( ! $insert_query2 ){
      $mensaje1 = 'Error insertando a la base de datos.';
      $mensaje2 = 'ponlo.php:insert_query2 ' . mysqli_error($cxn);
      brega_error($mensaje1,$mensaje2);
    }
  
    //muevo la foto
    if(@move_uploaded_file($foto['tmp_name'], $directorio . str_pad($fotoentradaid, 8, '0', STR_PAD_LEFT) . '.' . $fotoTipo[$tipo] )){
      header('Location:muestralo.php?id=' . $fotoentradaid);
    }else{
      $mensaje1 = 'Error moviendo foto.';
      $mensaje2 = 'ponlo.php: error moviendo foto hacia ' . $directorio ;
      brega_error($mensaje1,$mensaje2);
    }
  }  
?>