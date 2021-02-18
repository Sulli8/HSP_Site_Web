
<!doctype html>
<html lang="fr">

<!-- Formulaire d'insertion médecin-->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interface Medecin</title>
     <link rel="stylesheet" href="/css/formulaire_inscription_style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body class="bg-light">


<form  action="/FORM/inscription_medecin_form.php" method="post">
      <div class="form-group">
          <div class="row">
            <div class="col-md-6">
              <label for="nom">Entrez le Nom</label>
                  <input type="text" name="nom_medecin" class="form-control"  placeholder="Entrez le nom medecin"/>
            </div>
            <div class="col-md-6">
              <label for="exampleInputEmail1" >Entrez le Prénom</label>
              <input type="text" name="prenom_medecin" class="form-control"  placeholder="Entrez votre prénom"/>
            </div>

            <div class="col-md-6">
              <label for="exampleInputEmail1" >Entrez le Département </label>
              <input type="text" name="departement_medecin" class="form-control"  placeholder="Département" required/>
            </div>

            <div class="col-md-6">
              <label for="mutuelle" >Renseignez la Spécialité</label>
              <input type="text" name="specialite_medecin" class="form-control"  placeholder="Spécialité" required/>
            </div>

              <div class="col-md-6">
            <label for="mail" >Entrez l' Email</label>
            <input type="mail" name="mail_medecin" class="form-control"  aria-describedby="emailHelp" placeholder="Entrez votre adresse mail" required/>
            </div>


            <div class="col-md-6">
              <label for="password" >Entrez le Mot de passe</label>
              <input type="password" name="mdp_medecin" class="form-control"  minlength="8" aria-describedby="emailHelp" placeholder="Entrez votre mot de passe" required/>
            </div>
          </div>

          <input style="margin-top: 8px;background-color: #0596de;" class="mt-2 btn btn-primary" type="submit" value="Ajouter Médecin"></input>

          <a class="return-home" href="/interface_admin/index.php">Retour à l'accueil</a>
</div>
    </form>
</body>
</html>
