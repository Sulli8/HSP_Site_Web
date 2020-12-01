<?php

require_once($_SERVER['DOCUMENT_ROOT']."/HSP_Site_Web/medico/manager/manager.php");
$manager = new Manager();
session_start();
$metier = $_POST['metier'];
$contrat = $_POST['contrat'];
$nom_entreprise = $_POST['nom_entreprise'];
var_dump($_SESSION);
$id_user = $_SESSION['id'];
$tab_job = array("metier"=>$metier,"contrat"=>$contrat,"nom_entreprise"=>$nom_entreprise);
$manager->offres_emploies($id_user,$tab_job);
?>
