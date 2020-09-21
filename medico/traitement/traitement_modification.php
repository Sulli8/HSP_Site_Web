<?php
require_once($_SERVER['DOCUMENT_ROOT']."/HSP_Site_Web/medico/manager/manager.php");
$manager = new Manager();
session_start();
$manager->update_user($_SESSION['val'],$_SESSION['mail'],$_SESSION['mdp']);
?>
