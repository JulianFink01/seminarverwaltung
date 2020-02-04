
<?php
require_once '../entities/db.php';
require_once '/models/funktionen.inc.php';

    if (isset ($_REQUEST['aktion']))
        $aktion = $_REQUEST['aktion'];
    else
        $aktion = 'hauptseite';
    switch($aktion) {
    	case "show_login":
          $aktion = 'login_verwaltung';
    		break;
      case "fortbildung":
          $aktion = 'fortbildungen';
        break;
      case "hauptseite":
        $aktion = 'hauptseite';
        break;
      case "kurse":
        $aktion = "kurse";
        break;
     case "k_erstellen":
        $aktion = "kurse_erstellen";
        break;
     case "f_erstellen":
      $aktion = "fortbildungen_erstellen";
      break;
    case "send_email":
      $aktion = "send_email";
      send_email();


    }

    require_once 'views/' . $aktion . '.tpl.php';
?>
