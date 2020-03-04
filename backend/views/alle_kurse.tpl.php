<?php
if(!isset($_SESSION["loggedIn"])){
  header('Location: ../index.php?aktion=login');
}
?>
<!DOCTYPE html>
<html>
<head>
  <!-- https://t3n.de/news/css3-dynamische-tabs-ohne-365861/-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0" charset="utf-8">
    <link rel="icon" href="../styles/logo.png">
  <link rel="stylesheet" type="text/css" href="styles/main-style.css">
<link rel="stylesheet" type="text/css" href="styles/kurse-style.css">
</head>
<body>
  <header id="kopf">
    <a href="?aktion=hauptseite"><img class="kurs_icons" id="home" src="images/Home_icon.png" title="Hauptseite" /></a>
 <h1>Kursverwaltung - <?php echo $fortbildung->getName() ?></h1>
   </header>

  <div id="leiste">
    <article class="infobox">
        <section id="allgemeiner">
            <h2><a href="#allgemeiner">Kurse</a></h2>


         <div id="inhalt">

           <?php
           if($kurse != NULL){
             foreach($kurse as $kurs){ ?>
         <div class="kurs">
         <h1><?php echo $kurs->getTitel();?></h1>
         <a href="?aktion=kurs_bearbeiten&fortbildung_id=<?php echo $_REQUEST["fortbildung_id"]?>&kurs_id=<?php echo $kurs->getId()?>"><img class="kurs_icons" width="35px" src="images/stift.png" title="bearbeiten" /></a>
         <a href="?aktion=loesche&fortbildung_id=<?php echo $_REQUEST["fortbildung_id"]?>&kurs_id=<?php echo $kurs->getId()?>"><img class="kurs_icons" width="35px" src="images/muelleimer_icon.png" title="löschen" /></a>
         <a href="?aktion=teilnehmerliste&kurs_id=<?php echo $kurs->getId()?>" target="drucken"><img class="kurs_icons" width="35px" src="images/Personen.png" title="Teilnehmerliste" /></a>
         </div>
 <?php    }} ?>

</div>
<div id="kurs_erstellbutton">
<a href="index.php?aktion=kurse_erstellen&fortbildung_id=<?php echo $_REQUEST['fortbildung_id']?>#allgemeiner"><img src="images/fortbildung_erstellButton.png" id="erstell_button" alt="erstellen" /></a>
</div>

        </section>
        <section id="funktionen">
            <h2><a href="#funktionen">Teilnehmer</a></h2>


            <div class="csv">
              <form method="post" enctype="multipart/form-data" action="index.php?aktion=import_lehrer&fortbildung_id=<?php echo $_REQUEST['fortbildung_id']?>#funktionen">
                <label>
                  <span>CSV Datei(*.csv)</span>
                  <input name="datei" type="file" size="50" accept=".csv" class="button">
                  <input type="submit" id="button" name="submit" value="Upload">
                </label>
              </form>
            </div>

            <div id="teilnehmer_hinzu">
              <a onclick="triggerTextfeld()"><img width="75px" src="images/teilnehmer-hinzufuegen.png" title="Teilnehmer hinzufuegen" /></a>
                  <form id="textfeld" action="index.php?aktion=saveTeilnehmer&fortbildung_id=<?php echo $_REQUEST["fortbildung_id"]?>" method="post">
                    <legend>Teilnehmer erstellen</legend>
                    <input type="text" name="vorname" placeholder="Vorname"></br>
                    <input type="text" name="nachname" placeholder="Nachname"></br>
                    <input type="text" name="email" placeholder="E-Mail"></br>
                    <input type="submit" value="erstellen" name="erstellen" id="button">
                  </form>
            </div>

            <div id="teilnehmer">
               <table>
                 <tr>
                   <th>Vorname</th>
                   <th>Nachname</th>
                   <th>Email</th>
                   <th>Token</th>
                   <th>Status</th>
                 </tr>

                 <?php foreach ($teilnehmern as $teilnehmer){
                   ?>
                 <tr>
                   <td><?php echo $teilnehmer->getVorname();?></td>
                   <td><?php echo $teilnehmer->getNachname();?></td>
                   <td><?php echo $teilnehmer->getEmail();?></td>
                   <td><?php echo $teilnehmer->getToken();?></td>
                   <td style="background-color: var(--main-<?php echo NimmtTeil::findeNachFortbildungUndTeilnehemer($fortbildung,$teilnehmer)->getStatusFarbe();?>);">&nbsp;</td>
                   <td class="b_l"><a href="index.php?aktion=remove_lehrer_nimmtTeil&teilnehmer_id=<?php echo $teilnehmer->getId()?>&fortbildung_id=<?php echo $_REQUEST['fortbildung_id']?>#funktionen"><img width="45px" src="images/teilnehmer-entfernen.png" title="Teilnehmer entfernen" /></a></td>
                 </tr>
                 <?php } ?>

             </table>
             </div>
        </section>
        <section id="emailsenden">
            <h2><a href="#emailsenden">E-Mail senden</a></h2>

            <div id="fenster">
              <span>Email senden</span>
            <form action="index.php?aktion=send_email&fortbildung_id=<?php echo $_REQUEST['fortbildung_id']?>" method="post">
              <textarea name="message" rows="30" cols="160" id="text"></textarea>

              <input type="submit" id="button" name="senden" value="Senden" />
      </div>
    </form>

        </section>
    </article>
  </div>

</body>
</html>

<script type="text/javascript">

  function triggerTextfeld(){
    var textfeld = document.getElementById("textfeld");
    textfeld.classList.toggle("showTeilnehmerErstellen");
  }
</script>
