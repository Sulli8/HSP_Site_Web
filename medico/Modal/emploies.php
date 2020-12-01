
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
      <?php require_once($_SERVER['DOCUMENT_ROOT']."/HSP_Site_Web/medico/manager/manager.php");
      $manager = new Manager();
      $db = $manager->connexion_bd();
      $metier = "SELECT metier,contrat,nom_entreprise from emploies";
      $job = $db->query($metier);
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
            <?php for ($i=0; $i < count($tableau); $i++) { ?>
            <td><input name="metier" class=" btn btn-dark" type="text" value=<?php echo $tableau[$i]['metier']; ?>  ></input></td>
            <td><input name="contrat" class="btn btn-dark" type="text" value=<?php echo $tableau[$i]['contrat']; ?> ></input></td>
              <td><input name="nom_entreprise" class="btn btn-dark" type="text" value=<?php echo $tableau[$i]['nom_entreprise']; ?> ></input></td>

              <td class="modal-content"><input  type="submit" class="btn btn-primary" value="Postuler"></input></a></td>
              <?php if($i%3 == 0){ echo "<tr></tr>";}else{echo "<tr></tr>";} ?>
            <?php  ?>
            <?php   }  ?>
              </form>
          </tr>
        </tbody>
      </table>
  </div>
</div>
