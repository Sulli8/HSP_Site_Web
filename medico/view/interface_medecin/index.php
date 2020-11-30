<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

    <!-- Bootstrap CSS -->
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
      integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
      crossorigin="anonymous"
    />
    <script src="https://kit.fontawesome.com/1f7457abdb.js"></script>
    <title>Open Anchor Company</title>
  </head>
  <body>
    <!-- NAV -->

    <!-- END OF NAV -->
    <?php
    session_start();
    require_once($_SERVER['DOCUMENT_ROOT']."/HSP_Site_Web/medico/manager/manager.php");
  $manager = new Manager();
  $db = $manager->connexion_bd();
    $affiche = "SELECT creneau_1,creneau_2,creneau_3,creneau_4,creneau_5 from creneau";
    $request = $db->query($affiche);
    $tableau = $request->fetch();


    $affiche_patient = "SELECT nom from user";
    $request = $db->query($affiche_patient);
    $nom_patient = $request->fetchall();

    ?>
    <!-- BANNER -->
    <section>
      <div class="container-fluid">
        <div
          class="row bg-primary justify-content-center align-items-center"
          style="height: 100vh">
          <div class="col-sm-10 text-center">
            <h1 class="display-2 text-capitalize text-white">Bienvenue Sur Mon hopital Pro</h1>
            <a href="#" class="btn btn-dark btn-lg px-4 m-2"  data-toggle="modal" data-target="#exampleModalJH" data-whatever="@mdo">Ajouter Rendez-vous</a>
            <a href="#" class="btn btn-dark btn-lg px-4 m-2"  data-toggle="modal" data-target="#exampleModalPARA" >Modifier informations</a>
            <a href="#" class="btn btn-dark btn-lg px-4 m-2"  data-toggle="modal" data-target="#exampleModal">Voir mes rendez-vous</a>
            <a href="../../FORM/deconnexion_form.php" class="btn btn-danger btn-lg px-4 m-2">Déconnexion</a>
          </div>
        </div>
      </div>
    </section>

    <div class="modal fade" id="exampleModalPARA" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Paramètre de mon compte</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body text-center">
              <small>Si vous souhaitez modifier vos informations personnelles, modifiez simplement les informations ici présente
              puis valider.</small>
              <form action="../../FORM/modification_form.php" method="POST">
                  <div class="d-flex">
                      <input class="mr-2" type="text" name="nom" value="<?php echo $_SESSION['id'];?>" required>
                      <input type="text" name="prenom" value="<?php echo $_SESSION['prenom'];?>" required>
                  </div>
                  <div class="d-flex">
                      <input class="mr-2" type="text" name="adresse" value="<?php echo $_SESSION['addr'];?>" required>
                      <input type="text" name="ville" value="<?php echo $_SESSION['ville'];?>" required>
                  </div>
                  <div class="d-flex text-center">
                      <input type="text" name="mutuelle" value="<?php echo $_SESSION['mutuelle'];?>" required>
                  </div>
                  <button type="submit" class="btn btn-primary">Modifier</button> <br>
                  <small>Vous serez par la suite déconnecté.</small>
              </form>
          </div>
        </div>
      </div>
    </div>

    <!-- Button trigger modal -->

<?php

$id_medecin = $_SESSION['id'];
$search = "SELECT * from rdv Where id_medecin='$id_medecin'";
$request = $db->query($search);

$tableau = $request->fetch();
 ?>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Rendez-vous actuel</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <?php
            if($tableau != null){
              $supprr = $tableau['id'];
              echo $tableau['nom_patient']." ".$tableau['date_rdv']." ".$tableau['creneau_rdv']."<a href='../../traitement/traitement_delete_patient.php?delete=$supprr' class='text-white mt-2 btn btn-danger'>Supprimer<a/>"."</br>";
            }
            else{
              echo "Vous n'avez pas de rendez-vous";
            }



             ?>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
<div class="modal fade" id="exampleModalJH" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ajouter rendez-vous</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="../../FORM/ajout_medecin_rdv_form.php" method="POST">
          <div class="form-group">
            <select name="nom_patient" class="custom-select" id="inputGroupSelect01">
              <option >Selectionnez un patient</option>

          <?php    for ($i=0; $i < count($nom_patient); $i++) {
                foreach ($nom_patient[$i] as $key => $value) {?>
                 <option value="<?php echo $value ?>"><?php   echo $value;  ?></option>
        <?php         }
              }?>

  </select>

          </div>
          <div class="form-group">
            <select name="creneau_rdv"class="custom-select" id="inputGroupSelect01">
              <?php    for ($i=0; $i < 5; $i++) {?>
                     <option value="<?php echo $tableau[$i] ?>"><?php   echo $tableau[$i];  ?></option>
            <?php         } ?>
  </select>

          </div>
          <div class="form-group">
                <input type="date" name="date_rdv" class="form-control" id="exampleInputPassword1" placeholder="Password">
          </div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary" value="Ajouter ce rendez-vous"></input>
      </div>

      </form>
    </div>
  </div>
</div>
    <!-- END OF BANNER -->


    <!-- END OF CONTACT -->


    <!-- END OF FOOTER -->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script
      src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
      integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
      integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
      integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
