<?php

require_once($_SERVER['DOCUMENT_ROOT']."/HSP_Site_Web/medico/manager/manager.php");
$manager = new Manager();
session_start();

if(isset($_SESSION['id_medecin'])){
  $manager->affiche_rdv($_SESSION['id_medecin']);
}else {
  echo "WARNING: Vous n'avez pas de rdv ";
}


 ?>
