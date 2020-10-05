<?php

require_once($_SERVER['DOCUMENT_ROOT']."/HSP_Site_Web/medico/manager/manager.php");
$manager = new Manager();
include "../include/import.php";
include "../include/header.php";
 ?>

 <link rel='stylesheet' type='text/css' href='prise_rdv.css'>


<div class="centrage">


<?php if(isset($_SESSION["mail"])){ ?>

<?php $manager->prise_rdv(); } else{ ?>
</div>

<!-- POP UP -->
<?php } ?>
