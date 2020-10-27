<?php
require_once($_SERVER['DOCUMENT_ROOT']."/HSP_Site_Web/medico/manager/manager.php");
require_once($_SERVER['DOCUMENT_ROOT']."/HSP_Site_Web/medico/model/service_messagerie.php");
$manager = new Manager();
$messagerie = new Messagerie([$_POST['destinataire'],$_POST['objet_message'],$_POST['message']]);
session_start();
$id_user = $_SESSION['id'];
$manager->service_messagerie($messagerie,$id_user);

 ?>
