<?php

class Controller{

    private $context = array();


    public function run($aktion){
        $this->$aktion();
        $this->generatePage($aktion);
    }


    public function alleF(){
      $this->addContext("fortbildungen", Fortbildung::findeAlle());
    }

    public function insertF(){
      $fortbildung = Fortbildung->speichere();
      header("Location: index.php");
    }

    public function loescheF(){
        $fortbildung = Fortbildung::finde($_GET["st_id"]);
        $fortbildung->loesche();
        header("Location: index.php");
    }

    public function alleK(){
      $this->addContext("kurse", Kurs::)
    }

    /*public function detailsAnschauen(){
        $this->addContext("seminardetails", Seminar::finde($_GET["seminar_id"]));
    }*/

    private function generatePage($template){
        extract($this->context);
        require_once 'view/'.$template.".tpl.php";

    }

    private function addContext($key, $value){
        $this->context[$key] = $value;
    }
}

?>
