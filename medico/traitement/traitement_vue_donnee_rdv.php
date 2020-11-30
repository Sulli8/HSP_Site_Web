
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

<?php

require_once($_SERVER['DOCUMENT_ROOT']."/HSP_Site_Web/medico/manager/manager.php");
$manager = new Manager();
$db = $manager->connexion_bd();
$medecin = "SELECT id_medecin,date_rdv,creneau_rdv,nom_medecin,nom_patient,id_user from rdv";
$request = $db->query($medecin);
$tab_connect = $request->fetchall();
 ?>
 <table class="table table-dark">
   <thead>
     <tr>
       <th scope="col">Id médecin</th>
       <th scope="col">Date rdv</th>
        <th scope="col">Creneau rdv</th>
        <th scope="col">Nom médecin</th>
        <th scope="col">Nom patient </th>
        <th scope="col">Id_user</th>
       <th scope="col">Suppression</th>
     </tr>
   </thead>
   <tbody>

      <?php for ($i=0; $i < count($tab_connect); $i++) {?>
<tr>
      <?php  foreach (array_unique($tab_connect[$i]) as $key => $value) {
        ?>
          <td class='bg bg-dark'><?php echo $value; ?></td>
        <?php     if($key == 'id_user'){ echo "<td class='bg bg-dark'><a href='traitement_suppression_admin_rdv.php?delete=$value'class='btn btn-danger'>Supprimer<a/></td>";}?>
  <?php  } ?>
</tr>
   <?php

      }

    ?>



   </tbody>
 </table>
