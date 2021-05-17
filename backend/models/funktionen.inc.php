<?php
class Funktionen{

    public static function send_email()
    {
        require_once 'PHPMailer-master/src/PHPMailer.php';

        $fortbildung = Fortbildung::finde($_REQUEST['fortbildung_id']);
        $teilnehmer = NimmtTeil::findeAlleUnangemeldetenFortbildungTeilnehmer($fortbildung);

        $subject = strip_tags('Einladung zur Fortbildung: ' . $fortbildung->getName());
        $message = strip_tags($_POST['message']);//$_POST['message']
        if (is_array($teilnehmer)) {
            foreach ($teilnehmer as $key) {
                $body_message = "\n \n Anmeldung unter:\n " . M_URL . "/" . M_URLUNTERORDNER . "/index.php?token=" . $key->gettoken() . "&aktion=login";

                Funktionen::mailer($subject, $message, $body_message, $key);
            }
        }
    }

    public static function send_email_teilnehmer(){
        require_once 'PHPMailer-master/src/PHPMailer.php';

        $fortbildung = Fortbildung::finde($_REQUEST['fortbildung_id']);
        $kurs = Kurs::finde($_REQUEST['kurs_id']);
        $teilnehmer = $kurs->getAllTeilnehmer();

        $subject = strip_tags('Mitteilung bezüglich der Fortbildung: ' . $fortbildung->getName());
        $message = strip_tags($_POST['message']);//$_POST['message']
        if (is_array($teilnehmer)) {
            foreach ($teilnehmer as $key) {
                $body_message = "\n \n Zum Kurs:\n " . M_URL . "/" . M_URLUNTERORDNER . "/index.php?aktion=" . $key->gettoken() . "&aktion=login";

                Funktionen::mailer($subject, $message, $body_message, $key);
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

    public static function send_bestaetigungs_email($kursId, $token) {
        require_once 'PHPMailer-master/src/PHPMailer.php';

        error_reporting(E_ALL);
        $kurs = Kurs::finde($kursId);
        $teilnehmer = Teilnehmer::findeNachToken($token);

        $subject = strip_tags('Anmeldung bei: '.$kurs->getTitel());
        $message = strip_tags('Hiermit wird die Anmeldung zu '.$kurs->getTitel().' am '.$kurs->getDatum().' von '.$kurs->getVon().' bis '.$kurs->getBis().' im Raum/Ort '.$kurs->getOrt_raum().' bestätigt.');//$_POST['message']
        $body_message = "\n \n Anmeldung ändern unter:\n ".M_URL."/".M_URLUNTERORDNER."/index.php?token=".$teilnehmer->getToken()."&aktion=login";
    
        Funktionen::mailer($subject, $message, $body_message, $teilnehmer);
    }

    public static function send_bestaetigungs_email_abmeldung($kursId, $token) {
        require_once 'PHPMailer-master/src/PHPMailer.php';

        error_reporting(E_ALL);
        $kurs = Kurs::finde($kursId);
        $teilnehmer = Teilnehmer::findeNachToken($token);

        $subject = strip_tags('Abmeldung bei: '.$kurs->getTitel());
        $message = strip_tags('Hiermit wird die Abmeldung bei '.$kurs->getTitel().' am '.$kurs->getDatum().' von '.$kurs->getVon().' bis '.$kurs->getBis().' im Raum/Ort '.$kurs->getOrt_raum().' bestätigt.');//$_POST['message']
        $body_message = "\n \n Neue Anmeldung unter:\n ".M_URL."/".M_URLUNTERORDNER."/index.php?token=".$teilnehmer->getToken()."&aktion=login";

        Funktionen::mailer($subject, $message, $body_message, $teilnehmer);
    }



    static function mailer($subject, $message, $body_message, $teilnehmer){
        require_once("../entities/variables.ini.php");

        $mailer = new \PHPMailer\PHPMailer\PHPMailer();
               
        // Nur für Entwicklung
        if(M_MODE == "development"){
                require_once('PHPMailer-master/src/Exception.php');
                require_once('PHPMailer-master/src/SMTP.php');
                $mailer->IsSMTP();
                $mailer->Mailer = "smtp";
                $mailer->SMTPDebug  = 0;  
                $mailer->SMTPAuth   = TRUE;
                $mailer->SMTPSecure = "tls";
                $mailer->Port       = 587;
                $mailer->Host       = "smtp.gmail.com";
                $mailer->Username   = "berufsschulebozen.anmeldung@gmail.com";
                $mailer->Password   = "Lbshi-12345";
        }
        // Nur für Entwicklung

                $mail = $teilnehmer->getEmail();

                $to = strip_tags($mail);

                $mailer->From = "sekretariat@berufsschule.bz";
                $mailer->FromName = "LBSHI Schule";
                $mailer->addAddress($to, $teilnehmer->getVorname() . " " . $teilnehmer->getNachname());
                $mailer->Subject = $subject;
                $mailer->CharSet = "UTF-8";
                $mailer->Body = $message . $body_message;


                if (!$mailer->send()) {
                    $_SESSION["Info_mail"] = "Fehler beim versenden ihrer Email!";
                } else {
                    $_SESSION["Info_mail"] = "Deine Email wurde erfolgreich versendet!";
                }
    }


}











 ?>
