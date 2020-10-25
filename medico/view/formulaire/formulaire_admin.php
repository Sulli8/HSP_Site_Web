
<!doctype html>
<html lang="fr">


 <link rel="stylesheet" href="formulaire_inscription_style.css">
<body>

<form action="../../traitement/traitement_formulaire_inscription.php" method="post">

  <div class="form-group">
    <label for="exampleInputEmail1" >Entrez votre nom Admin</label>
    <input type="text" name="nom" value="root" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >

    <label for="exampleInputEmail1" >Entrez votre prénom Admin</label>
    <input type="text" name="prenom" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Entrez votre prénom">

    <label for="exampleInputEmail1" >Entrez votre adresse e-mail Admin</label>
    <input type="email" name="mail" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Entrez votre adresse e-mail">


    <label for="mot_de_passe" >Entrez un mot de passe</label>
    <input type="password" name="mdp" value="root" class="form-control"  aria-describedby="emailHelp" placeholder="Entrez un mot de passe">

    <input type="submit"class="btn btn-primary" value="Ajouter Admin"/>

    <a href="formulaire_connexion.php">Vous avez déjà un compte admin ?</a>


    <a class="return-home" href="../index.php">Retour à l'accueil</a>

  </div>

</form>
</body>
</html>
