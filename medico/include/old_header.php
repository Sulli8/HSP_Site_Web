<?php
session_start();
require_once($_SERVER['DOCUMENT_ROOT']."/HSP_Site_Web/medico/manager/manager.php");
$manager = new Manager;
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
  <link rel="stylesheet" type="text/css" href="../css/navbar.css">
<nav class="container2">

                    <a class="cool-link" href="<?php echo $new_path[0]; ?>">

<?php if(isset($_SESSION['admin'])) {?>
  <p>Service Admin</p>
<?php }else{ ?>
  <p>Service Client</p>
<?php } ?>
                    <p class="titre">  HSP Site Web </p>

                            <li>
                                <a class="cool-link" href="<?php echo $new_path[0]; ?>">Accueil</a>
                            </li>
                            <li>
                                <a class="cool-link" href="<?php echo $new_path[1]; ?>">Nos services</a>
                            </li>


                            <li>
                                <a class="cool-link" href="../view/formulaire/formulaire_contact.php">Contact</a>
                            </li>
                        </ul>
                    </div>
<?php if(isset($_SESSION['admin'])){ ?>
  <li><a class="cool-link" href="formulaire/formulaire_medecin.php">Ajouter médecin</a></li>
  <li>  <a class="cool-link" href="formulaire/formulaire_admin.php">Ajouter Admin</a></li>
<?php }  ?>
                    <?php
                    if(isset($_SESSION["mail"])){    ?>
                      <li> <a class="cool-link" href="formulaire/formulaire_modification.php">Update Client</a></li>
                      <li>  <a class="cool-link" href="../traitement/traitement_deconnexion.php">Déconnexion</a></li>
                        <form class="form-inline" action="../traitement/traitement_recherche_medecin.php" method="POST">
          <input class="btn btn-outline-success my-2 my-sm-0"  name="recherche" type="search" placeholder="Search" aria-label="Search"/>
          <input class="btn btn-outline-info my-2 my-sm-0" value="Search" type="submit"></input>
        </form>
                    <?php  } else {?>

                        <li><a  href="../view/formulaire/formulaire_connexion.php">Espace Client</a></li>




                    <?php } ?>

<div class="slider"> </div>

            </div>
        </div>
    </div>
</nav>
