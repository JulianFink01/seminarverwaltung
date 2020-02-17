<<<<<<< HEAD
=======
<?php
if(!isset($_SESSION["loggedIn"])){
  header('Location: ../index.php?aktion=login');
}
?>
>>>>>>> 40f2cd5e2251c52e9df430790db784bd1d2c6490
<head>
  <!-- https://t3n.de/news/css3-dynamische-tabs-ohne-365861/-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0" charset="utf-8">
  <link rel="stylesheet" type="text/css" href="../backend/styles/teilnehmerliste.css">
</head>
<body>
   <main>
  <header id="kopf">
    <img src="../backend/Images/Logo.png" alt="Logo"/>
   </header>
   <div id="beschreibung">
     <h1>Unterschriftenliste</h1>
     <p>THEMA: <?php echo $kurse->getTitel()?></p>
     <p>TAG: <?php echo $kurse->getFormatedDate()?></p>
     <p>UHRZEIT: von <?php echo $kurse->getVon()?> bis <?php echo $kurse->getBis()?></p>
     <p>REFERENT: <?php echo $kurse->getReferent()?></p>
     <p>RAUM: <?php echo $kurse->getOrt_raum()?></p>
   </div>
  </main>


</body>
