<?php



//Inscription User
if(isset($_POST["nom"]) && isset($_POST["prenom"]) && isset($_POST["mail"]) && isset($_POST["mutuelle"]) && isset($_POST["mdp"]) && isset($_POST["adresse"])){
//Redirection manager
  require_once($_SERVER['DOCUMENT_ROOT']."/HSP_Site_Web/medico/manager/manager.php");
  require_once($_SERVER['DOCUMENT_ROOT']."/HSP_Site_Web/medico/model/inscription.php");
  $inscription = new Inscription(["nom"=>$_POST["nom"],
  "prenom"=>$_POST["prenom"],
  "mail"=>$_POST["mail"],
  "mutuelle"=>$_POST["mutuelle"],
  "mdp"=>$_POST["mdp"],
  "adresse"=>$_POST["adresse"]]);
  $manager = new manager();
  $manager->inscription($inscription);
}


//Inscription Admin
if(isset($_POST["prenom"]) && isset($_POST["mail"]) &&  $_POST["mdp"] == "root"){
  require_once($_SERVER['DOCUMENT_ROOT']."/HSP_Site_Web/medico/manager/manager.php");
  require_once($_SERVER['DOCUMENT_ROOT']."/HSP_Site_Web/medico/model/inscription.php");
  $inscription_admin = new Inscription(["nom"=>"root",
  "prenom"=>$_POST["prenom"],
  "mail"=>$_POST["mail"],
  "mutuelle"=>"0",
  "mdp"=>$_POST["mdp"],
  "admin"=>"1",
  "adresse"=>"NULL"]);
  $manager = new manager();
  $manager->inscription($inscription_admin);


}


//Inscription Médecin

if(isset($_POST['nom_medecin']) && isset($_POST['prenom_medecin']) && isset($_POST["departement_medecin"]) && isset($_POST["specialite_medecin"]) && isset($_POST["mail_medecin"]) && isset($_POST["mdp_medecin"])){
  require_once($_SERVER['DOCUMENT_ROOT']."/HSP_Site_Web/medico/manager/manager.php");
  require_once($_SERVER['DOCUMENT_ROOT']."/HSP_Site_Web/medico/model/inscription_medecin.php");
  $inscription_medecin = new Insert_medecin(["nom"=>$_POST["nom_medecin"],
    "prenom"=>$_POST["prenom_medecin"],
    "departement"=>$_POST["departement_medecin"],
    "specialite"=>$_POST["specialite_medecin"],
    "mail"=>$_POST["mail_medecin"],
    "mdp"=>$_POST["mdp_medecin"]]);
    $manager = new manager();
    $manager->inscription_medecin($inscription_medecin);
}


 ?>
