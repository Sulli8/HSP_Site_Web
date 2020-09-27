<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <?php
      require_once($_SERVER['DOCUMENT_ROOT']."/HSP_Site_Web/medico/manager/manager.php");
      $manager = new Manager();
      $manager->include_forms();
    ?>
    <title></title>
  </head>
  <body>
    <div style="height:100px;"></div>
    <?php

    require_once($_SERVER['DOCUMENT_ROOT']."/HSP_Site_Web/medico/manager/manager.php");
    $manager->include_header();
    $manager->select_button($_SESSION['mail'],$_SESSION['mdp']);
?>
  </body>
</html>
