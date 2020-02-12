<?php

require_once ("../entities/nimmtteil.php");
require_once ("../entities/fortbildung.php");
function send_email() {

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



      $mailer->From = "roccasalvo.lukas@hotmail.com";//Miriam.Bolognani@berufsschule.bz
      $mailer-> addAddress($to, "Miriam Bolognani");
      $mailer->Subject = $subject;
      $mailer->Body = $message;

      if (!$mailer->send()) {
          echo "<p>failed to send mail</p></br />"
          . "<p>" . $mailer->ErrorInfo . "</p>";
      }
    }


    /*
    $msg = $_POST['message'];

    // use wordwrap() if lines are longer than 70 characters
    $msg = wordwrap($msg,100);

    // send email
    mail("Miriam.Bolognani@berufsschule.bz","Einladung zur Fortbildung",$msg);
    */
}













 ?>
