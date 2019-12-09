<?php
    require_once("../db.php");

    $db = new db();

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
    }

  require_once 'views/' . $aktion . '.tpl.html';
?>
