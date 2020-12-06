<?php

class manager {

  function connexion_bd(){
    try
        {
          //on déclare la variable $bdd de valeur new PDO('mysql:host=localhost;dbname=bdd_hsp;charset=utf8','root','');
            $bdd = new PDO('mysql:host=localhost;dbname=bdd_hsp;charset=utf8','root','root');
        }
        catch(Exception $e)
        {
            die('ERREUR:'.$e->getMessage());
        }
        //On retourne la variable $bdd
        return $bdd;

  }
  function connexion_mysqli(){
    try
        {
          //on déclare la variable $myslqi de valeur mysqli_connect("localhost", "root", "", "bdd_hsp");
            $mysqli = mysqli_connect("localhost", "root", "root", "bdd_hsp");
        }
        catch(Exception $e)
        {
            die('ERREUR:'.$e->getMessage());
        }
        //on retourne la valeur $mysqli
        return $mysqli;

  }

  function inscription_medecin($medecin){
    //on déclare la variable $myslqi $this->connexion_mysqli();
    $mysqli = $this->connexion_mysqli();
    //On échappe les caractère
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
      //on redirige
      header("Location:../view/interface_admin/index.php");
    }
    else{
      //on redirige
        header('location: ../view/interface_admin/index.php?key=w40n6-6iop');
    }

  }

function inscription_admin($admin){
  //on déclare la variable $myslqi $this->connexion_mysqli();
  $mysqli = $this->connexion_mysqli();
  //On échappe les caractère
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
    //On redirige
    header("Location:../view/interface_admin/index.php?key=6k75viX9TOg");
  }
  else{
      //On redirige
      header('location: ../view/interface_admin/index.php?key=w40n6-6iop');
  }

}

