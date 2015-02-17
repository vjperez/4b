  function coloreaFile(){
    var limit = 150;
    var ladivision = document.getElementById('file-select-div');
    
    if( ! escogioFoto() && noUsado() == limit){
      ladivision.style.backgroundColor='#d5d5d5';
      ladivision.style.border="1px solid #bfbfbf";
    }else if( ! escogioFoto() && noUsado() < limit){
      ladivision.style.backgroundColor='#7ec97b';
      ladivision.style.border="1px solid #bfbfbf";
    }else{
      ladivision.style.backgroundColor='#7ec97b'; 
      ladivision.style.border="1px solid #bfbfbf";
    }
  }
  function daFileFbk(){
    var limit = 150;  
    var parrafo = document.getElementById('file-feedback-paragraph');
    
    if( ! escogioFoto() && noUsado() == limit){
      parrafo.style.color='red';
      parrafo.innerHTML='Escoge tu foto del juego de hoy.';                                       /* es posible subir un file llamado algo.css o algo.exe .... need to work on this */
    }else if( ! escogioFoto() && noUsado() < limit){
      parrafo.style.color='green';
      parrafo.innerHTML='Aun puedes escoger una foto.';                                       /* es posible subir un file llamado algo.css o algo.exe .... need to work on this */
    }else{
      parrafo.style.color='green';
      parrafo.innerHTML='Ya escogiste la foto !';
    }    
  }
  
  
  
  
//
//    function coloreaDeporte(){/*este chechea los 4, podrias setearlos inicialmente y luego solo cambiar el cliqueado usando division como parametro*/
//    var botonArr = ["baloncesto-radio-boton", "futbol-soccer-radio-boton", "beisbol-radio-boton", "volibol-radio-boton"];
//    var divArr = ["baloncesto-inputbox-div", "beisbol-inputbox-div", "futbol-soccer-inputbox-div", "volibol-inputbox-div"];
//    for(index = 0; index < botonArr.length; index++){
//      var boton = document.getElementById(botonArr[index]);
//      var ladivision = document.getElementById(divArr[index]);
//      var labels = ladivision.getElementsByTagName('label');
//      if(boton.checked == true){
//        ladivision.style.backgroundColor='#7ec97b';
//        ladivision.style.border="1px solid #bfbfbf";
//        labels[0].style.color='#ffffff';
//        labels[0].style.fontWeight='bold';
//      }else{
//        ladivision.style.backgroundColor='#d5d5d5'; //aeb2c3
//        ladivision.style.border="1px solid #bfbfbf";
//        labels[0].style.color='#000000';
//        labels[0].style.fontWeight='normal';
//      }
//    }
//  }

  function daDeporteFeedback(){
    var parrafo = document.getElementById('deporte-feedback-paragraph');
    var boton1 = document.getElementById('baloncesto-boton');
    var boton2 = document.getElementById('futbol-soccer-boton');
    var boton3 = document.getElementById('beisbol-boton');
    var boton4 = document.getElementById('volibol-boton');
    if(boton1.checked == true || boton2.checked == true || boton3.checked == true || boton4.checked == true){
      parrafo.style.color='green';
      parrafo.innerHTML='OK !';    
    }else{
      parrafo.style.color='red';
      parrafo.innerHTML='Escoge el deporte que te interesa.';
    }    
  }  
  
  
