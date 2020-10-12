

 <link rel='stylesheet' type='text/css' href='prise_rdv.css'>


<body class="">



   <?php

      require_once($_SERVER['DOCUMENT_ROOT']."/HSP_Site_Web/medico/manager/manager.php");
      $manager = new Manager();
  $manager->links_rdv();
       ?>





</body>
