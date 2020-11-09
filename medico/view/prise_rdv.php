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

    <style>
.orange{
  background-color: orange;
}
    </style>
</head>
<body>
  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>


 <?php require_once($_SERVER['DOCUMENT_ROOT']."/HSP_Site_Web/medico/manager/manager.php");
 $manager = new Manager();
 include "../include/header.php";
 $db = $manager->connexion_bd();
 $affiche = "SELECT nom,prenom,departement,specialite,mail,image_profil from medecin";
 $request = $db->query($affiche);
 $tableau = $request->fetchall();
 $variable = 'Prendre rdv';
 $class = 'btn';
?>
    <div class="container mt-5 mb-5 rounded">
<?php   for ($i=0; $i < count($tableau) ; $i++) {?>

  <div class="card text-center">
    <div class="card-header">
      Featured
    </div>
    <div class="row justify-content-between">
    <div class="mt-5 card-body align-items-center">

            <div class="text-center"> <div class="img-thumbnail"><img  width="200" height="200"src="../img/images_profils/<?php  echo $tableau[$i]['image_profil'];?>"></img></div>

      <h5 class="card-title">Special title treatment</h5>
      <p class="card-text">       <?php  echo "Prénom : ".ucwords($tableau[$i]['prenom'])."</br>";?>
             <?php  echo "Département : ".$tableau[$i]['departement']."</br>";?>
             <?php  echo "Mail : ".$tableau[$i]['mail']."</br>";?></p>
             <?php $medecin = $tableau[$i]["nom"]; ?>
      <a href="formulaire/formulaire_rdv.php?nom_medecin=<?php echo $medecin; ?>" class="btn btn-primary">Prendre Rendez-vous</a>
    </div>
  </div>
    </div>
    <div class="card-footer text-muted">
         <?php  echo "Domaine : ".$tableau[$i]['specialite']."</br>";?>
    </div>
  </div>
  <?php  // echo  "<a class='$class'  href='../traitement/traitement_affiche_horaire_rdv.php?rdv=$value'>$variable</a>"."<br/>"; ?>
<?php }?>
     </div>
</body>
</html>
