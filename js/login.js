$(document).ready(function(){
    $("#submit").click(function(){
          var email = $('#inputEmail').val();
          var password= $('#inputPassword').val();
          $.ajax({
              type: "POST",
              url: "/login.php",
              data: "email="+email+"&password="+password,
              success: function(html){
                    switch(html)
                        {

                           case '1': // Login successful 
                                $('#inputEmail').val('');
                                $('#inputPassword').val('');
                                window.location.replace("/seconda.parte/iniziale.html?"+ email);
                                break;

                            case '2': // Empty Field
                                $('.statusMsg').html('<span style="color:red;">Errore campi vuoti.</span>');
                                break;
                            case '3': // username doesn't exist
                                $('.statusMsg').html('<span style="color:red;">Errore email</span>');
                                break;
                            case '4': //Password is wrong
                                $('.statusMsg').html('<span style="color:red;">Errore password</span>');
                                break;
                            case '5': //Querry error
                                $('.statusMsg').html('<span style="color:red;">Errore query</span>');
                                break;
                          }
                  }
      
            });
      });
});
