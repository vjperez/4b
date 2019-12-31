function cambia( isSmallScreen, isMediumScreen, isBigScreen ){
  if (isSmallScreen.matches){
    showing = 1;
    showArray();
  }else if (isMediumScreen.matches){
    showing = 2;
    showArray();  
  }else if(isBigScreen.matches){
    showing = 3;
    showArray();
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


//columnas en datos[index]
// 0 id       1 fecha    2 deporte foto path    3 area exp     
// 4 tag3     5 tag4     6 tag5                 7 comentario     8 fotopath   9 alto de foto 10 ancho foto
function putHtml(elHtml, datos){  
  var q = 0;
  while(q < datos.length){
   if(Array.isArray(datos[q])){ //if it is not an array, it does not have entries ... dont print 
    var e = 0;
    while(e < datos[q].length){
      elHtml[e%showing] += "<div class='entry'>";
      elHtml[e%showing] += "<div class='hora'>" + datos[q][e][1] + "<span class='entry-post-text'>" + datos[q][e][0] + "</span></div>";
      if(datos[q][e][9] == 0 || datos[q][e][10] == 0 || datos[q][e][8] == "") {
      	//picture with ancho 0 or alto 0 or  name is "" : meaning there is no picture for this entry
      }else{
        //elHtml[index%showing] += "<a href='escritos/php/sacalo/muestralo.php?entry=" + entry[index][8].substring(0, entry[index][8].indexOf(".")) + "'><img src='loaded/" + entry[index][8] +  "' alt='foto' class='entry-main-img'></a>";
        elHtml[e%showing] += "<img src='loaded/" + datos[q][e][8] +  "' alt='baloncesto beisbol volibol futbol soccer infantil juvenil puerto rico' class='entry-main-img'>";
      }
      elHtml[e%showing] += "<div class='tag12'>";
      elHtml[e%showing] += "<a href='portada.php?q=" + "2" + getDeporte(datos[q][e][2]) + "2" + getArea(datos[q][e][3]) + "2" + "'><img src='icon/" + datos[q][e][2]  + "' alt='foto' class='entry-sport-img'></a><a href='portada.php?q=" + "4" + getDeporte(datos[q][e][2]) + "4" + getArea(datos[q][e][3]) + "4" + "'><span>" + datos[q][e][3]  + "</span></a>";
      //if(entry[index][3].indexOf("nternacional") > -1) elHtml[index%showing] += "<img src='icon/pr.png' alt='foto' class='entry-country-img'>";
      elHtml[e%showing] += "</div>";
      elHtml[e%showing] += "<div class='tag34'><a href='portada.php?q=" + "8" + getDeporte(datos[q][e][2]) + "8" + getArea(datos[q][e][3]) + "8" + ":" + datos[q][e][4] + explota(datos[q][e][4]) + "'>" + datos[q][e][4] + "</a></div>";
      elHtml[e%showing] += "<div class='tag34'><a href='portada.php?q=" + "8" + getDeporte(datos[q][e][2]) + "8" + getArea(datos[q][e][3]) + "8" + ":" + datos[q][e][5] + explota(datos[q][e][5]) + "'>" + datos[q][e][5] + "</a></div>";
      elHtml[e%showing] += "<div class='tag5'> <a href='portada.php?q=" + "8" + getDeporte(datos[q][e][2]) + "8" + getArea(datos[q][e][3]) + "8" + ":" + datos[q][e][6] + explota(datos[q][e][6]) + "'>" + datos[q][e][6] + "</a></div>";
      if(datos[q][e][7] == ""){
      }else{
        elHtml[e%showing] += "<div class='comentario'><p>" + datos[q][e][7] + "</p></div>";
      }
      elHtml[e%showing] += "</div>";
      e++; 
    }
   }
    q++;	       
  }
}     

 

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


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
  //if(arreglo.length > 0){	
	  var index = 0;
    while(index < arreglo.length){
	    arreglo[index] = arreglo[index].toLowerCase();	
	    arreglo[index] = arreglo[index].replace(/[\W_]+/g, '');  // find on token all matches of non word characters and _ ; replace them with ''	  
	    if( (arreglo[index].length > 0) && (descarta.indexOf(arreglo[index]) == -1) ){ 
	      str += ':' + arreglo[index];	// si token tiene mas de cero letras y si el token no es uno de los descartables...
	    }
	    index++;
	  }
  //}
  return str;
}

var descarta = ["vs", "en", "el", "ella", "lo", "los", "la", "las", "de", "del", "y", "a", "o", "por", "que", "porque", "pa", "para", "entre", "to", "todo", "es", "son", "un", "una", "unos", "unas", "desde", "con", "san"];
