<?php

class Controller{

    private $context = array();


    public function run($aktion){
        $this->$aktion();
        $this->generatePage($aktion);
    }

    // Alle Seminartermine auslesen
    public function alleST(){
      $this->addContext("seminartermine", Seminartermin::findeAlle());
    }

    public function loescheST(){
        $seminarTermin = Seminartermin::finde($_GET["st_id"]);
        $seminarTermin->loesche();
        header("Location: index.php");
    }

    public function detailsAnschauen(){
        $this->addContext("seminardetails", Seminar::finde($_GET["seminar_id"]));
    }

    private function generatePage($template){
        extract($this->context);
        require_once 'view/'.$template.".tpl.php";

    }

    private function addContext($key, $value){
        $this->context[$key] = $value;
    }
}

?>
