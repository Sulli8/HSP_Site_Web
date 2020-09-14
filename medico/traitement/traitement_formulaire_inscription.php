<?php

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
 ?>
