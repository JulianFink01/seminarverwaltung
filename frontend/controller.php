<?php


class Controller
{

  private $context = array();



  public function run($aktion)
  {
    $this->$aktion();
    $this->generatePage($aktion);
  }
  public function logout()
  {
    session_destroy();
    header("Location: ../index.html");
  }
  public function login()
  {
    if (isset($_REQUEST['token'])) {
      $token = $_REQUEST['token'];
      $teilnehmer = Teilnehmer::findeNachToken($token);
      if ($teilnehmer != NULL) {
        $this->show_seminare();
      } else {
        $this->addContext("template", "login");
      }
    }
  }

  public function show_seminare()
  {
    if (isset($_REQUEST['token'])) {
      $token = $_REQUEST['token'];
      $this->addContext("user", Teilnehmer::findeNachToken($token));
      $this->addContext("template", "seminare");
    } else {
      $this->addContext("template", "login");
    }
  }
  public function show_KursInfos()
  {
    if (isset($_REQUEST['token'])) {
      $token = $_REQUEST['token'];
      $kursId = $_REQUEST['kursId'];
      $this->addContext("user", Teilnehmer::findeNachToken($token));
      $this->addContext("kurs", Kurs::finde($kursId));
      $this->addContext("template", "kurs");

      $kurs = Kurs::finde($kursId);



      $abgelaufen = $kurs->istAbgelaufen();
      $anzahl = $kurs->getTeilnehmerAnzahl();
      $maxAnzahl = $kurs->getMaxTeilnehmer();

      $this->addContext("anzahl", $anzahl);
      $this->addContext("maxAnzahl", $maxAnzahl);
      $this->addContext("abgelaufen", $abgelaufen);
    }
  }

  public function abmelden()
  {
    $kursId = $_REQUEST['kursId'];
    $token = $_REQUEST['token'];

    $this->addContext("user", Teilnehmer::findeNachToken($token));
    $kurs = Kurs::finde($kursId);
    $user = Teilnehmer::findeNachToken($token);
    $kurs->abmelden($user);
    $this->show_seminare();
    Funktionen::send_bestaetigungs_email_abmeldung($kursId, $token);
  }
  public function anmelden()
  {
    $kursId = $_REQUEST['kursId'];
    $token = $_REQUEST['token'];

    $this->addContext("user", Teilnehmer::findeNachToken($token));
    $kurs = Kurs::finde($kursId);
    $user = Teilnehmer::findeNachToken($token);
    $kurs->teilnehmen($user);
    // Funktionen::send_bestaetigungs_email();
    $this->show_seminare();
    Funktionen::send_bestaetigungs_email($kursId, $token);
  }

  /**
   * author TheArled | Andreas Codalonga
   */
  public function getCalendarItem()
  {
    $kursId = $_REQUEST['kursId'];

    $kurs = Kurs::finde($kursId);
    $event = new ICS(
      $kurs->getDatum() . ' ' . $kurs->getVon(),
      $kurs->getDatum() . ' ' . $kurs->getBis(),
      $kurs->getTitel(),
      $kurs->getBeschreibung(),
      $kurs->getOrt_raum()
    );
    $event->save();
    $this->addContext("template", "login");
  }

  private function generatePage($template)
  {
    extract($this->context);
    require_once 'views/' . $template . ".tpl.html";
  }
  private function addContext($key, $value)
  {
    $this->context[$key] = $value;
  }
}
