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
      header_location("../../view/index.php");

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



}





 ?>
