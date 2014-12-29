<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>4 bolas</title>

<link rel="stylesheet" type="text/css" href="../../estilo/comun.css">
<!--
<link rel="stylesheet" type="text/css" href="../../estilo/muestralo.css">
-->
<link rel="stylesheet" type="text/css" href="../../estilo/portada.css">
<link rel="stylesheet" type="text/css" media='screen and (max-width: 700px)' href="../../estilo/portadaSmall.css">
<link rel='stylesheet' type="text/css" media='screen and (min-width: 701px) and (max-width: 1200px)' href='../../estilo/portadaMedium.css'>
<link rel='stylesheet' type="text/css" media='screen and (min-width: 1201px)' href='../../estilo/portadaBig.css'>
</head>
<body>
    
    
<div class="papel">
    
    
<div id="titulo" class="palcentro">
<a href='../../portada.php'><img src="../../foto/bkt.png" alt="foto"></a>
<a href='../../portada.php'><img src="../../foto/bsbl.png" alt="foto"></a>
<a href='../../portada.php'><img src="../../foto/ftbl.png" alt="foto"></a>
<a href='../../portada.php'><img src="../../foto/vlly.png" alt="foto"></a>
</div><!--end of titulo--> 


<div id="mensaje" class="palcentro">


<div class="aclara"></div>
<div class="vaciocien"></div>
<div class="aclara"></div>
<div class="vaciocien"></div>

  
<!---------------------------------------------------------------------------------------------------->
<div class="vaciocien"></div>
<div class="vacio2ymedio"></div>
<div class="lkentry1-3 palaizq lk">
<a href="../../ponlo.htm"><img src="../../foto/camera.png" alt="foto"><span>Ponlo en 4bolas.</span></a>
</div>
<div class="vacio2ymedio"></div>
<div class="lkentry1-3 palaizq lk">
<a href="../../ponlo.htm"><img src="../../foto/camera.png" alt="foto"><span>Ponlo en 4bolas.</span></a>
</div>
<div class="vacio2ymedio"></div>
<div class="lkentry1-3 palaizq lk">
<a href="../../ponlo.htm"><img src="../../foto/camera.png" alt="foto"><span>Ponlo en 4bolas.</span></a>
</div>
<div class="vacio2ymedio"></div>
<div class="aclara"></div>
<div class="vaciocien"></div>
<!---------------------------------------------------------------------------------------------------->


<div class="aclara"></div>
<div class="vaciocien"></div>


<?php
$mensaje1 = '';
$mensaje2 = '';
require_once 'datosConfig.php';
require_once 'conecta.php';
  $entradaid = $_REQUEST['id'];
  if($entradasarray = mysqli_query($cxn, "SELECT * FROM fotoentrada WHERE id=$entradaid;") ){
    if($row = mysqli_fetch_array($entradasarray, MYSQLI_NUM)){
      //los saco
      $id = $row[0];           // problem if $id no es igual a $entradaid
      $deporte = $row[1];
      $nivel = $row[2];
      $tag3 = $row[3];
      $tag4 = $row[4];
      $tag5 = $row[5];
      $fechahora = $row[6];
      if( ! is_null($row[7]) ) $comentario = $row[7];
      else $comentario = '';
      if($fotosarray = mysqli_query($cxn, "SELECT * FROM foto WHERE fotoentradaid=$id;") ){
        //los masajeo
        require 'muestralo_masajeout.php';     
        $deportefotopath = getdeportefotopath($deporte);
        $nivelexpression = getnivelexpression($nivel); 
        if($foto = mysqli_fetch_array($fotosarray, MYSQLI_NUM)){ // este if asume q hay solo 1 foto por entrada
          $entradafotopath = $id . '.' . $fotoTipo[$foto[3]]; // goal is to tranform $id into a seq of chars, and that seq of chars will be part of the file system path 
        }  
          //los muestro   
          echo'<div class="aclara"></div>';
          echo'<div class="vaciocien"></div>';
          echo'<div class="vacio2ymedio"></div>';
          echo'<div class="entry">';
          echo "<div class='hora'>$fechahora</div>";
          if($foto) echo"<img src='../../loaded/$entradafotopath' alt='foto' class='mainimg'>";    
          echo"<div class='tag12'>";
          echo"<a href='#'><img src='../../foto/$deportefotopath' alt='foto' class='sportimg'><span>$nivelexpression</span></a>";
          if($nivel == 3) { echo "<img src='../../foto/pr.png' alt='foto' class='statecountryimg'>"; } 
          echo '</div>';
          echo "<div class='tag34'><a href='#'>$tag3</a></div>";
          echo "<div class='tag34'><a href='#'>$tag4</a></div>";
          echo "<div class='tag5'><a href='#'>$tag5</a></div>";
          echo "<div class='comentario'><p>$comentario</p></div>";
          echo "</div>";            
        
        mysqli_free_result($entradasarray);
        mysqli_free_result($fotosarray);
        mysqli_close($cxn); 
      }else{
        $mensaje1 = 'No tengo arreglo de fotos.';
        $mensaje2 = 'muestralo.php: ' . mysqli_error($cxn); 
        mysqli_free_result($entradasarray);
        mysqli_close($cxn);
        brega_error($mensaje1,$mensaje2); 
      }    
    // de aqui pa rriba tengo un arreglo de entradas , con la entrada q quiero   
    }else{
      $mensaje1 =  'Lo que buscas ... no existe.';
      $mensaje2 =  'muestralo.php: Tengo arreglo de entradas (rows) ... ja pero esta vacio.';
      mysqli_free_result($entradasarray); 
      mysqli_close($cxn);
      brega_error($mensaje1,$mensaje2);      
    }
  }else{
    $mensaje1 = 'No tengo arreglo de entradas.';
    $mensaje2 = 'muestralo.php: ' . mysqli_error($cxn);
    mysqli_close($cxn);
    brega_error($mensaje1,$mensaje2);
  }

?>  


<div class="aclara"></div>
<div class="vaciocien"></div>
<div class="aclara"></div>
<div class="vaciocien"></div>
<div class="aclara"></div>
<div class="vaciocien"></div>
<div class="aclara"></div>
<div class="vaciocien"></div>


<!---------------------------------------------------------------------------------------------------->
<form action="#">
<legend></legend>
<div class="aclara"></div>
<div class="vaciocien"></div>
<div id="bt">
<button type="submit" id="lessbtn"><img src="../../foto/l.png" alt=""></button>
<button type="submit" id="morebtn"><img src="../../foto/r.png" alt=""></button>
</div>
</form>    
<!---------------------------------------------------------------------------------------------------->


<div class="aclara"></div>
<div class="vaciocien"></div>
<div class="aclara"></div>
<div class="vaciocien"></div>
<div class="aclara"></div>
<div class="vaciocien"></div>
<div class="aclara"></div>
<div class="vaciocien"></div>


</div><!-- end mensaje-->


<div id="despedida" class="palcentro">
4 bolas. Hecho en Puerto Rico. Feito em Puerto Rico. Made in Puerto Rico.
</div><!--end of despedida-->
          

</div><!-- end papel-->
</body>
</html>

