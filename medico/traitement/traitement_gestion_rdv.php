<?php
//On démarre une session
session_start();
//On appelle la classe manager
require_once($_SERVER['DOCUMENT_ROOT']."/HSP_Site_Web/medico/manager/manager.php");
//On instancie la variable $manager de type new Manager();
$manager = new Manager();
//On appelle la fonction gestion_rdv
$manager->gestion_rdv($_POST['date_rdv'],$_POST['creneau_rdv'],$_POST['nom_medecin'],$_POST['mail_patient']);
 ?>
