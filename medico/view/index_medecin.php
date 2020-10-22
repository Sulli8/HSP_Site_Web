<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interface Medecin</title>
    <link rel="stylesheet" href="../css/style_interface_medecin.css">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/8a3192b16c.js" crossorigin="anonymous"></script>
</head>
<body>

<?php
  require_once($_SERVER['DOCUMENT_ROOT']."/HSP_Site_Web/medico/manager/manager.php");
include "../include/header_medecin.php";
$manager = new Manager();

$db = $manager->connexion_bd();
$id_medecin = $_SESSION['id_medecin'];
$affiche_information_patient = "SELECT nom_patient,date,heure,id from rdv Where id_medecin='$id_medecin'";
$request_patient = $db->query($affiche_information_patient);
$information_patient= $request_patient->fetchall();
?>
    <div class="panel-section">

        <div class="container">

            <h1>Bienvenue sur votre page profil, ici vous pouvez</h1>

            <div class="managment-button">
                <a href="#new-app"><button id="add-appointments">
                    <img src="../img/add.png" alt="">
                    <p>Ajouter un rendez-vous</p>
                </button></a>
                <a href="#account-title"><button id="m-account">
                    <img src="../img/feather-pen.png" alt="">
                    <p>Modifier mon profil</p>
                </button></a>
                <a href="#my-appointments"><button id="see-appointments">
                    <img src="../img/eye-scan.png" alt="">
                    <p>Voir mes rendez-vous</p>
                </button></a>
            </div>

        </div>

    </div>

    <div class="container">

        <h1 id="my-appointments">Mes rendez-vous</h1>

        <div class="my-appointments">
            <div class="names">
              <table>
                <tr>
            <th>Nom du patient</th>
            <th>Jour</th>
            <th>créneaux horaires</th>
            <th>Numéro de votre rendez-vous</th>
            <th>Supprimer mon rendez-vous</th>
          </tr>
            <tr>
          <?php
          for ($i=0; $i < count($information_patient); $i++) {
            foreach (array_unique($information_patient[$i]) as $key => $value) {?>
          <td><?php echo $value;?></td>
          <?php if($key == 'id'){
          echo   "<td><a href='../traitement/traitement_delete_patient.php?delete=$value'><i class='fas fa-times-circle'></i> Annuler</a></td>";
          }?>
          <?php   }
        if($i%3==0){
            echo "<tr></tr>";
          }
        }
           ?>
           </tr>
          </table>

        </div>

    </div>
<?php


$affiche_information_medecin = "SELECT nom,prenom,specialite,mail,departement,mdp from medecin Where id='$id_medecin'";
$request_medecin = $db->query($affiche_information_medecin);
$information_medecin = $request_medecin->fetchall();
 ?>
    <div class="account-part">
        <div class="container">
            <h1 id="account-title">Mon profil</h1>
            <div class="profil">

                <div class="images">
<?php
$affiche_information_image = "SELECT image_profil from medecin Where id='$id_medecin'";
$request_image = $db->query($affiche_information_image);
$information_image = $request_image->fetchall();
for ($i=0; $i < count($information_image); $i++) {
  foreach (array_unique($information_image[$i]) as $key => $value) {?>



                    <img src="../img/images_profils/<?php echo $value;?>" alt="">
          <?php         }
                }
                 ?>
                </div>

                  <form name="formulaire" enctype="multipart/form-data" class="form" method="post" action="../traitement/traitement_modification.php">
                    <label for="file" class="label-file">Choisir une image</label>
                    <label class="custom-file-upload"><i class="fas fa-upload"></i>
                      <input type="file"  class="file" name="photo" id="photo" />
                      <input type="hidden" value="b" name="env"/>
                    </label>



                    <?php for ($i=0; $i < count($information_medecin); $i++) {?>

                      <?php foreach (array_unique($information_medecin[$i]) as $key => $value){?>

                              <input name="<?php echo $key; ?>" value="<?php echo $value;?>" type="text" id="input" placeholder="<?php echo ucfirst($key); ?> : <?php echo ucfirst($value);?>"></input>
                            <?php }?>

<?php } ?>

                    <input type="submit" value="Modifier mes informations" ></input>
                  </form>


            </div>
        </div>
    </div>
    <?php
    $affiche = "SELECT heure from horaire";
    $request = $db->query($affiche);
    $tableau = $request->fetchall();


    $affiche_patient = "SELECT nom from user";
    $request = $db->query($affiche_patient);
    $nom_patient = $request->fetchall();

    ?>


    <div class="container">
        <h1 id="new-app">Ajouter un rendez-vous</h1>
        <div class="new-app-section">
            <div class="new-appointments">
              <form action="../traitement/traitement_ajout_rdv.php" method="post">
                <select name="nom_patient" id="">
                    <option >Selectionnez un patient</option>

                <?php    for ($i=0; $i < count($nom_patient); $i++) {
                      foreach ($nom_patient[$i] as $key => $value) {?>
                       <option value="<?php echo $value ?>"><?php   echo $value;  ?></option>
              <?php         }
                    }?>


                </select>
                <input type="date" name="date">
                <select name="heure" id="">
                    <option >Selectionnez un créneaux horaire</option>

                <?php    for ($i=0; $i < count($tableau); $i++) {
                      foreach ($tableau[$i] as $key => $value) {?>
                       <option value="<?php echo $value ?>"><?php   echo $value;  ?></option>
              <?php         }
                    }?>


                </select>
                <input type="submit" value="Ajouter">
              </form>
            </div>
        </div>
    </div>

</body>
</html>
