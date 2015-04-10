<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>4 bolas Deporte Infantil Y Juvenil en Puerto Rico Baloncesto Beisbol Volibol Futbol Soccer</title>
<link rel="stylesheet" type="text/css" href="escritos/estilo/comun.css">
<link rel="stylesheet" type="text/css" href="escritos/estilo/ponlo.css">

<link rel="stylesheet" type="text/css" media='screen and (max-width: 700px)' href="escritos/estilo/ponloSmall-Medium.css">
<link rel='stylesheet' type="text/css" media='screen and (min-width: 701px) and (max-width: 1200px)' href='escritos/estilo/ponloSmall-Medium.css'>
<link rel='stylesheet' type="text/css" media='screen and (min-width: 1201px)' href='escritos/estilo/ponloBig.css'>
<!--
<link rel='stylesheet' type="text/css" media='screen and (min-width: 1025px)' href='estilo/portada-1000.css'>
<link rel='stylesheet' type="text/css" media='screen and (min-width: 1260px)' href='estilo/portada-1250.css'>
-->

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

	
<!---------------------------------------------------------------------------------------------------->
<div id="file-foto">
<div>
<p id="file-feedback-paragraph"><!--   inserted by js   --></p>
</div>
<div id="file-select-div">
<input type="hidden" name="MAX_FILE_SIZE" value="5000000">
<input type="file" id="file-choose-boton" name="laFoto" accept="image/*" onchange="coloreaFile();daFileFbk();coloreaComentario();daComentarioFbk();bregaConSubmitButton();" ></input>
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
<fieldset>
<div>
<p id="area-feedback-paragraph"><!--   inserted by js   --></p>
</div>
<div id="norte-inputbox-div">
<input type="radio" name="area" id="norte-boton" value="norte" onclick="escogeArea();daAreaFeedback();bregaConSubmitButton();">
<label for="norte-boton">Norte</label>
</div>
<div  id="sur-inputbox-div">
<input type="radio" name="area" id="sur-boton" value="sur" onclick="escogeArea();daAreaFeedback();bregaConSubmitButton();">
<label for="sur-boton">Sur</label>
</div>
<div  id="oeste-inputbox-div">
<input type="radio" name="area" id="oeste-boton" value="oeste" onclick="escogeArea();daAreaFeedback();bregaConSubmitButton();">
<label for="oeste-boton">Oeste</label>
</div>
<div  id="este-inputbox-div">
<input type="radio" name="area" id="este-boton" value="este" onclick="escogeArea();daAreaFeedback();bregaConSubmitButton();">            
<label for="este-boton">Este</label>
</div>
</fieldset>
<script type="text/javascript">
  escogeArea();
  daAreaFeedback();
</script>
<fieldset>
<div>
<p id="deporte-feedback-paragraph"><!--   inserted by js   --></p>
</div>
<div id="baloncesto-inputbox-div">
<input type="radio" name="deporte" id="baloncesto-boton" value="baloncesto" onclick="escogeDeporte();daDeporteFeedback();bregaConSubmitButton();">
<img src="icon/baloncesto.png" alt="puerto rico baloncesto infantil" class="select-img">
</div>
<div  id="beisbol-inputbox-div">
<input type="radio" name="deporte" id="beisbol-boton" value="beisbol" onclick="escogeDeporte();daDeporteFeedback();bregaConSubmitButton();">
<img src="icon/beisbol.png" alt="puerto rico beisbol infantil" class="select-img">
</div>
<div  id="futbol-soccer-inputbox-div">
<input type="radio" name="deporte" id="futbol-soccer-boton" value="futbol-soccer" onclick="escogeDeporte();daDeporteFeedback();bregaConSubmitButton();">
<img src="icon/futbol-soccer.png" alt="puerto rico futbol soccer infantil" class="select-img">
</div>
<div  id="volibol-inputbox-div">
<input type="radio" name="deporte" id="volibol-boton" value="volibol" onclick="escogeDeporte();daDeporteFeedback();bregaConSubmitButton();">            
<img src="icon/volibol.png" alt="puerto rico voleibol infantil" class="select-img">
</div>
</fieldset>
<script type="text/javascript">
  escogeDeporte();
  daDeporteFeedback();
</script>
</div><!-- end of selecciona -->         
          
          
          
<!---------------------------------------------------------------------------------------------------->
<div id="etiquetas">
<div>
<p id="tag3-feedback-paragraph"><!--   inserted by js   --></p>
</div>
<div id="tag3-input-div">
<label for="tag3-input">Tag 1</label>
<input type="text" id="tag3-input" name="tag3-input" onkeyup="coloreaTags();daTagsFbk();bregaConSubmitButton();" required="true">
</div>
<div>
<p id="tag4-feedback-paragraph"><!--   inserted by js   --></p>
</div>
<div id="tag4-input-div">
<label for="tag4-input">Tag 2</label> 
<input type="text" id="tag4-input" name="tag4-input" onkeyup="coloreaTags();daTagsFbk();bregaConSubmitButton();" required="true">
</div>
<div>
<p id="tag5-feedback-paragraph"><!--   inserted by js   --></p>
</div>
<div id="tag5-input-div">
<label for="tag5-input">Tag 3</label>
<input type="text" id="tag5-input" name="tag5-input" onkeyup="coloreaTags();daTagsFbk();bregaConSubmitButton();" required="true">
</div>
<script type="text/javascript">
  coloreaTags();
  daTagsFbk();
</script>
</div><!-- end of etiquetas -->



<!---------------------------------------------------------------------------------------------------->
<div id="submit-div">
<button type="submit" id="submit-boton">Submit</button>
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
