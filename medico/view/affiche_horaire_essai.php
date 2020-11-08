<!DOCTYPE html>
<html lang="en" dir="ltr">
<?php include "../include/import.php"; ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/style_nav_hsp.css">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/8a3192b16c.js" crossorigin="anonymous"></script>
</head>
<body>
  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>


 <?php require_once($_SERVER['DOCUMENT_ROOT']."/HSP_Site_Web/medico/manager/manager.php");
 $manager = new Manager();
 $db = $manager->connexion_bd();
 $affiche = "SELECT nom,prenom,departement,specialite,mail,image_profil from medecin";
 $request = $db->query($affiche);
 $tableau = $request->fetchall();
 $variable = 'Prendre rdv';
 $class = 'btn';
?>
<div class="dropdown-menu">
<form class="px-4 py-3">
<div class="form-group">
  <label for="exampleDropdownFormEmail1">Email address</label>
  <input type="email" class="form-control" id="exampleDropdownFormEmail1" placeholder="email@example.com">
</div>
<div class="form-group">
  <label for="exampleDropdownFormPassword1">Password</label>
  <input type="password" class="form-control" id="exampleDropdownFormPassword1" placeholder="Password">
</div>
<div class="form-check">
  <input type="checkbox" class="form-check-input" id="dropdownCheck">
  <label class="form-check-label" for="dropdownCheck">
    Remember me
  </label>
</div>
<button type="submit" class="btn btn-primary">Sign in</button>
</form>
<div class="dropdown-divider"></div>
<a class="dropdown-item" href="#">New around here? Sign up</a>
<a class="dropdown-item" href="#">Forgot password?</a>
</div>








</body>

</html>
