<?php


class Teilnehmer{

$id = 0;
$vorname = "";
$nachname = "";
$email = "";
$token = "";

public function setID($id){
   $this->id = $id;
}
public function getID(){
  return $this->id;
}
public void function setVorname($vorname){
   $this->vorname = $vorname;
}
public function getVorname(){
  return $this->vorname;
}
public void function setNachname($nachname){
   $this->nachname = $nachname;
}
public function getNachname(){
  return $this->nachname;
}
public void function setEmail($email){
   $this->email = $email;
}
public function getEmail(){
  return $this->email ;
}
public void function setToken($token){
   $this->token = $token;
}
public function getToken(){
  return $this->token;
}




}


?>
