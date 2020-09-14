<?php
require_once($_SERVER['DOCUMENT_ROOT']."/HSP_Site_Web/medico/traitement/traitement_formulaire_inscription.php");
require_once($_SERVER['DOCUMENT_ROOT']."/HSP_Site_Web/medico/model/inscription.php");

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
      echo "inscrit";

    }



  }
}





 ?>
