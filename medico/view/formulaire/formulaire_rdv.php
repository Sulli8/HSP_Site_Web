<!DOCTYPE html>
<html lang="en" dir="ltr">
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
    <?php
    require_once($_SERVER['DOCUMENT_ROOT']."/HSP_Site_Web/medico/manager/manager.php");
    //Connect database
    $manager = new Manager();
    $db = $manager->connexion_bd();
    $medecin = "Sullivan";
    $search = "SELECT creneau_1,creneau_2,creneau_3,creneau_4,creneau_5 from creneau";
    $request = $db->query($search);
    $tab_creneau = $request->fetch();

    $creneau_1 = "SELECT count(date) from prise_rdv where creneau_1='1'";
    $creneau_2 = "SELECT count(date) from prise_rdv where creneau_2='1'";
    $creneau_3 = "SELECT count(date) from prise_rdv where creneau_3='1'";
    $creneau_4 = "SELECT count(date) from prise_rdv where creneau_4='1'";
    $creneau_5 = "SELECT count(date) from prise_rdv where creneau_5='1'";

    $prise_1 = $db->query($creneau_1);
  //  $prise_2 = $db->query($creneau_2);
  //  $prise_3 = $db->query($creneau_3);
  //  $prise_4= $db->query($creneau_4);
  //  $prise_5 = $db->query($creneau_5);

    $tab_prise_1 = $prise_1->fetch();
  //  $tab_prise_2 = $prise_2->fetch();
  //  $tab_prise_3 = $prise_3->fetch();
  //  $tab_prise_4 = $prise_4->fetch();
  //  $tab_prise_5 = $prise_5->fetch();
var_dump($tab_prise_1);
     ?>
    <form class="" action="" method="post">
        <?php

        if(isset($tab_prise_1)){

            if($tab_prise_1[0] < '3'){?>
              <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
            <?php  for ($i=0; $i < 5; $i++) {?>

            <option value="<?php echo $tab_creneau[$i]; ?>"><?php echo $tab_creneau[$i]; ?></option>

          <?php echo "ok";  }?>
            </select>
          <?php   }
          else{
              $element = "9h00-10h00";
              unset($tab_creneau[array_search($element, $tab_creneau)]);
              var_dump($tab_creneau);
               ?>
              <select class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                <?php   for ($i=0; $i < 5 ; $i++) {?>
                  <option value="<?php echo $tab_creneau[$i]; ?>"><?php echo $tab_creneau[$i]; ?></option>
                <?php } ?>
              </select>
            <?php echo "5"; }
          } else {
            echo "Problème de table";
          }
          ?>








    </form>
  </body>
</html>
