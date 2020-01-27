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
        if($user && !isset($_REQUEST['kursId'])){
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
        
        break;
    }

  require_once 'views/' . $aktion . '.tpl.html';
?>
