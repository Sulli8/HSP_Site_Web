<!DOCTYPE html>
<html lang="fr" dir="ltr">

<meta charset="utf-8">

<title>HSP | Update password</title>
<link rel="stylesheet" href="../../css/style_formulaire_password_update.css">

<body>

  <form class="box" action="../../traitement/traitement_update_password.php" method="post">
      <input type="email" name="mail"  placeholder="Mail">
      <input type="password" name="password" placeholder="New Password">

      <input type="submit" name="submit" value="Sent password reset mail"></input>

      <a class="return-home" href="../index.php">Retour à l'accueil</a>
  </form>

</body>
</html>
