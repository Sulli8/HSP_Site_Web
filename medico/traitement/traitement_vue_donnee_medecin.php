
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
$medecin = "SELECT nom,prenom,departement,specialite,mail,mdp,id from medecin";
$request = $db->query($medecin);
$tab_connect = $request->fetchall();
 ?>
 <table class="table table-dark">
   <thead class="">
     <tr>
       <th scope="col">Nom</th>
       <th scope="col">Prenom</th>
       <th scope="col">Département</th>
       <th scope="col">Spécialité</th>
       <th scope="col">Mail</th>
       <th scope="col">Mdp</th>
         <th scope="col">Id</th>
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
  <?php       if($key == 'id'){ echo "<td class=".$class."><a href='traitement_suppression_medecin.php?delete=$value'class='btn btn-danger'>Supprimer<a/></td>";} } ?> </tr>

   <?php if($i%6 == 0){   echo "<tr></tr>";}

      }
    ?>
     </tr>
   </tbody>
 </table>
