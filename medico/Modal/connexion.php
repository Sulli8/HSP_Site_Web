<div class="modal fade" id="exampleModalo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Connexion</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-center">
          <form action="medico/FORM/connexion_form.php" method="POST">
              <p>Adresse e-mail</p>
              <input type="email" name="email" required>
              <p>Mot de passe</p>
              <input type="password" name="pass" required> <br>
              <div class="text-left">
                  <a class="mdp-co-button" href="" data-dismiss="modal" aria-label="Close" data-toggle="modal" data-target="#exampleModalM">Mot de passe oublié </a> <br>
                  <a class="acc-co-button" href="" data-dismiss="modal" aria-label="Close" data-toggle="modal" data-target="#exampleModalI">Je n'ai pas de compte - Créer un compte</a>
              </div>
              <div class="d-flex justify-content-between modal-co-button">
                  <button type="button" class="btn btn-custom close-co-button" data-dismiss="modal">
                      <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-x" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                          <path fill-rule="evenodd" d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                        </svg>Fermer</button>
                  <button type="submit" class="btn btn-custom co-co-button">Connexion</button>
              </div>
          </form>
      </div>
    </div>
  </div>
</div>
