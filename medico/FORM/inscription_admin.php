<?php
require_once($_SERVER['DOCUMENT_ROOT']."/HSP_Site_Web/medico/manager/manager.php");
$inscription_admin = ["nom"=>$_POST["nom"],
    "prenom"=>$_POST["prenom"],
    "mail"=>$_POST["mail"],
    "pass"=>$_POST["pass"]];
    $manager = new manager();
    $manager->inscription_admin($inscription_admin);
 ?>
