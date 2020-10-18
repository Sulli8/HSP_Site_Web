<!DOCTYPE html>
<html lang="en" dir="ltr">
<?php include "../include/import.php"; ?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/style_nav_hsp.css">
      <link rel="stylesheet" href="../css/style_prise_rdv.css">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/8a3192b16c.js" crossorigin="anonymous"></script>
</head>

 <?php require_once($_SERVER['DOCUMENT_ROOT']."/HSP_Site_Web/medico/manager/manager.php");
 $manager = new Manager();
 include "../include/header.php";
 $db = $manager->connexion_bd();
 $affiche = "SELECT nom,prenom,departement,specialite,mail from medecin";
 $request = $db->query($affiche);
 $tableau = $request->fetchall();
 $variable = 'Prendre rdv';
 $class = 'btn';
?>
<table>

    <tr>
<?php
for ($i=0; $i < count($tableau) ; $i++) {?>
  <td><div class="coord">
        <div class="medecin">
<?php   foreach(array_unique($tableau[$i]) as $key => $value){
?>


  <?php  echo $value?>

<?php    }?>
</div>

  <?php   echo  "<a class='$class'  href='../traitement/traitement_affiche_horaire_rdv.php?rdv=$value'>$variable</a>"."<br/>";?>
  </div>
</td>

<?php

if($i%2 == 0){
  echo "<tr></tr>";
}
  }?>
</tr>
</table>
</body>

</html>
