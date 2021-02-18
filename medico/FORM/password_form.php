<?php

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    require_once($_SERVER['DOCUMENT_ROOT']."/HSP_Site_Web/medico/manager/manager.php");
    //Connect DB
    $manager = new Manager();
    $mysqli = $manager->connexion_mysqli();

    //Get form DATA
    $email = $mysqli->real_escape_string($_POST['email']);

    //Query the database
    $resultSet = $mysqli->query("SELECT * FROM user WHERE mail = '$email' LIMIT 1");

    if($resultSet->num_rows != 0) {
        //Continue process
        $row = $resultSet->fetch_assoc();
        $old_password = $row['pass'];

        //Send mail

        $mailto = $email;

        // Load Composer's autoloader
        require '../vendor/autoload.php';
        // Instantiation and passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {
            //Server settings
            //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
            $mail->isSMTP();                                            // Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = 'devantouane@gmail.com';                     // SMTP username
            $mail->Password   = 'Antoine//2001';                               // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
            $mail->Port       = 587;                                    // TCP port to connect to
            //Recipients
            $mail->setFrom('devantouane@gmail.com', 'Antouane');
            $mail->addAddress($mailto);     // Add a recipient
            if(isset($mail)){
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = 'Mot de passe oublie MonHopital.fr';
                $mail->Body    = "Voici votre Mot de Passe : $old_password <br> Pour le modifier, rendez-vous sur votre espace-client puis selectionnez \"Changer mon mot de passe\"";
                $mail->AltBody = 'This is the body in plain text for non-HTML mail client';
                $mail->send();
                header("Location:../../index.php?key=r3g3n3r3d");
            }
        }
        catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }


    }else {
        header('location: ../../index.php?key=n0-r3g3n3r3ed'); //Mail not exist
    }

?>
