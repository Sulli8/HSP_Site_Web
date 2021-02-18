<?php

    $my_key = $_GET['key'];

    //Connect DB
    require_once($_SERVER['DOCUMENT_ROOT']."/HSP_Site_Web/medico/manager/manager.php");
    $manager = new Manager();
    $mysqli = $manager->connexion_mysqli();
    //Query the database
    $resultRDV = $mysqli->query("SELECT * FROM rdv WHERE id = '$my_key'");

    if($resultRDV->num_rows != 0) {
        $deleteRDV = $mysqli->query("DELETE FROM rdv WHERE id = '$my_key'");
        if($deleteRDV) {
            header('location: ../../index.php?key=4dv-5a2c3l'); //All is good
        }else {
            header('location: ../../index.php?key=4dv-n0-5a2c3l'); //An error
        }
    }else {
        header('location: ../../index.php?key=4dv-n0-3x15t'); //Return to index and echo error
    }

?>
