<!DOCTYPE html>
<html lang="fr" dir="ltr">

    <meta charset="utf-8">
      <?php
require_once($_SERVER['DOCUMENT_ROOT']."/HSP_Site_Web/medico/manager/manager.php");
      $manager = new Manager();
$manager->include_forms();
       ?>
    <title>HSP | Connexion</title>


  <body>
      <?php $manager->include_header();?>

    <form <?php $manager->css_forms(); ?>action="../../traitement/traitement_formulaire_connexion.php" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1" >Email address</label>
    <input type="email" name="mail" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password"  name="mdp" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>

  <div>        <a  <?php $manager->css_a(); ?>href="../../traitement/traitement_mot_de_passe-oublie.php">Mot de passe oublié ?</a>
          <a  <?php $manager->css_a(); ?>href="formulaire_inscription.php">Vous n'avez pas de compte ?</a></div>
  <button type="submit" class="btn btn-primary">Connexion</button>
</form>

  </body>
</html>
