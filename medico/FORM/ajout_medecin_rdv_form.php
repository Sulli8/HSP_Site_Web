<?php

require_once($_SERVER['DOCUMENT_ROOT']."/HSP_Site_Web/medico/manager/manager.php");
$manager = new Manager();
$rdv = array("nom_patient"=>$_POST['nom_patient'],"date_rdv"=>$_POST['date_rdv'],"creneau_rdv"=>$_POST['creneau_rdv']);
$manager->ajout_rdv($rdv);

 ?>
