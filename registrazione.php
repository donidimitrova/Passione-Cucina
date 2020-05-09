
        <?php
            $dbconn = pg_connect("host=localhost port=5434 dbname=login user=postgres password=12345") or
             die('Could not connect:' . pg_last_error());
            if(!(isset($_POST['submit']))){
                header("Location: pagReg.html");
            }
            else{
                $email=$_POST['email'];
                $q1="select * from login where email=$1";
                $result=pg_query_params($dbconn,$q1,array($email));
                if($line=pg_fetch_array($result,null, PGSQL_ASSOC)){
                    header("Location: pagReg.html?registrazione=false");
                   
                }
                else{
                    $nome=$_POST ['nome'];
                    $cognome=$_POST ['cognome'];
                    $DataNascita=$_POST ['DataNascita'];
                    $password=md5($_POST ['password']);
                    $q2="insert into login values ($1,$2,$3,$4,$5)";
                    $data=pg_query_params($dbconn,$q2,array($nome,$cognome,$email,$DataNascita,$password));
                    if($data){
                        header("Location:RegistrazioneS.html");
                        

                    }
                }
            }
        ?>
