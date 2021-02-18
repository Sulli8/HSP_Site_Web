<!DOCTYPE html>

<?php
//On démarre une session
session_start();
    $error = NULL;
    //Get URL Key
    if(isset($_GET['key']) && $_GET['key'] == "w40n6-6a55") { //Wrong Password
        $error = "Vos mots de passes ne correspondent pas !";
    }
    if(isset($_GET['key']) && $_GET['key'] == "w40n6-ma11") { //Mail exist
        $error = "L'adresse e-mail renseignée existe déjà !!";
    }
    if(isset($_GET['key']) && $_GET['key'] == "9m6ty") { //Var empty
        $error = "Merci de remplir tous les champs du formulaire d'inscription !!!";
    }
    if(isset($_GET['key']) && $_GET['key'] == "auth3nt1") { //Inscription is good
        $error = "Merci de vous être inscrit ! Un mail vous a été envoyé afin de confirmer votre compte !!";
    }
    if(isset($_GET['key']) && $_GET['key'] == "acc-4341") { //Authentificate account
        $error = "Félicitation ! Votre compte a été authentifié, vous pouvez désormais vous connecter !!";
    }
    if(isset($_GET['key']) && $_GET['key'] == "a143ady") { //This account is invalid or already verified
        $error = "Ce compte est invalide ou déjà authentifié";
    }
    if(isset($_GET['key']) && $_GET['key'] == "z2I6N7D2wzj") { //This account is invalid or already verified
        $error = "Erreur lors de la candidature !";
    }

    // ------------------------ ------------------------ //

    $wrong = NULL;
    if(isset($_GET['key']) && $_GET['key'] == "1nva11d-c43d3nt1a15") { //Invalid credentials
        $wrong = "E-mail ou Mot de Passe incorrect";
    }
    if(isset($_GET['key']) && $_GET['key'] == "n0t-v341f") { //This account has not yet been verified
        $wrong = "Votre compte n'est pas vérifié !";
    }

    // ------------------------ ------------------------ //

    $password_reset = NULL;
    if(isset($_GET['key']) && $_GET['key'] == "r3g3n3r3d") { //Password regenered !
        $wrong = "Votre nouveau mot de passe vous a été envoyé par mail";
    }
    if(isset($_GET['key']) && $_GET['key'] == "n0-r3g3n3r3ed") { //Invalid e-mail
        $wrong = "Adresse e-mail invalide";
    }

    // ------------------------ ------------------------ //

    $cancel_rdv = NULL;
    if(isset($_GET['key']) && $_GET['key'] == "4dv-5a2c3l") { //RDV canceled
        $cancel_rdv = "Votre rendez-vous a bien été annulé !";
    }
    if(isset($_GET['key']) && $_GET['key'] == "4dv-n0-5a2c3l") { //Error with RDV canceled
        $cancel_rdv = "Une erreur s'est produite lors de la suppression de votre rendez-vous !!";
    }
    if(isset($_GET['key']) && $_GET['key'] == "4dv-n0-3x15t") { //Error canceled, RDV id not exist
        $cancel_rdv = "Une erreur s'est produite lors de la suppression de votre rendez-vous !!";
    }

    // ------------------------ ------------------------ //
    $error_rdv = NULL;
    if(isset($_GET['key']) && $_GET['key'] == "n0-ch0053") { //No choice on RDV
        $error_rdv = "Merci de selectionner un médecin !";
    }
    if(isset($_GET['key']) && $_GET['key'] == "y0u-v3-y0u4-4DV") { //You've your RDV
        $error_rdv = "Nouveau rendez-vous pris avec succès !";
    }
    $candidature = NULL;
    if(isset($_GET['key']) && $_GET['key'] == "2R9Vrz8x/?") //Choice candidature
    {
        $candidature = "Merci d'avoir postuler !";
    }

    $suppression = NULL;
    if(isset($_GET['erreur_suppresison']) && $_GET['erreur_suppression'] == "fY7qP4mK7") //Choice candidature
    {
        $suppression= "Erreur de suppresion !";
    }
?>
          <link rel="icon" type="image/png" sizes="16x16" href="medico/img/logo_hsp.png">
<html lang="fr">
<!-- Modal Lost Password -->
    <?php include "medico/Modal/lost_password.php"; ?>
  <?php include "medico/include/head.php"; ?>
  <?php include "medico/include/header.php"; ?>
    <!-- On affiche la page d'acceuil-->
    <?php include "medico/include/page.php"; ?>
	 <!-- Modal Contact -->
    <?php include "medico/Modal/contact.php"; ?>

	<!-- Modal Inscription -->
    <?php include "medico/Modal/modal_inscription.php"; ?>
    <!-- Modal Connexion -->
    <?php include "medico/Modal/connexion.php"; ?>
    <!-- Modal Emploies -->
    <!-- Button trigger modal -->
    <?php include "medico/Modal/emploies.php"; ?>
	<?php include "medico/include/footer.php"; ?>
<body>

  <div class="text-center">
        <strong><?php echo $error; //On affiche une erreur si la clé existe ?></strong>
        <strong><?php echo $wrong;//On affiche une erreur si la clé existe ?></strong>
        <strong><?php echo $password_reset; //On affiche une erreur si la clé existe ?></strong>
        <strong><?php echo $cancel_rdv;//On affiche une erreur si la clé existe  ?></strong>
        <strong><?php echo $error_rdv; //On affiche une erreur si la clé existe ?></strong>
        <strong><?php echo $candidature; //On affiche une erreur si la clé existe ?></strong>
        <strong><?php echo $suppression; //On affiche une erreur si la clé existe ?></strong>
    </div>




    <!-- Modal Prendre rendez-vous -->
    <?php include "medico/Modal/prise_rdv.php" ?>
    <!-- Modal Gérer mes rendez-vous -->
    <?php include "medico/Modal/gerer_rdv.php"; ?>
    <!-- Modal Paramètres -->
    <?php include "medico/Modal/parametre.php"; ?>

</body>
</html>
