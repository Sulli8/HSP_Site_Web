<?php
//On appelle le fonction manager
require_once($_SERVER['DOCUMENT_ROOT']."/HSP_Site_Web/medico/manager/manager.php");
$inscription_admin = ["nom"=>$_POST["nom"],
    "prenom"=>$_POST["prenom"],
    "mail"=>$_POST["mail"],
    "pass"=>$_POST["pass"]];
    //On instancie la variable $manager de type new manager();
    $manager = new manager();
    //on appelle la fonction inscription
    $manager->inscription_admin($inscription_admin);
 ?>
