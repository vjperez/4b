  //cambia color de divisiones
  function coloreaFile(){
    var limit = 150;
    var ladivision = document.getElementById('file-select-div');
    
    if( escogioFoto() ){
      ladivision.style.backgroundColor='#7ec97b'; 
      ladivision.style.border="1px solid #bfbfbf";
    }else{
      ladivision.style.backgroundColor='#f5f5f5';
      ladivision.style.border="1px solid #e5e5e5";
    }
  }
  
  //cambia color de letra de parrafo
  function daFileFbk(){
    var limit = 150;  
    var parrafo = document.getElementById('file-feedback-paragraph');
    
    if( ! escogioFoto() && noUsado() == limit){
      parrafo.style.color='red';
      parrafo.innerHTML='<b>Escoge una foto del juego de hoy.</b>';                                       /* es posible subir un file llamado algo.css o algo.exe .... need to work on this */
    }else if( ! escogioFoto() && noUsado() < limit){
      parrafo.style.color='green';
      parrafo.innerHTML='<b>Aun puedes escoger una foto.</b>';                                       /* es posible subir un file llamado algo.css o algo.exe .... need to work on this */
    }else{
      parrafo.style.color='green';
      parrafo.innerHTML='<b>Ya escogiste la foto !</b>';
    }    
  }
  

  //cambia color de divisiones
  function coloreaComentario(){
    var limit = 150;  
    var ladivision = document.getElementById('comentario-div');

    var faltan = noUsado();    
    if(faltan == limit){
      ladivision.style.backgroundColor='#f5f5f5';  //'#f3efe3'; //'#d5d5d5'; //bfbfbf
      ladivision.style.border="1px solid #e5e5e5";  //"1px solid #bfbfbf";
    }else if(faltan < 0){
      ladivision.style.backgroundColor='#ff0000';  
      ladivision.style.border="1px solid #bfbfbf";         
    }else{ // ha escrito algo y no se ha pasado
      ladivision.style.backgroundColor='#7ec97b';
      ladivision.style.border="1px solid #bfbfbf";
    }
  }
  
  //cambia color de letra de parrafo
  function daComentarioFbk(){
    var limit = 150;  
    /* ahora brega con el parrafo y da feedback pq ya se cuantos faltan */
    var parrafo = document.getElementById('comentario-feedback-paragraph');
    
    var faltan = noUsado(); 
    if(faltan == limit && ! escogioFoto()){
      parrafo.style.color='red';
      parrafo.innerHTML='<b>Comentario del juego de hoy.</b>'; 
    }else if(faltan == limit && escogioFoto()){
      parrafo.style.color='green';
      parrafo.innerHTML='<b>Comentario opcional del juego.</b>';    
    }else if(faltan > 1){
      parrafo.style.color='green';
      //parrafo.innerHTML= 'Puedes usar ' + faltan + ' letras mas.';
      parrafo.innerHTML= '<b>' + faltan + '</b>';
      parrafo.style.textAlign = 'right';
    }else if(faltan == 1){
      parrafo.style.color='green';
      //parrafo.innerHTML= 'Puedes usar ' + faltan + ' letra mas.';
      parrafo.innerHTML= '<b>' + faltan + '</b>';
    }else if(faltan == 0){
      parrafo.style.color='green';
      //parrafo.innerHTML= 'Usando exactamente ' + limit + ' letras.';
      parrafo.innerHTML= '<b>' + faltan + '</b>';   
    }else if(faltan == -1 ){
      parrafo.style.color='red';
      parrafo.innerHTML='<b>Tienes ' + (-1 * faltan) + ' letra de mas.</b>';
    }else if(faltan < -1 ){
      parrafo.style.color='red';
      parrafo.innerHTML='<b>Tienes ' + (-1 * faltan) + ' letras de mas.</b>';
    }
  }
 


 
   function escogeDeporte(){/*este chechea los 4, podrias setearlos inicialmente y luego solo cambiar el cliqueado usando division como parametro*/
    var botonArr = ["baloncesto-boton", "beisbol-boton", "futbol-soccer-boton", "volibol-boton"];
    var divArr = ["baloncesto-inputbox-div", "beisbol-inputbox-div", "futbol-soccer-inputbox-div", "volibol-inputbox-div"];
    for(index = 0; index < botonArr.length; index++){
      var boton = document.getElementById(botonArr[index]);
      var ladivision = document.getElementById(divArr[index]);
      //var labels = ladivision.getElementsByTagName('label');
      if(boton.checked == true){
        ladivision.style.backgroundColor='#7ec97b';
        ladivision.style.border="1px solid #bfbfbf";
        //labels[0].style.color='#ffffff';
        //labels[0].style.fontWeight='bold';
      }else{
        ladivision.style.backgroundColor='#f5f5f5';  //'#f3efe3'; //'#d5d5d5'; // f5f5f5
        ladivision.style.border="1px solid #e5e5e5"; //"1px solid #bfbfbf";
        //labels[0].style.color='#000000';
        //labels[0].style.fontWeight='normal';
      }
    }
  }
  function daDeporteFeedback(){
    var parrafo = document.getElementById('deporte-feedback-paragraph');
    var boton1 = document.getElementById('baloncesto-boton');
    var boton2 = document.getElementById('futbol-soccer-boton');
    var boton3 = document.getElementById('beisbol-boton');
    var boton4 = document.getElementById('volibol-boton');
    if(boton1.checked == true || boton2.checked == true || boton3.checked == true || boton4.checked == true){
      parrafo.style.color='green';
      parrafo.innerHTML='';    
    }else{
      parrafo.style.color='red';
      parrafo.innerHTML='<b>Escoge el Deporte.</b>';
    }    
  }  
  

  
  
  
    //cambia color de divisiones
    function coloreaTags(){  //este chechea los 4, podrias setearlos inicialmente y luego solo cambiar el cliqueado usando division como parametro
    var limit = 40;
    var botonArr = ["tag1-input", "tag2-input", "tag3-input", "tag4-input", "tag5-input"];
    var divArr = ["tag1-input-div", "tag2-input-div", "tag3-input-div", "tag4-input-div", "tag5-input-div"];
    for(index = 0; index < botonArr.length; index++){
      var boton = document.getElementById(botonArr[index]);
      var ladivision = document.getElementById(divArr[index]);
      var labels = ladivision.getElementsByTagName('label'); /*  get the elements named 'label' from  "ladivision" NOT FROM document */
      if(boton.value != '' && boton.value.length <= limit){
        ladivision.style.backgroundColor='#7ec97b';
        ladivision.style.border="1px solid #bfbfbf";
        labels[0].style.color='#ffffff';
        labels[0].style.fontWeight='bold';
      }else{
        ladivision.style.backgroundColor='#f5f5f5';  //'#f3efe3'; //'#d5d5d5'; //aeb2c3
        ladivision.style.border="1px solid #e5e5e5";  //"1px solid #bfbfbf";
        labels[0].style.color='#000000';
        labels[0].style.fontWeight='normal';
      }
    }
  }
  //cambia color de letra de parrafo
  function daTagsFbk(){
    var limit = 40;
    var usadas1 = document.getElementById('tag1-input').value.length;
    var faltan1 = limit - usadas1;       
    var usadas2 = document.getElementById('tag2-input').value.length;
    var faltan2 = limit - usadas2;
    var usadas3 = document.getElementById('tag3-input').value.length;
    var faltan3 = limit - usadas3;       
    var usadas4 = document.getElementById('tag4-input').value.length;
    var faltan4 = limit - usadas4;
    var usadas5 = document.getElementById('tag5-input').value.length;
    var faltan5 = limit - usadas5;          
    var faltanArr = [faltan1, faltan2, faltan3, faltan4, faltan5];
    var parrafoArr = ["tag1-feedback-paragraph", "tag2-feedback-paragraph", "tag3-feedback-paragraph", "tag4-feedback-paragraph", "tag5-feedback-paragraph"];
    for(index = 0; index < parrafoArr.length; index++){
      var parrafo = document.getElementById(parrafoArr[index]);
      if(faltanArr[index] == limit){
        parrafo.style.color='red';
        //parrafo.innerHTML='Taguea la foto.<br>' + limit + ' letras.';    
        parrafo.innerHTML='<b>Taguea la foto.</b>'; 
      }else if(faltanArr[index] >= 0){
        parrafo.style.color='green';
        //if(faltanArr[index] >= 2) parrafo.innerHTML= 'Puedes usar ' + faltanArr[index] + ' letras mas.';
        //if(faltanArr[index] == 1) parrafo.innerHTML= 'Puedes usar ' + faltanArr[index] + ' letra mas.';
        if(faltanArr[index] >= 1) parrafo.innerHTML= faltanArr[index];
        if(faltanArr[index] == 0) parrafo.innerHTML= 'Usando exactamente ' + limit + ' letras.';
      }else if(faltanArr[index] < 0){
        parrafo.style.color='red';
        if(faltanArr[index] == -1) parrafo.innerHTML= 'Tienes ' + (-1 * faltanArr[index]) + ' letra de mas.';
        if(faltanArr[index] <  -1) parrafo.innerHTML= 'Tienes ' + (-1 * faltanArr[index]) + ' letras de mas.';
      }
    }

  }
  
  
  
  
    function bregaConSubmitButton(){
    var feedbackColor0 = document.getElementById('file-feedback-paragraph').style.color;
    var feedbackColor1 = document.getElementById('deporte-feedback-paragraph').style.color;
    var feedbackColor2 = document.getElementById('tag1-feedback-paragraph').style.color;
    var feedbackColor3 = document.getElementById('tag2-feedback-paragraph').style.color;
    var feedbackColor4 = document.getElementById('tag3-feedback-paragraph').style.color;
    var feedbackColor5 = document.getElementById('comentario-feedback-paragraph').style.color;
    var feedback = document.getElementById('submit-feedback-paragraph');
    //console.log("parrafos  = " + parrafo0 + " " + parrafo1 + " " + parrafo2 + " " + parrafo3);
    if(feedbackColor4 == 'green' && feedbackColor5 == 'green' &&   
       feedbackColor3 == 'green' && feedbackColor2 == 'green' && feedbackColor1 == 'green' && feedbackColor0 == 'green'){
      document.getElementById('submit-boton').disabled=false;
      document.getElementById('submit-boton').style.color='#ffffff';
      document.getElementById('submit-boton').style.fontWeight='bold';
      document.getElementById('submit-boton').style.backgroundColor='#098ea8';
      document.getElementById('submit-boton').style.cursor='pointer';
      feedback.innerHTML=''; 
    }else{
      feedback.style.color='red';  
      feedback.innerHTML='<b>Falta alguna informacion antes de postear.</b>';
      document.getElementById('submit-boton').disabled=true;
      document.getElementById('submit-boton').style.color='#000000';
      document.getElementById('submit-boton').style.fontWeight='normal';
      document.getElementById('submit-boton').style.backgroundColor='#f5f5f5';
      document.getElementById('submit-boton').style.cursor='default'; 
    }
  }

  function noUsado(){
    var limit = 150;
    var usadas = document.getElementById('comentario-area').value.length;
    return limit - usadas;        
  } 
  function escogioFoto(){
    var filechboton = document.getElementById('file-choose-boton');  
    return filechboton.value != '';  
  }
