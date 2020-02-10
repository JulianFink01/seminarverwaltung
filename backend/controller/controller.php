<?php

class Controller{

    private $context = array();


    public function run($aktion){
        $this->$aktion();
        $this->generatePage($aktion);
    }

    public function hauptseite(){
        $this->addContext("fortbildungen", Fortbildung::findeAlle());
        
        }
    }


    public function alle_Kurse(){
      $this->addContext("kurse", Kurs::findeNachFortbildung(Fortbildung::finde($_GET['fortbildung_id'])));
      $this->addContext("teilnehmern", Fortbildung::findeAlleTeilnehmer(Fortbildung::finde($_GET['fortbildung_id'])));

    }

    public function alleT(){
      $this->addContext("kurse", Teilnehmer::findeAlle());
    }

    public function speichereF(){
      $fortbildung = Fortbildung::findeAlle();
      $fortbildung->speichere();
      header("Location: index.php");
    }
    public function speichereK(){
      $kurs = Kurs::findeAlle();
      $kurs->speichere();
      header("Location: index.php");
    }


    public function loescheF(){
        $fortbildung = Fortbildung::finde($_GET["f_id"]);
        $fortbildung->loesche();
        header("Location: index.php");
    }
    public function loescheK(){
      $kurs = Kurs::finde($_GET["k_id"]);
      $kurs->loesche();
      header("Location: index.php");
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
