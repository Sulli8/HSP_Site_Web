<?php
require_once($_SERVER['DOCUMENT_ROOT']."/HSP_Site_Web/medico/model/user.php");
class messagerie extends user {
private $message,$objet_message,$destinataire;

public function getMessage(){
  return $this->message;
}
public function getObjet_message(){
  return $this->objet_message;
}
public function getDestinataire(){
  return $this->destinataire;
}
public function setMessage($message){
  return $this->message = $message;
}
public function setDestinataire($destinataire){
  return $this->destinataire = $destinataire;
}
public function setObjet_message($objet_message){
  return $this->objet_message = $objet_message;
}



}

 ?>
