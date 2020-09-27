<?php
session_start();
require_once($_SERVER['DOCUMENT_ROOT']."/HSP_Site_Web/medico/manager/manager.php");
$database = new Manager();
$connexion = $database->connexion_bd();
// Création de l'objet PDO
$mdp = $_POST["password"];
$newpassword = $_POST["new_password"];
$new = $connexion->prepare('UPDATE user SET mdp=:mdp WHERE mail=:mail');
$new_mdp = $new->execute(array('mail'=>$_POST['mail'],'mdp'=>$mdp));
//On modifie la base de donnée

 ?>
