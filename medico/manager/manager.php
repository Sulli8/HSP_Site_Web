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
    $request = $db->prepare('INSERT INTO user(nom, prenom, mail, mutuelle ,admin, mdp,adresse,image_profil) VALUES(:nom, :prenom, :mail, :mutuelle ,:admin, :mdp,:adresse,:image_profil)');
               $insert_utilisateur = $request->execute(array(
                   'nom' => $inscription->getNom(),
                   'prenom' => $inscription->getPrenom(),
                   'mail' => $inscription->getMail(),
                   'mutuelle' => $inscription->getMutuelle(),
                   'admin' => $inscription->getAdmin(),
                   'mdp' => $inscription->getMdp(),
                   'adresse'=>$inscription->getAdresse(),
                   'image_profil'=>$inscription->getImage_profil()
                 ));
    if($request == true){
      header('Location:../view/index.php');

    }
}

function inscription_medecin(Medecin $medecin){
  $db = $this->connexion_bd();
  $request = $db->prepare('INSERT INTO medecin(nom, prenom, departement, specialite, mail,mdp,image_profil) VALUES(:nom, :prenom, :departement, :specialite ,:mail, :mdp, :image_profil)');
             $insert_medecin = $request->execute(array(
                 'nom' => $medecin->getNom(),
                 'prenom' => $medecin->getPrenom(),
                 'departement' => $medecin->getDepartement(),
                 'specialite' => $medecin->getSpecialite(),
                 'mail' => $medecin->getMail(),
                 'mdp' => $medecin->getMdp(),
                 'image_profil' => $medecin->getImage_profil()
               ));
               $tableau = $request->fetch();
               if($insert_medecin == true){
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
         $_SESSION["mdp"] = $mdp;
         $_SESSION["mail"] = $mail;
         $_SESSION['id'] = $response["id"];
         $_SESSION['nom'] = $response['nom'];
         $_SESSION['admin'] = "";
         $_SESSION['rdv_indispo'] = "1";

         if(isset($response['admin'])){
           $_SESSION["admin"] = "root";
         }
         //faire apparaitre pop up user
             header('Location:../view/index.php');
       }
       else
       {
         //Vérifie si le user connectéest un médecin
         $this->connexion_medecin($mail,$mdp);
       }
    }
  }
  function connexion_medecin($mail,$mdp){
    if(isset($mail) && isset($mdp)){
      $request = $this->connexion_bd()->prepare('SELECT * FROM medecin WHERE mail=:mail and mdp=:mdp');
       $request->execute(array('mdp'=>$mdp, 'mail'=>$mail));
       $response = $request->fetch();
       if ($response == true)
       {
         session_start();
         $_SESSION["mdp_medecin"] = $mdp;
         $_SESSION["mail_medecin"] = $mail;
         $_SESSION['id_medecin'] = $response["id"];
         $_SESSION['nom_medecin'] = $response['nom'];

         //faire apparaitre pop up user
            header("Location: ../view/index_medecin.php");
       }
       else
       {
         // Affiche une erreur de connexion
         echo "Vous n'êtes pas authentifier sur ce site inscriver vous avant !";
       }
    }
  }



function update_user(medecin $tab_medecin,$id){
  $db = $this->connexion_bd();
  $updating = "UPDATE medecin set nom= :nom, prenom= :prenom, departement= :departement, specialite= :specialite, mail= :mail, mdp= :mdp, image_profil= :image_profil WHERE id='$id'";
  $request = $db->prepare($updating);
  $update_tab = $request->execute(array(
    'nom'=>$tab_medecin->getNom(),
    'prenom'=>$tab_medecin->getPrenom(),
    'departement'=>$tab_medecin->getDepartement(),
    'specialite'=>$tab_medecin->getSpecialite(),
    'mail'=>$tab_medecin->getMail(),
    'mdp'=>$tab_medecin->getMdp(),
    'image_profil'=>$tab_medecin->getImage_profil()
  ));

  if($update_tab == true){
    header('Location:../view/index_medecin.php');

       }
       else {
         echo "erreur de modification";
               }
}

