
<?php
require_once '../db.php';
    if (isset ($_REQUEST['aktion']))
        $aktion = $_REQUEST['aktion'];
    else
        $aktion = 'verwaltung_login';
    switch($aktion) {
    	case "verwaltung_login":
          $aktion = 'login_verwaltung';
    		break;
      case "fortbildung":
          $aktion = 'fortbildungen';
        break;


    }

    require_once 'views/' . $aktion . '.tpl.php';
?>
