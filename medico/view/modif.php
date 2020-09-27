<?php
require_once($_SERVER['DOCUMENT_ROOT']."/HSP_Site_Web/medico/manager/manager.php");
include "../include/header.php";
include "../include/import.php";

$val = $_GET['modifier'];

$_SESSION['val'] = $val;
$pages =["nom","prenom","mail","mutuelle","mdp","adresse"];
for ($i=0; $i < count($pages) ; $i++) {
  if($val == $pages[$i]){
     ?>
    <form style='margin-top:100px;' action='../traitement/traitement_modification.php' method=POST>
    <div class='form-group'>
      <label ><?php echo $val;?></label>
      <input type='text' name='<?php echo $val;?>' class='form-control' id='<?php echo $val;?>' placeholder='Enter <?php echo $val;?>'>
    </div>

    <input type='submit' value="<?php echo "Update".$val;?>" class='btn btn-primary'> </input>
  </form>
  <?php
  }
}
?>
