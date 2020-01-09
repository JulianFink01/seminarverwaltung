<?php

class Fortbildung{

$id = 0;
$name = "";
$status = false;


public function setId($id){
  $this->id = $id;
}
public function getId(){
  return $this->id;
}
public function setName($name){
  $this->name = $name;
}
public function getName(){
  return $this->name;
}
public function setStatus($status){
  $this->status = $status;
}
public function getStatus(){
  return $this->status;
}
}


?>
