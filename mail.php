<?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $mail_to = "dimitrovadonika@gmail.com";
        $subject = trim($_POST["subject"]);
        $name = str_replace(array("\r","\n"),array(" "," ") , strip_tags(trim($_POST["name"])));
        $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
        $message = trim($_POST["message"]);
        
        if ( empty($name) OR !filter_var($email, FILTER_VALIDATE_EMAIL)  OR empty($subject) OR empty($message)) {
            http_response_code(400);
            echo "Completa il form prima del invio!";
            exit;
        }
        
        # Mail Content
        $content = "Name: $name\n";
        $content .= "Email: $email\n\n";
        $content .= "Message:\n$message\n";

        # email headers.
        $headers = "From: $name <$email>";

        # Send the email.
        $success = mail($mail_to, $subject, $content, $headers);
        if ($success) {
            
            http_response_code(200);
            echo "Grazie! Il tuo messaggio è stato inviato.";
        } else {
            
            http_response_code(500);
            echo "Oops! Qualcosa è andato storto, non riusciamo a inviare il messaggio.";
        }

    } else {
        
        http_response_code(403);
        echo "C'è stato un errore con il tuo invio, Riprova più tardi.";
    }

?>
