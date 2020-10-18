<?php include '../include/import.php'; ?>
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>medical</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel='stylesheet' type='text/css' href='../css/style_nav_hsp.css'>
          <link rel='stylesheet' type='text/css' href='../css/style_affiche_horaire.css'>

</head>

<?php
include '../include/header.php';

require_once($_SERVER['DOCUMENT_ROOT']."/HSP_Site_Web/medico/manager/manager.php");
$manager = new Manager();
$rdv = $_GET['rdv'];
$manager->heure($rdv);
?>
