
<?php

if(isset($_GET['key']) && $_GET['key'] == "w40n6-6iop") { //Wrong Password
    $error = "L'insertion est fausse !";
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





    <section>

      <div class="container-fluid">

        <div
          class="row bg-light justify-content-center align-items-center"
          style="height: 100vh">

            <div class="card" style="width: 18rem;">
            <div class="card-header" style="background-color: #0596de;">
              <h4 class=" text-capitalize text-white">Interface Admin</h4>
            </div>
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
