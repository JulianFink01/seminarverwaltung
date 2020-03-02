<?php
class Funktionen{


public static function send_email() {

    require_once 'PHPMailer-master/src/PHPMailer.php';
    $mailer = new \PHPMailer\PHPMailer\PHPMailer();

    $fortbildung = Fortbildung::finde($_REQUEST['fortbildung_id']);
    $teilnehmer = NimmtTeil::findeAlleFortbildungTeilnehmer($fortbildung);
    $fortbildungName = $fortbildung->getName();

    foreach ($teilnehmer as $key) {
      $mail = $key->getEmail();


      $to = strip_tags($mail);
      $subject = strip_tags('Einladung zur Fortbildung: '.$fortbildungName);
      $message = strip_tags($_POST['message']);//$_POST['message']



      $mailer->From = "roccasalvo.lukas@hotmail.com";//info@berufsschule.bz
      $mailer-> addAddress($to, "Miriam Bolognani");
      $mailer->Subject = $subject;
      $mailer->Body = $message;

      if (!$mailer->send()) {
          echo "<p>failed to send mail</p></br />"
          . "<p>" . $mailer->ErrorInfo . "</p>";
      }
    }
  }


    /*
    $msg = $_POST['message'];

    // use wordwrap() if lines are longer than 70 characters
    $msg = wordwrap($msg,100);

    // send email
    mail("Miriam.Bolognani@berufsschule.bz","Einladung zur Fortbildung",$msg);
    */

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
