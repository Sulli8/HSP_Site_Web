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


  function inscription(Inscription $inscription){
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

  function connexion($mail,$mdp){

    if(isset($mail) && isset($mdp)){
      $request = $this->connexion_bd()->prepare('SELECT * FROM user WHERE mail=:mail and mdp=:mdp');
       $request->execute(array('mdp'=>$mdp, 'mail'=>$mail));
       $response = $request->fetch();
       if ($response == true)
       {
         session_start();
         header('Location: ../view/index.php');
       }
       else
       {
           header('Location: ../../view/formulaire/formulaire_connexion.php');
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






}





 ?>
