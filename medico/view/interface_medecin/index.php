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
    //On démarre une session
    session_start();
    require_once($_SERVER['DOCUMENT_ROOT']."/HSP_Site_Web/medico/manager/manager.php");
    $manager = new Manager();
    $db = $manager->connexion_bd();
    //On déclare la requête qui permet d'afficher le nom des user
    $affiche_patient = "SELECT nom from user";
    //On exécute la requête
    $request = $db->query($affiche_patient);
    $nom_patient = $request->fetchall();
    //  $medecin = $_GET['nom_medecin'];
    $search = "SELECT creneau_1,creneau_2,creneau_3,creneau_4,creneau_5 from creneau";
    $request = $db->query($search);
    //On compte les date qui sont disponible par rapport au creneau de rdv pris pas le user
    $creneau_1 = "SELECT count(date_rdv) from rdv where creneau_rdv='9h00-10h00'";
    $creneau_2 = "SELECT count(date_rdv) from rdv where creneau_rdv='10h00-11h00'";
    $creneau_3 = "SELECT count(date_rdv) from rdv where creneau_rdv='11h00-12h00'";
    $creneau_4 = "SELECT count(date_rdv) from rdv where creneau_rdv='14h00-15h00'";
    $creneau_5 = "SELECT count(date_rdv) from rdv where creneau_rdv='15h00-16h00'";
    //On exécute les requête qui comte les date
    $prise_1 = $db->query($creneau_1);
    $prise_2 = $db->query($creneau_2);
    $prise_3 = $db->query($creneau_3);
    $prise_4= $db->query($creneau_4);
    $prise_5 = $db->query($creneau_5);
    //on intancie le tableau des ces requête
    $tab_prise_1 = $prise_1->fetch();
    $tab_prise_2 = $prise_2->fetch();
    $tab_prise_3 = $prise_3->fetch();
    $tab_prise_4 = $prise_4->fetch();
    $tab_prise_5 = $prise_5->fetch();
    //On déclare le tableau horaire
    $horaire = [];
    //ajoute la valeur dans le tableau
    array_push($horaire,$tab_prise_1[0]);
    array_push($horaire,$tab_prise_2[0]);
    array_push($horaire,$tab_prise_3[0]);
    array_push($horaire,$tab_prise_4[0]);
    array_push($horaire,$tab_prise_5[0]);
    $tab_creneau = $request->fetch();
    //on déclare le tableau new Tab
            $new_tab = [];
           foreach ($horaire as $key => $value) {
             //Si la valeur est inférieur à 3 alors on ajoute les clés dans le tableau
            if($value < 3){
              array_push($new_tab,$key);
            }
          }

    ?>
    <!-- BANNER -->
    <section>
      <div class="container-fluid">
        <div
          class="row bg-light justify-content-center align-items-center"
          style="height: 100vh">
          <div class="col-sm-10 text-center">
            <h3 class="display-2 text-capitalize text-primary">Bienvenue Sur Mon hopital Pro</h3>
            <a href="#" class="btn btn-primary btn-lg px-4 m-2"  data-toggle="modal" data-target="#exampleModalJH" data-whatever="@mdo">Ajouter Rendez-vous</a>
            <a href="#" class="btn btn-primary btn-lg px-4 m-2"  data-toggle="modal" data-target="#exampleModalPARA" >Modifier informations</a>
            <a href="#" class="btn btn-primary btn-lg px-4 m-2"  data-toggle="modal" data-target="#exampleModal">Voir mes rendez-vous</a>
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
                  <div class="">
                     <label for="exampleInputEmail1">Nom médecin </label>
                      <input class=" bg bg-primary text-white form-control mt-2" type="text" name="nom" value="<?php echo $_SESSION['nom'];?>" required>
                    </div>
                    <div class="">
                      <label for="exampleInputEmail1">Prénom </label>
                      <input type="text" class="bg bg-primary text-white form-control mt-2" name="prenom" value="<?php echo $_SESSION['prenom'];?>" required>
                    </div>


                  <div class="">
                    <label for="exampleInputEmail1">Adresse médecin </label>
                      <input class=" bg bg-primary text-white form-control mt-2" type="text" name="adresse" value="<?php echo $_SESSION['addr'];?>" required>
                      </div>
                      <div>
                          <label for="exampleInputEmail1">Ville</label>
                          <input type="text" class=" bg bg-primary text-white form-control mt-2" name="ville" value="<?php echo $_SESSION['ville'];?>" required>
                        </div>
                  <div class="">
                    <label for="exampleInputEmail1">Mutuelle </label>
                      <input type="text" class="bg bg-primary text-white form-control mt-2" name="mutuelle" value="<?php echo $_SESSION['mutuelle'];?>" required>
                  </div>
                  <button type="submit" class="mt-2 btn btn-primary">Modifier</button> <br>
                  <small>Vous serez par la suite déconnecté.</small>
              </form>
          </div>
        </div>
      </div>
    </div>

    <!-- Button trigger modal -->

<?php
//On déclare la variable $id_médecin
$id_medecin = $_SESSION['id'];
//On déclare la variable $search
$search = "SELECT * from rdv Where id_medecin='$id_medecin'";
$request = $db->query($search);
//On déclare la tableau de tableau $tableau
$tableau = $request->fetchall();

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
            <table class="table table-bordered bg-primary text-white">
  <thead>
    <tr>
      <th scope="col">Patient</th>
      <th scope="col">Date rdv</th>
      <th scope="col">Creneau rdv</th>
      <th scope="col">Supprimer</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <?php
      //Si le tableau existe alors...
      if($tableau != null){
        //On parcours le tableau
        for ($i=0; $i < count($tableau); $i++) {
          $supprr = $tableau[$i]['id'];
          //On affiche les index du tableau
          echo "<th>".$tableau[$i]['nom_patient']."</th>";
          echo "<th>".$tableau[$i]['date_rdv']."</th>";
          echo "<th>".$tableau[$i]['creneau_rdv']."</th>";
          echo "<th><a href='../../traitement/traitement_delete_patient.php?delete=$supprr' class='text-white mt-2 btn btn-danger'>Supprimer<a/>";
          //Si $i%3 == 0 alors....
          if($i%3 == 0){
            //On affiche une cellule
            echo "<tr>

            </tr>";} else{
                //On affiche une cellule
                echo "<tr></tr>";}
          }
      }
      else{
        //Sinon On affiche vous n'avez pas de rendez-vous
        echo "Vous n'avez pas de rendez-vous";
      }
       ?>
    </tr>
  </tbody>
</table>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
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

          <?php
          //O parcours le tableau
            for ($i=0; $i < count($nom_patient); $i++) {
              //On parcours les tableau du tableaux $nompatient
                foreach ($nom_patient[$i] as $key => $value) {?>
                  <!-- On afficheles valeur du tableeau --->
                 <option value="<?php echo $value ?>"><?php   echo $value;  ?></option>
        <?php         }
              }?>

  </select>

          </div>
          <div class="form-group">
            <select name="creneau_rdv"class="custom-select" id="inputGroupSelect01">
              <?php
              //On parocurs la tableau new_tab
              for ($i=0; $i < count($new_tab); $i++) {?>
                <!-- On affiche les horaire disponible-->
                <option value="<?php echo $tab_creneau[$new_tab[$i]]; ?>"><?php echo $tab_creneau[$new_tab[$i]]; ?></option>
  <?php    } ?>
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
