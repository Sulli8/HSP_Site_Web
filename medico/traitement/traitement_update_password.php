<?php
session_start();
require_once($_SERVER['DOCUMENT_ROOT']."/HSP_Site_Web/medico/manager/manager.php");
$database = new Manager();
$connexion = $database->connexion_bd();
// Création de l'objet PDO
$mdp = $_POST["password"];
$new = $connexion->prepare('UPDATE user SET mdp=:mdp WHERE mail=:mail');
$new_mdp = $new->execute(array('mail'=>$_POST['mail'],'mdp'=>$mdp));
//On modifie la base de donnée
var_dump($new_mdp);
if($new_mdp == true){
  header("Location:../view/index.php");
}else{
  echo "erreur de traitement !";
}
 ?>
