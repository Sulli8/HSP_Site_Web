<!DOCTYPE html>
<html lang="en" dir="ltr">
<?php
//ON démarre une session
session_start();
include "../include/import.php";
?>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/8a3192b16c.js" crossorigin="anonymous"></script>

</head>
<body>
  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <?php
    require_once($_SERVER['DOCUMENT_ROOT']."/HSP_Site_Web/medico/manager/manager.php");
    //Connect database
    $manager = new Manager();
    $db = $manager->connexion_bd();
    $medecin = $_GET['nom_medecin'];
    $search = "SELECT creneau_1,creneau_2,creneau_3,creneau_4,creneau_5 from creneau";
    $request = $db->query($search);
    //On déclare les variable créneaux_1,2,3,4,5 afin de compter le nombre de créneaux qui ont été pris à la même date
    $creneau_1 = "SELECT count(date_rdv) from prise_rdv where creneau_1='1'";
    $creneau_2 = "SELECT count(date_rdv) from prise_rdv where creneau_2='1'";
    $creneau_3 = "SELECT count(date_rdv) from prise_rdv where creneau_3='1'";
    $creneau_4 = "SELECT count(date_rdv) from prise_rdv where creneau_4='1'";
    $creneau_5 = "SELECT count(date_rdv) from prise_rdv where creneau_5='1'";
    //On exécute les requêtes
    $prise_1 = $db->query($creneau_1);
    $prise_2 = $db->query($creneau_2);
    $prise_3 = $db->query($creneau_3);
    $prise_4= $db->query($creneau_4);
    $prise_5 = $db->query($creneau_5);
    //On déclare les tableau
    $tab_prise_1 = $prise_1->fetch();
    $tab_prise_2 = $prise_2->fetch();
    $tab_prise_3 = $prise_3->fetch();
    $tab_prise_4 = $prise_4->fetch();
    $tab_prise_5 = $prise_5->fetch();

    $horaire = [];
    //On ajout la valeur des tableau dans le tableau horaire
    array_push($horaire,$tab_prise_1[0]);
    array_push($horaire,$tab_prise_2[0]);
    array_push($horaire,$tab_prise_3[0]);
    array_push($horaire,$tab_prise_4[0]);
    array_push($horaire,$tab_prise_5[0]);
    $tab_creneau = $request->fetch();
            $new_tab = [];
            //On parcours le tableau $horaire afin d'afficher le horaire disponile
           foreach ($horaire as $key => $value) {
             //Si la vlauer du tableau est inférieur à 3alors on ajoute dans new tab la clé
            if($value < 3){
              array_push($new_tab,$key);
            }
          }
          ?>
<section id="cover" class="min-vh-100">
    <div id="cover-caption">
        <div class="container">
            <div class="row text-primary">
                <div class="col-xl-5 col-lg-6 col-md-8 col-sm-10 mx-auto text-center form p-4">
                    <h1 class=" ">Prenez rendez-vous</h1>
                    <div class="px-2">
                        <form action="../traitement/traitement_gestion_rdv.php" method="post" class="justify-content-center">
                          <div class="form-group">
                            <label for="exampleInputEmail1">Nom patient</label>
                            <input type="text" name="nom_patient"  class="form-control" id="exampleInputEmail1" value="<?php echo ucfirst($_SESSION['nom']); ?>" >

                            <label for="exampleInputEmail1">Mail patient</label>
                            <input type="text" name="mail_patient" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php  echo ucfirst($_SESSION['mail']); ?>">

                            <label for="exampleInputEmail1" >Docteur</label>
                            <input type="text" name="nom_medecin" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $medecin; ?>">


                            <label for="exampleInputEmail1" >Créneau de rendez-vous</label>
                            <select name="creneau_rdv" class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                              <?php
                              //ON parcours le nouveaux tableau ou il ya les horaire disponible
                              for ($i=0; $i < count($new_tab); $i++) {
                                //On affcihe les horaire qui sont disponible
                                ?>

                                <option value="<?php echo $tab_creneau[$new_tab[$i]]; ?>"><?php echo $tab_creneau[$new_tab[$i]]; ?></option>
                  <?php    } ?>
                            </select>
                            <label for="exampleInputEmail1" >Date de rendez-vous </label>
                            <input type="date" name="date_rdv" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                          <input style="margin-top:8px;" type="submit"class="btn btn-primary" value="Envoyer rendez-vous"/>
                  </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
  </body>
</html>
