<?php
  require_once($_SERVER['DOCUMENT_ROOT']."/Monhopital/medico/model/user.php");
class medecin extends user {
  private $departement,$specialite;

  public function getDepartement(){
    return $this->departement;
  }
  public function getSpecialite(){
    return $this->specialite;

  }

  public function setDepartement($departement){
    return $this->departement = $departement;
  }
  public function setSpecialite($specialite){
    return $this->specialite = $specialite;
  }



}

 ?>
