<?php
session_start();
$new_path = [];
$path = ["about.php","blog.php","contact_process.php","contact.php","dep.php","doctor.php","elements.php","index.php","services.php","single-blog.php"];
if($_SERVER['REQUEST_URI'] == "/HSP_Site_Web/medico/view/formulaire/formulaire_connexion.php" || "/HSP_Site_Web/medico/view/formulaire/formulaire_modification.php" || "/HSP_Site_Web/medico/view/formulaire/formulaire_inscription.php"){
  for ($i=0; $i < sizeof($path) ; $i++) {
      $path[$i] = "../".$path[$i]." ";
      array_push($new_path,$path[$i]);
  }
}
else {
  $new_path = $path;
}
?>
<header class="main_menu home_menu">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="navbar-brand" href="index.php"> <img src="../img/logo.png" alt="logo"> </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse main-menu-item justify-content-center"
                        id="navbarSupportedContent">
                        <ul class="navbar-nav align-items-center">
                            <li class="nav-item active">
                                <a class="nav-link" href="<?php echo $new_path[7]; ?>">Accueil</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo $new_path[0]; ?>">Autres</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo $new_path[5]; ?>">Doctolib</a>
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="<?php echo $new_path[1]; ?>" id="navbarDropdown"
                                    role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Pages
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">

                                    <a class="dropdown-item" href="<?php echo $new_path[8]; ?>" >Services</a>
                                    <a class="dropdown-item" href="<?php echo $new_path[4]; ?>">depertments</a>
                                    <a class="dropdown-item" href="elements.php">Elements</a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="<?php echo $new_path[1]; ?>" id="navbarDropdown_1"
                                    role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    blog
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown_1">
                                    <a class="dropdown-item" href="blog.php">blog</a>
                                    <a class="dropdown-item" href="<?php echo $new_path[9]; ?>">Single blog</a>
                                </div>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="../view/formulaire/formulaire_contact.php">Contact</a>
                            </li>
                        </ul>
                    </div>

                    <?php
                    if(isset($_SESSION["mail"])){    ?>
                        <a class="btn_2 d-none d-lg-block" href="formulaire/formulaire_modification.php">Update Client</a>
                        <a class="btn_2 d-none d-lg-block" href="../traitement/traitement_deconnexion.php">Déconnexion</a>
                    <?php  } else {?>

                        <a class="btn_2 d-none d-lg-block" href="../view/formulaire/formulaire_connexion.php">Espace Client</a>
                    <?php } ?>


                </nav>
            </div>
        </div>
    </div>
</header>
