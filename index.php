<?php
    if (isset ($_REQUEST['aktion']))
        $aktion = $_REQUEST['aktion'];
    else
        $aktion = 'show_login';

    switch($aktion) {
        case "show_login":
            $aktion = 'login';
        break;
    }
  require_once 'views/' . $aktion . '.tpl.html';

?>
