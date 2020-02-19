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
    public function saveFortbildung(){
      $fortbildung = new Fortbildung(array("name"=>$_POST['titel'],"status"=>1));
      $fortbildung->speichere();
      header("Location: index.php?aktion=hauptseite");
    }
    public function alle_Kurse(){

      $this->addContext("kurse", Kurs::findeNachFortbildung(Fortbildung::finde($_GET['fortbildung_id'])));
      $this->addContext("teilnehmern", Fortbildung::findeAlleTeilnehmer(Fortbildung::finde($_GET['fortbildung_id'])));
      $this->addContext("fortbildung", Fortbildung::finde($_GET['fortbildung_id']));



    }
    public function kurse_erstellen(){
      if ($_POST){
        $kurs = new Kurs($_POST);
        echo $kurs;
        $kurs->speichere();
        $this->alle_Kurse();
        $this->addContext("template","alle_Kurse");
      }

    }
    public function send_email(){
      Funktionen::send_email();
    }
    public function login(){
      if(isset($_GET["key"]) && isset($_GET["passwd"])){
      if($_GET["key"] == "test" && $_GET["passwd"] == "test"){
      $_SESSION["loggedIn"] = true;
      header('Location: index.php?aktion=hauptseite');
      }else{

      }
    }
    }
    public function import_lehrer(){
      $alleLehrer = Funktionen::importLehrer();

      foreach ($alleLehrer as $lehrer) {

        //checken ob teilnehmer/lehrer in datenbank schon vorhanden ist
        $teilnehmer = Teilnehmer::findeNachEmail($lehrer["Email"]);

        if($teilnehmer == false){//wenn leherer keine email haben, sind nicht in DB
          $teilnehmer = new Teilnehmer();
          $teilnehmer->setVorname($lehrer["Vorname"]);
          $teilnehmer->setNachname($lehrer["Nachname"]);
          $teilnehmer->setEmail($lehrer["Email"]);
          $teilnehmer->speichere();
        }

        if (NimmtTeil::findeNachFortbildungUndTeilnehemer(Fortbildung::finde($_GET['fortbildung_id']) , $teilnehmer) == false){
          $teilnehmerNimmt = new NimmtTeil();
          $teilnehmerNimmt->setFortbildung_id($_GET['fortbildung_id']);
          $teilnehmerNimmt->setTeilnehmer_id($teilnehmer->getId());
          $teilnehmerNimmt->speichere();
        }
        // Teilnehmer zu NimmtTeil hinzufügens
      }
      $this->alle_Kurse();
      $this->addContext("template","alle_Kurse");
    }

    public function remove_lehrer_nimmtTeil(){
        //checken bei welchem teilnehmer/lehrer der butten gedrückt wurde
        $teilnehmer = Teilnehmer::finde($_GET["teilnehmer_id"]);
        Fortbildung::finde($_GET["fortbildung_id"])->abmelden($teilnehmer);
        // Teilnehmer zu NimmtTeil entfernen
      $this->alle_Kurse();
      $this->addContext("template","alle_Kurse");
    }

    public function loesche(){
      $kurs = Kurs::finde($_GET['kurs_id']);
      $kurs->loesche();
      header('Location: index.php?aktion=alle_kurse&fortbildung_id='.$_REQUEST["fortbildung_id"].'#allgemeiner');
    }

    public function saveTeilnehmer(){
      $teilnehmer = new Teilnehmer(array("vorname"=>$_POST['vorname'],"nachname"=>$_POST['nachname'], "email" =>$_POST['email']));
      $teilnehmer->speichere();
      Fortbildung::finde($_GET["fortbildung_id"])->teilnehmen($teilnehmer);
      header('Location: index.php?aktion=alle_Kurse&fortbildung_id='.$_REQUEST['fortbildung_id'].'#funktionen');
    }

    public function kurs_bearbeiten(){
      var_dump($_POST);
      $this->addContext("kurse", Kurs::finde($_GET['kurs_id']));
    }
    public function kurse_bearbeitung_speichern(){
      $kurse = new Kurs(array("id"=>$_REQUEST['kurs_id'],"titel"=>$_POST['titel'], "datum" =>$_POST['datum'], "beschreibung" => 'summernote', "dauer" => $_POST['dauer'], "von" => $_POST['von'],
      "bis" => $_POST['bis'], "koordination" => $_POST['koordination'], "anmeldeschluss" => $_POST['anmeldeschluss'], "kontaktperson" => $_POST['kontakt'], "maxTeilnehmer" => $_POST['maxTeilnehmer'], "referent" => $_POST['referent'],
      "ort_raum" => $_POST['ort_raum'], "unterschriftsliste_zweispaltig" => NULL, "fortbildung_id" => $_REQUEST['fortbildung_id']));
      $kurse->speichere();
      header('Location: index.php?aktion=hauptseite');
    }

    public function teilnehmerliste(){
      $this->addContext("kurse",Kurs::finde($_GET['kurs_id']));
      $this->addContext("teilnehmern",Teilnehmer::findeNachKurs(Kurs::finde($_GET['kurs_id'])));
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
