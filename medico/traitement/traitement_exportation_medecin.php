<?php

try{
  require_once($_SERVER['DOCUMENT_ROOT']."/Monhopital/medico/manager/manager.php");
  $manager = new Manager();
  $dbco = $manager->connexion_bd();
  $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $sql = "SELECT * FROM medecin";
  $sth = $dbco->prepare($sql);
  $sth->execute();

  $newExportation = $sth->fetchAll();

  $excel = "";
  $excel .=  "ID\tNom\tPrénom\tDépartement\tSpécialité\tMail\tPass\n";

  foreach($newExportation as $row) {
    $excel .= "$row[id]\t$row[nom]\t$row[prenom]\t$row[departement]\t$row[specialite]\t$row[mail]\t$row[pass]\n";
  }

  header("Content-type: application/vnd.ms-excel");
  header("Content-disposition: attachment; filename=exportation_medecin.xls");

  print $excel;
  exit;

           }

           catch(PDOException $e){
               echo "Erreur : " . $e->getMessage();
           }

?>
