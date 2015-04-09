//columnas en entry[index]
// 0  alto     1 fecha    2 deporte foto path    3 area exp     4 tag3     5 tag4     6 tag5     7 comentario     8 fotopath
function putHtml(elHtml, entry){  
    var index = 0;
    while(index < entry.length){
      elHtml[index%showing] += "<div class='entry'>";
      elHtml[index%showing] += "<div class='hora'>" + entry[index][1] + "<img src='icon/upload.png' class='entry-post-img'>" + "</div>";
      if(entry[index][0] == 0 || entry[index][8] == "") {
      }else{
          //elHtml[index%showing] += "<a href='escritos/php/sacalo/muestralo.php?entry=" + entry[index][8].substring(0, entry[index][8].indexOf(".")) + "'><img src='loaded/" + entry[index][8] +  "' alt='foto' class='entry-main-img'></a>";
          elHtml[index%showing] += "<img src='loaded/" + entry[index][8] +  "' alt='baloncesto beisbol volibol futbol soccer infantil juvenil puerto rico' class='entry-main-img'>";
      }
      elHtml[index%showing] += "<div class='tag12'>";
      elHtml[index%showing] += "<a href='portada.php?q=" + "2" + getDeporte(entry[index][2]) + "2" + getArea(entry[index][3]) + "2" + "'><img src='icon/" + entry[index][2]  + "' alt='foto' class='entry-sport-img'></a><a href='portada.php?q=" + "4" + getDeporte(entry[index][2]) + "4" + getArea(entry[index][3]) + "4" + "'><span>" + entry[index][3]  + "</span></a>";
      //if(entry[index][3].indexOf("nternacional") > -1) elHtml[index%showing] += "<img src='icon/pr.png' alt='foto' class='entry-country-img'>";
      elHtml[index%showing] += "</div>";
      elHtml[index%showing] += "<div class='tag34'><a href='portada.php?q=" + "8" + getDeporte(entry[index][2]) + "8" + getArea(entry[index][3]) + "8" + ":" + entry[index][4] + explota(entry[index][4]) + "'>" + entry[index][4] + "</a></div>";
      elHtml[index%showing] += "<div class='tag34'><a href='portada.php?q=" + "8" + getDeporte(entry[index][2]) + "8" + getArea(entry[index][3]) + "8" + ":" + entry[index][5] + explota(entry[index][5]) + "'>" + entry[index][5] + "</a></div>";
      elHtml[index%showing] += "<div class='tag5'> <a href='portada.php?q=" + "8" + getDeporte(entry[index][2]) + "8" + getArea(entry[index][3]) + "8" + ":" + entry[index][6] + explota(entry[index][6]) + "'>" + entry[index][6] + "</a></div>";
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
    putHtml(elHtml, entries);
    //putHtml(elHtml, extraEntries);
    document.getElementById("uno").innerHTML = elHtml[0];
  }
  if (showing == 2){
    var elHtml = ["", ""];
    putHtml(elHtml, entries);
    //putHtml(elHtml, extraEntries);
    document.getElementById("uno").innerHTML = elHtml[0];
    document.getElementById("dos").innerHTML = elHtml[1];
  }
  if(showing == 3){
    var elHtml = ["", "", ""];
    putHtml(elHtml, entries);
    //putHtml(elHtml, extraEntries);
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

function explota(rotuloString){
  var arreglo = rotuloString.split(' ');	
  var str = '';
  if(arreglo.length > 1){	
	var index = 0;
    while(index < arreglo.length){
	  arreglo[index] = arreglo[index].toLowerCase();	
	  arreglo[index] = arreglo[index].replace(/[\W_]+/g, '');  // find on token all matches of non word characters and _ ; replace them with ''	  
	  if( (arreglo[index].length > 0) && (descarta.indexOf(arreglo[index]) == -1) ){ 
	    str += ':' + arreglo[index];	// si token tiene mas de cero letras y si el token no es uno de los descartables...
	  }
	  index++;
	}
  }
  return str;
}

var descarta = ["vs", "en", "el", "ella", "lo", "los", "la", "las", "de", "del", "y", "a", "o", "por", "que", "porque", "pa", "para", "entre", "to", "todo", "es", "son"];
