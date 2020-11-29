<?php

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    //Get form DATA
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $addr = $_POST['addr'];
    $ville = $_POST['ville'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $pass2 = $_POST['pass2'];
    $mutuelle = $_POST['mutuelle'];

    //Connect DB
      $mysqli = mysqli_connect("localhost:3308", "root", "", "bdd_hsp");

    //Check if var are not empty
    if(!empty($nom) && !empty($prenom) && !empty($addr) &&
    !empty($ville) && !empty($email) && !empty($pass) && !empty($pass2) &&
    !empty($mutuelle)) {
        //Check if password are ok
        if($pass != $pass2) {
            header('location: ../view/index.php?key=w40n6-6a55');
        }else {
            //Check if mail exist
            $sql_e = "SELECT * FROM user WHERE mail='$email'";
            $res_e = mysqli_query($mysqli, $sql_e);
            if(mysqli_num_rows($res_e) > 0){
                header('location: ../view/index.php?key=w40n6-ma11');
            }else {
                //Form is valid

                //Sanitize form data
                $nom = $mysqli->real_escape_string($nom);
                $prenom = $mysqli->real_escape_string($prenom);
                $addr = $mysqli->real_escape_string($addr);
                $ville = $mysqli->real_escape_string($ville);
                $email = $mysqli->real_escape_string($email);
                $pass = $mysqli->real_escape_string($pass);
                $mutuelle = $mysqli->real_escape_string($mutuelle);

                //Generate vkey
                $vkey = md5(time().$nom);

                //Insert Account into the database
                $pass = md5($pass);
                $insert = $mysqli->query("INSERT INTO user(nom, prenom, adresse, ville, mail, pass, mutuelle, vkey,admin)
                VALUES('$nom', '$prenom', '$addr', '$ville', '$email', '$pass', '$mutuelle', '$vkey','0')");

                if($insert) {
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
                            $mail->Subject = 'Verification inscription MonHopital.fr';
                            $mail->Body    = "<a href='http://localhost/HSP_Site_Web/medico/FORM/verify.php?vkey=$vkey'>Confirmer votre compte MonHopital.fr</a>";
                            $mail->AltBody = 'This is the body in plain text for non-HTML mail client';
                            $mail->send();
                            header("Location:../view/index.php?key=auth3nt1");
                        }
                    }
                    catch (Exception $e) {
                        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                    }


                }else {
                    echo $mysqli->error;
                }

            }
        }
    }else {
        header('location: ../view/index.php?key=9m6ty');
    }

?>
