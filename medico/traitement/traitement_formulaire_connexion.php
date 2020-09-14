<?php

require_once($_SERVER['DOCUMENT_ROOT']."/HSP_Site_Web/medico/manager/manager.php");

$manager = new Manager();
$manager->connexion($_POST["mail"],$_POST["mdp"]);

 ?>
