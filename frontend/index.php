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
              if($user){
                $aktion = 'show_Seminare';
                echo $user->__toString();
              }
            }

    switch($aktion) {
        case "show_login":
            $aktion = 'login';
        break;
        case "showFortbildung":
            $aktion = 'showsqlquery';
            $bid = $_REQUEST['bid'];
            $erg = $db->getUserInformations($bid);
        break;
        case "show_Seminare":
            $aktion = 'seminare';
        break;
    }

  require_once 'views/' . $aktion . '.tpl.html';
?>
