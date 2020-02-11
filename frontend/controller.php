<?php

class Controller{

  private $context = array();


  public function run($aktion){
    $this->$aktion();
    $this->generatePage($aktion);
  }

  public function login(){
    if (isset ($_REQUEST['token'])){
        $token = $_REQUEST['token'];
    $this->addContext("teilnehmer", Teilnehmer::findeNachToken($token));
    $aktion='seminare';
  }
}
  public function alleFortbildungen(){
    $this->addContext("fortbildung", Fortbildung::findeAlle());
  }

  private function generatePage($template){
    extract($this->context);
    require_once 'views/'.$template.".tpl.html";
  }
  private function addContext($key, $value){
    $this->context[$key] = $value;
  }
}



 ?>
