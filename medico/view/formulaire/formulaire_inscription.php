<!doctype html>
<html lang="fr">



 <link rel="stylesheet" href="../../css/formulaire_inscription_style.css">
<body>

<form action="../../traitement/traitement_formulaire_inscription.php" method="post">

  <div class="form-group">
    <label for="exampleInputEmail1" >Entrez votre nom</label>
    <input type="text" name="nom" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Entrez votre nom">

    <label for="exampleInputEmail1" >Entrez votre prénom</label>
    <input type="text" name="prenom" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Entrez votre prénom">

    <label for="exampleInputEmail1" >Entrez votre adresse e-mail</label>
    <input type="email" name="mail" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Entrez votre adresse e-mail">

    <label for="mutuelle" >Renseignez votre mutuelle</label>
    <input type="text" name="mutuelle" class="form-control"  aria-describedby="emailHelp" placeholder="Renseignez votre mutuelle">

    <label for="mot_de_passe" >Entrez un mot de passe</label>
    <input type="password" name="mdp" class="form-control"  aria-describedby="emailHelp" placeholder="Entrez un mot de passe">

    <label for="adresse" >Entrez votre adresse</label>
    <input type="text" name="adresse" class="form-control"  aria-describedby="emailHelp" placeholder="Entrez votre adresse">

    <a href="formulaire_connexion.php">Vous avez déjà un compte ?</a>

    <button type="submit" class="btn btn-primary">Inscription</button>

    <a class="return-home" href="../index.php">Retour à l'accueil</a>

  </div>

</form>
</body>
</html>
