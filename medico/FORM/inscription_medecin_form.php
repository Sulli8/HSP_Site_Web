<?php
//on appelle la classe manager
require_once($_SERVER['DOCUMENT_ROOT']."/HSP_Site_Web/medico/manager/manager.php");
//On instancie la variable $inscription_medecin
$inscription_medecin = ["nom"=>$_POST["nom_medecin"],
    "prenom"=>$_POST["prenom_medecin"],
    "departement"=>$_POST["departement_medecin"],
    "specialite"=>$_POST["specialite_medecin"],
    "mail"=>$_POST["mail_medecin"],
    "pass"=>$_POST["mdp_medecin"]];
    //On instancie la variable $manager de type manager
    $manager = new manager();
    //On appelle la fonction inscription_medecin
    $manager->inscription_medecin($inscription_medecin);
 ?>
