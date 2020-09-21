
<!doctype html>
<html lang="en">

<?php
require_once($_SERVER['DOCUMENT_ROOT']."/HSP_Site_Web/medico/manager/manager.php");
$manager = new Manager();
$manager->include_forms();
 ?>
<body>

  <?php $manager->include_header();?>
<form action="../../traitement/traitement_formulaire_inscription.php" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1" >Nom</label>
    <input type="text" name="nom" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Name">

  </div>

    <div class="form-group">
      <label for="exampleInputEmail1" >Prénom : </label>
      <input type="text" name="prenom" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter First Name">
    </div>


    <div class="form-group">
      <label for="exampleInputEmail1" >Adresse Mail :</label>
      <input type="email" name="mail" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
      <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>

    <div class="form-group">
      <label for="mutuelle" >Mutuelle :</label>
      <input type="text" name="mutuelle" class="form-control"  aria-describedby="emailHelp" placeholder="Enter mutuelle">
    </div>

    <div class="form-group">
      <label for="mot_de_passe" >Mot de passe :</label>
      <input type="password" name="mdp" class="form-control"  aria-describedby="emailHelp" placeholder="Enter password">
    </div>

    <div class="form-group">
      <label for="adresse" >Adresse :</label>
      <input type="text" name="adresse" class="form-control"  aria-describedby="emailHelp" placeholder="Enter adress">

    </div>

  <button type="submit" class="btn btn-primary">Inscription</button>

</form>
<?php include "../../include/script.php"; include "../../include/footer.php"; ?>
</body>
</html>