function barre_de_recherche($recherche){
  //on appelle la fcontion connexion_bd
    $db = $this->connexion_bd();
    //On déclare la variable $serach "SELECT * from medecin Where nom Like '%$recherche'";
    $search = "SELECT * from medecin Where nom Like '%$recherche'";
    $request = $db->query($search);
    $tableau = $request->fetchall();
    $index_key = ['nom','prenom','departement','specialite','mail'];
    session_start();
    //Si le tableau existe alors...
    if(isset($tableau[0])){
          echo "<table class='table table-dark'>";
          echo "  <th class='bg-primary'scope='col'>Coordonnées médecin</th>";
          //On parcours le tableau tableau[0]
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
  //on appelle la fonction connexion_mysqli();
  $mysqli = $this->connexion_mysqli();
  // on appelle la fonction connexion_bd();
  $db = $this->connexion_bd();
  //on démarre une session
  session_start();
  //on déclare les variables $id_medecin,$date_rdv,$creneau_rdv,$nom_patient
  $id_medecin = $_SESSION['id'];
  $date_rdv = $rdv['date_rdv'];
  $creneau_rdv = $rdv['creneau_rdv'];
  $nom_patient = $rdv['nom_patient'];

  $search = "SELECT id from user Where nom='$nom_patient'";
  $request = $db->query($search);
  $tableau = $request->fetch();
  $id_user = $tableau[0];
  //On déclare les variables $search_med,$request_2,$tableau_med,  $nom_medecin
  $search_med = "SELECT nom from medecin Where id='$id_medecin'";
  $request_2 = $db->query($search_med);
  $tableau_med = $request_2->fetch();

  $nom_medecin = $tableau_med[0];

  $insert = $mysqli->query("INSERT INTO rdv(id_medecin, id_user,date_rdv, creneau_rdv, nom_medecin, nom_patient)
  VALUES('$id_medecin', '$id_user', '$date_rdv', '$creneau_rdv', '$nom_medecin', '$nom_patient')");
  //Si le tableau existe alors ...
  if($insert != null){
      //on redirige
    header("Location:../view/interface_medecin/index.php");
  }else {
    //On affiche une erreur
    header("Location:../view/interface_medecin/index.php?erreur_ajout=????");;
  }

}
function gestion_rdv($date_rdv,$creneau_rdv,$nom_medecin,$mail_patient){
  //On apelle le fonction connexion_bd();
  $db = $this->connexion_bd();
  //On déclare les variables   $creneau_1,$creneau_2,$creneau_3,$creneau_4,$creneau_5
  $creneau_1 = 0;
  $creneau_2 = 0;
  $creneau_3 = 0;
  $creneau_4 = 0;
  $creneau_5 = 0;
  //si le rdv exitse alors on lui attribue la valeur 1
  if($creneau_rdv == "9h00-10h00"){ $creneau_1 = 1;}
  else if($creneau_rdv == "10h00-11h00"){$creneau_2 = 1;}
  else if($creneau_rdv == "11h00-12h00"){$creneau_3 = 1;}
  else if($creneau_rdv == "14h00-15h00"){$creneau_4 = 1;}
  else if($creneau_rdv == "15h00-16h00"){$creneau_5 = 1;}
  //Insert into SQL
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
    //On redirige
    header('Location:../view/index.php');
  }else{
    echo "<script>window.alert('Erreur de gestion de rdv');
    document.location.href='../view/index.php';

    </script>";
}
}





function delete($delete){
  //on se connecte à la BDD
  $db = $this->connexion_bd();
  //on déclare la variable suppresison de valeur  "DELETE from rdv Where id='$delete'";
  $suppression = "DELETE from rdv Where id='$delete'";
  $request = $db->query($suppression);
  //On déclare le tableau de tableau $tableau
  $tableau = $request->fetchall();
  //si le tableau existe alors on redirige
  if(isset($tableau)){
    header("Location:../view/index.php");
  }else{
    //on affiche une erreur
    header("Location:../view/index.php?erreur_suppression=fY7qP4mK7");
  }
}


function delete_rdv_admin($delete){
  //on se connecte à la BDD
  $db = $this->connexion_bd();
  //on déclare la variable suppresison de valeur  "DELETE from rdv Where id='$delete'";
  $suppression = "DELETE from rdv Where id='$delete'";
  //ON déclare le tableau de tableau $tableau
  $request = $db->query($suppression);
  $tableau = $request->fetchall();
  //si le tableau existe alors on redirige
  if(isset($tableau)){
    //On redirige...
    header("Location:../view/interface_admin/index.php");
  }else{
    //on affiche une erreur
    header("Location:../view/interface_admin/index.php?erreur_admin=W4e4NjZz58p");
  }

}


function delete_patient($delete){
  //on se connecte à la BDD
  $mysqli = $this->connexion_mysqli();
  $tableau = $mysqli->query("DELETE FROM rdv WHERE id = '$delete'");
  //si le tableau exite alors..
   if($tableau != null){
     //on redirige
     header("Location:../view/interface_medecin/index.php");
   }else{
     //On redirige
     header("Location:../view/interface_medecinindex.php?erreur_patient=006OoLj6eeR");
   }

}

function delete_user($delete){
  //ON se connecte à la BDD
  $db = $this->connexion_bd();
  //on déclare la variable suppresison de valeur "DELETE from user Where id='$delete'";
  $suppression = "DELETE from user Where id='$delete'";
  $request = $db->query($suppression);
  $tableau = $request->fetch();
  //si le tableau exite alors..
  if($tableau != null){
    //on redirige
    header("Location:../view/interface_admin/index.php");
  }else{
    //on redirige
    header("Location:../view/interface_admin/index.php?erreur_user=290uREkd6uG");
  }

}

function delete_medecin($delete){
  //On se connecte à la BDD
  $db = $this->connexion_bd();
  //on déclare la variable suppresison de valeur "DELETE from medecin Where id='$delete'";
  $suppression = "DELETE from medecin Where id='$delete'";
  $request = $db->query($suppression);
  $tableau = $request->fetchall();
  //si le tableau exite alors..
  if(isset($tableau)){
    //on redirige
    header("Location:../view/interface_admin/index.php");
  }else{
    //On redirige
    header("Location:../view/interface_admin/index.php?erreur_medecin=9WwA0dhw66A");
  }

}
function offres_emploies($id_user,$tab_job){
  //On se connecte à la BDD
  $bdd = $this->connexion_bd();
  //on déclare la variable select de valeur "DELETE from user Where id='$delete'";
  $select = "SELECT nom from user Where id='$id_user'";
  $request_2 = $bdd->query($select);
  //On déclare la variable $tableau_med de valeur $request_2->fetch();
  $tableau_med = $request_2->fetch();
  //Si les id existe alors....
  if($id_user != null && $tab_job != null){
    //Insert INTO SQL
    $insert = $bdd->prepare('INSERT INTO candidature(metier,candidat,contrat,nom_entreprise) VALUES (:metier,:candidat,:contrat,:nom_entreprise)');
    $insert->execute(array(
        'metier' => $tab_job['metier'],
        'contrat' => $tab_job['contrat'],
        'candidat' => $tableau_med['nom'],
        'nom_entreprise'=>$tab_job['nom_entreprise']
    ));
    //Si insert existe alors...
    if($insert != null){
      //On redirige...
      header('Location:../view/index.php?key=2R9Vrz8x/?');
    }
    else{
      //On redirige...
      header('Location:../view/index.php?key=z2I6N7D2wzj');
    }
  }
}




}
?>
