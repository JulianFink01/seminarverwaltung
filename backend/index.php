
<?php


require_once '../entities/DB.php';
require_once '../entities/fortbildung.php';
require_once '../entities/kurs.php';
require_once '../entities/nimmtteil.php';
require_once '../entities/teilnehmer.php';

require_once 'models/fortbildung.php';
require_once 'models/funktionen.inc.php';
require_once 'models/kurs.php';

require_once 'controller/controller.php';


$aktion = isset($_GET['aktion'])?$_GET['aktion']:'hauptseite';

$controller = new Controller();

if (method_exists($controller, $aktion)){
        $controller->run($aktion);
}


?>
