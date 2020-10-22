<?php session_start();
require_once($_SERVER['DOCUMENT_ROOT']."/HSP_Site_Web/medico/manager/manager.php");
$manager = new Manager;?>
    <div class="header">

        <div class="container">
<?php if(empty($_SESSION)){ ?>
            <div class="navbar">

                <div id="logo"><a href="../view/index.php">HSP Sulli9</a></div>
                <div id="links">
                    <ul>
                        <li id="our-services"><i class="fas fa-list-ul"></i> <a href="#title-of-services-div">Nos services</a></li>
                        <li id="connection"><i class="fas fa-user"></i> Se connecter <br> </li>
                    </ul>
                </div>

            <?php } else{ ?>

              <div class="navbar">

                  <div id="logo"><a href="../view/index.php">HSP Sulli9</a></div>
                  <div id="links">
                      <ul>
                          <li id="our-services"><i class="fas fa-list-ul"></i> <a href="#title-of-services-div">Nos services</a></li>
                          <li id="deconnection"><i class="fas fa-user"></i><a href="../traitement/traitement_deconnexion.php"> Se Déconnecter </a></li>
                          <li>
                             <a href="../view/prise_rdv.php">Prendre rdv</a>
                          </li>
<li>
   <a href="../traitement/traitement_affiche_rdv.php">Gérer mes RDV</a>
</li>
                      </ul>
                  </div>
            <?php } ?>
             </div>

             <div class="search-section">

                <div class="column-one">
                    <h2>Réservez une consultation <br> chez un professionnel de santé</h2>

                    <form action="../../traitement/traitement_recherche_medecin.php" method="post">
                        <input type="search"name="recherche" placeholder="Chercher un medecin" id="search">
                        <input type="submit" value="Rechercher">
                    </form>
                    <form action="../traitement/traitement_recherche_specialite.php" method="post">
                        <select name="specialite" id="">
                            <option value="">Chercher une spécialité</option>
                            <?php require_once($_SERVER['DOCUMENT_ROOT']."/HSP_Site_Web/medico/manager/manager.php");
                            $manager = new Manager();

                            if(isset($_SESSION['mail'])){
                                $manager->specialite_medecin();
                            }else{
                              echo '<option>WARNING! You must be logged in</option>';
                            }
                          ?>


                        </select>
                        <input type="submit" value="Rechercher">
                    </form>
                </div>

                <div class="column-two">
                    <img src="../img/nav-bg.png" alt="">
                </div>

             </div>

        </div>

    </div>
  </div>
