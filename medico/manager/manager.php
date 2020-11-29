<?php

class manager {
  function connexion_bd(){
    try
        {
            $bdd = new PDO('mysql:host=localhost;dbname=bdd_hsp;charset=utf8','root','root');
        }
        catch(Exception $e)
        {
            die('ERREUR:'.$e->getMessage());
        }
        return $bdd;

  }

function inscription_medecin($medecin){
  $mysqli = mysqli_connect("localhost:3308", "root", "", "bdd_hsp");
  $nom = $mysqli->real_escape_string($medecin['nom']);
  $prenom = $mysqli->real_escape_string($medecin['prenom']);
  $departement = $mysqli->real_escape_string($medecin['departement']);
  $specialite = $mysqli->real_escape_string($medecin['specialite']);
  $mail = $mysqli->real_escape_string($medecin['mail']);
  $pass = $mysqli->real_escape_string($medecin['pass']);
  //Generate vkey
  $pass = md5(time().$nom);
  //Insert Account into the database
  $pass = md5($pass);
  $insert = $mysqli->query("INSERT INTO medecin(nom, prenom,departement, specialite, mail, pass)
  VALUES('$nom', '$prenom', '$departement', '$specialite', '$mail', '$pass')");
  if($insert != null ){
    header("Location:../view/interface_admin/index.php");
  }
  else{
      header('location: ../view/interface_admin/index.php?w40n6-6iop');
  }

}

function inscription_admin($admin){
  $mysqli = mysqli_connect("localhost:3308", "root", "", "bdd_hsp");
  $nom = $mysqli->real_escape_string($admin['nom']);
  $prenom = $mysqli->real_escape_string($admin['prenom']);
  $email = $mysqli->real_escape_string($admin['mail']);
  $pass = $mysqli->real_escape_string($admin['pass']);
  $addr = $mysqli->real_escape_string('aucune');
  $ville = $mysqli->real_escape_string('aucune');
  $mutuelle = $mysqli->real_escape_string('aucune');
  $vkey = md5(time().$prenom);
  //Generate vkey
  $pass = md5(time().$nom);
  //Insert Account into the database
  $pass = md5($pass);
  $insert = $mysqli->query("INSERT INTO user(nom, prenom, adresse, ville, mail, pass, mutuelle, vkey,admin)
  VALUES('$nom', '$prenom', '$addr', '$ville', '$email', '$pass', '$mutuelle', '$vkey','0')");
  if($insert != null ){
    header("Location:../view/interface_admin/index.php");
  }
  else{
      header('location: ../view/interface_admin/index.php?w40n6-6iop');
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
  $updating = "UPDATE user set nom= :nom, prenom= :prenom, mail= :mail, mutuelle= :mutuelle, mdp= :mdp, adresse= :adresse, image_profil= :image_profil WHERE id='$id'";
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
    $index_key = ['nom','prenom','departement','specialite','mail'];
    session_start();


    if(isset($tableau[0])){
          echo "<table class='table table-dark'>";
          echo "  <th class='bg-primary'scope='col'>Coordonnées médecin</th>";
      foreach (array_unique($tableau[0]) as $key => $value) {
        echo "<tr>";
          for ($i=0; $i < count($index_key) ; $i++) {
            if($i%2 != 0){$class= 'bg-primary';}else{$class='orange';}
            if($key == $index_key[$i]){
            echo "<td class='$class'>".ucwords($key)." : ".$value.'</td>';
            }
          }
          echo "</tr>";

        }
        echo "<table>";
        echo "<a href='../view/index.php'class='btn btn-primary'>Retour à l'accueil</a>";
      }
      else{
      echo "<script>window.alert('Erreur de recherche médecin');
document.location.href='../view/index.php';

      </script>";
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
  $affiche = "SELECT nom,prenom,departement,specialite,mail from medecin Where specialite='$specialite'";
  $request = $db->query($affiche);
  $tableau = $request->fetch();

  $_SESSION["nom_medecin"] = $tableau['nom'];
  $_SESSION["medecin_email"] = $tableau["mail"];
//  $_SESSION["id_medecin"] = $tableau["id"];
  $icone = ['fas fa-signature','fas fa-fingerprint','fas fa-house-user','fas fa-stethoscope','fas fa-at'];
  for ($i=0; $i < 5; $i++) {
    $new_icone = $icone[$i];
  echo "</br><p><i class='$new_icone'></i>".$tableau[$i]."</p>";
}

}

function gestion_rdv($date_rdv,$creneau_rdv,$nom_medecin,$mail_patient){
  $db = $this->connexion_bd();
  $creneau_1 = 0;
  $creneau_2 = 0;
  $creneau_3 = 0;
  $creneau_4 = 0;
  $creneau_5 = 0;

  if($creneau_rdv == "9h00-10h00"){ $creneau_1 = 1;}
  else if($creneau_rdv == "10h00-11h00"){$creneau_2 = 1;}
  else if($creneau_rdv == "11h00-12h00"){$creneau_3 = 1;}
  else if($creneau_rdv == "14h00-15h00"){$creneau_4 = 1;}
  else if($creneau_rdv == "15h00-16h00"){$creneau_5 = 1;}

  $request = $db->prepare('INSERT INTO prise_rdv(nom_medecin,creneau_1,creneau_2,creneau_3,creneau_4,creneau_5,date_rdv,creneau_rdv,mail_patient) VALUES(:nom_medecin,:creneau_1,:creneau_2,:creneau_3,:creneau_4,:creneau_5,:date_rdv,:creneau_rdv,:mail_patient)');
             $insert_rdv = $request->execute(array(
                 'nom_medecin' => $nom_medecin,
                 'creneau_1' => $creneau_1,
                 'creneau_2'=> $creneau_2,
                 'creneau_3'=> $creneau_3,
                 'creneau_4'=>$creneau_4,
                 'creneau_5'=>$creneau_5,
                 'date_rdv' => $date_rdv,
                 'creneau_rdv' => $creneau_rdv,
                 'mail_patient'=>$mail_patient
               ));
  if(isset($insert_rdv)){
    header('Location:../view/index.php');
  }else{
    echo "<script>window.alert('Erreur de gestion de rdv');
    document.location.href='../view/index.php';

    </script>";
}
}





function delete($delete){
  $db = $this->connexion_bd();
  $suppression = "DELETE from rdv Where id='$delete'";
  $request = $db->query($suppression);
  $tableau = $request->fetchall();


  if(isset($tableau)){
    header("Location:../view/index.php");
  }else{
    echo "<script>window.alert('Erreur suppression');
document.location.href='../view/index.php';

    </script>";
  }

}


function delete_rdv_admin($delete){
  $db = $this->connexion_bd();
  $suppression = "DELETE from rdv Where id='$delete'";
  $request = $db->query($suppression);
  $tableau = $request->fetchall();


  if(isset($tableau)){
    header("Location:../view/interface_admin/index.php");
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

function delete_user($delete){
  $db = $this->connexion_bd();
  $suppression = "DELETE from user Where id='$delete'";
  $request = $db->query($suppression);
  $tableau = $request->fetch();
  var_dump($tableau);
  //if(isset($tableau)){
  //  header("Location:../view/interface_admin/index.php");
  //}else{
    //echo "Erreur lors de la suppression";
  //}

}

function delete_medecin($delete){
  $db = $this->connexion_bd();
  $suppression = "DELETE from medecin Where id='$delete'";
  $request = $db->query($suppression);
  $tableau = $request->fetchall();
  if(isset($tableau)){
    header("Location:../view/interface_admin/index.php");
  }else{
    echo "Erreur lors de la suppression";
  }

}




}
?>
