<?php

    session_start();

    //Connect DB
    require_once($_SERVER['DOCUMENT_ROOT']."/HSP_Site_Web/medico/manager/manager.php");
    $manager = new Manager();
    $mysqli = $manager->connexion_mysqli();
    $nom_medecin = $_POST['name_medecin'];
    $creneau = $_POST['creneaux'];

    //Sanitize form data
    $nom_medecin = $mysqli->real_escape_string($nom_medecin);
    $creneau = $mysqli->real_escape_string($creneau);

     if($nom_medecin == 0) {
         header('location: ../../index.php?key=n0-ch0053'); //Choose your doctor
     }else {
        //Continue Process

        //Def var from $_SESSION
         $id_user = $_SESSION['id'];
         $nom_patient = $_SESSION['nom'];

        //Select name MEDECIN
         $res = $mysqli->query("SELECT * FROM medecin WHERE id = '$nom_medecin'");
         $row = $res->fetch_assoc();
         $nom = $row['nom'];

        //Insert into database RDV
         $insert = $mysqli->query("INSERT INTO rdv(nom_medecin, id_user, id_medecin, date_rdv, creneau_rdv, nom_patient)
             VALUES('$nom', '$id_user', '$nom_medecin', '01-01-2021', '$creneau', '$nom_patient')");

         if($insert) {
             header('location: ../../index.php?key=y0u-v3-y0u4-4DV');
         }else {
             echo $mysqli->error;
         }
     }

?>
