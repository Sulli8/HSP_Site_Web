<?php

try{
  require_once($_SERVER['DOCUMENT_ROOT']."/HSP_Site_Web/medico/manager/manager.php");
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
    $excel .= "$row[id]\t$row[nom]\t$row[prenom]\t$row[mail]\t$row[mutuelle]\t$row[admin]\t$row[mdp]\t$row[adresse]\t$row[image_profil]\n";
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
