<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>HSP | Connexion</title>
  </head>
  <body>

    <form action="../../traitement/traitement_formulaire_connexion.php" method="post">
      <label>Adresse mail :</label>
        <input type="mail" name="mail" value=""/>
        <label for="">Mot de passe :</label>
        <input type="password" name="mdp" value=""/>

        <a href="../../traitement/traitement_mot_de_passe-oublie.php">Mot de passe oublié ?</a>
        <a href="formulaire_inscription.php">Vous n'avez pas de compte ?</a>
        <input type="submit"  value="Connexion"/>
    </form>

  </body>
</html>
