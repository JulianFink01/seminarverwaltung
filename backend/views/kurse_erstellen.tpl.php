<?php
if(!isset($_SESSION["loggedIn"])){
  header('Location: ../index.php?aktion=login');
}
?>
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


  <!-- https://t3n.de/news/css3-dynamische-tabs-ohne-365861/-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="styles/main-style.css">
  <link rel="stylesheet" type="text/css" href="styles/kurse-style.css">

</head>
<body>



  <header id="kurskopf">
    <header id="kopf">

      <h1>Kurse - erstellen</h1>
    </header>
    <div id="kurserstelleninhalt">
      <div id="box">
        <div id="input">
          <p class="einzug"> Titel<input type="text" name="titel" id="titel"/></p>
          <p class="einzug"> Datum <input type="date" name="datum" /></p>
        </div>
        <p>Beschreibung</p>


        <div id="summernote" >stop you <i> suck </i>violated the law ! Pay the <b>bliet</b> cort a fine or serve your sentence. All your stolen goods are now forfited. </div>


        <script>
        $(document).ready(function() {
          $('#summernote').summernote({height: 280,width: 1200 });

        });


        </script>


        <form action="#"  method="post">
          <p> Uhrzeit </p>
          <a>Dauer:</a> &ensp;
          <input type="number" value =""   id="dauer" class="zeit"/>
          <a>Start:</a>  &ensp;
          <input type="text" placeholder="10:00"  name='von' id="start" class="zeit"  />
          &ensp; <a>Ende:</a>  &ensp;
          <input type="text" placeholder="10:00"  name="bis" id="ende" class="zeit"/>

        <form action="index.php?aktion=kurse_erstellen&fortbildung_id=<?php echo ?>"  method="post">
        <P> uhrzeit </P>
             start:  &ensp;
        <input type="text" placeholder="10:00"  name='von' id="start" class="zeit"  />
           &ensp; ende:  &ensp;
        <input type="text" placeholder="10:00"  name="bis" id="ende" class="zeit"/>
            dauer: &ensp;
        <input type="number" name="dauer"  id="dauer" class="zeit"/>


        <input type="text" name="kontakt" id="kontaktperson" />
            <br /> koordination   &emsp;  Anmeldeschluss  <br />
        <input type="text"  name="koordination" id="koordination" />

          <input type="hidden" id="beschreibung" name="beschreibung" />
          <br /> Teilnehmeranzahl  &emsp; Kontaktperson <br />
          <input type="number" name="maxTeilnehmer" id="maxTeilnehmer" />

          <input type="text" name="kontakt" id="kontakt" />
          <br /> Referent   &emsp;  Anmeldeschluss  <br />
          <input type="text"  name="koordination" id="koordination" />

        <br /> Referent <br />
        <input type="text"  name="referent" id="referent" />

          <br /> Raum  <br/>
          <input type="text"  name="ort_raum" id="ort_raum" />



          <input type="submit" onclick="myFunction(); return true;" id="senden" value="Senden">


          <script>
          function myFunction() {
            $('#beschreibung').value = $('#summernote').summernote('code');
          }

          </script>
        </form>
      </div>

    </div>

  </body>
