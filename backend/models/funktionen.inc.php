<?php
class Funktionen{


    public static function send_email()
    {
        require_once 'PHPMailer-master/src/PHPMailer.php';
        require_once("../entities/variables.ini.php");

        $fortbildung = Fortbildung::finde($_REQUEST['fortbildung_id']);
        $teilnehmer = NimmtTeil::findeAlleUnangemeldetenFortbildungTeilnehmer($fortbildung);

        $subject = strip_tags('Einladung zur Fortbildung: ' . $fortbildung->getName());
        $message = strip_tags($_POST['message']);//$_POST['message']
        if (is_array($teilnehmer)) {
            foreach ($teilnehmer as $key) {

                $mailer = new \PHPMailer\PHPMailer\PHPMailer();
                $mail->IsSMTP();
                $mail->Mailer = "smtp";
                $mail->SMTPDebug  = 1;  
                $mail->SMTPAuth   = TRUE;
                $mail->SMTPSecure = "tls";
                $mail->Port       = 587;
                $mail->Host       = "smtp.gmail.com";
                $mail->Username   = "your-email@gmail.com";
                $mail->Password   = "your-gmail-password";



                $mail = $key->getEmail();

                $to = strip_tags($mail);

                $mailer->From = "sekretariat@berufsschule.bz";
                $mailer->FromName = "LBSHI Schule";
                $mailer->addAddress($to, $key->getVorname() . " " . $key->getNachname());
                $mailer->Subject = $subject;
                $mailer->CharSet = "UTF-8";
                $mailer->Body = $message . "\n \n Anmeldung unter:\n " . M_URL . "/" . M_URLUNTERORDNER . "/index.php?token=" . $key->gettoken() . "&aktion=login";


                if (!$mailer->send()) {
                    $_SESSION["Info_mail"] = "Fehler beim versenden ihrer Email!";
                } else {
                    $_SESSION["Info_mail"] = "Deine Email wurde erfolgreich versendet!";
                }

            }
        } else {
            $mailer = new \PHPMailer\PHPMailer\PHPMailer();
            $mail = $teilnehmer->getEmail();

            $to = strip_tags($mail);

            $mailer->From = "sekretariat@berufsschule.bz";
            $mailer->FromName = "LBSHI Schule";
            $mailer->addAddress($to, $teilnehmer->getVorname() . " " . $teilnehmer->getNachname());
            $mailer->Subject = $subject;
            $mailer->CharSet = "UTF-8";
            $mailer->Body = $message . "\n \n Anmeldung ändern unter:\n " . M_URL . "/" . M_URLUNTERORDNER . "/index.php?token=" . $teilnehmer->getToken() . "&aktion=login";

            if (!$mailer->send()) {
                $_SESSION["Info_mail"] = "Fehler beim versenden ihrer Email!";
            } else {
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

    public static function send_bestaetigungs_email($kursId, $token) {
        require_once 'PHPMailer-master/src/PHPMailer.php';

        error_reporting(E_ALL);
        $kurs = Kurs::finde($kursId);
        $teilnehmer = Teilnehmer::findeNachToken($token);

        $subject = strip_tags('Anmeldung bei: '.$kurs->getTitel());
        $message = strip_tags('Hiermit wird die Anmeldung zu '.$kurs->getTitel().' am '.$kurs->getDatum().' von '.$kurs->getVon().' bis '.$kurs->getBis().' im Raum/Ort '.$kurs->getOrt_raum().' bestätigt.');//$_POST['message']



        $mailer = new \PHPMailer\PHPMailer\PHPMailer();
        $mail = $teilnehmer->getEmail();

        $to = strip_tags($mail);

        $mailer->From = "sekretariat@berufsschule.bz";
        $mailer->FromName = "LBSHI Schule";
        $mailer->addAddress($to, $teilnehmer->getVorname()." ".$teilnehmer->getNachname());
        $mailer->Subject = $subject;
        $mailer->CharSet ="UTF-8";
        $mailer->Body = $message."\n \n Anmeldung ändern unter:\n ".M_URL."/".M_URLUNTERORDNER."/index.php?token=".$teilnehmer->getToken()."&aktion=login";

        if (!$mailer->send()) {
            $_SESSION["Info_mail"] = "Fehler beim versenden ihrer Email!";
        }else{
            $_SESSION["Info_mail"] = "Deine Email wurde erfolgreich versendet!";
        }
    }
    public static function send_bestaetigungs_email_abmeldung($kursId, $token) {
        require_once 'PHPMailer-master/src/PHPMailer.php';

        error_reporting(E_ALL);
        $kurs = Kurs::finde($kursId);
        $teilnehmer = Teilnehmer::findeNachToken($token);

        $subject = strip_tags('Abmeldung bei: '.$kurs->getTitel());
        $message = strip_tags('Hiermit wird die Abmeldung bei '.$kurs->getTitel().' am '.$kurs->getDatum().' von '.$kurs->getVon().' bis '.$kurs->getBis().' im Raum/Ort '.$kurs->getOrt_raum().' bestätigt.');//$_POST['message']



        $mailer = new \PHPMailer\PHPMailer\PHPMailer();
        $mail = $teilnehmer->getEmail();

        $to = strip_tags($mail);

        $mailer->From = "sekretariat@berufsschule.bz";
        $mailer->FromName = "LBSHI Schule";
        $mailer->addAddress($to, $teilnehmer->getVorname()." ".$teilnehmer->getNachname());
        $mailer->Subject = $subject;
        $mailer->CharSet ="UTF-8";
        $mailer->Body = $message."\n \n Neue Anmeldung unter:\n ".M_URL."/".M_URLUNTERORDNER."/index.php?token=".$teilnehmer->getToken()."&aktion=login";

        if (!$mailer->send()) {
            $_SESSION["Info_mail"] = "Fehler beim versenden ihrer Email!";
        }else{
            $_SESSION["Info_mail"] = "Deine Email wurde erfolgreich versendet!";
        }
    }




}











 ?>
