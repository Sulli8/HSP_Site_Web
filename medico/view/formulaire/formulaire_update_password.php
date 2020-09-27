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

  <form action="../../traitement/traitement_update_password.php" method="post">

    <div class="form-group">

      <label for="exampleInputEmail1" >Enter Mail:</label>
      <input type="email" name="mail" class="form-control"  aria-describedby="emailHelp" placeholder="Mail">
      <label for="exampleInputEmail1" >Enter Password:</label>
      <input type="password" name="password" class="form-control"  aria-describedby="emailHelp" placeholder="New Password">
  <label for="exampleInputEmail1" >Confirmation Password:</label>
      <input type="password" name="new_password" class="form-control" aria-describedby="emailHelp" placeholder="New Password">



      <input type="submit" name="submit" value="Sent password reset mail" class="btn btn-primary"></input>

      <a class="return-home" href="../index.php">Retour à l'accueil</a>

    </div>

  </form>

</body>
</html>
