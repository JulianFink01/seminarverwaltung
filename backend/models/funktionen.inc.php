<?php

function send_email() {

    require_once 'models/PHPMailer-master/PHPMailer.php';

    $mailer = new \PHPMailer\PHPMailer\PHPMailer();

    $to = strip_tags($_POST['email']);

    $subject = strip_tags($_POST['subject']);
    $message = strip_tags($_POST['message']);



    $mailer->From = "Miriam.Bolognani@berufsschule.bz";
    $mailer-> addAddress($to, "Miriam Bolognani");
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
