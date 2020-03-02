
<html>
<head>

  <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.15/dist/summernote.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.15/dist/summernote.min.js"></script>


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
          <label for="titel" class="labels">Titel</label>
          <input type="text" name="titel" id="titel" value="<?php echo $kurse->getTitel()?>"/>

          <label for="datum" class="labels">Datum</label>
          <input type="date" name="datum" id="datum" value="<?php echo $kurse->getDatum()?>"/>
        </div>
        <p>Beschreibung</p>


        <div id="summernote" ><?php echo $kurse->getBeschreibung()?></div>


        <script>
        $(document).ready(function() {
          $('#summernote').summernote({height: 280,width: 1400 });

        });


        </script>



          <p> Uhrzeit </p>
          <label for="dauer" class="labels">Dauer</label>
          <input type="number" name="dauer" id="dauer" class="zeit" value="<?php echo $kurse->getDauer()?>"/>

          <label for="von" class="labels">Von</label>
          <input type="text"   name='von' id="start" class="zeit"  value="<?php echo $kurse->getVon()?>"/>

          <label for="bis" class="labels">Bis</label>
          <input type="text"  name="bis" id="ende" class="zeit" value="<?php echo $kurse->getBis()?>"/><br/>



            <label for="koordination" class="labels">Koordination</label>
            <input type="text"  name="koordination" id="koordination" value="<?php echo $kurse->getKoordination()?>"/>

            <label for="anmeldeschluss" class="labels">Anmeldeschluss</label>
            <input type="date" name="anmeldeschluss" id="anmeldeschluss" value="<?php echo $kurse->getAnmeldeSchluss()?>">

          <input type="hidden" id="beschreibung" name="beschreibung" />
          <input type="hidden" id="fortbildung_id" name="fortbildung_id" value="<?php echo $_GET["fortbildung_id"]?>" />

          <label for="maxTeilnehmer" class="labels">MaxTeilnehmer</label>
          <input type="number" name="maxTeilnehmer" id="maxTeilnehmer" value="<?php echo $kurse->getTeilnehmerAnzahl()?>"/>

          <label for="kontakt" class="labels">Kontakt</label>
          <input type="text" name="kontakt" id="kontakt" value="<?php echo $kurse->getKontakt()?>"/>


        <label for="referent" class="labels">Referent</label>
        <input type="text"  name="referent" id="referent" value="<?php echo $kurse->getReferent()?>"/>

          <label for="ort_raum" class="labels">Ort/Raum</label>
          <input type="text"  name="ort_raum" id="ort_raum" value="<?php echo $kurse->getOrt_raum()?>"/>



          <input type="submit" class="Senden_erstellen " onclick="myFunction()" id="button" value="Senden">


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
