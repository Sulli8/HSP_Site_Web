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
      header('Location:../view/index.php');

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
                 header("Location:../view/index.php");
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
         header('Location: ../view/index.php');


       }
       else
       {
           header('Location: ../view/formulaire/formulaire_connexion.php');
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
    header('Location: ../view/index.php');

}
function barre_de_recherche($recherche){
    $db = $this->connexion_bd();
    $search = "SELECT * from medecin Where nom Like '%$recherche'";
    $request = $db->query($search);
    $tableau = $request->fetch();
    for ($i=1; $i < 6 ; $i++) {
    echo "<button type='submit' class='btn btn-primary'>".$tableau[$i]."</button>";
    }
  }
function prise_rdv(){
  $db = $this->connexion_bd();
  $select = "SELECT specialite from medecin";
  $request = $db->query($select);
  $tableau = $request->fetchall();
  for ($i=0; $i < count($tableau)  ; $i++) {
    $val = serialize($tableau[$i][0]);
    $update_val = substr($val, 6,-2);

    echo "<br />"."<a type='submit' class='bloc'  href='../traitement/traitement_affiche_medecin.php?affiche=$update_val'>".$tableau[$i][0]."</a>";
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
function recapitulatif_medecin(){
  session_start();
  echo "Nom de votre médecin : ".$_SESSION["medecin"]."</br>"."Mail du médecin : ".$_SESSION["mededin_email"];
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
    header("Location:../view/index.php");
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






}



?>
