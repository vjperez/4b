  function coloreaFile(){
    var limit = 150;
    var ladivision = document.getElementById('filechbx');
    
    if( ! escogioFoto() && noUsado() == limit){
      ladivision.style.backgroundColor='#d5d5d5';
      ladivision.style.border="1px solid #bfbfbf";
    }else if( ! escogioFoto() && noUsado() < limit){
      ladivision.style.backgroundColor='green';
      ladivision.style.border="1px solid #bfbfbf";
    }else{
      ladivision.style.backgroundColor='green'; //bfbfbf
      ladivision.style.border="1px solid #bfbfbf";
    }
  }
  function daFileFbk(){
    var limit = 150;  
    var parrafo = document.getElementById('filefeedbk');
    
    if( ! escogioFoto() && noUsado() == limit){
      parrafo.style.color='red';
      parrafo.innerHTML='Escoge tu foto, y/o <br>comenta abajo sobre el juego de hoy.';                                       /* es posible subir un file llamado algo.css o algo.exe .... need to work on this */
    }else if( ! escogioFoto() && noUsado() < limit){
      parrafo.style.color='green';
      parrafo.innerHTML='Aun puedes escoger una foto.';                                       /* es posible subir un file llamado algo.css o algo.exe .... need to work on this */
    }else{
      parrafo.style.color='green';
      parrafo.innerHTML='Ya escogiste la foto.';
    }    
  }
  
  
    function coloreaDeporte(){/*este chechea los 4, podrias setearlos inicialmente y luego solo cambiar el cliqueado usando division como parametro*/
    var botonArr = ["baloncestord", "futbolrd", "beisbolrd", "volyrd"];
    var divArr = ["bktrdbx", "ftblrdbx", "bsblrdbx", "vllyrdbx"];
    for(index = 0; index < botonArr.length; index++){
      var boton = document.getElementById(botonArr[index]);
      var ladivision = document.getElementById(divArr[index]);
      var labels = ladivision.getElementsByTagName('label');
      if(boton.checked == true){
        ladivision.style.backgroundColor='green';
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
  function daDeporteFbk(){
    var parrafo = document.getElementById('deportefeedbk');
    var boton1 = document.getElementById('baloncestord');
    var boton2 = document.getElementById('futbolrd');
    var boton3 = document.getElementById('beisbolrd');
    var boton4 = document.getElementById('volyrd');
    if(boton1.checked == true || boton2.checked == true || boton3.checked == true || boton4.checked == true){
      parrafo.style.color='green';
      parrafo.innerHTML='OK !';    
    }else{
      parrafo.style.color='red';
      parrafo.innerHTML='Escoge el deporte en la foto.';
    }    
  }  
  
  
    function coloreaNivel(){/*este chechea los 4, podrias setearlos inicialmente y luego solo cambiar el cliqueado usando division como parametro*/
    var botonArr = ["intrd", "islard", "localrd", "informalrd"];
    var divArr = ["intrdbx", "islardbx", "localrdbx", "informalrdbx"];
    for(index = 0; index < botonArr.length; index++){
      var boton = document.getElementById(botonArr[index]);
      var ladivision = document.getElementById(divArr[index]);
      var labels = ladivision.getElementsByTagName('label');
      if(boton.checked == true){
        ladivision.style.backgroundColor='green';
        ladivision.style.border="1px solid #bfbfbf";
        labels[0].style.color='#ffffff';
        labels[0].style.fontWeight='bold';
      }else{
        ladivision.style.backgroundColor='#d5d5d5'; //bfbfbf
        ladivision.style.border="1px solid #bfbfbf";
        labels[0].style.color='#000000';
        labels[0].style.fontWeight='normal';
      }
    }
  }
  function daNivelFbk(){
    var parrafo = document.getElementById('nivelfeedbk');
    var boton1 = document.getElementById('intrd');
    var boton2 = document.getElementById('islard');
    var boton3 = document.getElementById('localrd');
    var boton4 = document.getElementById('informalrd');
    if(boton1.checked == true || boton2.checked == true || boton3.checked == true || boton4.checked == true){
      parrafo.style.color='green';
      parrafo.innerHTML='OK !';    
    }else{
      parrafo.style.color='red';
      parrafo.innerHTML='Escoge el nivel de juego.';
    }    
  }  
  
    //cambia color de divisiones
    function coloreaTags(){/*este chechea los 4, podrias setearlos inicialmente y luego solo cambiar el cliqueado usando division como parametro*/
    var limit = 40;
    var botonArr = ["tag3in", "tag4in", "tag5in"];
    var divArr = ["tag3inputbx", "tag4inputbx", "tag5inputbx"];
    for(index = 0; index < botonArr.length; index++){
      var boton = document.getElementById(botonArr[index]);
      var ladivision = document.getElementById(divArr[index]);
      var labels = ladivision.getElementsByTagName('label'); /*  get the elements named 'label' from  "ladivision" NOT FROM document */
      if(boton.value != '' && boton.value.length <= limit){
        ladivision.style.backgroundColor='green';
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
    var usadas3 = document.getElementById('tag3in').value.length;
    var faltan3 = limit - usadas3;       
    var usadas4 = document.getElementById('tag4in').value.length;
    var faltan4 = limit - usadas4;
    var usadas5 = document.getElementById('tag5in').value.length;
    var faltan5 = limit - usadas5;          
    var faltanArr = [faltan3, faltan4, faltan5];
    var parrafoArr = ["tag3feedbk", "tag4feedbk", "tag5feedbk"];
    for(index = 0; index < parrafoArr.length; index++){
      var parrafo = document.getElementById(parrafoArr[index]);
      if(faltanArr[index] == limit){
        parrafo.style.color='red';
        parrafo.innerHTML='Usa ' + limit + ' letras o menos para el tag.';    
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
    var feedbackColor0 = document.getElementById('filefeedbk').style.color;
    var feedbackColor1 = document.getElementById('deportefeedbk').style.color;
    var feedbackColor2 = document.getElementById('nivelfeedbk').style.color;
    var feedbackColor3 = document.getElementById('tag3feedbk').style.color;
    var feedbackColor4 = document.getElementById('tag4feedbk').style.color;
    var feedbackColor5 = document.getElementById('tag5feedbk').style.color;
    var feedbackColor6 = document.getElementById('comentariofeedbk').style.color;
    //console.log("parrafos  = " + parrafo0 + " " + parrafo1 + " " + parrafo2 + " " + parrafo3);
    if(feedbackColor4 == 'green' && feedbackColor5 == 'green' && feedbackColor6 == 'green' &&  
       feedbackColor3 == 'green' && feedbackColor2 == 'green' && feedbackColor1 == 'green' && feedbackColor0 == 'green'){
      document.getElementById('postbtn').disabled=false;
      document.getElementById('postbtn').style.color='#ffffff';
      document.getElementById('postbtn').style.fontWeight='bold';
      document.getElementById('postbtn').style.backgroundColor='green';
      document.getElementById('postbtn').style.cursor='pointer';
    }else{
      document.getElementById('postbtn').disabled=true;
      document.getElementById('postbtn').style.color='#000000';
      document.getElementById('postbtn').style.fontWeight='normal';
      document.getElementById('postbtn').style.backgroundColor='#d5d5d5';
      document.getElementById('postbtn').style.cursor='default';   
    }
  }

  function noUsado(){
    var limit = 150;
    var usadas = document.getElementById('comentarioarea').value.length;
    return limit - usadas;        
  } 
  function escogioFoto(){
    var filechboton = document.getElementById('filechbt');  
    return filechboton.value != '';  
  }


  //cambia color de divisiones
  function coloreaComentario(){
    var limit = 150;  
    var ladivision = document.getElementById('comentariobx');

    var faltan = noUsado();    
    if(faltan < 0 || ( ! escogioFoto() && faltan == limit) ){
      ladivision.style.backgroundColor='#d5d5d5'; //bfbfbf
      ladivision.style.border="1px solid #bfbfbf";
    }else{
      ladivision.style.backgroundColor='green';
      ladivision.style.border="1px solid #bfbfbf";
    }
  }
  //cambia color de letra de parrafo
  function daComentarioFbk(){
    var limit = 150;  
    /* ahora brega con el parrafo y da feedback pq ya se cuantos faltan */
    var parrafo = document.getElementById('comentariofeedbk');
    
    var faltan = noUsado(); 
    if(faltan == limit && escogioFoto()){
      parrafo.style.color='green';
      parrafo.innerHTML='Comentario opcional. Usa ' + limit + ' letras o menos.';    
    }else if(faltan == limit && ! escogioFoto()){
      parrafo.style.color='red';
      parrafo.innerHTML='Comentario. Usa ' + limit + ' letras o menos.';    
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