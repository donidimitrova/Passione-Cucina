
        <?php

        if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response'])){
              $secret = '6LfVxPQUAAAAAGmjzO6wKqg8HG8yW6MnmnN-lran';
              $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
              $responseData = json_decode($verifyResponse);
              if($responseData->success){

                      $dbconn = pg_connect("host=localhost port=5434 dbname=login user=postgres password=12345") or die('Could not connect:' . pg_last_error());
               

                      $email=$_POST['email'];
                      $q1="select * from login where email=$1";
                      $result=pg_query_params($dbconn,$q1,array($email));
                      if(!($line=pg_fetch_array($result,null, PGSQL_ASSOC))) {  /* email non presente nel database*/
                       header("Location: RecuperoPassword.html?rec=false&err=email");
                      }
                      else{ /*email presente nel database*/
                       
                       $annoMadre=$_POST ['domandaSegreta'];
                       $q2="select * from login where email=$1 and annomadre=$2";
                       $result1=pg_query_params($dbconn,$q2,array($email,$annoMadre));
                       if(!($line=pg_fetch_array($result1,null, PGSQL_ASSOC))){ /*tupla con email e annomadre non presente*/
                            header("Location: RecuperoPassword.html?rec=false&err=madre"); 
                       }else {
                            $password=md5($_POST ['password']);
                            $q3="update login set password=$1 where email=$2";
                            $data=pg_query_params($dbconn,$q3,array($password,$email));
                            if($data){ /*successo cambiopassword*/
                                header("Location:/seconda.parte/iniziale.html?reg=true&email=$email");
                            }
                          }
                   }
               
                  }
        
      }
         else{
                header("Location: RecuperoPassword.html?rec=false&err=reCap"); /* Redirect browser */

                /* Make sure that code below does not get executed when we redirect. */
                exit;
              }
          
            
            
     
        ?>