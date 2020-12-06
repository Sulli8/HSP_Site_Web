<?php
//On appelle la classe manager();
require_once($_SERVER['DOCUMENT_ROOT']."/HSP_Site_Web/medico/manager/manager.php");
//On instancie la variabe $manager de type new Manager();
$manager = new Manager();
//on déclare la variable $delete de valeur  $_GET['delete'];
$delete = $_GET['delete'];
//on appelle le fonction delete_medecin 
$manager->delete_medecin($delete);

 ?>
