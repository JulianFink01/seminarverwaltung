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

  <header id="kopf">
<h1>Kurse - erstellen</h1>
  </header>
  <div id="hintergrund">
    <div id="box">
        <p> Titel *</p>
    <input type="text" name="titel" id="titel"/>
        <p> Datum *</p>
    <input type="date" name="datum" />
        <p>Beschreibung</p>


        <div id="summernote" >stop you <i> suck </i>violated the law ! Pay the <b>bliet</b> cort a fine or serve your sentence. All your stolen goods are now forfited. </div>


      <script>
               $(document).ready(function() {
        $('#summernote').summernote({height: 280,width: 1200 });

      });


    	</script>


        <form action="index.php?aktion=kurse_erstellen&fortbildung_id=<?php echo ?>"  method="post">
        <P> uhrzeit </P>
             start:  &ensp;
        <input type="text" placeholder="10:00"  name='von' id="start" class="zeit"  />
           &ensp; ende:  &ensp;
        <input type="text" placeholder="10:00"  name="bis" id="ende" class="zeit"/>
            dauer: &ensp;
        <input type="number" value ="" name="dauer"  id="dauer" class="zeit"/>

        <input type="hidden" id="beschreibung" name="beschreibung" />
            <br /> Teilnehmeranzahl  &emsp; Kontaktperson <br />
        <input type="number" name="maxTeilnehmer" id="zeilnehmeranzahl" />

        <input type="text" name="kontakt" id="kontaktperson" />
            <br /> Referend   &emsp;  Anmeldeschluss  <br />
        <input type="text"  name="koordination" id="referend" />

        <input type="date" name="anmeldeschluss" id="anmeldeschluss" /> <br />

        <br /> Raum  <br/>
        <input type="text"  name="ortRaum" id="ortRaum" />



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
