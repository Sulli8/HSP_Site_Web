
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <!-- On appelle la classe manager-->
      <?php require_once($_SERVER['DOCUMENT_ROOT']."/HSP_Site_Web/medico/manager/manager.php");
      //On instancie la variable $manager de type new Manegr
      $manager = new Manager();
      //on appelle la fonction connexion_bd
      $db = $manager->connexion_bd();
      //on déclare la requête SQL
      $metier = "SELECT metier,contrat,nom_entreprise from emploies";
      // SQL Connect
      $job = $db->query($metier);
      //On déclare le tableau $tableau
      $tableau = $job->fetchall();
       ?>
        <table class="table table-light ">
        <thead>
          <tr>
            <th scope="col">Métier</th>
            <th scope="col">Contrat</th>
            <th scope="col">Nom entreprise</th>
            <th scope="col">Postuler</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <form action="../traitement/traitement_formulaire_emploies.php" method="post">
              <!-- On parcours le tableau -->
            <?php for ($i=0; $i < count($tableau); $i++) { ?>
            <td><input name="metier" class=" btn btn-dark" type="text" value=<?php echo $tableau[$i]['metier']; ?>  ></input></td>
            <td><input name="contrat" class="btn btn-dark" type="text" value=<?php echo $tableau[$i]['contrat']; ?> ></input></td>
              <td><input name="nom_entreprise" class="btn btn-dark" type="text" value=<?php echo $tableau[$i]['nom_entreprise']; ?> ></input></td>

              <td class="modal-content"><input  type="submit" class="btn btn-primary" value="Postuler"></input></a></td>
              <?php
              //Si l'index%3 == 0 alors on affiche une cellule
              if($i%3 == 0){ echo "<tr></tr>";}else{echo "<tr></tr>";} ?>
            <?php  ?>
            <?php   }  ?>
              </form>
          </tr>
        </tbody>
      </table>
  </div>
</div>
