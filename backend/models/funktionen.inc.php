<?php

require_once ("../entities/nimmtteil.php");
require_once ("../entities/fortbildung.php");
function send_email() {

    require_once 'PHPMailer-master/src/PHPMailer.php';
    $mailer = new \PHPMailer\PHPMailer\PHPMailer();
    echo $_REQUEST['fortbildung_id'];
    $teilnehmer = NimmtTeil::findeAlleFortbildungTeilnehmer(Fortbildung::finde($_REQUEST['fortbildung_id']));

    foreach ($teilnehmer as $key) {
      $mail = $key->getEmail();

    echo $mail.'<br>';
    }

    $to = strip_tags('pincopallino@boo.com');
    $subject = strip_tags('Einladung zur Fortbildung');
    $message = strip_tags("hallo");//$_POST['message']



    $mailer->From = "Miriam.Bolognani@berufsschule.bz";
    $mailer-> addAddress($to, "Miriam Bolognani");
    $mailer->Subject = $subject;
    $mailer->Body = $message;

    if (!$mailer->send()) {
        echo "<p>failed to send mail</p></br />"
        . "<p>" . $mailer->ErrorInfo . "</p>";
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
