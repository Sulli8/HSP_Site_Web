<?php

require_once($_SERVER['DOCUMENT_ROOT']."/HSP_Site_Web/medico/manager/manager.php");
require_once($_SERVER['DOCUMENT_ROOT']."/HSP_Site_Web/medico/model/user.php");


$manager = new Manager();
$user = new User([['nom']=>$_POST['nom'],'prenom'=>$_POST['prenom'],'mail'=>$_POST['mail'],'mutuelle'=>$_POST['mutuelle'],'mdp'=>$_POST['mdp'],'adresse'=>$_POST['adresse']]);

$manager->update_real_user($tab_user,$id)
 ?>
