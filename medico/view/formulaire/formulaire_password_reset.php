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

  <form action="../../traitement/traitement_password_reset.php" method="post">

    <div class="form-group">
      <label for="exampleInputEmail1" >Entrez votre adresse e-mail</label>
      <input type="email" name="mail_reset" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Adresse e-mail">



      <input type="submit" name="submit" value="Envoyer le lien de récupération" class="btn btn-primary"></input>

      <a class="return-home" href="../index.php">Retour à l'accueil</a>

    </div>

  </form>

</body>
</html>
