<?php
session_start();
require_once($_SERVER['DOCUMENT_ROOT']."/HSP_Site_Web/medico/manager/manager.php");
$manager = new Manager();
$manager->gestion_rdv($_SESSION['id_medecin'],$_SESSION['id'],$_POST['date_rdv'],$_POST['heure_rdv'],$_SESSION['nom_medecin'],$_SESSION['nom']);


 ?>
