
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

<?php
//On appelle la classe Manager();
require_once($_SERVER['DOCUMENT_ROOT']."/HSP_Site_Web/medico/manager/manager.php");
//On appelle la variable $manager de type new Manager();
$manager = new Manager();
//On appelle le fonction connexion_bd();
$db = $manager->connexion_bd();
//On déclare la variable $médecin de valeur "SELECT id_medecin,date_rdv,creneau_rdv,nom_medecin,nom_patient,id_user from rdv";
$medecin = "SELECT id_medecin,date_rdv,creneau_rdv,nom_medecin,nom_patient,id_user from rdv";
//On exécute la requête
$request = $db->query($medecin);
//On déclare le tableau de tableau $tab_connect
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

      <?php
      //On parcours le tableau $tab_connnect
      for ($i=0; $i < count($tab_connect); $i++) {?>
<tr>
       <!-- On parcours les tableaux du tableaux $tab_connect-->
      <?php
        foreach (array_unique($tab_connect[$i]) as $key => $value) {
        ?>
          <td class='bg bg-dark'><?php echo $value; ?></td>
        <?php
          //Si la clé vaut 'id' alors on affiche une cellule
           if($key == 'id_user'){ echo "<td class='bg bg-dark'><a href='traitement_suppression_admin_rdv.php?delete=$value'class='btn btn-danger'>Supprimer<a/></td>";}?>
  <?php  } ?>
</tr>
   <?php
      }

    ?>



   </tbody>
 </table>
