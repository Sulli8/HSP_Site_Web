<?php

    session_start();

    //Connect DB
    require_once($_SERVER['DOCUMENT_ROOT']."/HSP_Site_Web/medico/manager/manager.php");
    $manager = new Manager();
    $mysqli = $manager->connexion_mysqli();

    //Get Data
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $adresse = $_POST['adresse'];
    $ville = $_POST['ville'];
    $mutuelle = $_POST['mutuelle'];

    //Sanitize form data
    $nom = $mysqli->real_escape_string($nom);
    $prenom = $mysqli->real_escape_string($prenom);
    $adresse = $mysqli->real_escape_string($adresse);
    $ville = $mysqli->real_escape_string($ville);
    $mutuelle = $mysqli->real_escape_string($mutuelle);

    //Set user_id by $_SESSION['id']
    $user_id = $_SESSION['id'];

    //Update user database
    $update = $mysqli->query("UPDATE user SET nom = '$nom', prenom = '$prenom', adresse = '$adresse', ville = '$ville',
    mutuelle = '$mutuelle' WHERE id = '$user_id'");

    if($update) {
      //On redirige
        header('location: ../FORM/deconnexion_form.php');
    }else {
        echo $mysqli->error;
    }

?>
