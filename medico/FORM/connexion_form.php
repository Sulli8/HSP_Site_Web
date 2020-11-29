<?php

    session_start();

    //Connect DB
    $mysqli = mysqli_connect("localhost:3308", "root", "", "bdd_hsp");

    //Get form DATA
    $email = $mysqli->real_escape_string($_POST['email']);
    $pass = $mysqli->real_escape_string($_POST['pass']);
    $pass = md5($pass);

    //Query the database
    $resultSet = $mysqli->query("SELECT * FROM user WHERE mail = '$email' AND 
    pass = '$pass' LIMIT 1");

    if($resultSet->num_rows != 0) {
        //Process Login
        $row = $resultSet->fetch_assoc();
        $id = $row['id'];
        $nom = $row['nom'];
        $prenom = $row['prenom'];
        $addr = $row['adresse'];
        $ville = $row['ville'];
        $email = $row['mail'];
        $mutuelle = $row['mutuelle'];
        $verified = $row['verified'];

        if($verified == 1){
            //Continue Processing
            //Init $_SESSION
            $_SESSION['id'] = $id;
            $_SESSION['nom'] = $nom;
            $_SESSION['prenom'] = $prenom;
            $_SESSION['addr'] = $addr;
            $_SESSION['ville'] = $ville;
            $_SESSION['email'] = $email;
            $_SESSION['mutuelle'] = $mutuelle;
            $_SESSION['verified'] = $verified;
            header('location: ../view/index.php');
        }else {
            header('location: ../view/index.php?key=n0t-v341f');
        }
    }else {
        //Invalid credentials
        header('location: ../view/index.php?key=1nva11d-c43d3nt1a15');
    }

?>