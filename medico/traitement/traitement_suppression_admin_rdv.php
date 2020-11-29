<?php
require_once($_SERVER['DOCUMENT_ROOT']."/Monhopital/medico/manager/manager.php");
$manager = new Manager();
$delete = $_GET['delete'];
$manager->delete_rdv_admin($delete);


 ?>
