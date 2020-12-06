<?php
//On appelle la classe manager
require_once($_SERVER['DOCUMENT_ROOT']."/HSP_Site_Web/medico/manager/manager.php");
//On instancie la variable $manager de type new Manager();
$manager = new Manager();
//On démarre une session
session_start();
//on déclare la variable $metier de valeur $_POST['metier'];
$metier = $_POST['metier'];
//on déclare la variable $contrat de valeur $_POST['contrat'];
$contrat = $_POST['contrat'];
//on déclare la variable $nom_entreprise de valeur $_POST['nom_entreprise'];
$nom_entreprise = $_POST['nom_entreprise'];
//on déclare la variable $id_user de valeur $_POST['contrat'];
$id_user = $_SESSION['id'];
//on déclare la variable $tab_job de valeur array("metier"=>$metier,"contrat"=>$contrat,"nom_entreprise"=>$nom_entreprise);
$tab_job = array("metier"=>$metier,"contrat"=>$contrat,"nom_entreprise"=>$nom_entreprise);
//on appelle la fonction offres_emploies
$manager->offres_emploies($id_user,$tab_job);
?>
