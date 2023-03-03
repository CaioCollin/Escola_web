var visibilidade = true;
    function ocultarExibir(){
            // alert("ola mundo");
            if (visibilidade ){
                document.getElementById("formEscrever").style.display = "block";
                visibilidade = false;
                document.getElementById("textarea").focus(); 
            }else{
                document.getElementById("formEscrever").style.display = "none";
                visibilidade = true;
            }
      }

//imgens que se mexe .
var myIndex = 0;
carousel();

function carousel() {
  var i;
  var x = document.querySelectorAll("#mySlides");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  myIndex++;
  if (myIndex > x.length) {myIndex = 1}    
  x[myIndex-1].style.display = "block";  
  setTimeout(carousel, 3000); //2s
}
