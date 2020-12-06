<div class="modal fade" id="exampleModalPr" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Prendre rendez-vous</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">
              <?php
              //Connect DB
              require_once($_SERVER['DOCUMENT_ROOT']."/HSP_Site_Web/medico/manager/manager.php");
              //On déclare la variable $manager de type new Manager();
              $manager = new Manager();
              //On appelle la fonction connexion_mysqli();
              $mysqli = $manager->connexion_mysqli();

              //Query the database
              $resultMED = $mysqli->query("SELECT * FROM medecin");
              $Pr_id_medecin = array();
              $Pr_nom_medecin = array();
              $Pr_prenom_medecin = array();
              $Pr_specialite = array();
              $Pr_error = NULL;
              if($resultMED->num_rows != 0) {
                  while($row_Pr = $resultMED->fetch_assoc()) {
                    //On ajoute les colone dans les tableaux
                      array_push($Pr_id_medecin, $row_Pr['id']);
                      array_push($Pr_nom_medecin, $row_Pr['nom']);
                      array_push($Pr_prenom_medecin, $row_Pr['prenom']);
                      array_push($Pr_specialite, $row_Pr['specialite']);
                  }
              }else {
                //On déclare la variable $Pr_error de valeur "Aucun médecin disponible pour le moment.";
                  $Pr_error = "Aucun médecin disponible pour le moment.";
              }
              ?>

          <form action="../FORM/prise_rendez_vous.php" method="POST">
              <input class="text-center" type="text" value="<?php echo $_SESSION['nom'].' '.$_SESSION['prenom'];?>" disabled>
              <p>Choisir votre médecin</p>
              <select name="name_medecin" id="">
                  <option value="0">Choisir votre médecin</option>
                  <?php
                  for ($i=0; $i < sizeof($Pr_nom_medecin); $i++) {
                      echo '
                      <option value="'.$Pr_id_medecin[$i].'">'.$Pr_nom_medecin[$i].' '.$Pr_prenom_medecin[$i].' ('.$Pr_specialite[$i].')</option>
                      ';
                  }
                  ?>
                  <?php echo $Pr_error; ?>
              </select> <br> <br>
              <p>Créneaux horaires</p>
              <select name="creneaux" id="">
                  <option value="09h00 - 10h00">09h00 - 10h00</option>
                  <option value="10h00 - 11h00">10h00 - 11h00</option>
                  <option value="11h00 - 12h00">11h00 - 12h00</option>
                  <option value="14h00 - 15h00">14h00 - 15h00</option>
                  <option value="15h00 - 16h00">15h00 - 16h00</option>
              </select>
              <div class="d-flex justify-content-between modal-co-button">
                  <button type="button" class="btn btn-custom close-co-button" data-dismiss="modal">
                      <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-x" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                          <path fill-rule="evenodd" d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                        </svg>Fermer</button>
                  <button type="submit" class="btn btn-custom co-co-button">Envoyer</button>
              </div>
          </form>
      </div>
    </div>
  </div>
</div>
