<?php
session_start();
require_once($_SERVER['DOCUMENT_ROOT']."/Monhopital/medico/manager/manager.php");
$manager = new Manager();

$manager->gestion_rdv($_POST['date_rdv'],$_POST['creneau_rdv'],$_POST['nom_medecin'],$_POST['mail_patient']);
 ?>
