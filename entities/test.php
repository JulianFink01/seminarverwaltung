<?php
  include("kurs.php");
  include("db.php");
  include("nimmtteil.php");
  include("teilnehmer.php");
  include("fortbildung.php");

  $teilnehmer = Teilnehmer::finde(1);
  echo $teilnehmer->__toString();

?>
