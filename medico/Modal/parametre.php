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
          <form action="../FORM/modification_form.php" method="POST">
              <div class="d-flex">
                  <input class="mr-2" type="text" name="nom" value="<?php echo $_SESSION['nom'];?>" required>
                  <input type="text" name="prenom" value="<?php echo $_SESSION['prenom'];?>" required>
              </div>
              <div class="d-flex">
                  <input class="mr-2" type="text" name="adresse" value="<?php echo $_SESSION['addr'];?>" required>
                  <input type="text" name="ville" value="<?php echo $_SESSION['ville'];?>" required>
              </div>
              <div class="d-flex text-center">
                  <input type="text" name="mutuelle" value="<?php echo $_SESSION['mutuelle'];?>" required>
              </div>
              <button type="submit" class="btn btn-custom co-co-button">Modifier</button> <br>
              <small>Vous serez par la suite déconnecté.</small>
          </form>
      </div>
    </div>
  </div>
</div>
