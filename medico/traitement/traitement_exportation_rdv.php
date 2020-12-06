<?php

try{
  //On appelle la classe manager
  require_once($_SERVER['DOCUMENT_ROOT']."/HSP_Site_Web/medico/manager/manager.php");
  //On instancie la variable $manager de type new Manager();
  $manager = new Manager();
  //On appelle la fonction conneixon_bd();
  $dbco = $manager->connexion_bd();
  //on appelle la fonction setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //On déclare la varibale $sql
  $sql = "SELECT * FROM rdv";
  //On prépare la requête sql
  $sth = $dbco->prepare($sql);
  //on execute le tableau
  $sth->execute();
  //On déclare la variable $newExportation
  $newExportation = $sth->fetchAll();
  //On déclare la variable $excel
  $excel = "";
  //On concatène la chaîne de caractère
  $excel .=  "ID\tId_médecin\tId_user\tDate_rdv\tCreneau_rdv\tNom_médecin\tNom_patient\n";
  //On parocurs le tableau $newExportation
  foreach($newExportation as $row) {
    //On concatène la chaîne de caractère afin d'afficher les colonne du fichier excel
    $excel .= "$row[id]\t$row[id_medecin]\t$row[id_user]\t$row[date_rdv]\t$row[creneau_rdv]\t$row[nom_medecin]\t$row[nom_patient]\n";
  }
  //On rédirige le traitement vers le type de fichier
  header("Content-type: application/vnd.ms-excel");
  //On rédirige le nom du fichier
  header("Content-disposition: attachment; filename=exportation_rdv.xls");
  //On affiche le nom de colonnes
  print $excel;
  //Fin de programme
  exit;

           }

           catch(PDOException $e){
               echo "Erreur : " . $e->getMessage();
           }

?>
