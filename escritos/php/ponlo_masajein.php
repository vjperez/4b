  <?php
  //usado para redefinir valores que vienen de la vista e insertar en el DB lo q yo quiero
  //no inserto 'futbol' en DB si no 2
  $deporteArray = array(
    'baloncesto' => 0,
    'beisbol' => 1,
    'futbol' => 2,
    'volibol' => 3
  );
  $nivelArray = array(
    'informal' => 0,
    'local' => 1,
    'isla' => 2,
    'internacional' => 3
  );
  
  if(isset($_FILES['laFoto'])){
    $foto = $_FILES['laFoto'];
  }else{
    $foto = FALSE;   
  }
         
  $errorLoadingFile = array(
    1 => 'Foto es mas grande de lo que dice php.ini.',
    2 => 'Foto es mas grande de lo que dice ponlo.htm.',
    3 => 'Foto subida parcialmente.',
    4 => 'No escogiste ninguna foto.'
  );
  
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
  
  
  //$originalfotoname  = $_REQUEST['laFoto'];
  $deporte   = $deporteArray[ $_REQUEST['deporte'] ];
  $nivel = $nivelArray[ $_REQUEST['nivel'] ];
  //                                                    trim or deal with it in JS ?!?! 
  $tag3  = trim( $_REQUEST['tag3in'] );
  $tag4  = trim( $_REQUEST['tag4in'] );
  $tag5  = trim( $_REQUEST['tag5in'] ) ; 
  if(isset($_REQUEST['comentarioarea'])){
    $comentario = trim( $_REQUEST['comentarioarea'] );
  }else{
    $comentario = '';    
  }
  ?>