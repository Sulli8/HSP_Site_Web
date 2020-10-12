<?php

class manager {

  function connexion_bd(){
    try
        {
            $bdd = new PDO('mysql:host=localhost;dbname=bdd_hsp;charset=utf8','root','');
        }
        catch(Exception $e)
        {
            die('ERREUR:'.$e->getMessage());
        }
        return $bdd;

  }


  function inscription(User $inscription){
    $db = $this->connexion_bd();
    $request = $db->prepare('INSERT INTO user(nom, prenom, mail, mutuelle ,admin, mdp,adresse) VALUES(:nom, :prenom, :mail, :mutuelle ,:admin, :mdp,:adresse)');
               $insert_utilisateur = $request->execute(array(
                   'nom' => $inscription->getNom(),
                   'prenom' => $inscription->getPrenom(),
                   'mail' => $inscription->getMail(),
                   'mutuelle' => $inscription->getMutuelle(),
                   'admin' => $inscription->getAdmin(),
                   'mdp' => $inscription->getMdp(),
                   'adresse'=>$inscription->getAdresse()));
    if($request == true){
      header('Location:../view/nav_hsp/index.php');

    }
}

function inscription_medecin(Medecin $medecin){
  $db = $this->connexion_bd();
  $request = $db->prepare('INSERT INTO medecin(nom, prenom, departement, specialite, mail,mdp) VALUES(:nom, :prenom, :departement, :specialite ,:mail, :mdp)');
             $insert_medecin = $request->execute(array(
                 'nom' => $medecin->getNom(),
                 'prenom' => $medecin->getPrenom(),
                 'departement' => $medecin->getDepartement(),
                 'specialite' => $medecin->getSpecialite(),
                 'mail' => $medecin->getMail(),
                 'mdp' => $medecin->getMdp()
               ));
               $tableau = $request->fetch();
               var_dump($tableau);

               if($insert_medecin == true){
                  header('Location:../view/nav_hsp/index.php');
               }

}
  function connexion($mail,$mdp){

    if(isset($mail) && isset($mdp)){
      $request = $this->connexion_bd()->prepare('SELECT * FROM user WHERE mail=:mail and mdp=:mdp');
       $request->execute(array('mdp'=>$mdp, 'mail'=>$mail));
       $response = $request->fetch();
       if ($response == true)
       {
         session_start();
         $_SESSION["mdp"] = $mdp;
         $_SESSION["mail"] = $mail;
         $_SESSION['id'] = $response["id"];
         $_SESSION['nom'] = $response['nom'];
         $_SESSION['admin'] = "";

         if(isset($response['admin'])){
           $_SESSION["admin"] = "root";
           //faire apparaître pop up admin
           echo $_SESSION['admin'];
         }
         //faire apparaitre pop up user
             header('Location:../view/nav_hsp/index.php');


       }
       else
       {
               header('Location:../view/nav_hsp/index.php');
       }
    }

  }


function include_forms(){
  $script = '<head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>medical</title>
      <link rel="icon" href="img/favicon.png">
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="../../css/bootstrap.min.css">
      <!-- animate CSS -->
      <link rel="stylesheet" href="../../css/animate.css">
      <!-- owl carousel CSS -->
      <link rel="stylesheet" href="../../css/owl.carousel.min.css">
      <!-- themify CSS -->
      <link rel="stylesheet" href="../../css/themify-icons.css">
      <!-- flaticon CSS -->
      <link rel="stylesheet" href="../../css/flaticon.css">
      <!-- magnific popup CSS -->
      <link rel="stylesheet" href="../../css/magnific-popup.css">
      <!-- nice select CSS -->
      <link rel="stylesheet" href="../../css/nice-select.css">
      <!-- swiper CSS -->
      <link rel="stylesheet" href="../../css/slick.css">
      <!-- style CSS -->
      <link rel="stylesheet" href="../../css/style.css">
  </head>

';
  echo $script;
}
function include_header(){
  $script = include "../../include/header.php";
  echo $script;

}


function select_button($mail,$mdp){
    $db = $this->connexion_bd();
    $request = $this->connexion_bd()->prepare('SELECT * FROM user WHERE mail=:mail and mdp=:mdp');
    $request->execute(array('mdp'=>$mdp, 'mail'=>$mail));
    $response = $request->fetch();
    $unique = array_unique($response);
    unset($unique['id']);
    if(empty($unique['admin'])){
      unset($unique['admin']);

    }
    else{
      $unique = array_unique($response);
    }
    foreach ($unique as $key => $value) {
      echo $value."<a class='btn btn-primary' href='../modif.php?modifier=$key'>Modifier</a>"."\n";
    }


}

function update_user($New_val,$val,$id){
  $db = $this->connexion_bd();
  $updating = "UPDATE user set $val='$New_val' WHERE id='$id'";
  $request = $this->connexion_bd()->prepare($updating);
  $update_tab = $request->execute(array(
    $val => $New_val));
        header('Location:../view/nav_hsp/index.php');

}
function barre_de_recherche($recherche){
    $db = $this->connexion_bd();
    $search = "SELECT * from medecin Where nom Like '%$recherche'";
    $request = $db->query($search);
    $tableau = $request->fetchall();
    $index_key = ['nom','prenom','mail','departement','specialite'];
    session_start();
    if(isset($tableau[0])){
      foreach (array_unique($tableau[0]) as $key => $value) {
        if(strlen($_SESSION['admin']) != 0){
            echo $key.": ".$value.'<br />';
        } else {
          for ($i=0; $i < count($index_key) ; $i++) {
            if($key == $index_key[$i]){
              echo $key.": ".$value.'<br />';
            }
          }

        }
      }
    }else{
      echo "WARNING: ce médecin n'existe pas";
    }


  }



function prise_rdv(){
  $db = $this->connexion_bd();
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
$specialite = [];
foreach ($tab as $key => $value) {
  //Specialité des medecins
  array_push($specialite,$value);
}

for ($i=0; $i <count($specialite) ; $i++) {
  echo '<option value='.$specialite[$i].'>'.$specialite[$i].'</option>';
}

}

function affiche_medecin($specialite){
  $db = $this->connexion_bd();
  $affiche = "SELECT * from medecin Where specialite='$specialite'";
  $request = $db->query($affiche);
  $tableau = $request->fetch();

  $_SESSION["nom_medecin"] = $tableau['nom'];
  $_SESSION["medecin_email"] = $tableau["mail"];
  $_SESSION["id_medecin"] = $tableau["id"];
  $rdv = "<a href='../view/formulaire/formulaire_rdv.php' class='btn btn-success'> Prendre un rdv avec ce médecin ?</a>";
  echo $rdv;
  for ($i=1; $i < 6 ; $i++) {
  echo "</br>".$tableau[$i];
}

}

function gestion_rdv($id_medecin,$id_user,$date,$heure,$nom_medecin,$nom_patient){
  $db = $this->connexion_bd();
  $request = $db->prepare('INSERT INTO rdv(id_medecin, id_user, date, heure ,nom_medecin,nom_patient) VALUES(:id_medecin, :id_user, :date, :heure ,:nom_medecin,:nom_patient)');
             $insert_rdv = $request->execute(array(
                 'id_medecin' => $id_medecin,
                 'id_user' => $id_user,
                 'date' => $date,
                 'heure' => $heure,
                 'nom_medecin' => $nom_medecin,
                 'nom_patient'=> $nom_patient
               ));
  $tableau = $request->fetch();
  if(isset($tableau)){
        header('Location:../view/nav_hsp/index.php');
  }

}

function index_bg(){
  echo "style='height: 935px;
    position: relative;
    overflow: hidden;
    background-image: url(../img/index_bg.jpeg);
    background-repeat: no-repeat;
    background-size: 100% 100%;
    background-position: center;'";
}

function gerer_rdv(){
  $db = $this->connexion_bd();
  $affiche = "SELECT * from medecin Where specialite='$specialite'";
  $request = $db->query($affiche);
  $tableau = $request->fetch();

  $_SESSION["nom_medecin"] = $tableau['nom'];
  $_SESSION["medecin_email"] = $tableau["mail"];
  $_SESSION["id_medecin"] = $tableau["id"];
  $rdv = "<a href='../view/formulaire/formulaire_rdv.php' class='btn btn-success'> Prendre un rdv avec ce médecin ?</a>";
  echo $rdv;
  for ($i=1; $i < 6 ; $i++) {
  echo "</br>".$tableau[$i];
}
//faire un bouton suprimer dans rdv


}
function affiche_rdv($id_medecin){
  $db = $this->connexion_bd();
  $affiche = "SELECT * from rdv Where id_medecin='$idmedecin'";
  $request = $db->query($affiche);
  $tableau = $request->fetch();
  if(isset($tableau)){
    for ($i=1; $i < count($tableau); $i++) {
      echo "voici vos rdv";
      echo "</br>".$tableau[$i];
  }
}
  else{
    echo "Warning vous n'avez pas de rdv";
  }



}
function links_rdv(){
  $db = $this->connexion_bd();
  $affiche = "SELECT nom,prenom,departement,specialite,mail from medecin";
  $request = $db->query($affiche);
  $tableau = $request->fetchall();
  $variable = 'Disponible';
  $disponibilite = "<a href='href=''>.$variable.</a>"."<br/>";

  for ($i=0; $i < count($tableau) ; $i++) {
    foreach(array_unique($tableau[$i]) as $key => $value){
      echo $value.'<br />';
    }
  }
  $rdv = "SELECT COUNT(id_medecin) from rdv WHERE date >= '10:12:00'";
  $meeting = $db->query($rdv);
  $prise = $meeting->fetchall();
  var_dump($prise);

}

}



?>
