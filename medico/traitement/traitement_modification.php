<?php
require_once($_SERVER['DOCUMENT_ROOT']."/HSP_Site_Web/medico/manager/manager.php");
require_once($_SERVER['DOCUMENT_ROOT']."/HSP_Site_Web/medico/model/medecin.php");
$manager = new Manager();

session_start();
$tab_medecin = new medecin(['nom'=>$_POST['nom'],'prenom'=>$_POST['prenom'],'specialite'=>$_POST['specialite'],'mail'=>$_POST['mail'],'departement'=>$_POST['departement'],'mdp'=>$_POST['mdp']]);
$manager->update_user($tab_medecin,$_SESSION['id_medecin']);


?>
