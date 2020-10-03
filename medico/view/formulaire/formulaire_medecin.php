
<!doctype html>
<html lang="fr">

<?php
require_once($_SERVER['DOCUMENT_ROOT']."/HSP_Site_Web/medico/manager/manager.php");
$manager = new Manager();
$manager->include_forms();
 ?>

 <link rel="stylesheet" href="formulaire_inscription_style.css">
<body>

  <!--<?php $manager->include_header();?>-->
<form action="../../traitement/traitement_formulaire_inscription.php" method="post">

  <div class="form-group">
    <label for="exampleInputEmail1" >Entrez votre Nom</label>
    <input type="text" name="nom_medecin" class="form-control"  placeholder="Entrez votre nom"/>

    <label for="exampleInputEmail1" >Entrez votre Prénom</label>
    <input type="text" name="prenom_medecin" class="form-control"  placeholder="Entrez votre prénom"/>

    <label for="exampleInputEmail1" >Entrez votre Département </label>
    <input type="text" name="departement_medecin" class="form-control"  placeholder="Département"/>

    <label for="mutuelle" >Renseignez votre Spécialité</label>
    <input type="text" name="specialite_medecin" class="form-control"  placeholder="Spécialité"/>


    <label for="adresse" >Entrez votre Email</label>
    <input type="mail" name="mail_medecin" class="form-control"  aria-describedby="emailHelp" placeholder="Entrez votre adresse mail"/>


    <label for="adresse" >Entrez votre Mot de passe</label>
    <input type="password" name="mdp_medecin" class="form-control"  minlength="8" aria-describedby="emailHelp" placeholder="Entrez votre mot de passe"/>


    <input type="submit" value="Ajout Médecin"class="btn btn-primary"></input>

    <a class="return-home" href="../index.php">Retour à l'accueil</a>

  </div>

</form>
</body>
</html>
