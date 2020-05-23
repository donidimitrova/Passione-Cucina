<?php
        $dbconn = pg_connect("host=localhost port=5434 dbname=login user=postgres password=12345") or
        die('Could not connect:' . pg_last_error());
        $email = $_POST['email'];
        $password=$_POST ['password'];
        if(empty($email) || empty($password)){
            echo '2';
        } else {
            
            $query = "SELECT * FROM login WHERE email = '$email' ";
            $result = pg_query($dbconn, $query);
            if (!$result) {
                echo '5';
                exit;
              }

            $num_row = pg_num_rows($result);
            if($num_row == 0){
                echo '3';
            } else {
                $query2 = "SELECT * FROM login WHERE email = '$email' AND password = md5('$password');";
                $res = pg_query($dbconn, $query2);
                $num_r = pg_num_rows($res);
                if( $num_r == 0 ) {
                    echo '4';
                }
                else{
                    echo '1';
                }
            }
        }
?>