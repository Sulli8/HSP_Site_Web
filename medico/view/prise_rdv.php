<?php

require_once($_SERVER['DOCUMENT_ROOT']."/HSP_Site_Web/medico/manager/manager.php");
$manager = new Manager();
include "../include/import.php";
include "../include/header.php";
 ?>

 <div style="margin-left:200px;margin-top:100px;">
<?php $manager->prise_rdv(); ?>

</div>
