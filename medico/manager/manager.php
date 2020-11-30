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
  function connexion_mysqli(){
    try
        {
            $mysqli = mysqli_connect("localhost", "root", "", "bdd_hsp");
        }
        catch(Exception $e)
        {
            die('ERREUR:'.$e->getMessage());
        }
        return $mysqli;

  }

function inscription_medecin($medecin){
  $mysqli = $this->connexion_mysqli();
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
  $insert = $mysqli->query("INSERT INTO medecin(nom, prenom,departement, specialite, mail, pass,medecin,admin)
  VALUES('$nom', '$prenom', '$departement', '$specialite', '$mail', '$pass','1','0')");
  if($insert != null ){
    header("Location:../view/interface_admin/index.php");
  }
  else{
      header('location: ../view/interface_admin/index.php?w40n6-6iop');
  }

}

function inscription_admin($admin){
  $mysqli = $this->connexion_mysqli();
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
  $insert = $mysqli->query("INSERT INTO user(nom, prenom, adresse, ville, mail, pass, mutuelle, vkey,medecin,admin)
  VALUES('$nom', '$prenom', '$addr', '$ville', '$email', '$pass', '$mutuelle', '$vkey','0','1')");
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

function ajout_rdv($rdv){
  $mysqli = $this->connexion_mysqli();
  $db = $this->connexion_bd();
  session_start();
  $id_medecin = $_SESSION['id'];
  $date_rdv = $rdv['date_rdv'];
  $creneau_rdv = $rdv['creneau_rdv'];
  $nom_patient = $rdv['nom_patient'];

  $search = "SELECT id from user Where nom='$nom_patient'";
  $request = $db->query($search);
  $tableau = $request->fetch();
  $id_user = $tableau[0];

  var_dump($id_user);
  var_dump($id_medecin);
  $search_med = "SELECT nom from medecin Where id='$id_medecin'";
  $request_2 = $db->query($search_med);
  $tableau_med = $request_2->fetch();

  $nom_medecin = $tableau_med[0];

  $insert = $mysqli->query("INSERT INTO rdv(id_medecin, id_user,date_rdv, creneau_rdv, nom_medecin, nom_patient)
  VALUES('$id_medecin', '$id_user', '$date_rdv', '$creneau_rdv', '$nom_medecin', '$nom_patient')");

  if($insert != null){
    header("Location:../view/interface_medecin/index.php");
  }else {
    echo "erreur";
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
  if($tableau != null){
    header("Location:../view/interface_medecin/index.php");
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
