<?php

require_once($_SERVER['DOCUMENT_ROOT']."/HSP_Site_Web/medico/manager/manager.php");
$manager = new Manager();
include "../include/import.php";
include "../include/header.php";
 ?>

 <link rel='stylesheet' type='text/css' href='prise_rdv.css'>


<body class="back">
<table>
  <?php
  $db = $manager->connexion_bd();
  $select = "SELECT specialite from medecin";
  $request = $db->query($select);
  $tableau = $request->fetchall();
//  $tab = array_unique($tableau[0]);

  $new_tab = [];
  for ($i=0; $i < count($tableau) ; $i++) {
    array_push($new_tab,$tableau[$i][0]);
  //  $val = serialize($tableau[$i][0]);
    //$update_val = substr($val, 6,-2);
  //  echo "<a type='submit' class='div' href='../traitement/traitement_affiche_medecin.php?affiche=$update_val'>".$tab[$i][0]."<p class='croix'>+</p></a>";
}
$tab = array_unique($new_tab);
$tab_specialite = [];
foreach ($tab as $key => $value) {
  array_push($tab_specialite,$value);
  //Specialité des medecins
  ?>
<th><?php  echo $value;?></th>
<?php  }
  //Technique de liste imbriquée
  $affiche = "SELECT * from medecin Where specialite in (SELECT specialite from medecin)";
//faire un table specilite
  $request = $db->query($affiche);
  $tab_sans_doublons = [];
  $tableau = $request->fetchall();
  for ($i=0; $i < count($tableau); $i++) {
    foreach ($tableau[$i]as $key => $value) {?>
  <?php     //Affichage des specialité
//Eliminer les doublons
array_push($tab_sans_doublons,$tableau[$i]['nom']);?>
  <?php  }
  }

  $new_tab_nom = array_unique($tab_sans_doublons);



   ?>



</table>

</body>
