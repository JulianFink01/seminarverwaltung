<?php
    require_once("../entities/db.php");


    if (isset ($_REQUEST['aktion']))
        $aktion = $_REQUEST['aktion'];
    else
        $aktion = 'show_login';

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
