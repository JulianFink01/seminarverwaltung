
<?php
echo "test1234";
require_once '../db.php';
    if (isset ($_REQUEST['aktion']))
        $aktion = $_REQUEST['aktion'];
    else
        $aktion = 'verwaltungsperson_login';
    switch($aktion) {
    	case "verwaltungsperson_login":
          $aktion = 'login_verwaltungsperson';
    		break;


    }

    require_once 'views/' . $aktion . '.tpl.php';
?>
