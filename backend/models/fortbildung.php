<?php
$fortbildungen = Fortbildung::findeAlle();

if(isset($_POST['submit'])){
  $fortbildungen->setName($_POST['titel']);
  $fortbildungen->setStatus('1');
  var_dump( $_POST['titel']);
  $fortbildungen->speichere();


?>
