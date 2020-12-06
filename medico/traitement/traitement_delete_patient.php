<?php
//On appelle la classe manager
require_once($_SERVER['DOCUMENT_ROOT']."/HSP_Site_Web/medico/manager/manager.php");
//On instancie la variable $manager de type new Manager();
$manager = new Manager();
//On déclare la variable $delete de valeur $_GET['delete'];
$delete = $_GET['delete'];
//On appelle la fonction delete_patient
$manager->delete_patient($delete);

 ?>
