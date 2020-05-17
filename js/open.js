$(document).ready(function(){
   
    $(".header__icon-bar").click(function(e){

     $(".header__menu").toggleClass('is-open');
      e.preventDefault();
      $('.modal').appendTo("body") ;

    });
    

 });

 function inizializzaStorageUtenti(){
  if (typeof(localStorage.utenti) == "undefined") {
  localStorage.utenti="[]";
  }
}

  function inserisciUtente() {
  
  var u = JSON.parse(localStorage.utenti);
  var l= u.length;
  var o = { email:document.getElementById("Email").value, nome:document.getElementById("Nome").value};

  u[l] = o;
  localStorage.utenti = JSON.stringify(u);
  return true;
  }


  function name(){
    var url=window.location.href;
    var urlSplit=url.split("?");
    var email=urlSplit[1];
    if(email != "undefined"){
    var u=JSON.parse(localStorage.utenti);
    for(i=0;i<u.length;i++){
      if(u[i].email==email){
      document.getElementById("utente").innerHTML= "&nbsp" + u[i].nome;
      localStorage.nomeUtente=u[i].nome;
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