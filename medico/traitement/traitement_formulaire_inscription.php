<?php


//Inscription User
if(isset($_POST["nom"]) && isset($_POST["prenom"]) && isset($_POST["mail"]) && isset($_POST["mutuelle"]) && isset($_POST["mdp"]) && isset($_POST["adresse"])){
//Redirection manager
  require_once($_SERVER['DOCUMENT_ROOT']."/HSP_Site_Web/medico/manager/manager.php");
  require_once($_SERVER['DOCUMENT_ROOT']."/HSP_Site_Web/medico/model/user.php");

  $inscription = new user(["nom"=>$_POST["nom"],
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
  require_once($_SERVER['DOCUMENT_ROOT']."/HSP_Site_Web/medico/model/user.php");

  $inscription_admin = new user(["nom"=>"root",
  "prenom"=>$_POST["prenom"],
  "mail"=>$_POST["mail"],
  "mutuelle"=>"0",
  "mdp"=>$_POST["mdp"],
  "admin"=>"1",
  "adresse"=>"NULL",
  "image_profil"=>$_FILES['photo']['name']]
);
  $manager = new manager();
  $manager->inscription($inscription_admin);


}


//Inscription Médecin

if(isset($_POST['nom_medecin']) && isset($_POST['prenom_medecin']) && isset($_POST["departement_medecin"]) && isset($_POST["specialite_medecin"]) && isset($_POST["mail_medecin"]) && isset($_POST["mdp_medecin"])){
  require_once($_SERVER['DOCUMENT_ROOT']."/HSP_Site_Web/medico/manager/manager.php");
  require_once($_SERVER['DOCUMENT_ROOT']."/HSP_Site_Web/medico/model/medecin.php");
  //Redirection manager
    require_once($_SERVER['DOCUMENT_ROOT']."/HSP_Site_Web/medico/manager/manager.php");
    require_once($_SERVER['DOCUMENT_ROOT']."/HSP_Site_Web/medico/model/user.php");
    if(isset($_POST["env"])){
    $logo=$_FILES['photo']['name'];
    echo $logo;
    if($logo!=""){
    require "uploadImage.php";
    }
    else {$logo="notdid";}
    if($logo!="notdid"){
    echo "upload reussi!!!";

    }
    else{
    echo"recommence!!!";
    }
    }
  $inscription_medecin = new medecin(["nom"=>$_POST["nom_medecin"],
    "prenom"=>$_POST["prenom_medecin"],
    "departement"=>$_POST["departement_medecin"],
    "specialite"=>$_POST["specialite_medecin"],
    "mail"=>$_POST["mail_medecin"],
    "mdp"=>$_POST["mdp_medecin"],
    "image_profil"=>$_FILES['photo']['name']]);
    $manager = new manager();
    $manager->inscription_medecin($inscription_medecin);
}


 ?>
