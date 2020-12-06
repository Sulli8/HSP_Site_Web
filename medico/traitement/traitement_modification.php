<?php
//On appelle la classe manger et la classe médecin
require_once($_SERVER['DOCUMENT_ROOT']."/HSP_Site_Web/medico/manager/manager.php");
require_once($_SERVER['DOCUMENT_ROOT']."/HSP_Site_Web/medico/model/medecin.php");
//On instancie la variable $manager de type new Manager();
$manager = new Manager();
//On démarre une session
session_start();
//On instancie la variable de type new Médecin
$tab_medecin = new medecin(['nom'=>$_POST['nom'],'prenom'=>$_POST['prenom'],'specialite'=>$_POST['specialite'],'mail'=>$_POST['mail'],'departement'=>$_POST['departement'],'mdp'=>$_POST['mdp'],'image_profil'=>$_FILES['photo']['name']]);
//On appelle la fonction update_user
$manager->update_user($tab_medecin,$_SESSION['id_medecin']);


?>
