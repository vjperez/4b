//columnas en entry[index]
// 0  alto     1 fecha    2 deporte foto path    3 area exp     4 tag3     5 tag4     6 tag5     7 comentario     8 fotopath
function putHtml(elHtml){  
    var index = 0;
    while(index < entry.length){
      elHtml[index%showing] += "<div class='entry'>";
      elHtml[index%showing] += "<div class='hora'>" + entry[index][1] + "</div>";
      if(entry[index][0] == 0 || entry[index][8] == "") {
      }else{
          elHtml[index%showing] += "<a href='escritos/php/sacalo/muestralo.php?entry=" + entry[index][8].substring(0, entry[index][8].indexOf(".")) + "'><img src='loaded/" + entry[index][8] +  "' alt='foto' class='entry-main-img'></a>";
      }
      elHtml[index%showing] += "<div class='tag12'>";
      elHtml[index%showing] += "<a href='portada.php?deporte=" + getDeporte(entry[index][2]) + "'><img src='icon/" + entry[index][2]  + "' alt='foto' class='entry-sport-img'></a><a href='portada.php?area=" + getArea(entry[index][3]) + "'><span>" + entry[index][3]  + "</span></a>";
      //if(entry[index][3].indexOf("nternacional") > -1) elHtml[index%showing] += "<img src='icon/pr.png' alt='foto' class='entry-country-img'>";
      elHtml[index%showing] += "</div>";
      elHtml[index%showing] += "<div class='tag34'><a href='portada.php?rotulo=" + entry[index][4] + "'>" + entry[index][4] + "</a></div>";
      elHtml[index%showing] += "<div class='tag34'><a href='portada.php?rotulo=" + entry[index][5] + "'>" + entry[index][5] + "</a></div>";
      elHtml[index%showing] += "<div class='tag5'> <a href='portada.php?rotulo=" + entry[index][6] + "'>" + entry[index][6] + "</a></div>";
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





function getDeporte(foto){
    if(foto == 'baloncesto.png'){
      return 0;
    }else if(foto == 'beisbol.png'){
      return 1;
    }else if(foto == 'futbol-soccer.png'){
      return 2;
    }else if(foto == 'volibol.png'){
      return 3;  
    }
}
  function getArea(exp){
    if(exp.indexOf("Norte") > -1){
      return 0;
    }else if(exp.indexOf("Sur") > -1){
      return 1;
    }else if(exp.indexOf("Oeste") > -1){
      return 2;
    }else{
      return 3;  
    }
  }
