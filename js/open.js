$(document).ready(function(){
   
    $(".icona").click(function(e){

     $(".Navigazione").toggleClass('is-open');
      e.preventDefault();
      $('.modal').appendTo("body") ;

    });
    

 });

 function inizializzaStorageUtenti(){
  if (typeof(localStorage.utenti) == "undefined") {
  localStorage.utenti="[]";
  }
  var url= new URL(window.location.href);
  if(url.searchParams.get("reg")=="false"){
    if(url.searchParams.get("err")){
        var err=url.searchParams.get("err");
        if(err=="reCap"){
        alert("Attenzione! Devi convalidare il campo reCaptcha");
         return false;
        }else{
          alert("Mi dispiace! Questa email è già stata usata");
          return false;
        }
      }
    
    }
  return true;
}

function ok(){
  var url= new URL(window.location.href);
  if(url.searchParams.get("rec")=="false"){
    if(url.searchParams.get("err")){
        var err=url.searchParams.get("err");
        if(err=="reCap"){
        alert("Attenzione! Devi convalidare il campo reCaptcha");
         return false;
        }else if(err=="madre"){
          alert("Anno di nascita di tua madre errato");
         return false;
        }else{
        alert("Mi dispiace! Email non registrata");
        return false;
      }
    }
  }
  return true;
}

  function inserisciUtente() {
  
  
  var u = JSON.parse(localStorage.utenti);
  var l= u.length;
  for(i=0;i<l;i++){
    if(u[i].email== document.getElementById("Email").value){
      return true;
    }
  }
  var o = { email:document.getElementById("Email").value, nome:document.getElementById("Nome").value};
  

  u[l] = o;
  localStorage.utenti = JSON.stringify(u);
  return true;
  }


  function name(){
    if (typeof(localStorage.nomeUtente) == "undefined") {
      localStorage.nomeUtente="";
      }
    var url=window.location.href;
    var urlSplit=url.split("?");
    var email=urlSplit[1];
    if(email != "undefined"){
    var u=JSON.parse(localStorage.utenti);
    for(i=0;i<u.length;i++){
      if(u[i].email==email){
        localStorage.nomeUtente = u[i].nome;
      document.getElementById("utente").innerHTML= "&nbsp" + u[i].nome;
      return true;
    }
  }
  

  }
  var n=localStorage.nomeUtente;
  document.getElementById("utente").innerHTML= "&nbsp" + n;
  return true;
}


function reset(){
  localStorage.nomeUtente="";
}