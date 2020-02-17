<?php
if(!isset($_SESSION["loggedIn"])){
  header('Location: index.php?aktion=login');
}
?>
<head>
  <!-- https://t3n.de/news/css3-dynamische-tabs-ohne-365861/-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0" charset="utf-8">
  <link rel="stylesheet" type="text/css" href="../styles/teilnehmerliste.css">
</head>
<body>
   <main>
  <header id="kopf">
    <img src="../Images/Logo.png" alt="Logo"/>
   </header>
   <div id="beschreibung">
     <h1><?php echo $kurs->getTitel()?></h1>
     <p>THEMA: <?php echo $kurs->getShortBeschreibung()?></p>
     <p>TAG: <?php echo $kurs->getDatum()?></p>
     <p>UHRZEIT: von <?php echo $kurs->getVon()?> bis <?php echo $kurs->getBis()?></p>
     <p>REFERENT: <?php echo $kurs->getReferent()?></p>
     <p>RAUM: <?php echo $kurs->getOrt_raum()?></p>
   </div>
  </main>


</body>
