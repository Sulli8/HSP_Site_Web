<div class="modal fade" id="exampleModalGr" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Gérer mes rendez-vous</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">
          <?php

              //Connect DB
              require_once($_SERVER['DOCUMENT_ROOT']."/HSP_Site_Web/medico/manager/manager.php");
              $manager = new Manager();
              //On appelle la fonction connexion_mysqli()
              $mysqli = $manager->connexion_mysqli();
              //On déclare la variable $id_user $_SESSION['id'];
              $id_user = $_SESSION['id'];

              //Query the database
              $resultRDV = $mysqli->query("SELECT * FROM rdv WHERE id_user = '$id_user'");
              $id_consultation = array();
              $nom_medecin = array();
              $date_rdv = array();
              $heure_rdv = array();

              if($resultRDV->num_rows != 0) {

                  while($row = $resultRDV->fetch_assoc()) {
                      array_push($id_consultation, $row['id']);
                      array_push($nom_medecin, $row['nom_medecin']);
                      array_push($date_rdv, $row['date_rdv']);
                      array_push($heure_rdv, $row['creneau_rdv']);
                  }
                  for ($i=0; $i < sizeof($nom_medecin); $i++) {
                      echo '
                      <table width="100%" border="1" cellspacing="1" cellpadding="5">
                          <tr>
                              <td>Nom du medecin</td>
                              <td>Date du rendez-vous</td>
                              <td>Créneaux horraire du rendez-vous</td>
                              <td>Annuler</td>
                          </tr>
                          <tr>
                              <td>'.$nom_medecin[$i].'</td>
                              <td>'.$date_rdv[$i].'</td>
                              <td>'.$heure_rdv[$i].'</td>
                              <td><a href="medico/FORM/annulation_form.php?key='.$id_consultation[$i].'">
                                  <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-x-circle-fill" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                  <path fill-rule="evenodd" d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.354 4.646a.5.5 0 1 0-.708.708L7.293 8l-2.647 2.646a.5.5 0 0 0 .708.708L8 8.707l2.646 2.647a.5.5 0 0 0 .708-.708L8.707 8l2.647-2.646a.5.5 0 0 0-.708-.708L8 7.293 5.354 4.646z"/>
                                  </svg>
                              </a></td>
                          </tr>
                      </table>
                      ';
                  }
              }else {
                  echo "Vous n'avez aucun rendez-vous !!";
              }

          ?>
      </div>
    </div>
  </div>
</div>
