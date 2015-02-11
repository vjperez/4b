  function escogeDeporte(){/*este chechea los 4, podrias setearlos inicialmente y luego solo cambiar el cliqueado usando division como parametro*/
    var botonArr = ["baloncestock", "futbolck", "beisbolck", "volyck"];
    var divArr = ["bktckbx", "ftblckbx", "bsblckbx", "vllyckbx"];
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
        ladivision.style.backgroundColor='#d5d5d5'; // f5f5f5
        ladivision.style.border="1px solid #bfbfbf";
        labels[0].style.color='#000000';
        labels[0].style.fontWeight='normal';
      }
    }
  }
 
  
   
  
//columnas en entry[index]
// 0  alto     1 fecha    2 deporte foto path    3 nivel exp     4 tag3     5 tag4     6 tag5     7 comentario     8 fotopath
function putHtml(elHtml){  
    var index = 0;
    while(index < entry.length){
      elHtml[index%showing] += "<div class='vaciocien'></div> <div class='vaciocien'></div> <div class='vaciocien'></div> <div class='vaciocien'></div> ";
      elHtml[index%showing] += "<div class='entry'>";
      elHtml[index%showing] += "<div class='hora'>" + entry[index][1] + "</div>";
      if(entry[index][0] == 0 || entry[index][8] == "") {
      }else{
          elHtml[index%showing] += "<a href='escritos/php/muestralo.php?id=" + entry[index][8].substring(0, entry[index][8].indexOf(".")) + "'><img src='loaded/" + entry[index][8] +  "' alt='foto' class='mainimg'></a>";
      }
      elHtml[index%showing] += "<div class='tag12'>";
      elHtml[index%showing] += "<a href='portada.php?x=" + getdeporte(entry[index][2]) + "'><img src='foto/" + entry[index][2]  + "' alt='foto' class='sportimg'></a><a href='portada.php?y=" + getnivel(entry[index][3]) + "'><span>" + entry[index][3]  + "</span></a>";
      if(entry[index][3].indexOf("nternacional") > -1) elHtml[index%showing] += "<img src='foto/pr.png' alt='foto' class='statecountryimg'>";
      elHtml[index%showing] += "</div>";
      elHtml[index%showing] += "<div class='tag34'><a href='#'>" + entry[index][4] + "</a></div>";
      elHtml[index%showing] += "<div class='tag34'><a href='#'>" + entry[index][5] + "</a></div>";
      elHtml[index%showing] += "<div class='tag5'> <a href='#'>" + entry[index][6] + "</a></div>";
      if(entry[index][7] == ""){
      }else{
         elHtml[index%showing] += "<div class='comentario'><p>" + entry[index][7] + "</p></div>";
      }
      elHtml[index%showing] += "</div>";
      index++; 
    }	       
}     
        
function showArray(){
 if (showing == 1){
    var elHtml = [""];
    putHtml(elHtml);
    document.getElementById("uno").innerHTML = elHtml[0];
  }
  if (showing == 2){
    var elHtml = ["", ""];
    putHtml(elHtml);
    document.getElementById("uno").innerHTML = elHtml[0];
    document.getElementById("dos").innerHTML = elHtml[1];
  }
  if(showing == 3){
    var elHtml = ["", "", ""];
    putHtml(elHtml);
    document.getElementById("uno").innerHTML = elHtml[0];
    document.getElementById("dos").innerHTML = elHtml[1];
    document.getElementById("tres").innerHTML = elHtml[2];
  }    
}

function cambioSmall( mqSmall ){
 if (mqSmall.matches){
    showing = 1;
    showArray();
  }  
}   

function cambioMedium( mqMedium ){
if (mqMedium.matches){
    showing = 2;
    showArray();
  }
}

function cambioBig( mqBig ){
  if(mqBig.matches){
    showing = 3;
    showArray();
  } 
} 





function getdeporte(foto){
    if(foto == 'bkt.png'){
      return 0;
    }else if(foto == 'bsbl.png'){
      return 1;
    }else if(foto == 'ftbl.png'){
      return 2;
    }else if(foto == 'vlly.png'){
      return 3;  
    }
}
  function getnivel(exp){
    if(exp.indexOf("ractica") > -1){
      return 0;
    }else if(exp.indexOf("Local") > -1){
      return 1;
    }else if(exp.indexOf("Isla") > -1){
      return 2;
    }else if(exp.indexOf("Internacional") > -1){
      return 3;  
    }
  }