  function escogeDeporte(){/*este chechea los 4, podrias setearlos inicialmente y luego solo cambiar el cliqueado usando division como parametro*/
    var botonArr = ["baloncesto-boton", "beisbol-boton", "futbol-boton", "volibol-boton"];
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
        ladivision.style.backgroundColor='#d5d5d5'; // f5f5f5
        ladivision.style.border="1px solid #bfbfbf";
        //labels[0].style.color='#000000';
        //labels[0].style.fontWeight='normal';
      }
    }
  }
 
  function escogeArea(){
    var botonArr = ["norte-boton", "sur-boton", "oeste-boton", "este-boton"];
    var divArr = ["norte-inputbox-div", "sur-inputbox-div", "oeste-inputbox-div", "este-inputbox-div"];
    for(index = 0; index < botonArr.length; index++){
      var boton = document.getElementById(botonArr[index]);
      var ladivision = document.getElementById(divArr[index]);
      var labels = ladivision.getElementsByTagName('label');
      if(boton.checked == true){
        ladivision.style.backgroundColor='#7ec97b';
        ladivision.style.border="1px solid #bfbfbf";
        labels[0].style.color='#ffffff';
        labels[0].style.fontWeight='bold';
      }else{
        ladivision.style.backgroundColor='#d5d5d5'; // f5f5f5
        ladivision.style.border="1px solid #bfbfbf";
        labels[0].style.color='#000000';
        labels[0].style.fontWeight='normal';
      }
    }
  }  
   