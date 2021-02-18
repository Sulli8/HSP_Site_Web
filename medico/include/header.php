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
                <!-- Si l'email existe alors...-->
                <?php if(isset($_SESSION['email'])) {
                    echo '
                    <li class="nav-item">
                    <a href="" class="nav-link" data-toggle="modal" data-target="#exampleModalPr">Prendre rendez-vous</a>
                    </li>
                    <li class="nav-item">
                    <a  class="nav-link" data-toggle="modal" data-target=".bd-example-modal-lg">Offre emploies</a>
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
                  <a class="nav-link" data-toggle="modal" data-target="#exampleModalC">Contact</a>
                </li>
                  <!-- Si l'email existe alors...-->
                <?php if(isset($_SESSION['email'])) {
                    echo '
                    <li class="nav-item">
                    <a href="medico/FORM/deconnexion_form.php" class="nav-link btn btn-danger text-white rounded">Déconnexion</a>
                    </li>';
                }else {
                  //Sinon on affiche...
                    echo '
                    <li class="nav-item">
                    <a href="" class="nav-link btn btn-warning text-white rounded" data-toggle="modal" data-target="#exampleModalo">Connexion</a>
                    </li>';
                } ?>
            </ul>
        </div>
    </div>
</nav>