//    function coloreaNivel(){/*este chechea los 4, podrias setearlos inicialmente y luego solo cambiar el cliqueado usando division como parametro*/
//    var botonArr = ["norte-radio-boton", "sur-radio-boton", "oeste-radio-boton", "este-radio-boton"];
//    var divArr = ["norte-inputbox-div", "sur-inputbox-div", "oeste-inputbox-div", "este-inputbox-div"];
//    for(index = 0; index < botonArr.length; index++){
//      var boton = document.getElementById(botonArr[index]);
//      var ladivision = document.getElementById(divArr[index]);
//      var labels = ladivision.getElementsByTagName('label');
//      if(boton.checked == true){
//        ladivision.style.backgroundColor='#7ec97b';
//        ladivision.style.border="1px solid #bfbfbf";
//        labels[0].style.color='#ffffff';
//        labels[0].style.fontWeight='bold';
//      }else{
//        ladivision.style.backgroundColor='#d5d5d5'; //bfbfbf
//        ladivision.style.border="1px solid #bfbfbf";
//        labels[0].style.color='#000000';
//        labels[0].style.fontWeight='normal';
//      }
//    }
//  }
  
  function daAreaFeedback(){
    var parrafo = document.getElementById('area-feedback-paragraph');
    var boton1 = document.getElementById('norte-boton');
    var boton2 = document.getElementById('sur-boton');
    var boton3 = document.getElementById('oeste-boton');
    var boton4 = document.getElementById('este-boton');
    if(boton1.checked == true || boton2.checked == true || boton3.checked == true || boton4.checked == true){
      parrafo.style.color='green';
      parrafo.innerHTML='OK !';    
    }else{
      parrafo.style.color='red';
      parrafo.innerHTML='Escoge el Area de Puerto Rico que te interesa.';
    }    
  }  
  
    //cambia color de divisiones
    function coloreaTags(){/*este chechea los 4, podrias setearlos inicialmente y luego solo cambiar el cliqueado usando division como parametro*/
    var limit = 40;
    var botonArr = ["tag3-input", "tag4-input", "tag5-input"];
    var divArr = ["tag3-input-div", "tag4-input-div", "tag5-input-div"];
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
        ladivision.style.backgroundColor='#d5d5d5'; //aeb2c3
        ladivision.style.border="1px solid #bfbfbf";
        labels[0].style.color='#000000';
        labels[0].style.fontWeight='normal';
      }
    }
  }
  
  
  
  //cambia color de letra de parrafo
  function daTagsFbk(){
    var limit = 40;
    var usadas3 = document.getElementById('tag3-input').value.length;
    var faltan3 = limit - usadas3;       
    var usadas4 = document.getElementById('tag4-input').value.length;
    var faltan4 = limit - usadas4;
    var usadas5 = document.getElementById('tag5-input').value.length;
    var faltan5 = limit - usadas5;          
    var faltanArr = [faltan3, faltan4, faltan5];
    var parrafoArr = ["tag3-feedback-paragraph", "tag4-feedback-paragraph", "tag5-feedback-paragraph"];
    for(index = 0; index < parrafoArr.length; index++){
      var parrafo = document.getElementById(parrafoArr[index]);
      if(faltanArr[index] == limit){
        parrafo.style.color='red';
        parrafo.innerHTML='Taguea la foto usando hasta ' + limit + ' letras.';    
      }else if(faltanArr[index] >= 0){
        parrafo.style.color='green';
        if(faltanArr[index] >= 2) parrafo.innerHTML= 'Puedes usar ' + faltanArr[index] + ' letras mas.';
        if(faltanArr[index] == 1) parrafo.innerHTML= 'Puedes usar ' + faltanArr[index] + ' letra mas.';
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
    var feedbackColor2 = document.getElementById('area-feedback-paragraph').style.color;
    var feedbackColor3 = document.getElementById('tag3-feedback-paragraph').style.color;
    var feedbackColor4 = document.getElementById('tag4-feedback-paragraph').style.color;
    var feedbackColor5 = document.getElementById('tag5-feedback-paragraph').style.color;
    var feedbackColor6 = document.getElementById('comentario-feedback-paragraph').style.color;
    //console.log("parrafos  = " + parrafo0 + " " + parrafo1 + " " + parrafo2 + " " + parrafo3);
    if(feedbackColor4 == 'green' && feedbackColor5 == 'green' && feedbackColor6 == 'green' &&  
       feedbackColor3 == 'green' && feedbackColor2 == 'green' && feedbackColor1 == 'green' && feedbackColor0 == 'green'){
      document.getElementById('submit-boton').disabled=false;
      document.getElementById('submit-boton').style.color='#ffffff';
      document.getElementById('submit-boton').style.fontWeight='bold';
      document.getElementById('submit-boton').style.backgroundColor='#7ec97b';
      document.getElementById('submit-boton').style.cursor='pointer';
    }else{
      document.getElementById('submit-boton').disabled=true;
      document.getElementById('submit-boton').style.color='#000000';
      document.getElementById('submit-boton').style.fontWeight='normal';
      document.getElementById('submit-boton').style.backgroundColor='#d5d5d5';
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


  //cambia color de divisiones
  function coloreaComentario(){
    var limit = 150;  
    var ladivision = document.getElementById('comentario-div');

    var faltan = noUsado();    
    if(faltan < 0 || ( ! escogioFoto() && faltan == limit) ){
      ladivision.style.backgroundColor='#d5d5d5'; //bfbfbf
      ladivision.style.border="1px solid #bfbfbf";
    }else{
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
    if(faltan == limit && escogioFoto()){
      parrafo.style.color='green';
      parrafo.innerHTML='Comentario opcional de ' + limit + ' letras o menos.';    
    }else if(faltan == limit && ! escogioFoto()){
      parrafo.style.color='red';
      parrafo.innerHTML='Comentario de ' + limit + ' letras o menos.';    
    }else if(faltan > 1){
      parrafo.style.color='green';
      parrafo.innerHTML= 'Puedes usar ' + faltan + ' letras mas.';
    }else if(faltan == 1){
      parrafo.style.color='green';
      parrafo.innerHTML= 'Puedes usar ' + faltan + ' letra mas.';
    }else if(faltan == 0){
      parrafo.style.color='green';
      parrafo.innerHTML= 'Usando exactamente ' + limit + ' letras.';
    }else if(faltan == -1 ){
      parrafo.style.color='red';
      parrafo.innerHTML='Tienes ' + (-1 * faltan) + ' letra de mas.';
    }else if(faltan < -1 ){
      parrafo.style.color='red';
      parrafo.innerHTML='Tienes ' + (-1 * faltan) + ' letras de mas.';
    }
  }