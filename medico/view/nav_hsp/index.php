

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/8a3192b16c.js" crossorigin="anonymous"></script>
</head>
<body>

    <div id="overlay"></div>

    <div class="pop-up-connection">

        <div class="close">
            <span>X</span>
        </div>

        <h2>Connexion</h2>

        <form action="../../traitement/traitement_formulaire_connexion.php" method="post" id="connexion">
            <input name="mail" type="email" placeholder="Saisir votre adresse e-mail">
            <input name="mdp" type="password" placeholder="Saisir votre mot de passe">
            <input type="submit" value="Se connecter">
        </form>

        <a href="../formulaire/formulaire_password_reset.php">Mot de passe oublié ?</a>
        <hr>

        <div class="new">
            <h4>Nouveau sur HSP Sulli9 ?</h4>
            <p id="p-c-inscription">S'inscrire</p>
        </div>

    </div>

    <div class="pop-up-inscription">

        <div class="close-inscription">
            <span>X</span>
        </div>

        <h2>Inscription</h2>

        <form action="../../traitement/traitement_formulaire_inscription.php" method="post" id="inscription">
            <input name="nom" type="text" placeholder="Entrez votre nom">
            <input name="prenom" type="text" placeholder="Entrez votre prénom">
            <input name="mail"type="email" placeholder="Entrez votre adresse e-mail">
            <input name="mutuelle" type="text" placeholder="Entrez votre numéro de mutuelle">
            <input name="adresse" type="text" placeholder="Entrez votre adresse">
            <input name="mdp" type="password" placeholder="Entrez un mot de passe">
            <input type="submit" value="S'inscrire">
        </form>

        <div class="not-new">
            <h4>Vous avez déjà un compte ?</h4>
            <p id="p-i-connexion">S'inscrire</p>
        </div>

    </div>
<?php include "../../include/header.php";?>
    <h2 id="title-of-explain-div">Pourquoi prendre rendez-vous avec HSP Sulli9 ?</h2>

    <div class="explain">

        <div class="first-div">

            <div class="images">
                <img src="first-img.png" alt="">
            </div>

            <p>Accédez aux disponibilités de <br> <strong> dizaines de milliers </strong> de <br> professionnels de santé.</p>

        </div>

        <div class="second-div">

            <div class="images">
                <img src="second-img.png" alt="">
            </div>

            <p>Prenez rendez vous en ligne, <br> <strong> 24h/24 et 7j/7 </strong> , pour une <br> consultation physique ou vidéo.</p>

        </div>

        <div class="third-div">

            <div class="images">
                <img src="third-img.png" alt="">
            </div>

            <p>Retrouvez votre <strong> historique de <br> rendez-vous </strong> et vos <strong> documents <br> médicaux. </strong></p>

        </div>

    </div>

    <div class="services">

        <h2 id="title-of-services-div">Nos services</h2>

        <div class="categories">

            <div class="categorie-one">
                <img src="health.png" alt="">
                <p id="explain-categories">Nos spécialistes de la nutrition <br> sont  la pour
                    déterminer vos troubles <br> alimentaires et vous proposez
                    des <br> programmes alimentaires parfaitement <br> adaptés à vos besoins </p>
            </div>

            <div class="categorie-two">
                <img src="eye-care.png" alt="">
                <p id="explain-categories">Nos ophtalmologues sont là <br> pour vous offrir les meilleurs soins <br> optiques, médicaux et
                    chirurgicaux
                </p>
            </div>

            <div class="categorie-three">
                <img src="psychiatrist.png" alt="">
                <p id="explain-categories">Nos psychiatres sont là <br> pour diagnostic,
                 prévention et <br> aux traitements des maladies mentales.</p>
            </div>

            <div class="categorie-four">
                <img src="dermatologist.png" alt="">
                <p id="explain-categories">Nos dermathologues s’intéresse <br> aux maladies de la peau, des muqueuses <br>
                     (de la bouche et des organes génitaux) <br> et des phanères (ongles, cheveux)</p>
            </div>

        </div>

    </div>

    <div class="small-container">

        <div class="visio">

            <p id="text-absolute">NOUVEAU !</p>

            <h4>Découvrez prochainement la consultation vidéo</h4>

            <p>Une consultation vidéo vous permet de consulter un professionnel
             de santé depuis <br> chez vous, via votre smartphone ou votre ordinateur.</p>



        </div>

    </div>

    <div class="footer">

        <div class="container">



        </div>

    </div>

    <script>

        const popUpConnex = document.querySelector(".pop-up-connection");
        const popUPInscri = document.querySelector(".pop-up-inscription");
        const closeConnex = document.querySelector(".close");
        const closeInscri = document.querySelector(".close-inscription");
        const connexButton = document.querySelector("#connection");
        const overlay = document.querySelector("#overlay");
        const inscriptionButton = document.querySelector("#p-c-inscription");
        const connexionButton = document.querySelector("#p-i-connexion");
        const menuToggle = document.querySelector(".menu-toggler");
        const smallScreenLinks = document.querySelector(".small-screen-links");

        connexButton.addEventListener("click", function(){
            popUpConnex.style.display = "block";
            overlay.style.display = "block";
            document.body.style.position = 'fixed';
        });

        inscriptionButton.addEventListener("click", function(){
            popUpConnex.style.display = "none";
            popUPInscri.style.display = "block";
        });

        closeConnex.addEventListener("click", function(){
            popUpConnex.style.display = "none";
            overlay.style.display = "none";
            document.body.style.position = '';
        });

        connexionButton.addEventListener("click", function(){
            popUPInscri.style.display = "none";
            popUpConnex.style.display = "block";
        });

        closeInscri.addEventListener("click", function(){
            popUPInscri.style.display = "none";
            overlay.style.display = "none";
            document.body.style.position = '';
        });

        menuToggle.addEventListener("click", function() {
                menuToggle.classList.toggle("active");
                smallScreenLinks.classList.toggle("active");
        });

    </script>

</body>
</html>
