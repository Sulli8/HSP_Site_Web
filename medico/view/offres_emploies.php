<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>offres d'emploies</title>
  </head>
  <body>
    <nav id="navbar-example2" class="navbar navbar-light bg-light">
  <a class="navbar-brand mx-auto" href="index.php">HSP | Emploi</a>
</nav>
<br>

<?php
//On appelle la classe manager pour se connecter à la BDD
require_once($_SERVER['DOCUMENT_ROOT']."/HSP_Site_Web/medico/manager/manager.php");
//On instancie la variable manager de type new Manager
$manager = new Manager();
$db = $manager->connexion_bd();
//On déclare la variable métier
$metier = "SELECT metier,contrat,nom_entreprise from emploies";
//On exécute la requête
$job = $db->query($metier);
//On déclare la tableau de tableau $tableau
$tableau = $job->fetchall();
 ?>

<div class="pull-right" data-spy="scroll" data-target="#navbar-example2" data-offset="0">


  <table class="table table-dark">
  <thead>
    <tr>
      <th scope="col">Métier</th>
      <th scope="col">Contrat</th>
      <th scope="col">Nom entreprise</th>
      <th scope="col">Postuler</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <form action="../traitement/traitement_formulaire_emploies.php" method="post">
      <?php
      //On parcours le tableau pour i allant de 0 à la longueuer du tableau
      for ($i=0; $i < count($tableau); $i++) { ?>
      <td><input name="metier" class=" btn btn-dark" type="text" value=<?php
      //On affiche métier
      echo $tableau[$i]['metier']; ?>  ></input></td>
      <td><input name="contrat" class="btn btn-dark" type="text" value=<?php
      //On affiche contrat
       echo $tableau[$i]['contrat']; ?> ></input></td>
        <td><input name="nom_entreprise" class="btn btn-dark" type="text" value=<?php
        //On affiche nom_entreprise
        echo $tableau[$i]['nom_entreprise']; ?> ></input></td>
        <td><input  type="submit" class="btn btn-primary" value="Postuler"></input></a></td>
        <?php if($i%3 == 0){
          //si $i%3 == 0 alors on affiche une autre cellule
          echo "<tr></tr>";}
          else{
            //Sinon on affiche une autre colonne
            echo "<tr></tr>";} ?>
      <?php  ?>
      <?php   }  ?>
        </form>
    </tr>
  </tbody>
</table>

  </body>
  <script> $('body').scrollspy({ target: '#navbar-example' }) </script>
</html>
