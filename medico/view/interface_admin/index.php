
<?php

if(isset($_GET['key']) && $_GET['key'] == "w40n6-6iop") { //Wrong Password
    $error = "L'insertion est fausse !";
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="admin_style.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">

  </head>
  <body style="background-color:#fff;">
    <div class="middle">
      <div class="menu">
        <li class="item" id='profile'>
          <a href="#profile" class="btn"><i class="fa fa-eye"></i>View</a>
          <div class="smenu">
            <a href="../../traitement/traitement_vue_donnee_medecin.php">Voir données médecin</a>
            <a href="../../traitement/traitement_vue_donnee_rdv.php">Voir données RDV</a>
          </div>
        </li>

        <li class="item" id="messages">
          <a href="#messages" class="btn"><i class="fa fa-download"></i></i>Exportation</a>
          <div class="smenu">
            <a href="../../traitement/traitement_exportation_medecin.php">Exportation Médecin</a>
            <a href="../../traitement/traitement_exportation_user.php">Exportation User</a>
            <a href="../../traitement/traitement_exportation_rdv.php">Exportation Rdv</a>
          </div>
        </li>

        <li class="item" id="settings">
          <a href="#settings" class="btn"><i class="fa fa-user-plus"></i>Ajouter</a>
          <div class="smenu">
            <a href="../formulaire/formulaire_medecin.php">Ajouter Médecin</a>
            <a href="../formulaire/formulaire_admin.php">Ajouter Administrateur</a>
          </div>
        </li>

        <li class="item">
            <a class="btn" href="../../FORM/deconnexion_form.php"><i class="fas fa-sign-out-alt"></i>Déconnexion</a>
        </li>
      </div>
    </div>
  </body>
</html>
