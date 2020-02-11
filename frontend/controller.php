<?php


class Controller{

  private $context = array();

  private $direction = "";

  public function run($aktion){
    $this->direction = $aktion;
    $this->$aktion();
    $this->generatePage($this->direction);
  }

  public function login(){

  }
  public function show_seminare(){
    if (isset ($_REQUEST['token'])){
        $token = $_REQUEST['token'];
        $this->addContext("user", Teilnehmer::findeNachToken($token));
        $this->direction = 'seminare';
      }
  }
  public function show_KursInfos(){
    if (isset ($_REQUEST['token'])){
        $token = $_REQUEST['token'];
        $kursId = $_REQUEST['kursId'];
        $this->addContext("user", Teilnehmer::findeNachToken($token));
        $this->addContext("kurs", Kurs::finde($kursId));
        $this->direction = 'kurs';
      }

  }

  public function abmelden(){
    $this->direction = "seminare";
    $kursId = $_REQUEST['kursId'];
    $token = $_REQUEST['token'];

    $this->addContext("user", Teilnehmer::findeNachToken($token));
    $kurs = Kurs::finde($kursId);
    $user = Teilnehmer::findeNachToken($token);
    $kurs->abmelden($user);
  }
  public function anmelden(){
    $this->direction = "seminare";
    $kursId = $_REQUEST['kursId'];
    $token = $_REQUEST['token'];

    $this->addContext("user", Teilnehmer::findeNachToken($token));
    $kurs = Kurs::finde($kursId);
    $user = Teilnehmer::findeNachToken($token);
    $kurs->teilnehmen($user);
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
