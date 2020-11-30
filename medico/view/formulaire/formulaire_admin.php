
<!doctype html>
<html lang="fr">


 <link rel="stylesheet" href="../../css/formulaire_inscription_style.css">
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Interface Medecin</title>
      <link rel="stylesheet" href="../../css/formulaire_inscription_style.css">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
 </head>
<body style="background-color:#000000;">

<form action="../../FORM/inscription_admin.php" method="post">

  <div class="form-group">
    <label for="exampleInputEmail1" >Entrez votre nom Admin</label>
    <input type="text" name="nom" value="root" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>

    <label for="exampleInputEmail1" >Entrez votre prénom Admin</label>
    <input type="text" name="prenom" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Entrez votre prénom" required>

    <label for="exampleInputEmail1" >Entrez votre adresse e-mail Admin</label>
    <input type="email" name="mail" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Entrez votre adresse e-mail" required>


    <label for="mot_de_passe" >Entrez un mot de passe</label>
    <input type="password" name="pass" value="root" class="form-control"  aria-describedby="emailHelp" placeholder="Entrez un mot de passe" required>



    <input style="background-color: #3498db;margin-top:8px;" type="submit"class="btn btn-primary" value="Ajouter Admin"/>




    <a class="return-home" href="../index.php">Retour à l'accueil</a>

  </div>

</form>
</body>
</html>
