<?php
session_start();
$new_path = [];
$path = ["view/index.php","view/services.php"];
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
                    <a class="navbar-brand" href="<?php echo $new_path[0]; ?>"> HSP Site Web </a>
                    

                    <div class="collapse navbar-collapse main-menu-item justify-content-center"
                        id="navbarSupportedContent">
                        <ul class="navbar-nav align-items-center">
                            <li class="nav-item active">
                                <a class="nav-link" href="<?php echo $new_path[0]; ?>">Accueil</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="<?php echo $new_path[1]; ?>">Nos services</a>
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
                        <form class="form-inline" action="../traitement/traitement_recherche_medecin.php" method="POST">
          <input class="form-control mr-sm-2" name="recherche" "type="search" placeholder="Search" aria-label="Search"/>
          <input class="btn btn-outline-info my-2 my-sm-0" value="Search" type="submit"></input>
        </form>
                    <?php  } else {?>

                        <a class="btn_2 d-none d-lg-block" href="../view/formulaire/formulaire_connexion.php">Espace Client</a>
                    <?php } ?>


                </nav>
            </div>
        </div>
    </div>
</header>
