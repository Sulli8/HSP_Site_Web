<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <!-- Formulaire d'insertion emploies -->
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Postuler à une offre</title>
  </head>
  <body>

    <form action="../../traitement/traitement_formulaire_emploies.php" method="post">
  <div class="form-row">
    <div class="form-group col-md-3">
      <label for="inputName">nom</label>
      <input type="text" class="form-control" id="inputName" placeholder="Votre nom">
    </div>
    <div class="form-group col-md-3">
      <label for="inputFirstname">Prénom</label>
      <input type="text" class="form-control" id="inputFirstname" placeholder="Votre prénom">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-3">
      <label for="inputAdresse">email</label>
      <input type="email" class="form-control" id="inputEmail" placeholder="Votre email">
    </div>
  <div class="form-group col-md-3">
    <label for="inputAdresse">Adresse</label>
    <input type="text" class="form-control" id="inputAdresse" placeholder="Votre adresse">
  </div>
</div>
  <div class="form-row">
    <div class="form-group col-md-3">
      <label for="inputville">Ville</label>
      <input type="text" class="form-control" id="inputVille" placeholder="Votre ville">
    </div>
    <div class="form-group col-md-2">
      <label for="inputCodepostale">Code postale</label>
      <input type="text" class="form-control" id="inputCodepostale" placeholder="Code postale">
    </div>
  </div>
  <div class="form-row">
  <div class="form-group col-md-2">
    <label for="inputTelephone">Téléphone</label>
    <input type="text" class="form-control" id="inputTelephone" placeholder="Numéro de téléphone">
  </div>
</div>
  <div class="form-group">
  </div>
  <button type="submit" class="btn btn-primary">Postuler</button>
</form>
  </body>
</html>
