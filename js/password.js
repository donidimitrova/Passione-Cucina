 
                function showPwd() {
                    var input = document.getElementById('password');
                    if (input.type === "password") {
                      input.type = "text";
                    } else {
                      input.type = "password";
                    }
                  }

                  function emailValida(){
                    var email=document.getElementById("Email").value;
                    var email_valid = /^([a-zA-Z0-9_.-])+@(([a-zA-Z0-9-]{2,})+.)+([a-zA-Z0-9]{2,})+$/;
                    if (!email_valid.test(email) || (email == "") || (email == "undefined")) {
                    alert("Devi inserire un indirizzo mail corretto");
                    document.getElementById("Email").value="";
                    document.getElementById("Email").focus();
                    return false;
                    }
                    return true;
                  }
                  function passValida(){
                    var password=document.getElementById("password").value;
                    if (password.length<6 || (password == "") || (password == "undefined") ) {
                      alert("Scegli una password, minimo 6 caratteri");
                      document.getElementById("password").value="";
                      document.getElementById("password").focus();
                      return false;
                    }
                      return true;
                  }
                