function update_real_user(user $tab_user,$id){
  $db = $this->connexion_bd();
  $updating = "UPDATE user set nom= :nom, prenom= :prenom, mail= :mail, mutuelle= :mutuelle, mdp=:mdp, adresse=:adresse, image_profil=:image_profil WHERE id='$id'";
  $request = $db->prepare($updating);
  $update_tab = $request->execute(array(
    'nom'=>$tab_user->getNom(),
    'prenom'=>$tab_user->getPrenom(),
    'mail'=>$tab_user->getMail(),
    'mutuelle'=>$tab_user->getMutuelle(),
    'mdp'=>$tab_user->getMdp(),
    'adresse'=>$tab_user->getAdresse(),
    'image_profil'=>$tab_user->getImage_profil()
  ));

  if($update_tab == true){
    header('Location:../view/index.php');

       }
       else {
         echo "erreur de modification";
               }
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



function specialite_medecin(){
  //Permet d'afficher la spécialité des médecins
  $db = $this->connexion_bd();
  $select = "SELECT specialite from medecin";
  $request = $db->query($select);
  $tableau = $request->fetchall();
  $new_tab = [];
  for ($i=0; $i < count($tableau) ; $i++) {
    array_push($new_tab,$tableau[$i][0]);
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
        header('Location:../view/index.php');
  }

}

//Fonction interface medecin
function gerer_rdv(){
  $db = $this->connexion_bd();
  $affiche = "SELECT * from medecin Where specialite='$specialite'";
  $request = $db->query($affiche);
  $tableau = $request->fetch();

  $_SESSION["nom_medecin"] = $tableau['nom'];
  $_SESSION["medecin_email"] = $tableau["mail"];
  $_SESSION["id_medecin"] = $tableau["id"];
  echo $rdv;
  for ($i=1; $i < 6 ; $i++) {
  echo "</br>".$tableau[$i];
}
//faire un bouton supprimer dans rdv


}
function ajout_rdv($array){
  $db = $this->connexion_bd();
  $nom_patient = $array['nom_patient'];
  $affiche = "SELECT id from user Where nom='$nom_patient'";
  $request = $db->query($affiche);
  $id_user = $request->fetch();
  session_start();
  $request = $db->prepare('INSERT INTO rdv(id_medecin, id_user, date, heure ,nom_medecin,nom_patient) VALUES(:id_medecin, :id_user, :date, :heure ,:nom_medecin,:nom_patient)');
             $insert_rdv = $request->execute(array(
                 'id_medecin' => $_SESSION['id_medecin'],
                 'id_user' => $id_user['id'],
                 'date' => $array['date'],
                 'heure' => $array['heure'],
                 'nom_medecin' => $_SESSION['nom_medecin'],
                 'nom_patient'=> $array['nom_patient']
               ));
  $insert_rdv = $request->fetch();
  if(isset($insert_rdv)){
    //pop up ajout rendez -vous
      header("Location:../view/index_medecin.php");
  }
  else{
    echo "erreur d'ajout";
  }
}


function affiche_rdv($id_user){
  $db = $this->connexion_bd();
  $affiche = "SELECT date,heure,nom_medecin,nom_patient,id from rdv Where id_user='$id_user'";
  $request = $db->query($affiche);
  $tab_bdd = $request->fetchall();
  $new_id = [];
  $num = "SELECT id from rdv Where id_user='$id_user'";
  $request_id = $db->query($num);
  $id_tableau = $request_id->fetchall();
  for ($i=0; $i < count($id_tableau) ; $i++) {
    foreach (array_unique($id_tableau[$i]) as $key => $value) {
      $variable = $value;
      array_push($new_id,$variable);
    }
}
  if(isset($tab_bdd)){
    echo "<table>";
     echo "<thead>";
     echo "<tr>";
     echo "<th>Date</th>";
     echo "<th>Heure</th>";
     echo "<th>Nom du Docteur</th>";
     echo "<th>Nom du patient</th>";
     echo "<th>Numéro rdv</th>";
     echo "<th>Supprimer rdv</th>";
     echo "</tr>";
     echo "</thead>";
     echo "<tbody>";

$id_tableau = [];
$valeur = array_values($tab_bdd);
for ($i=0; $i < count($valeur); $i++) {
  echo "<tr>";
  foreach(array_unique($valeur[$i]) as $key => $value){
    echo "<td>";
    echo $value;
    echo "</td>";
    if($key == 'id'){
      echo "<td>";
      echo "<a href='traitement_suppression_rdv.php?delete=$value'>Supprimer</a>";
      echo "</td>";
    }
  }
  echo "</tr>";
}
echo "</tbody>";
echo "</table>";
}
else{
  echo "Warning vous n'avez pas de rdv";
}
}

function heure($rdv){
  //heure
  $db = $this->connexion_bd();
  $affiche = "SELECT heure,date from horaire";
  $information_medecin = "SELECT id,nom from medecin Where mail='$rdv'";
  //tableau des horaire
  $information_nombre_medecin = "SELECT heure from rdv where heure in (select heure from horaire)" ;
  $nbrmed = $db->query($information_nombre_medecin);
  $nombre_medecin = $nbrmed->fetchall();
  $somme = 0;
  $somme_2 = 0;
  $somme_3 = 0;

  for ($i=0; $i < count($nombre_medecin); $i++) {
    foreach (array_unique($nombre_medecin[$i]) as $key => $value) {

        $somme  += substr_count($value, '11:10:00');
        $somme_2  += substr_count($value, '12:20:00');
        $somme_3  += substr_count($value, '15:10:00');

    }
  }
  $path = '../traitement/traitement_gestion_rdv.php';
  if($somme + $somme_2 + $somme_3 > 40){
      $path = "../view/pop_up_horaire.php";
  }
  else{
    $path = '../traitement/traitement_gestion_rdv.php';
  }
  $med = $db->query($information_medecin);
  $coord_medecin = $med->fetch();
  $reserver = array_unique($coord_medecin);
  $_SESSION["nom_medecin"] = $reserver['nom'];
  $_SESSION["medecin_email"] = $rdv;
  $_SESSION["id_medecin"] = $reserver["id"];

  $request = $db->query($affiche);
  $horaire = $request->fetchall();
  $annee = ['2020','2021','2022'];
  $heure = ['11:10:00','12:20:00','15:10:00'];
  $jours = ['Lundi','Mardi','Mercredi','Jeudi','Vendredi','Samedi'];
  $mois = ['Janvier','Février','Mars','Avril','Mai','Juin','Juillet','Aout','Septembre','Octobre','Novembre','Décembre'];
  echo '<div class="form">';
  echo '<h3>Docteur '.$_SESSION["nom_medecin"].'</h3>';
  echo '<form  action='.$path.' method=post>';

//Annee

  echo '<select name="annee">';
  for ($i=0; $i < count($annee); $i++) {
      echo '<option value='.$i.'>'.$annee[$i].'</option>';

  }
  echo '</select>';
//mois

  echo '<select name="mois">';
  for ($i=0; $i < count($mois); $i++) {
      echo '<option value='.$i.'>'.$mois[$i].'</option>';

  }
  echo '</select>';


//Jours
echo '<select name="jours">';
for ($i=0; $i < count($jours); $i++) {
    echo '<option value='.$i.'>'.$jours[$i].'</option>';

}
echo '</select>';

//Date
  echo '<select name="date">';
  for ($i=1; $i < 32; $i++) {
      echo '<option value='.$i.'>'.$i.'</option>';

  }
  echo '</select>';

    //heure
    echo '<select name="heure">';
    for ($i=0; $i < count($heure); $i++) {
        echo '<option value='.$heure[$i].'>'.$heure[$i].'</option>';

    }
    echo '</select>';


    echo '<input class="btn" type="submit"></input>';

    echo '</form>';
    echo '</div>';


}
function delete($delete){
  $db = $this->connexion_bd();
  $suppression = "DELETE from rdv Where id='$delete'";
  $request = $db->query($suppression);
  $tableau = $request->fetchall();
  if(isset($tableau)){
    header("Location:../view/index.php");
  }else{
    echo "Erreur lors de la suppression";
  }

}
function delete_patient($delete){
  $db = $this->connexion_bd();
  $suppression = "DELETE from rdv Where id='$delete'";
  $request = $db->query($suppression);
  $tableau = $request->fetchall();
  if(isset($tableau)){
    header("Location:../view/index_medecin.php");
  }else{
    echo "Erreur lors de la suppression";
  }

}

}



?>
