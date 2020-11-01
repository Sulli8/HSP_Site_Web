<?php
require_once($_SERVER['DOCUMENT_ROOT']."/HSP_Site_Web/medico/manager/manager.php");
$manager = new Manager();

$delete = $_GET['delete'];
$manager->delete($delete);

session_start();
if(isset($_SESSION['admin'])){
  $manager->delete_rdv_admin($delete);

}
 ?>
