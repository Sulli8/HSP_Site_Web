<?php
//On appelle la classe manager
require_once($_SERVER['DOCUMENT_ROOT']."/HSP_Site_Web/medico/manager/manager.php");
//On instacie la variable $manager de type new Manager();
$manager = new Manager();
//On déclare la variable $rdv de valeur array("nom_patient"=>$_POST['nom_patient'],"date_rdv"=>$_POST['date_rdv'],"creneau_rdv"=>$_POST['creneau_rdv']);
$rdv = array("nom_patient"=>$_POST['nom_patient'],"date_rdv"=>$_POST['date_rdv'],"creneau_rdv"=>$_POST['creneau_rdv']);
//on appelle la fonction ajout_rdv();
$manager->ajout_rdv($rdv);

 ?>
