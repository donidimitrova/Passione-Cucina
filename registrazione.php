
        <?php
        if(isset($_POST['g-recaptcha-response']) && !empty($_POST['g-recaptcha-response']))
        {
              $secret = '6LfVxPQUAAAAAGmjzO6wKqg8HG8yW6MnmnN-lran';
              $verifyResponse = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$secret.'&response='.$_POST['g-recaptcha-response']);
              $responseData = json_decode($verifyResponse);
              if($responseData->success)
              { $dbconn = pg_connect("host=localhost port=5434 dbname=login user=postgres password=12345") or
                die('Could not connect:' . pg_last_error());
               if(!(isset($_POST['submit']))){
                   header("Location: pagReg.html");
               }
               else{
                   $email=$_POST['email'];
                   $q1="select * from login where email=$1";
                   $result=pg_query_params($dbconn,$q1,array($email));
                   if($line=pg_fetch_array($result,null, PGSQL_ASSOC)){
                       header("Location: pagReg3.html");
                      
                   }
                   else{
                       $nome=$_POST ['nome'];
                       $cognome=$_POST ['cognome'];
                       $DataNascita=$_POST ['DataNascita'];
                       $password=md5($_POST ['password']);
                       $q2="insert into login values ($1,$2,$3,$4,$5)";
                       $data=pg_query_params($dbconn,$q2,array($nome,$cognome,$email,$DataNascita,$password));
                       if($data){
                           header("Location:/seconda.parte/iniziale.html");
                           
   
                       }
                   }
               }
             }
        }
              else
              {
                header("Location: pagReg2.html"); /* Redirect browser */

                /* Make sure that code below does not get executed when we redirect. */
                exit;
              }
            
     
        ?>
