<div class="modal fade" id="exampleModalM" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Mot de passe oublié</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">
          <form action="../FORM/password_form.php" method="POST">
              <p>Indiquer l'adresse e-mail de votre compte</p>
              <input type="email" name="email" required>
              <small>Votre nouveau mot de passe vous sera envoyé par e-mail, vous pourrez le changer dans vos paramètres par la suite.</small>
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
