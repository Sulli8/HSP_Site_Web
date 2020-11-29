<?php

try{
  require_once($_SERVER['DOCUMENT_ROOT']."/Monhopital/medico/manager/manager.php");
  $manager = new Manager();
  $dbco = $manager->connexion_bd();
  $dbco->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $sql = "SELECT * FROM user";
  $sth = $dbco->prepare($sql);
  $sth->execute();

  $newExportation = $sth->fetchAll();

  $excel = "";
  $excel .=  "ID\tNom\tPrénom\tMail\tMutuelle\tAdmin\tMdp\tAdresse\tImage_profil\n";

  foreach($newExportation as $row) {
    $excel .= "$row[id]\t$row[nom]\t$row[prenom]\t$row[adresse]\t$row[ville]\t$row[mailn]\t$row[pass]\t$row[mutuelle]\t$row[verified]\t$row[pass]\t$row[verified]\t$row[vkey]\t$row[admin]\n";
  }

  header("Content-type: application/vnd.ms-excel");
  header("Content-disposition: attachment; filename=exportation_user.xls");

  print $excel;
  exit;

           }

           catch(PDOException $e){
               echo "Erreur : " . $e->getMessage();
           }

?>
