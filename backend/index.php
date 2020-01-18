
<?php
require_once '../entities/db.php';
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


    }

    require_once 'views/' . $aktion . '.tpl.php';
?>
