<?php
if(!isset($_SESSION["loggedIn"])){
  header('Location: index.php?aktion=login');
}
?>
<head>

    <?php
      $daten =new $array ();
      $daten['datum']=;
      $daten['titel']=;
      $daten['maxTeilnehmer']=;
      $daten['referend']=;
      $daten['beschreibung']=;
      $daten['ort_raum']=;
      $daten['kontakt']=;
      $daten['von']=;
      $daten['bis']=;
      $daten['unterschriftsliste_zweispaltig']=;
      $daten['koordination']=;
      $daten['anmeldeschluss']=;
      //$daten['fortbildung_id']=;
      $daten['dauer']=;
    ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.15/dist/summernote.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.15/dist/summernote.min.js"></script>

  <link rel="stylesheet" type="text/css" href="styles/kurseinhalt.css">

</head>

<body>

  <header id="kopf">

<h1>Kurse - Verwaltung</h1>
  </header>

  <div id="login_Feld"></div>

  <div id="leiste">
    <article class="infobox">
        <section id="allgemeiner">
            <h2><a href="#allgemeiner">Kurse</a></h2>



    <div id="box">
        <p> Titel *</p>
    <input type="text" id="titel"/>
        <p> Datum *</p>
    <input type="date" />
        <p>Beschreibung</p>

    <!--<textarea id="textarea" cols="150" rows="20">
        stop you violated the law ! Pay the cort a fine or serve your sentence. All your stolen goods are now forfited.
    </textarea> -->

        <div id="summernote" >stop you <i> suck </i>violated the law ! Pay the <b>bliet</b> cort a fine or serve your sentence. All your stolen goods are now forfited. </div>
           <script>
               $(document).ready(function() {
        $('#summernote').summernote({height: 280,width: 1200 });

        console.log($('#summernote'));

    });


  </script>


        <form action="#" method="post">
        <P> uhrzeit </P>
             start:  &ensp;
        <input type="number" value="12" name='start' id="start" class="zeit"  />
           &ensp; ende:  &ensp;
        <input type="number" value="12" name="ende" id="ende" class="zeit"/>
            dauer: &ensp;
        <input type="number" value =""   id="dauer" class="zeit"/>

            <br /> Teilnehmeranzahl  &emsp; Kontaktperson <br />
        <input type="number" id="zeilnehmeranzahl" />

        <input type="text" id="kontaktperson" />
            <br /> Referend   &emsp;  Anmeldeschluss  <br />
        <input type="text" id="referend" />

        <input type="date" id="anmeldeschluss" /> <br />

        <input type="submit" id="senden" value="Senden">

            <?php
              vardump($daten);

            ?>
    </form>
    </div>
        </section>
        </article>
  </div>



</body>
