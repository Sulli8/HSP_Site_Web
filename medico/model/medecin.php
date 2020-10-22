<?php
  require_once($_SERVER['DOCUMENT_ROOT']."/HSP_Site_Web/medico/model/user.php");
class medecin extends user {
  private $departement,$specialite;

  public function getDepartement(){
    return $this->departement;
  }
  public function getSpecialite(){
    return $this->specialite;

  }

  public function getImage_profil(){
    return $this->image;
  }
  public function setDepartement($departement){
    return $this->departement = $departement;
  }
  public function setSpecialite($specialite){
    return $this->specialite = $specialite;
  }
  public function setImage_profil($image){
    return $this->image = $image;
  }


}

 ?>
