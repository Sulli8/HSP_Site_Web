<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
     <link rel="stylesheet" href="../../css/formulaire_modification_style.css">
  </head>
  <?php session_start();
  $id_user = $_SESSION['id'];
require_once($_SERVER['DOCUMENT_ROOT']."/HSP_Site_Web/medico/manager/manager.php");
   ?>
  <body>

<form class="box" action="../../traitement/traitement_user_modification.php" method="post">
<?php $manager = new Manager();
$db = $manager->connexion_bd();
$affiche_information_user = "SELECT nom,prenom,mail,mutuelle,mdp,adresse from user Where id='$id_user'";
$request_user = $db->query($affiche_information_user);
$information_user = $request_user->fetchall();
for ($i=0; $i < count($information_user); $i++) {

 foreach (array_unique($information_user[$i]) as $key => $value){ ?>

          <input name="<?php echo $key; ?>" value="<?php echo $value;?>" type="text" id="input" placeholder="<?php echo ucfirst($key); ?> : <?php echo ucfirst($value);?>"></input>
 <?php  }
 } ?>

<input type="submit" value="Modifier mes informations" ></input>
<a href="../index.php">Retour à l'accueil</a>

</form>
  </body>
</html>
