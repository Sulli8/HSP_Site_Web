<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

    <form action="../../traitement/traitement_gestion_rdv.php" method="post">
<div>

  <?php

  require_once($_SERVER['DOCUMENT_ROOT']."/HSP_Site_Web/medico/manager/manager.php");
 $manager = new Manager();
 $manager->recapitulatif_medecin();
   ?>

</div>
        <div class="form-group col-md-4">
          <label for="inputState">Date</label>
        <input type="date" name="date_rdv">
        </div>
        <div class="form-group col-md-2">
          <label for="inputZip">Heure </label>
          <input type="time" name="heure_rdv">
        </div>


      <input type="submit" class="btn btn-primary" value="Réserver"> </input>
    </form>
  </body>
</html>
