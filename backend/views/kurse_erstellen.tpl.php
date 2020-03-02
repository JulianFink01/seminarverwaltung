<?php
if(!isset($_SESSION["loggedIn"])){
  header('Location: ../index.php?aktion=login');
}
?>
<html>
<head>


  <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.15/dist/summernote.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.15/dist/summernote.min.js"></script>


  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="styles/main-style.css">
  <link rel="stylesheet" type="text/css" href="styles/kurse-style.css">

</head>
<body>




    <header id="kopf">

      <h1>Kurse erstellen</h1>
    </header>
    <div id="kurserstelleninhalt">
      <div id="box">
          <form action="index.php?aktion=kurse_erstellen#allgemeiner"  method="post">
        <div id="input">
          <p class="einzug"> Titel <input type="text" name="titel" id="titelkurs" required/></p>
          <p class="einzug"> Datum <input type="date" name="datum" id="datumkurs" required/></p>
        </div>
        <p id="#">Beschreibung</p>


        <div id="summernote" ></div>


        <script>
        $(document).ready(function() {
          $('#summernote').summernote({height: 280,width: 1100 });

        });


        </script>



          <table id="kurszeiten">
            <tr>
              <td><a>Dauer:</a> &ensp;
              <input type="number" name="dauer"  class="zeit" required/>
            </td>
            <td>
              <a>Start:</a>  &ensp;
              <input type="text" placeholder="10:00"  name='von' id="start" class="zeit" required />
            </td>
            <td>
              &ensp; <a>Ende:</a>  &ensp;
              <input type="text" placeholder="10:00"  name="bis" id="ende" class="zeit"required/>
            </td>
          </tr>
        </table>

        <div class=kursdaten>
            <a> Koordination: </a>
            <input type="text"  name="koordination" id="kurs_koordination_erstellen" required />
            <a> Anmeldeschluss: </a>
          <input type="date" name="anmeldeschluss" id="kurs_anmeldeschluss_erstellen" required>
          <input type="hidden" id="beschreibung" name="beschreibung" />
          <input type="hidden" id="fortbildung_id" name="fortbildung_id" value="<?php echo $_GET["fortbildung_id"]?>" />
          <a> Teilnehmeranzahl: </a>
          <input type="number" name="maxTeilnehmer" id="maxTeilnehmer" required />
          <a>Kontaktperson: </a>
          <input type="text" name="kontakt" id="kontaktpersonen" required/>
        <a> Referent: </a>
        <input type="text"  name="referent" id="referent" required/>
          <a>Raum : </a>
          <input type="text"  name="ort_raum" id="ort_raum" required />

  </div>

          <input class="Senden_erstellen "type="submit" onclick="myFunction()" value="Senden">


          <script>
          function myFunction() {

            if (!isNaN($('#von').val()))
            {
              alert($('#von').val());

              return false;
            }else {
              //alert("i was cliecked");
            var text= $('#summernote').summernote('code');
            $('#beschreibung').val(text);


            return false;

          }
        }
          </script>
        </form>

      </div>

    </div>

  </body>
  </html>
