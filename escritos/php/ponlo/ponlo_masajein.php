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
    'este' => 3,
    'metro' => 4,
    'centro' => 5,
    'usa' => 6,
    'otro' => 7    
  );
  // aqui cambio los valores
  $deporte   = $deporteArray[ $_REQUEST['deporte'] ];
  $area = $areaArray[ $_REQUEST['area'] ];

  //trim or deal with it in JS ?!?! 
  $tag3  = trim( $_REQUEST['tag3-input'] );
  $tag4  = trim( $_REQUEST['tag4-input'] );
  $tag5  = trim( $_REQUEST['tag5-input'] ) ; 
  
  if(isset($_REQUEST['comentario-area'])){
    $comentario = trim( $_REQUEST['comentario-area'] );
    if($comentario == '')  $comentario = FALSE; 
  }else{
    $comentario = FALSE;    
  }
 
  // //$originalfotoname  = $_REQUEST['laFoto'];  
  
  
  //usado para producir texto de acuerdo a los digitos de errores subiendo foto dados por  $_FILES['laFoto']['error'] 
  $errorLoadingFile = array(
    1 => 'Foto es mas grande de lo que dice php.ini.',
    2 => 'Foto es mas grande de lo que dice ponlo.htm.',
    3 => 'Foto subida parcialmente.',
    4 => 'No escogiste ninguna foto.'
  );
  
  
  //usado para contruir el nombre de la foto de acuerdo a su tipo y moverla con move_uploaded_file() en ponlo.php
  //el tipo en forma numerica sale de exif_imagetype() en ponlo.php
  //Tambien definido en masajeout (bad?)
/* 
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
*/  
  /*
  if( empty($_FILES['laFoto']['name']) ){
    $foto = FALSE;					// no foto selected to upload: entry will not have photo: not trying to upload a photo
  }else{
    $foto = $_FILES['laFoto'];   
  }
  */
  ?>
