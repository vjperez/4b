<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>4 bolas</title>
<link rel="stylesheet" type="text/css" href="../../estilo/comun.css">
</head>
<body>
<div class="papel">
    
    
<div id="titulo" class="palcentro">
<a href='../../portada.php'>
<img src="../../foto/bolas.gif" alt="foto">
</a>
</div><!--end of titulo--> 


<div id="mensaje" class="palcentro">


<div class="aclara"></div>
<div class="vaciocien"></div>
<div class="aclara"></div>
<div class="vaciocien"></div>

<?php
$mensaje1 = '';
$mensaje2 = '';
$query  = $_REQUEST['elQuery'];
require_once 'conecta.php';
require_once 'datosConfig.php';
if(! mysqli_query($cxn, $query) ){
    $mensaje1 = 'Error corriendo query: ' . $query;
    $mensaje2 = 'runquery.php: ' . mysqli_error($cxn);      
}else{
    //echo '<p>Corrio el query: ' . $query . '<br></p>';  
    $showQuery = 'SELECT * FROM fotoentrada;';
    $recurso = mysqli_query($cxn, $showQuery); // puts an array of rows on recurso ...  or FALSE
    if(!$recurso){
        $mensaje1 = 'Error con query para mostrar tabla fotoentrada.';
        $mensaje2 = 'runquery.php: ' . mysqli_error($cxn);      
    }else{
        echo '<p>Tabla despues de correr el query: ' . $query . ' y el query ' . $showQuery . '<br></p>';
        echo '<table>';
        echo '<tr><th>id</th><th>deporte</th><th>nivel</th><th>tag3</th><th>tag4</th><th>tag5</th><th>time stamp</th><th>comentario</th></tr>';
        while($fila = mysqli_fetch_row($recurso)){ // there is an array of rows on result   
            echo '<tr>';
            echo'<td>' . $fila[0] . '</td>';
            echo'<td>' . $fila[1] . '</td>';
            echo'<td>' . $fila[2] . '</td>';
            echo'<td>' . $fila[3] . '</td>';
            echo'<td>' . $fila[4] . '</td>';
            echo'<td>' . $fila[5] . '</td>';
            echo'<td>' . $fila[6] . '</td>';
            echo'<td>' . $fila[7] . '</td>';
            echo '</tr>';
        }
        echo '</table>';
        mysqli_free_result($recurso);
    }  
   
     
    //echo '<p>Corrio el query: ' . $query . '<br></p>';  
    $showQuery = 'SELECT * FROM foto;';
    $recurso = mysqli_query($cxn, $showQuery); // puts an array of rows on recurso ...  or FALSE
    if(!$recurso){
        $mensaje1 = 'Error con query para mostrar tabla foto.';
        $mensaje2 = 'runquery.php: ' . mysqli_error($cxn);      
    }else{
        echo '<p>Tabla despues de correr el query: ' . $query . ' y el query ' . $showQuery . '<br></p>';
        echo '<table>';
        echo '<tr><th>id</th><th>width</th><th>heigth</th><th>tipo</th><th>fotoentradaid</th></tr>';
        while($fila = mysqli_fetch_row($recurso)){ // there is an array of rows on result   
            echo '<tr>';
            echo'<td>' . $fila[0] . '</td>';
            echo'<td>' . $fila[1] . '</td>';
            echo'<td>' . $fila[2] . '</td>';
            echo'<td>' . $fila[3] . '</td>';
            echo'<td>' . $fila[4] . '</td>';
            echo '</tr>';
        }
        echo '</table>';
        mysqli_free_result($recurso);
    } 
    
            
}  
mysqli_close($cxn);
if($mensaje1 != ''){
  brega_error($mensaje1,$mensaje2);
}
?>

</div><!-- end mensaje-->
          
          
<div class="aclara"></div>
<div class="vaciocien"></div>
<div class="aclara"></div>
<div class="vaciocien"></div>


<div id="despedida" class="palcentro">
4 bolas. Hecho en Puerto Rico. Feito em Puerto Rico. Made in Puerto Rico.
</div><!--end of despedida-->
          

</div><!-- end papel-->
</body>
</html>
