<?php
    require_once("../entities/db.php");
    require_once("../entities/fortbildung.php");
    require_once("../entities/kurs.php");
    require_once("../entities/nimmtteil.php");
    require_once("../entities/teilnehmer.php");


    if (isset ($_REQUEST['aktion']))
        $aktion = $_REQUEST['aktion'];
        else
            $aktion = 'show_login';

    if (isset ($_REQUEST['token'])){
        $token = $_REQUEST['token'];
        $user = Teilnehmer::findeNachToken($token);
        if($user && !$_REQUEST['kurs_id']){
            $aktion = 'show_Seminare';
        }
      }

    switch($aktion) {
        case "show_login":
            $aktion = 'login';
        break;
        case "show_Seminare":
            if($user){
            $aktion = 'seminare';
            }else{
            $aktion = 'login';
            }
        break;
        case "show_KursInfos":
          $aktion = "kurs";
          $kursId = $_REQUEST['kursId'];
          echo $user->__toString();
        break;
    }

  require_once 'views/' . $aktion . '.tpl.html';
?>
