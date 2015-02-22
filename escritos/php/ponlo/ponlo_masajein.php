  <?php
  //usado para redefinir valores que vienen de la vista para ser  insertados en el DB
  //o sea, no inserto 'futbol' en DB si no 2
  $deporteArray = array(
    'baloncesto' => 0,
    'beisbol' => 1,
    'futbol-soccer' => 2,
    'volibol' => 3
  );
  $areaArray = array(
    'norte' => 0,
    'sur' => 1,
    'oeste' => 2,
    'este' => 3
  );
  
         
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
  $area = $areaArray[ $_REQUEST['area'] ];

  if(isset($_REQUEST['comentario-area'])){
    $comentario = trim( $_REQUEST['comentario-area'] );
  }else{
    $comentario = '';    
  }
  
  if( empty($_FILES['laFoto']['name']) ){
    $foto = FALSE;					// no foto selected to upload: entry will not have photo: not trying to upload a photo
  }else{
    $foto = $_FILES['laFoto'];   
  }
  
  //                                                    trim or deal with it in JS ?!?! 
  $tag3  = trim( $_REQUEST['tag3-input'] );
  $tag4  = trim( $_REQUEST['tag4-input'] );
  $tag5  = trim( $_REQUEST['tag5-input'] ) ;     
  ?>
