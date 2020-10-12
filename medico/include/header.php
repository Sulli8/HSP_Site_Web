<?php session_start(); ?>
    <div class="header">

        <div class="container">
<?php if(empty($_SESSION)){ ?>
            <div class="navbar">

                <div id="logo"><a href="index.php">HSP Sulli9</a></div>
                <div id="links">
                    <ul>
                        <li id="button-pro"><a href="">Vous êtes professionnel de santé ?</a></li>
                        <li id="our-services"><i class="fas fa-list-ul"></i> <a href="#title-of-services-div">Nos services</a></li>
                        <li id="connection"><i class="fas fa-user"></i> Se connecter <br> </li>

                    </ul>
                </div>

            <?php } else{ ?>

              <div class="navbar">

                  <div id="logo"><a href="index.php">HSP Sulli9</a></div>
                  <div id="links">
                      <ul>
                          <li id="button-pro"><a href="">Vous êtes professionnel de santé ?</a></li>
                          <li id="our-services"><i class="fas fa-list-ul"></i> <a href="#title-of-services-div">Nos services</a></li>
                          <li id="deconnection"><i class="fas fa-user"></i><a href="../../traitement/traitement_deconnexion.php"> Se Déconnecter </a></li>
                          <li>
                             <a href="../prise_rdv.php">Prendre rdv</a>
                          </li>
<li>
   <a href="../../traitement/traitement_affiche_rdv.php">Gérer mes RDV</a>
</li>
                      </ul>
                  </div>
            <?php } ?>

                <button class="menu-toggler">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>

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
                                $manager->prise_rdv();
                            }else{
                              echo "WARNING! You must be logged in";
                            }
                          ?>


                        </select>
                        <input type="submit" value="Rechercher">
                    </form>
                </div>

                <div class="column-two">
                    <img src="nav-bg.png" alt="">
                </div>

             </div>

        </div>

    </div>
  </div>
