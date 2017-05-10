<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>4 bolas Deporte Infantil Y Juvenil en Puerto Rico Baloncesto Beisbol Volibol Futbol Soccer</title>
<link rel="stylesheet" type="text/css" href="escritos/estilo/comun.css">
<link rel="stylesheet" type="text/css" href="escritos/estilo/ponlo.css">

<link rel="stylesheet" type="text/css" media='screen and (max-width: 500px)' href="escritos/estilo/ponloxSmall.css">
<link rel='stylesheet' type="text/css" media='screen and (min-width: 501px) and (max-width: 700px)' href='escritos/estilo/ponloSmall.css'>
<link rel='stylesheet' type="text/css" media='screen and (min-width: 701px) and (max-width: 1200px)' href='escritos/estilo/ponloMedium.css'>
<link rel='stylesheet' type="text/css" media='screen and (min-width: 1201px)' href='escritos/estilo/ponloBig.css'>

<script type="text/javascript" src="escritos/js/ponlo.js"></script>
</head>


<body>


<div id="papel">    



<!---------------------------------------------------------------------------------------------------->
<div id="titulo">
<ul>
<li><a href='portada.php'><img src="icon/baloncesto.png" alt="puerto rico baloncesto infantil"></a></li>
<li><a href='portada.php'><img src="icon/beisbol.png" alt="puerto rico beisbol infantil"></a></li>
<li><a href='portada.php'><img src="icon/futbol-soccer.png" alt="puerto rico futbol soccer infantil"></a></li>
<li><a href='portada.php'><img src="icon/volibol.png" alt="puerto rico volibol infantil"></a></li>
<li id="titulo-text">Infantil y Juvenil</li>
</ul>
</div><!--end of titulo--> 



<form action="escritos/php/ponlo/ponlo.php" method="POST" enctype="multipart/form-data">
<!---------------------------------------------------------------------------------------------------->
<!---------------------------------------------------------------------------------------------------->
<div id="file-Y-comentario">
<p class="header">Foto Y Comentario</p> 

<!---------------------------------------------------------------------------------------------------->
<div id="file-foto">
<div>
<p id="file-feedback-paragraph"><!--   inserted by js   --></p>
</div>
<div id="file-select-div">
<input type="hidden" name="MAX_FILE_SIZE" value="5000000">
<label class="loadLabel">
    <input type="file" id="file-choose-boton" name="laFoto" accept="image/*" onchange="coloreaFile();daFileFbk();coloreaComentario();daComentarioFbk();bregaConSubmitButton();" ></input>
    <span>Foto</span>
</label>
</div>
</div><!-- end of file-foto -->


<!---------------------------------------------------------------------------------------------------->
<div id="comentario">
<div>
<p id="comentario-feedback-paragraph"><!--   inserted by js   --></p>
</div>
<div id="comentario-div">
<textarea rows="5" cols="40"  id="comentario-area" name="comentario-area" onkeyup="coloreaComentario();daComentarioFbk();coloreaFile();daFileFbk();bregaConSubmitButton();"></textarea>
</div>
<script type="text/javascript">
  coloreaFile();
  daFileFbk();    
  coloreaComentario();
  daComentarioFbk();
</script>
</div><!-- end of comentario -->

<div id="justToClear"></div>
</div><!-- end of file-Y-comentario --> 



