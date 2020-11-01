<?php session_start();?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <div class="header">

        <div class="container">

            <div class="navbar">

                <div id="logo"><a href="">HSP Sulli9</a></div>

                <div id="links">
                    <ul>
                        <li style="color:white;"id="presentation">Bonjour : <?php echo $_SESSION['nom_medecin']  ?></li>
                        <li id="deconnection"><i class="fas fa-user"></i> <a href="../traitement/traitement_deconnexion.php">Déconnexion</a></li>
                    </ul>
                </div>

            </div>

        </div>

    </div>

  </body>
</html>
