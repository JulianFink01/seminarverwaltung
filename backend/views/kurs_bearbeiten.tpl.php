
<html>
<head>

  <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.15/dist/summernote.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.15/dist/summernote.min.js"></script>

  <!--
  $movie = array( "title" => "Rear Window",
  "director" => "Alfred Hitchcock",
  "year" => 1954 );
  */-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="styles/kurs_bearbeiten-style.css">
  <link rel="stylesheet" type="text/css" href="styles/main-style.css">


  <!-- https://t3n.de/news/css3-dynamische-tabs-ohne-365861/-->



</head>
<body>




    <header id="kopf">

      <h1><?php echo $kurse->getTitel() ?> bearbeiten</h1>
    </header>
    <div id="kurserstelleninhalt">
      <div id="box">
          <form action="index.php?aktion=kurse_bearbeitung_speichern&fortbildung_id=<?php echo $_REQUEST['fortbildung_id']?>&kurs_id=<?php echo $_GET['kurs_id']?>"  method="post">
        <div id="input">
          <p class="einzug"> Titel<input type="text" name="titel" id="titelkurs" value="<?php echo $kurse->getTitel()?>" required/></p>
          <p class="einzug"> Datum <input type="date" name="datum" id="datumkurs" value="<?php echo $kurse->getDatum()?>" required/></p>
        </div>
        <p>Beschreibung</p>


        <div id="summernote" ><?php echo $kurse->getBeschreibung()?></div>


        <script>
        $(document).ready(function() {
          $('#summernote').summernote({height: 280,width: 1100 });

        });


        </script>


        <table id="kurszeiten">
          <tr>
            <td><a>Dauer:</a> &ensp;
            <input type="number" name="dauer"  class="zeit" value="<?php echo $kurse->getDauer()?>" required/>
          </td>
          <td>
            <a>Start:</a>  &ensp;
            <input type="text" placeholder="10:00"  name='von' id="start" class="zeit" value="<?php echo $kurse->getVon()?>" pattern="([01]?[0-9]|2[0-3]):[0-5][0-9]" required/>
          </td>
          <td>
            &ensp; <a>Ende:</a>  &ensp;
            <input type="text" placeholder="10:00"  name="bis" id="ende" class="zeit" value="<?php echo $kurse->getBis()?>" pattern="([01]?[0-9]|2[0-3]):[0-5][0-9]" required/>
          </td>
        </tr>
      </table>

      <div class=kursdaten>
          <a> Koordination: </a>
          <input type="text"  name="koordination" id="kurs_koordination_erstellen" value="<?php echo $kurse->getKoordination()?>" required/>
          <a> Anmeldeschluss: </a>
        <input type="date" name="anmeldeschluss" id="kurs_anmeldeschluss_erstellen" value="<?php echo $kurse->getAnmeldeSchluss()?>" required/>
        <input type="hidden" id="beschreibung" name="beschreibung" />
        <input type="hidden" id="fortbildung_id" name="fortbildung_id" value="<?php echo $_GET["fortbildung_id"]?>" />
        <a> Teilnehmeranzahl: </a>
        <input type="number" name="maxTeilnehmer" id="maxTeilnehmer" value="<?php echo $kurse->getTeilnehmerAnzahl()?>" required/>
        <a>Kontaktperson: </a>
        <input type="text" name="kontakt" id="kontaktpersonen" value="<?php echo $kurse->getKontakt()?>" required/>
      <a> Referent: </a>
      <input type="text"  name="referent" id="referent" value="<?php echo $kurse->getReferent()?>" required/>
        <a>Raum : </a>
        <input type="text"  name="ort_raum" id="ort_raum" value="<?php echo $kurse->getOrt_raum()?>" required/>

</div>



          <a href="?aktion=alle_kurse&fortbildung_id=<?php echo $_REQUEST["fortbildung_id"]?>#allgemeiner"><img class="kurs_icons" id="zurueck" src="Images/Home_icon.png" title="Zurück" /></a>
          <input type="submit" class="Senden_erstellen" onclick="myFunction()" id="button" value="Senden">


          <script>
          function myFunction() {
            var text= $('#summernote').summernote('code');
            $('#beschreibung').val(text);
            return true;
          }

          </script>
        </form>

      </div>

    </div>

  </body>
</html>
