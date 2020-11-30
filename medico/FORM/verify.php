<?php
require_once($_SERVER['DOCUMENT_ROOT']."/HSP_Site_Web/medico/manager/manager.php");
    if(isset($_GET['vkey'])) {
        //Process Verification
        $vkey = $_GET['vkey'];

        $manager = new Manager();
        $mysqli = $manager->connexion_mysqli();
        $resultSet = $mysqli->query("SELECT verified, vkey FROM user WHERE verified = 0 AND vkey = '$vkey' LIMIT 1");
        if($resultSet->num_rows == 1) {
            //Validate The email
            $update = $mysqli->query("UPDATE user set verified = 1 WHERE vkey = '$vkey' LIMIT 1");

            if($update) {
                header('location: ../view/index.php?key=acc-4341');
            }else {
                echo $mysqli->error;
            }
        }else {
            header('location: ../view/index.php?key=a143ady');
        }

    }else {
        die("Erreur n°43-152-456 CONTACT SUPPORT");
    }

?>
