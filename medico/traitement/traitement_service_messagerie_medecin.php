<?php

require_once($_SERVER['DOCUMENT_ROOT']."/HSP_Site_Web/medico/manager/manager.php");
require_once($_SERVER['DOCUMENT_ROOT']."/HSP_Site_Web/medico/model/service_messagerie.php");
$manager = new Manager();
$messagerie = new Messagerie(['destinataire'=>$_POST['destinataire'],'objet_message'=>$_POST['objet_message'],'message'=>$_POST['message'],'messagerecu'=>'NULL']);
session_start();
$id_medecin = $_SESSION['id_medecin'];
$manager->service_messagerie_medecin($messagerie,$id_medecin);


 ?>
