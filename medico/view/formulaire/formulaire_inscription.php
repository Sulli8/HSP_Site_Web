
<!doctype html>
<html lang="en">

  <?php include "../../include/import.php"; ?>

<body>

<?php include "../../include/header.php"; ?>
<form action="../../traitement/traitement_formulaire_inscription.php" method="post">
    <div>
        <label for="nom">Nom :</label>
        <input type="text"  name="nom">
    </div>

    <div>
        <label for="prenom">Prénom :</label>
        <input type="text"  name="prenom">
    </div>
    <div>
        <label for="email">Mail :</label>
        <input type="text" name="mail">
    </div>

    <div>
          <label for="mutuelle" >Mutuelle :</label>
          <input type="text"  name="mutuelle">
      </div>

    <div>
        <label for="email">Mot de passe :</label>
        <input type="text" name="mdp"></input>
    </div>

    <div>
        <label for="adress">Adresse :</label>
        <input type="text" name="adresse"></input>
    </div>


    <div>
        <input type="submit" value="Envoyer">
    </div>

</form>
<?php include "../../include/script.php"; include "../../include/footer.php"; ?>
</body>
</html>
