
<?php

require_once 'models/entities/DB.php';
require_once 'models/entities/fortbildung.php';
require_once 'models/entities/kurs.php';
require_once 'backend/models/PHPMail-master..?';
require_once 'model/entities/seminartermin.php';
require_once 'model/entities/benutzer.php';
require_once 'model/entities/seminar.php';

require_once 'controller/Controller.php';


$aktion = isset($_GET['aktion'])?$_GET['aktion']:'alleST';

$controller = new Controller();

if (method_exists($controller, $aktion)){
        $controller->run($aktion);
}

/*
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
    */
?>
