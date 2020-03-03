<?php
if(!isset($_SESSION["loggedIn"])){
  header('Location: index.php?aktion=login');
}
?>
<!DOCTYPE html>
<html>
<head>
    <link rel="icon" href="../logo.png">
  <!-- https://t3n.de/news/css3-dynamische-tabs-ohne-365861/-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0" charset="utf-8">
  <link rel="stylesheet" type="text/css" href="../backend/styles/main-style.css">
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
     <p>TAG: <?php echo $kurse->getDatum()?></p>
     <p>UHRZEIT: von <?php echo $kurse->getVon()?> bis <?php echo $kurse->getBis()?></p>
     <p>REFERENT: <?php echo $kurse->getReferent()?></p>
     <p>RAUM: <?php echo $kurse->getOrt_raum()?></p>
   </div>
   <div id="teilnehmer">
     <table>
       <tr>
         <th class="nr">Nr.</th>
         <th>Name</th>
         <th>Vormittag</th>
         <th>Nachmittag</th>

       </tr>

       <?php
       $i = 1;
        foreach ($teilnehmern as $teilnehmer){

         ?>
       <tr>
         <td class="nr"><?php echo $i?></td>
         <td><?php echo $teilnehmer->getVorUndNachname();?></td>
         <td></td>
         <td></td>
       </tr>

       <?php $i++; } ?>

   </table>
   </div>
  </main>


</body>
</html>
