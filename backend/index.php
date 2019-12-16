
<?php
require_once '../entities/db.php';
    if (isset ($_REQUEST['aktion']))
        $aktion = $_REQUEST['aktion'];
    else
        $aktion = 'show_verwaltung_login';
    switch($aktion) {
    	case "show_verwaltung_login":
          $aktion = 'login_verwaltung';
    		break;
      case "fortbildung":
          $aktion = 'fortbildungen';
        break;


    }

    require_once 'views/' . $aktion . '.tpl.php';
?>
