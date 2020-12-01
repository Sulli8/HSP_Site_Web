<div class="modal fade" id="exampleModalI" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Inscription</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">
          <form action="../FORM/inscription_form.php" method="POST">
              <p>Nom</p>
              <input type="text" name="nom" required>
              <p>Prénom</p>
              <input type="text" name="prenom" required>
              <p>Adresse</p>
              <input type="text" name="addr" required>
              <p>Ville</p>
              <input type="text" name="ville" required>
              <p>Adresse e-mail</p>
              <input type="email" name="email" required>
              <p>Mot de passe</p>
              <input type="password" name="pass" required>
              <p>Confirmer mon Mot de passe</p>
              <input type="password" name="pass2" required>
              <p>Ma Mutuelle</p>
              <input type="text" name="mutuelle" required> <br>
              <div class="text-left">
                  <a class="acc-co-button" href="" data-dismiss="modal" aria-label="Close" data-toggle="modal" data-target="#exampleModal">J'ai déjà un compte - Me connecter</a>
              </div>
              <div class="d-flex justify-content-between modal-co-button">
                  <button type="button" class="btn btn-custom close-co-button" data-dismiss="modal">
                      <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-x" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                          <path fill-rule="evenodd" d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                        </svg>Fermer</button>
                  <button type="submit" class="btn btn-custom co-co-button">Créer mon compte</button>
              </div>
          </form>
      </div>
    </div>
  </div>
</div>
