<!DOCTYPE html>
<?php

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


?>
<html lang="fr">
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
<body>

    <nav class="navbar navbar-expand-md navbar-light bg-light sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">MonHôpital</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Accueil</a>
                    </li>
                    <?php if(isset($_SESSION['email'])) {
                        echo '
                        <li class="nav-item">
                        <a href="" class="nav-link" data-toggle="modal" data-target="#exampleModalPr">Prende rendez-vous</a>
                        </li>
                        <li class="nav-item">
                        <a href="" class="nav-link" data-toggle="modal" data-target="#exampleModalGr">Gérer mes rendez-vous</a>
                        </li>
                        <li class="nav-item">
                        <a href="" class="nav-link" data-toggle="modal" data-target="#exampleModalPARA">Mon compte</a>
                        </li>
                        ';
                    } ?>
                    <li class="nav-item">
                        <a href="#our-services-id" class="nav-link">Nos Services</a>
                    </li>
                    <li class="nav-item">
                        <a href="" class="nav-link" data-toggle="modal" data-target="#exampleModalC">Contact</a>
                    </li>
                    <?php if(isset($_SESSION['email'])) {
                        echo '
                        <li class="nav-item">
                        <a href="../FORM/deconnexion_form.php" class="nav-link btn btn-danger text-white rounded">Déconnexion</a>
                        </li>';
                    }else {
                        echo '
                        <li class="nav-item">
                        <a href="" class="nav-link btn btn-warning text-white rounded" data-toggle="modal" data-target="#exampleModal">Connexion</a>
                        </li>';
                    } ?>
                </ul>
            </div>
        </div>
    </nav>

    <div class="text-center">
        <strong><?php echo $error;?></strong>
        <strong><?php echo $wrong;?></strong>
        <strong><?php echo $password_reset; ?></strong>
        <strong><?php echo $cancel_rdv; ?></strong>
        <strong><?php echo $error_rdv; ?></strong>
    </div>

    <div class="under-navbar-area">
        <div class="d-flex flex-wrap">
            <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6">
                <h1 id="title-under-navbar-area">Réservez une consultation <br> chez un professionnel de santé</h1>
                <div class="first-searchbar d-flex">
                    <form class="shadow" action="">
                        <input type="text" placeholder="Chercher un médecin" disabled>
                        <button type="submit" disabled>
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-search" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z"/>
                                <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"/>
                            </svg>
                        </button>
                    </form>
                </div>
                <div class="second-searchbar d-flex">
                    <form class="shadow" action="">
                        <select name="" id="" disabled>
                            <option value="">Chercher une spécialité</option>
                            <option value="">Nutritionniste</option>
                            <option value="">Ophtalmologues</option>
                            <option value="">Psychiatres</option>
                            <option value="">Dermathologues</option>
                        </select>
                        <button type="submit" disabled>
                            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-search" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M10.442 10.442a1 1 0 0 1 1.415 0l3.85 3.85a1 1 0 0 1-1.414 1.415l-3.85-3.85a1 1 0 0 1 0-1.415z"/>
                                <path fill-rule="evenodd" d="M6.5 12a5.5 5.5 0 1 0 0-11 5.5 5.5 0 0 0 0 11zM13 6.5a6.5 6.5 0 1 1-13 0 6.5 6.5 0 0 1 13 0z"/>
                            </svg>
                        </button>
                    </form>
                </div>
            </div>
            <div class="col-sm-0 col-md-0 col-lg-6 col-xl-6 text-right under-navbar-img">
                <img class="images-under-navbar" src="../img/under-navbar-area-images.png" alt="" width="100%">
            </div>
        </div>
    </div>

    <div class="explain-area">
        <h1 id="title-explain-area" class="text-center">Pourquoi prendre rendez-vous avec MonHôpital ?</h1>
        <div class="d-flex flex-wrap text-center justify-content-around">
            <div class="first-images">
                <img src="../img/first-img.png" alt="">
                <p>Accédez aux disponibilités de <br>
                   <strong>dizaines de milliers</strong> de <br>
                    professionnels de santé.</p>
            </div>
            <div class="second-images">
                <img src="../img/second-img.png" alt="">
                <p>Prenez rendez vous en ligne,<br>
                    <strong>24h/24 et 7j/7</strong>, pour une <br>
                    consultation physique ou vidéo.</p>
            </div>
            <div class="third-images">
                <img src="../img/third-img.png" alt="">
                <p>Retrouvez votre <strong>historique de <br>
                    rendez-vous </strong> et vos <strong>documents <br>
                    médicaux</strong>.</p>
            </div>
        </div>
    </div>

    <hr>

    <div class="our-services" id="our-services-id">
        <h1 id="title-of-our-services" class="text-center">Nos Services</h1>
        <div class="d-flex flex-wrap justify-content-around">
            <div class="first-services">
                <div class="card-container">
                    <div class="card-conio card-img-top text-center shadow card-front">
                        <img src="../img/health.png" class="card-img-top" alt="...">
                        <div class="card-body">
                          <h5 class="card-title">Voir plus</h5>
                        </div>
                    </div>
                    <div class="card-conio card-img-top text-center shadow card-back">
                        <div class="card-body">
                          <p>Nos spécialistes de la nutrition
                            sont la pour déterminer vos troubles
                            alimentaires et vous proposez des
                            programmes alimentaires parfaitement
                            adaptés à vos besoins</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="second-services">
                <div class="card-container">
                    <div class="card-conio card-img-top text-center shadow card-front">
                        <img src="../img/eye-care.png" class="card-img-top" alt="...">
                        <div class="card-body">
                          <h5 class="card-title">Voir plus</h5>
                        </div>
                    </div>
                    <div class="card-conio card-img-top text-center shadow card-back">
                        <div class="card-body">
                          <p>Nos ophtalmologues sont là
                            pour vous offrir les meilleurs soins
                            optiques, médicaux et chirurgicaux</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="third-services">
                <div class="card-container">
                    <div class="card-conio card-img-top text-center shadow card-front">
                        <img src="../img/psychiatrist.png" class="card-img-top" alt="...">
                        <div class="card-body">
                          <h5 class="card-title">Voir plus</h5>
                        </div>
                    </div>
                    <div class="card-conio card-img-top text-center shadow card-back">
                        <div class="card-body">
                          <p>Nos psychiatres sont là
                            pour diagnostic, prévention et
                            aux traitements des maladies mentales</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="fourth-services">
                <div class="card-container">
                    <div class="card-conio card-img-top text-center shadow card-front">
                        <img src="../img/dermatologist.png" class="card-img-top" alt="...">
                        <div class="card-body">
                          <h5 class="card-title">Voir plus</h5>
                        </div>
                    </div>
                    <div class="card-conio card-img-top text-center shadow card-back">
                        <div class="card-body">
                          <p>Nos dermathologues s’intéresse
                            aux maladies de la peau, des muqueuses
                            (de la bouche et des organes génitaux)
                            et des phanères (ongles, cheveux)</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <hr>

    <div class="my-container">
        <div class="visio">
            <span class="badge badge-warning my-absolute-element">NOUVEAU !</span>
            <h4 class="text-right mr-4 text-white">Découvrez prochainement la consultation vidéo</h4>
            <p class="text-right mr-4">Une consultation vidéo vous permet de consulter un professionnel de santé depuis <br>
                chez vous, via votre smartphone ou votre ordinateur.</p>
        </div>
    </div>

    <footer>
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-6 col-xs-12 segment-one">
                        <h3>MonHôpital</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Architecto, dolore obcaecati?
                            Eius iusto vel impedit consequuntur, praesentium corporis. Impedit, neque.</p>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12 segment-two">
                        <h2>MonHôpital</h2>
                        <ul>
                            <li><a href="">Event</a></li>
                            <li><a href="">Support</a></li>
                            <li><a href="">Hosting</a></li>
                            <li><a href="">Career</a></li>
                            <li><a href="">Blog</a></li>
                        </ul>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12 segment-three">
                        <h2>Follow Us</h2>
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Minus aliquid rerum impedit
                            laudantium hic porro sit ipsa magnam labore ex!</p>
                        <a href="https://www.instagram.com/guizmolabanquise/?hl=fr" target="_blank"><i class="fa fa-instagram"></i></a>
                        <a href="https://twitter.com/GuizLaBanquise?ref_src=twsrc%5Egoogle%7Ctwcamp%5Eserp%7Ctwgr%5Eauthor" target="_blank"><i class="fa fa-twitter"></i></a>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12 segment-four">
                        <h2>Our Newletter</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ad, neque nostrum suscipit reiciendis veritatis voluptatem!</p>
                        <form action="">
                            <input type="email">
                            <input type="submit" value="Subscribe">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <p class="footer-bottom-text">All Right reserved by &copy;MonHôpital</p>
    </footer>

  <!-- Modal Connexion -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Connexion</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body text-center">
            <form action="../FORM/connexion_form.php" method="POST">
                <p>Adresse e-mail</p>
                <input type="email" name="email" required>
                <p>Mot de passe</p>
                <input type="password" name="pass" required> <br>
                <div class="text-left">
                    <a class="mdp-co-button" href="" data-dismiss="modal" aria-label="Close" data-toggle="modal" data-target="#exampleModalM">Mot de passe oublié </a> <br>
                    <a class="acc-co-button" href="" data-dismiss="modal" aria-label="Close" data-toggle="modal" data-target="#exampleModalI">Je n'ai pas de compte - Créer un compte</a>
                </div>
                <div class="d-flex justify-content-between modal-co-button">
                    <button type="button" class="btn btn-custom close-co-button" data-dismiss="modal">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-x" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                          </svg>Fermer</button>
                    <button type="submit" class="btn btn-custom co-co-button">Connexion</button>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal Inscription -->
  <div class="modal fade" id="exampleModalI" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Inscription</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body text-center">
            <form action="../FORM/inscription_form.php" method="POST">
                <p>Nom</p>
                <input type="text" name="nom" required>
                <p>Prénom</p>
                <input type="text" name="prenom" required>
                <p>Adresse</p>
                <input type="text" name="addr" required>
                <p>Ville</p>
                <input type="text" name="ville" required>
                <p>Adresse e-mail</p>
                <input type="email" name="email" required>
                <p>Mot de passe</p>
                <input type="password" name="pass" required>
                <p>Confirmer mon Mot de passe</p>
                <input type="password" name="pass2" required>
                <p>Ma Mutuelle</p>
                <input type="text" name="mutuelle" required> <br>
                <div class="text-left">
                    <a class="acc-co-button" href="" data-dismiss="modal" aria-label="Close" data-toggle="modal" data-target="#exampleModal">J'ai déjà un compte - Me connecter</a>
                </div>
                <div class="d-flex justify-content-between modal-co-button">
                    <button type="button" class="btn btn-custom close-co-button" data-dismiss="modal">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-x" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                          </svg>Fermer</button>
                    <button type="submit" class="btn btn-custom co-co-button">Créer mon compte</button>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal Lost Password -->
  <div class="modal fade" id="exampleModalM" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Mot de passe oublié</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body text-center">
            <form action="../FORM/password_form.php" method="POST">
                <p>Indiquer l'adresse e-mail de votre compte</p>
                <input type="email" name="email" required>
                <small>Votre nouveau mot de passe vous sera envoyé par e-mail, vous pourrez le changer dans vos paramètres par la suite.</small>
                <div class="d-flex justify-content-between modal-co-button">
                    <button type="button" class="btn btn-custom close-co-button" data-dismiss="modal">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-x" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                          </svg>Fermer</button>
                    <button type="submit" class="btn btn-custom co-co-button">Envoyer</button>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal Contact -->
  <div class="modal fade" id="exampleModalC" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Contact</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body text-center">
            <p>Nous sommes situé au :</p>
            <h5 class="">21 quai de l'Ourcq 93500 Pantin</h5>
            <hr>
            <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-telephone-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M2.267.98a1.636 1.636 0 0 1 2.448.152l1.681 2.162c.309.396.418.913.296 1.4l-.513 2.053a.636.636 0 0 0 .167.604L8.65 9.654a.636.636 0 0 0 .604.167l2.052-.513a1.636 1.636 0 0 1 1.401.296l2.162 1.681c.777.604.849 1.753.153 2.448l-.97.97c-.693.693-1.73.998-2.697.658a17.47 17.47 0 0 1-6.571-4.144A17.47 17.47 0 0 1 .639 4.646c-.34-.967-.035-2.004.658-2.698l.97-.969z"/>
            </svg> 06 52 00 99 87
        </div>
      </div>
    </div>
  </div>

  <!-- Modal Prendre rendez-vous -->
  <div class="modal fade" id="exampleModalPr" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Prendre rendez-vous</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body text-center">
                <?php
                //Connect DB
                require_once($_SERVER['DOCUMENT_ROOT']."/HSP_Site_Web/medico/manager/manager.php");
                $manager = new Manager();
                $mysqli = $manager->connexion_mysqli();

                //Query the database
                $resultMED = $mysqli->query("SELECT * FROM medecin");
                $Pr_id_medecin = array();
                $Pr_nom_medecin = array();
                $Pr_prenom_medecin = array();
                $Pr_specialite = array();
                $Pr_error = NULL;
                if($resultMED->num_rows != 0) {
                    while($row_Pr = $resultMED->fetch_assoc()) {
                        array_push($Pr_id_medecin, $row_Pr['id']);
                        array_push($Pr_nom_medecin, $row_Pr['nom']);
                        array_push($Pr_prenom_medecin, $row_Pr['prenom']);
                        array_push($Pr_specialite, $row_Pr['specialite']);
                    }
                }else {
                    $Pr_error = "Aucun médecin disponible pour le moment.";
                }
                ?>

            <form action="../FORM/prise_rendez_vous.php" method="POST">
                <input class="text-center" type="text" value="<?php echo $_SESSION['nom'].' '.$_SESSION['prenom'];?>" disabled>
                <p>Choisir votre médecin</p>
                <select name="name_medecin" id="">
                    <option value="0">Choisir votre médecin</option>
                    <?php
                    for ($i=0; $i < sizeof($Pr_nom_medecin); $i++) {
                        echo '
                        <option value="'.$Pr_id_medecin[$i].'">'.$Pr_nom_medecin[$i].' '.$Pr_prenom_medecin[$i].' ('.$Pr_specialite[$i].')</option>
                        ';
                    }
                    ?>
                    <?php echo $Pr_error; ?>
                </select> <br> <br>
                <p>Créneaux horraires</p>
                <select name="creneaux" id="">
                    <option value="09h00 - 10h00">09h00 - 10h00</option>
                    <option value="10h00 - 11h00">10h00 - 11h00</option>
                    <option value="11h00 - 12h00">11h00 - 12h00</option>
                    <option value="14h00 - 15h00">14h00 - 15h00</option>
                    <option value="15h00 - 16h00">15h00 - 16h00</option>
                </select>
                <div class="d-flex justify-content-between modal-co-button">
                    <button type="button" class="btn btn-custom close-co-button" data-dismiss="modal">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-x" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                          </svg>Fermer</button>
                    <button type="submit" class="btn btn-custom co-co-button">Envoyer</button>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal Gérer mes rendez-vous -->
  <div class="modal fade" id="exampleModalGr" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Gérer mes rendez-vous</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body text-center">
            <?php

                //Connect DB
                require_once($_SERVER['DOCUMENT_ROOT']."/HSP_Site_Web/medico/manager/manager.php");
                $manager = new Manager();
                $mysqli = $manager->connexion_mysqli();

                $id_user = $_SESSION['id'];

                //Query the database
                $resultRDV = $mysqli->query("SELECT * FROM rdv WHERE id_user = '$id_user'");
                $id_consultation = array();
                $nom_medecin = array();
                $date_rdv = array();
                $heure_rdv = array();

                if($resultRDV->num_rows != 0) {

                    while($row = $resultRDV->fetch_assoc()) {
                        array_push($id_consultation, $row['id']);
                        array_push($nom_medecin, $row['nom_medecin']);
                        array_push($date_rdv, $row['date_rdv']);
                        array_push($heure_rdv, $row['creneau_rdv']);
                    }
                    for ($i=0; $i < sizeof($nom_medecin); $i++) {
                        echo '
                        <table width="100%" border="1" cellspacing="1" cellpadding="5">
                            <tr>
                                <td>Nom du medecin</td>
                                <td>Date du rendez-vous</td>
                                <td>Créneaux horraire du rendez-vous</td>
                                <td>Annuler</td>
                            </tr>
                            <tr>
                                <td>'.$nom_medecin[$i].'</td>
                                <td>'.$date_rdv[$i].'</td>
                                <td>'.$heure_rdv[$i].'</td>
                                <td><a href="../FORM/annulation_form.php?key='.$id_consultation[$i].'">
                                    <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-x-circle-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/>
                                    </svg>
                                </a></td>
                            </tr>
                        </table>
                        ';
                    }
                }else {
                    echo "Vous n'avez aucun rendez-vous !!";
                }

            ?>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal Paramètres -->
  <div class="modal fade" id="exampleModalPARA" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Paramètre de mon compte</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body text-center">
            <small>Si vous souhaitez modifier vos informations personnelles, modifiez simplement les informations ici présente
            puis valider.</small>
            <form action="../FORM/modification_form.php" method="POST">
                <div class="d-flex">
                    <input class="mr-2" type="text" name="nom" value="<?php echo $_SESSION['nom'];?>" required>
                    <input type="text" name="prenom" value="<?php echo $_SESSION['prenom'];?>" required>
                </div>
                <div class="d-flex">
                    <input class="mr-2" type="text" name="adresse" value="<?php echo $_SESSION['addr'];?>" required>
                    <input type="text" name="ville" value="<?php echo $_SESSION['ville'];?>" required>
                </div>
                <div class="d-flex text-center">
                    <input type="text" name="mutuelle" value="<?php echo $_SESSION['mutuelle'];?>" required>
                </div>
                <button type="submit" class="btn btn-custom co-co-button">Modifier</button> <br>
                <small>Vous serez par la suite déconnecté.</small>
            </form>
        </div>
      </div>
    </div>
  </div>

</body>
</html>
