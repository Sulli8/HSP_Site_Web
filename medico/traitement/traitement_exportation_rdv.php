<?php

try{
  require_once($_SERVER['DOCUMENT_ROOT']."/HSP_Site_Web/medico/manager/manager.php");
  $manager = new Manager();
  $dbco = $manager->connexion_bd();
  $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $sql = "SELECT * FROM rdv";
  $sth = $dbco->prepare($sql);
  $sth->execute();

  $newExportation = $sth->fetchAll();

  $excel = "";
  $excel .=  "ID\tId_médecin\tId_user\tDate_rdv\tCreneau_rdv\tNom_médecin\tNom_patient\n";

  foreach($newExportation as $row) {
    $excel .= "$row[id]\t$row[id_medecin]\t$row[id_user]\t$row[date_rdv]\t$row[creneau_rdv]\t$row[nom_medecin]\t$row[nom_patient]\n";
  }

  header("Content-type: application/vnd.ms-excel");
  header("Content-disposition: attachment; filename=exportation_rdv.xls");

  print $excel;
  exit;

           }

           catch(PDOException $e){
               echo "Erreur : " . $e->getMessage();
           }

?>
