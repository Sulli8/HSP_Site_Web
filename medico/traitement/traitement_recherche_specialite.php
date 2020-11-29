<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/style_nav_hsp.css">
        <link rel="stylesheet" href="../css/style_recherche_specialite.css">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Permanent+Marker&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/8a3192b16c.js" crossorigin="anonymous"></script>
</head>
<?php
require_once($_SERVER['DOCUMENT_ROOT']."/HSP_Site_Web/medico/manager/manager.php");

include "../include/header.php";
$manager = new Manager();

 ?>
<div class="search">
  <a href='../view/prise_rdv.php'> Prendre un rdv avec ce médecin ?</a>
<?php $manager->affiche_medecin($_POST['specialite']); ?>
</div>
