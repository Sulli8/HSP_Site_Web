<?php


require_once($_SERVER['DOCUMENT_ROOT']."/HSP_Site_Web/medico/manager/manager.php");
$manager = new Manager();
$tableau = array('nom_patient'=>$_POST['nom_patient'],'date'=>$_POST['date'],'heure'=>$_POST['heure']);
$manager->ajout_rdv($tableau);
 ?>
