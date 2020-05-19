
        <?php
        if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response']))
        {
              $secret = '6LfVxPQUAAAAAGmjzO6wKqg8HG8yW6MnmnN-lran';
              $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
              $responseData = json_decode($verifyResponse);
              if($responseData->success){

               $dbconn = pg_connect("host=localhost port=5434 dbname=login user=postgres password=12345") or die('Could not connect:' . pg_last_error());
               if(!(isset($_POST['submit1']))){
                   header("Location: RecuperoPassword.html");
               }
               else{
                   $email=$_POST['email'];
                   $q1="select * from login where email=$1";
                   $result=pg_query_params($dbconn,$q1,array($email));
                   if(!($line=pg_fetch_array($result,null, PGSQL_ASSOC))){ //email non presente nel database
                       header("Location: pagReg.html?reg=false&err=email");
                      
                   }
                   else{
                       
                       $annoMadre=$_POST ['domandaSegreta'];
                       $q2="elect * from login where email=$1 and annoMadre=$2";
                       $result1=pg_query_params($dbconn,$q1,array($email,$annoMadre));
                       if(($line=pg_fetch_array($result,null, PGSQL_ASSOC)){
                            $password=md5($_POST ['password'])
                            $q1="update login set password=$1 where email=$2"
                            $data=pg_query_params($dbconn,$q1,array($password,$email));
                            if($data){
                                header("Location:/seconda.parte/iniziale.html?$email");
                       }
                    }
                    header("Location: RecuperoPassword.html?reg=false&err=madre");
                      
                   }
               }
             }
            }
        
          

        
              else
              {
                header("Location: pagReg.html?reg=false&err=reCap"); /* Redirect browser */

                /* Make sure that code below does not get executed when we redirect. */
                exit;
              }
            
     
        ?>