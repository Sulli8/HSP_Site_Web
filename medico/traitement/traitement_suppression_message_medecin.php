<?php

require_once($_SERVER['DOCUMENT_ROOT']."/HSP_Site_Web/medico/manager/manager.php");
$manager = new Manager();

$delete = $_GET['delete'];
$manager->delete_message_medecin($delete);

 ?>
