<?php
session_start();
require_once($_SERVER['DOCUMENT_ROOT']."/HSP_Site_Web/medico/manager/manager.php");
$manager = new Manager();

$mois = "".strval($_POST['mois']+1);
$annee = $_POST['annee'];
$jours = "".strval($_POST['date']);
if($mois >= "10" || $date >= "10"){
  $mois = "0".$_POST['mois']+1;
  $mois = "0".$_POST['mois']+1;
}
$calendar = $annee."-".$mois."-".$jours;
$manager->gestion_rdv($_SESSION['id_medecin'],$_SESSION['id'],$calendar,$_POST['heure'],$_SESSION['nom_medecin'],$_SESSION['nom']);
 ?>
