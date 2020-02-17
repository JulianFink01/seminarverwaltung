<?php
if(!isset($_SESSION["loggedIn"])){
  header('Location: index.php?aktion=login');
}
?>

<head>
  <!-- https://t3n.de/news/css3-dynamische-tabs-ohne-365861/-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0" charset="utf-8">
  <link rel="stylesheet" type="text/css" href="styles/main-style.css">
<link rel="stylesheet" type="text/css" href="styles/kurse-style.css">
</head>
<body>
  <header id="kopf">
 <h1>Kursverwaltung - <?php echo $fortbildung->getName() ?></h1>
   </header>

  <div id="leiste">
    <article class="infobox">
        <section id="allgemeiner">
            <h2><a href="#allgemeiner">Kurse</a></h2>


         <div id="inhalt">

           <?php
             foreach($kurse as $kurs){ ?>
         <div id="kurs1">
         <a href="?aktion=kurse#allgemeiner"><?php echo $kurs->getTitel();?></a>
         <p><?php echo $kurs->getBeschreibung() ?></p>
         <a href="?aktion=teilnehmerliste&kurs_id=<?php echo $kurs->getId()?>">bearbeiten</a>
         <a href="#">löschen</a>
         </div>
 <?php    } ?>


</div>

  <div id="kurs_erstellbutton">
  <a href="index.php?aktion=kurse_erstellen#allgemeiner"><img src="Images/fortbildung_erstellButton.png" id="erstell_button" alt="erstellen" /></a>
  </div>

        </section>
        <section id="funktionen">
            <h2><a href="#funktionen">Teilnehmer</a></h2>
            <!--Simons arbeitsbereich  mit teiler-style-->


            <div class="csv">
              <form method="post" enctype="multipart/form-data" action="index.php?aktion=import_lehrer&fortbildung_id=<?php echo $_REQUEST['fortbildung_id']?>#funktionen">
                <label>
                  CSV Datei(*.csv)
                  <input name="datei" type="file" size="50" accept=".csv" id="button2">
                  <input type="submit" class="button" name="submit" value="Upload">
                </label>
              </form>
            </div>

             <div id="teilnehmer">
               <table>
                 <tr>
                   <th>Vorname</th>
                   <th>Nachname</th>
                   <th>Email</th>
                   <th>Status</th>

                 </tr>

                 <?php foreach ($teilnehmern as $teilnehmer){
                   ?>
                 <tr>
                   <td><?php echo $teilnehmer->getVorname();?></td>
                   <td><?php echo $teilnehmer->getNachname();?></td>
                   <td><?php echo $teilnehmer->getEmail();?></td>
                   <td style="background-color: var(--main-<?php echo NimmtTeil::findeNachFortbildungUndTeilnehemer($fortbildung,$teilnehmer)->getStatusFarbe();?>);">&nbsp;</td>
                   <td class="b_l">bearbeiten</td>
                   <td class="b_l">löschen</td>
                 </tr>
                 <?php } ?>

             </table>
             </div>

        </section>
        <section id="emailsenden">
            <h2><a href="#emailsenden">E-Mail senden</a></h2>

            <div id="fenster">
            <form action="index.php?aktion=send_email&fortbildung_id=<?php echo $_REQUEST['fortbildung_id']?>" method="post">
              <textarea name="message" rows="30" cols="160" id="text"></textarea>

              <input type="submit" id="senden" name="senden" value="Senden"/>
      </div>
    </form>

        </section>
    </article>
  </div>

</body>
