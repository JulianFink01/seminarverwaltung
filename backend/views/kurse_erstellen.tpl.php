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

<<<<<<< HEAD
  <?php

    $daten = array ();
    if(!empty($_POST['datum']) ){
    $daten['datum']=$_POST['datum'];
    }
    if(!empty($_POST['titel']) ){
    $daten['titel']=$_POST['titel'];
    }
    if(!empty($_POST['maxTeilnehmer']) ){
    $daten['maxTeilnehmer']=$_POST['maxTeilnehmer'];
    }
    if(!empty($_POST['referend']) ){
    $daten['referend']=$_POST['referend'];
    }
    if(!empty($_POST['beschreibung']) ){
    $daten['beschreibung']=$_POST['beschreibung'];
    }
    if(!empty($_POST['ort_raum']) ){
    $daten['ort_raum']=$_POST['ort_raum'];
    }
    if(!empty($_POST['kontakt']) ){
    $daten['kontakt']=$_POST['kontakt'];
    }
    if(!empty($_POST['von']) ){
    $daten['von']=$_POST['von'];
    }
    if(!empty($_POST['bis']) ){
    $daten['bis']=$_POST['bis'];
  //  $daten['unterschriftsliste_zweispaltig']=$_POST['unterschriftsliste_zweispaltig'];
    }
    if(!empty($_POST['koordination']) ){
    $daten['koordination']=$_POST['koordination'];
    }
    if(!empty($_POST['anmeldeschluss']) ){
    $daten['anmeldeschluss']=$_POST['anmeldeschluss'];
    //$daten['fortbildung_id']=;
    }
    if(!empty($_POST['dauer']) ){
    $daten['dauer']=$_POST['dauer'];
    }
  ?>

  <header id="kurskopf">
=======
  <header id="kopf">
>>>>>>> cb6e47704e07fc9c3fb6790bacbf3982a85aee1f
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


<<<<<<< HEAD
        <form action="#"  method="post">
        <p> Uhrzeit </p>
        <a>Dauer:</a> &ensp;
    <input type="number" value =""   id="dauer" class="zeit"/>
             <a>Start:</a>  &ensp;
        <input type="number" value="" name='von' id="start" class="zeit"  />
           &ensp; <a>Ende:</a>  &ensp;
        <input type="number" value="" name="bis" id="ende" class="zeit"/>

=======
        <form action="index.php?aktion=kurse_erstellen&fortbildung_id=<?php echo ?>"  method="post">
        <P> uhrzeit </P>
             start:  &ensp;
        <input type="text" placeholder="10:00"  name='von' id="start" class="zeit"  />
           &ensp; ende:  &ensp;
        <input type="text" placeholder="10:00"  name="bis" id="ende" class="zeit"/>
            dauer: &ensp;
        <input type="number" value ="" name="dauer"  id="dauer" class="zeit"/>
>>>>>>> cb6e47704e07fc9c3fb6790bacbf3982a85aee1f

        <input type="hidden" id="beschreibung" name="beschreibung" />
            <br /> Teilnehmeranzahl  &emsp; Kontaktperson <br />
        <input type="number" name="maxTeilnehmer" id="zeilnehmeranzahl" />

        <input type="text" name="kontakt" id="kontaktperson" />
            <br /> Referend   &emsp;  Anmeldeschluss  <br />
        <input type="text"  name="koordination" id="referend" />

        <input type="date" name="anmeldeschluss" id="anmeldeschluss" /> <br />

<<<<<<< HEAD
        <input type="submit" onclick="myFunction()" id="senden" value="Senden">

=======
        <br /> Raum  <br/>
        <input type="text"  name="ortRaum" id="ortRaum" />



        <input type="submit" onclick="myFunction(); return true;" id="senden" value="Senden">
>>>>>>> cb6e47704e07fc9c3fb6790bacbf3982a85aee1f


            <script>
            function myFunction() {
              $('#beschreibung').value = $('#summernote').summernote('code');
            }

            </script>
    </form>
    </div>

</div>

</body>