<!--------------------------------------------------------------------------------------------------->
<div id="selecciona">
<p class="header">Deporte</p>
<div>
<p id="deporte-feedback-paragraph"><!--   inserted by js   --></p>
</div>
<div id="baloncesto-inputbox-div">
<input type="radio" name="deporte" id="baloncesto-boton" value="baloncesto" onclick="escogeDeporte();daDeporteFeedback();bregaConSubmitButton();">
<label for="baloncesto-boton"><img src="icon/baloncesto.png" alt="puerto rico baloncesto infantil" class="select-img"></label>
</div>
<div  id="beisbol-inputbox-div">
<input type="radio" name="deporte" id="beisbol-boton" value="beisbol" onclick="escogeDeporte();daDeporteFeedback();bregaConSubmitButton();">
<label for="beisbol-boton"><img src="icon/beisbol.png" alt="puerto rico beisbol infantil" class="select-img"></label>
</div>
<div  id="futbol-soccer-inputbox-div">
<input type="radio" name="deporte" id="futbol-soccer-boton" value="futbol-soccer" onclick="escogeDeporte();daDeporteFeedback();bregaConSubmitButton();">
<label for="futbol-soccer-boton"><img src="icon/futbol-soccer.png" alt="puerto rico futbol soccer infantil" class="select-img"></label>
</div>
<div  id="volibol-inputbox-div">
<input type="radio" name="deporte" id="volibol-boton" value="volibol" onclick="escogeDeporte();daDeporteFeedback();bregaConSubmitButton();">            
<label for="volibol-boton"><img src="icon/volibol.png" alt="puerto rico voleibol infantil" class="select-img"></label>
</div>

<script type="text/javascript">
  escogeDeporte();
  daDeporteFeedback();
</script>
<div id="justToClear"></div>
</div><!-- end of selecciona --> 



<!---------------------------------------------------------------------------------------------------->
<div id="etiquetas">
<p class="header">Tags</p>    
<div>
<p id="tag1-feedback-paragraph"><!--   inserted by js   --></p>
</div>
<div id="tag1-input-div">
<label for="tag1-input" class="sr-only">Torneo</label>
<input type="text" id="tag1-input" name="tag1-input" placeholder="Nombre del Torneo" onkeyup="coloreaTags();daTagsFbk();bregaConSubmitButton();" required="true">
</div>
<div>
<p id="tag2-feedback-paragraph"><!--   inserted by js   --></p>
</div>
<div id="tag2-input-div">
<label for="tag2-input" class="sr-only">Equipo</label> 
<input type="text" id="tag2-input" name="tag2-input" placeholder="Nombre del Equipo" onkeyup="coloreaTags();daTagsFbk();bregaConSubmitButton();" required="true">
</div>

<div>
<p id="tag3-feedback-paragraph"><!--   inserted by js   --></p>
</div>
<div id="tag3-input-div">
<label for="tag3-input" class="sr-only">Tag</label>
<input type="text" id="tag3-input" name="tag3-input" placeholder="Categoria" onkeyup="coloreaTags();daTagsFbk();bregaConSubmitButton();" required="true">
</div>
<div>
<p id="tag4-feedback-paragraph"><!--   inserted by js   --></p>
</div>
<div id="tag4-input-div">
<label for="tag4-input" class="sr-only">Tag</label> 
<input type="text" id="tag4-input" name="tag4-input" placeholder="Opcional" onkeyup="coloreaTags();daTagsFbk();bregaConSubmitButton();">
</div>
<div>
<p id="tag5-feedback-paragraph"><!--   inserted by js   --></p>
</div>
<div id="tag5-input-div">
<label for="tag5-input" class="sr-only">Tag</label>
<input type="text" id="tag5-input" name="tag5-input" placeholder="Opcional" onkeyup="coloreaTags();daTagsFbk();bregaConSubmitButton();">
</div>
<script type="text/javascript">
  coloreaTags();
  daTagsFbk();
</script>
</div><!-- end of etiquetas -->        
          
          
          



<!---------------------------------------------------------------------------------------------------->
<div id="submit-div">
<div>
<p id="submit-feedback-paragraph"><!--   inserted by js   --></p>
</div>
<button type="submit" id="submit-boton">Postealo !</button>
<!-- <input type="submit" value="Go" id="submit-boton">  -->

<script type="text/javascript">
  bregaConSubmitButton();
</script>
</div><!-- end of submit -->

</form>

<!---------------------------------------------------------------------------------------------------->
<div id="despedida">
4 bolas. Hecho en Puerto Rico. Feito em Puerto Rico. Made in Puerto Rico.
</div><!--end of despedida-->


          
</div><!-- end of papel-->
</body>
</html>
