<?php
  include("kurs.php");
  include("db.php");
  include("nimmtteil.php");
  include("teilnehmer.php");
  include("fortbildung.php");

  $teilnehmer = Teilnehmer::findeNachToken('jf1234');
  echo $teilnehmer->__toString();
?>
