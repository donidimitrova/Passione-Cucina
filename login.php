<html>
    <head>
   </head>
    </head>
    <body>
        <?php
            $dbconn = pg_connect("host=localhost port=5434 dbname=login user=postgres password=12345") or
             die('Could not connect:' . pg_last_error());
            if(!(isset($_POST['signIn']))){
                echo"<script>
                        window.location.href = '/contatti.html';
                    console.log('email sbagliata');
                        </script>";
                
            }
            else{
                $email=$_POST['Email'];
                $q1="select * from login where email=$1";
                $result=pg_query_params($dbconn,$q1,array($email));
                if(!($line=pg_fetch_array($result,null, PGSQL_ASSOC))){
                     $status='err';
                }
                else{
                    $password=md5($_POST ['Password']);
                    $q2="select * from login where email=$1 and password=$2";
                    $data=pg_query_params($dbconn,$q2,array($email,$password));
                    if(!($line=pg_fetch_array($data, null, PGSQL_ASSOC))){
                        $status='err';
                       
                    }
                    else{
                        $status='ok';
                    }
                
                }
                echo $status;
            }
        ?>
    </body>
</html>