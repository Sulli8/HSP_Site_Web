<?php
require_once($_SERVER['DOCUMENT_ROOT']."/HSP_Site_Web/medico/manager/manager.php");
include "../include/header.php";
include "../include/import.php";

$val = $_GET['modifier'];
$_SESSION['val'] = $val;
$classe = "form-control";
$text = "text";
$pages =["nom","prenom","mail","mutuelle","mdp","adresse"];
for ($i=0; $i < count($pages) ; $i++) {
  if($val == $pages[$i]){
    echo "<form style='margin-top:100px;' method=post action='../traitement/traitement_modification.php'>
    <div class='form-group'>
      <label >$val</label>
      <input type='$text' name='$val' class='$classe' id='$val' placeholder='Enter $val'>
    </div>

    <a type='submit' href class='btn btn-primary'>Update $val</button>
  </form>";
  }
}


 ?>
