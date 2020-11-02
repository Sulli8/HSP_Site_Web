
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<style>
.orange{
  background:  linear-gradient(180deg, #ffc164 0%, #f59300 46.12%, #f59300 97.02%);
}

</style>
<?php

require_once($_SERVER['DOCUMENT_ROOT']."/HSP_Site_Web/medico/manager/manager.php");
$manager = new Manager();
$db = $manager->connexion_bd();
$medecin = "SELECT date,heure,nom_medecin,nom_patient,id from rdv";
$request = $db->query($medecin);
$tab_connect = $request->fetchall();
 ?>
 <table class="table table-dark">
   <thead>
     <tr>
       <th scope="col">Date</th>
       <th scope="col">Heure</th>
       <th scope="col">Nom Médecin</th>
       <th scope="col">Heure</th>
        <th scope="col">id</th>
       <th scope="col">Suppression</th>
     </tr>
   </thead>
   <tbody>

      <?php for ($i=0; $i < count($tab_connect); $i++) {?>
<tr>
      <?php  foreach (array_unique($tab_connect[$i]) as $key => $value) {
        if($i%2 ==0){
          $class = 'bg-primary';
        }else { $class = 'orange';}
        ?>
          <td class=<?php echo $class; ?>><?php echo $value; ?></td>
        <?php     if($key == 'id'){ echo "<td class=".$class."><a href='traitement_suppression_admin_rdv.php?delete=$value'class='btn btn-danger'>Supprimer<a/></td>";}?>
  <?php  } ?>
</tr>
   <?php

      }

    ?>



   </tbody>
 </table>
