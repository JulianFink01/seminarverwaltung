<?php
class Funktionen{


  public static function send_email() {
     require_once 'PHPMailer-master/src/PHPMailer.php';


      $fortbildung = Fortbildung::finde($_REQUEST['fortbildung_id']);
      $teilnehmer = NimmtTeil::findeAlleUnangemeldetenFortbildungTeilnehmer($fortbildung);

      $subject = strip_tags('Einladung zur Fortbildung: '.$fortbildung->getName());
      $message = strip_tags($_POST['message']);//$_POST['message']
      $vars = parse_ini_file("../entities/variables.ini.php", TRUE);
      $mailvars = $vars["Mail"];

      foreach ($teilnehmer as $key) {

          $mailer = new \PHPMailer\PHPMailer\PHPMailer();
          $mail = $key->getEmail();

          $to = strip_tags($mail);

          $mailer->From = "sekretariat@berufsschule.bz";
          $mailer->FromName = "LBSHI Schule";
          $mailer->addAddress($to, $key->getVorname()." ".$key->getNachname());
          $mailer->Subject = $subject;
          $mailer->CharSet ="UTF-8";
          $mailer->Body = $message."\n \n Anmeldung unter:\n ".$mailvars["url"]."/".$mailvars["urlUnterordner"]."/index.php?token=".$key->gettoken()."&aktion=login";


          echo $mailvars["url"]."/".$mailvars["urlUnterordner"]."/index.php";


          if (!$mailer->send()) {
              $_SESSION["Info_mail"] = "Fehler beim versenden ihrer Email!";
          }else{
                  $_SESSION["Info_mail"] = "Deine Email wurde erfolgreich versendet!";
          }

        }

      }

  public static function importLehrer() {

        $csv_datei = $_FILES['datei']['tmp_name'];
        $name = $_FILES['datei']['name'];
        $name = substr($name, 0, strlen($name) -4);
        $felder_trenner = ";";
        $zeilen_trenner = "\n";

        if (@file_exists($csv_datei) == false) {

        } else {
            $datei_inhalt = @file_get_contents($csv_datei);
            $zeilen = explode($zeilen_trenner, $datei_inhalt);
            //speichert daten in array

            $teilnehmer_all = array();

            if (is_array($zeilen) == true) {

                foreach ($zeilen as $zeile) {
                    if (trim($zeile) != "") {
                        $daten = explode($felder_trenner, $zeile);

                        // AN DIE RICHTIGE STELLE VOM ARRAY
                        $teilnehmer["Nachname"] = trim(utf8_encode($daten[0]));
                        $teilnehmer["Vorname"] = trim(utf8_encode($daten[1]));
                        $teilnehmer["Email"] = utf8_encode(trim($daten[2]));

                        if (strtolower($teilnehmer["Nachname"]) != "nachname")
                            $teilnehmer_all[] = $teilnehmer;   //return this Array
                    }
                }
            }
        }
        return $teilnehmer_all;
    }



}











 ?>
