
<?php
//Si la clé existe eet vaut "w40n6-6iop" alors ona ffiche une erreur
$error = NULL;
if(isset($_GET['key']) && $_GET['key'] == "w40n6-6iop") { //Wrong Password
    $error = "L'insertion est fausse !";
}
if(isset($_GET['erreur_admin']) && $_GET['erreur_admin'] == "W4e4NjZz58p") { //Wrong Delete
    $error = "Erreur de suppression !";
}

if(isset($_GET['erreur_admin']) && $_GET['erreur_admin'] == "006OoLj6eeR") { //Wrong Delete
    $error = "Erreur de suppression !";
}

if(isset($_GET['erreur_user']) && $_GET['erreur_user'] == "290uREkd6uG") { //Wrong Delete
    $error = "Erreur de suppression !";
}

if(isset($_GET['erreur_medecin']) && $_GET['erreur_medecin'] == "9WwA0dhw66A") { //Wrong Delete
    $error = "Erreur de suppression !";
}
$ajoute_admin = NULL;
if(isset($_GET['key']) && $_GET['key'] == "6k75viX9TOg") { //Wrong Delete
    $ajoute_admin = "Administrateur bien ajouté !";
}
$ajoute = NULL;
if(isset($_GET['key']) && $_GET['key'] == "8m4MDO9sy0e") { //Wrong Delete
    $ajoute = "Médecin bien ajouté !";
}

$suppression_medecin = NULL;
if(isset($_GET['key']) && $_GET['key'] == "Y4fIOu8g92f") { //Wrong Delete
    $suppression_medecin = "Médecin bien supprimé !";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>MonHôpital - Accueil</title>

    <!-- CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="../design/index_style.css">
    <!-- JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!-- GOOGLE FONT -->
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">

    <!-- FONT AWESOME -->
    <script src="https://kit.fontawesome.com/8a3192b16c.js" crossorigin="anonymous"></script>

</head>
<!-- On affiche dans une section les fonctionnalité de l'admin-->
    <section>

      <div class="container-fluid">

        <div
          class="row bg-light justify-content-center align-items-center"
          style="height: 100vh">

            <div class="card" style="width: 18rem;">
            <div class="card-header" style="background-color: #0596de;">
              <h4 class=" text-capitalize text-white">Interface Admin</h4>
              <h5 class="text-white"><?php echo $error; ?></h5>
              <h5 class="text-white"><?php echo $ajoute; ?></h5>
              <h5 class="text-white"><?php echo $ajoute_admin; ?></h5>
              <h5 class="text-white"><?php echo $suppression_medecin; ?></h5>
            </div>
            <!-- On affiche le menu de l'admin-->
            <ul class="list-group list-group-flush ">
              <li class="list-group-item"><a style="color: #0596de;" href="../formulaire/formulaire_medecin.php">Ajouter Médecin</a></li>
              <li class="list-group-item"><a  style="color: #0596de;" href="../formulaire/formulaire_admin.php">Ajouter Administrateur</a></li>


              <li class="list-group-item"><a  style="color: #0596de;" href="../../traitement/traitement_vue_donnee_rdv.php">Voir données Rendez-vous</a></li>
              <li class="list-group-item"><a  style="color: #0596de;" href="../../traitement/traitement_vue_donnee_medecin.php">Voir données Médecin</a></li>

              <li class="list-group-item"><a  style="color: #0596de;" href="../../traitement/traitement_exportation_user.php">Exportation User</a></li>
              <li class="list-group-item"><a  style="color: #0596de;" href="../../traitement/traitement_exportation_rdv.php">Exportation Rendez-vous</a></li>
              <li class="list-group-item">  <a  style="color: #0596de;" href="../../traitement/traitement_exportation_medecin.php">Exportation Médecin</a></li>
            </ul>
            <div class="mt-2 mb-2 text-center aligns-items-center">
              <a href="../../FORM/deconnexion_form.php" class="btn btn-danger">Déconnexion</a>
            </div>
          </div>

        </div>
      </div>
    </section>


  </body>
</html>
