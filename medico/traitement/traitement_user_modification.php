<?php

//require_once($_SERVER['DOCUMENT_ROOT']."/HSP_Site_Web/medico/manager/manager.php");
require_once($_SERVER['DOCUMENT_ROOT']."/HSP_Site_Web/medico/model/user.php");
if(isset($_POST["env"])){
$logo=$_FILES['photo']['name'];
echo $logo;
if($logo!=""){
require "uploadImage.php";
}
else {$logo="notdid";}
if($logo!="notdid"){
echo "upload reussi!!!";

}
else{
echo"recommence!!!";
}
}
$manager = new Manager();
$user = new User([['nom']=>$_POST['nom'],'prenom'=>$_POST['prenom'],'mail'=>$_POST['mail'],'mutuelle'=>$_POST['mutuelle'],'mdp'=>$_POST['mdp'],'adresse'=>$_POST['adresse'],'image_profil'=>"moiboin"]);
$manager->update_real_user($tab_user,$id);
 ?>
