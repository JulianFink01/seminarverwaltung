<?php

class Controller{
//https://remotemysql.com/phpmyadmin/index.php
    private $context = array();


    public function run($aktion){
        $this->$aktion();
        $this->generatePage($aktion);
    }

    public function hauptseite(){
        $this->addContext("fortbildungen", Fortbildung::findeAlle());

    }
    public function alle_Kurse(){
      $this->addContext("kurse", Kurs::findeNachFortbildung(Fortbildung::finde($_GET['fortbildung_id'])));
      $this->addContext("teilnehmern", Fortbildung::findeAlleTeilnehmer(Fortbildung::finde($_GET['fortbildung_id'])));
      $this->addContext("fortbildung", Fortbildung::finde($_GET['fortbildung_id']));



    }
    public function kurse_erstellen(){

    }
    public function send_email(){
      Funktionen::send_email();
    }

    public function import_lehrer(){
      $alleLehrer = Funktionen::importLehrer();
      foreach ($alleLehrer as $lehrer) {
        // code...
      }
      $this->alle_Kurse();
      $this->addContext("template","alle_Kurse");
    }

    /*public function detailsAnschauen(){
        $this->addContext("seminardetails", Seminar::finde($_GET["seminar_id"]));
    }*/

    private function generatePage($template){
        extract($this->context);
        require_once 'views/'.$template.".tpl.php";

    }

    private function addContext($key, $value){
        $this->context[$key] = $value;
    }

}

?>
