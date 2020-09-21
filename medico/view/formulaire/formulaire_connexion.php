<!DOCTYPE html>
<html lang="fr" dir="ltr">

<meta charset="utf-8">
<?php
  require_once($_SERVER['DOCUMENT_ROOT']."/HSP_Site_Web/medico/manager/manager.php");
  $manager = new Manager();
  $manager->include_forms();
?>
<title>HSP | Connexion</title>
<link rel="stylesheet" href="formulaire_connexion_style.css">

<body>

  <?php $manager->include_header();?>

  <form action="../../traitement/traitement_formulaire_connexion.php" method="post">

    <div class="form-group">
      <label for="exampleInputEmail1" >Entrez votre adresse e-mail</label>
      <input type="email" name="mail" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Adresse e-mail">
      <label for="exampleInputPassword1">Entrez votre mot de passe</label>
      <input type="password"  name="mdp" class="form-control" id="exampleInputPassword1" placeholder="Mot de passe">


      <a href="../../traitement/traitement_mot_de_passe-oublie.php">Mot de passe oublié ?</a>

      <a href="formulaire_inscription.php">Vous n'avez pas de compte ?</a>

      <button type="submit" class="btn btn-primary">Connexion</button>

      <a class="return-home" href="../index.php">Retour à l'accueil</a>

    </div>

  </form>

</body>
</html>
