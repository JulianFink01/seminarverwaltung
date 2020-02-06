<?php
require_once('../entities/fortbildung.php');
$fortbildungen = Fortbildung::findeAlle();
var_dump("dsklfjsdölkfj");
if(isset($_POST['submit'])){
  $fortbildungen->setName($_POST['titel']);
  $fortbildungen->setStatus('1');
  var_dump( $_POST['titel']);
  $fortbildungen->speichere();
}

?>
