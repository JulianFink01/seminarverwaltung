<head>
  <!-- https://t3n.de/news/css3-dynamische-tabs-ohne-365861/-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.15/dist/summernote.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.15/dist/summernote.min.js"></script>

<link rel="stylesheet" type="text/css" href="styles/kurse-style.css">
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

            <div id="suchleiste">
           <input type="search" placeholder="Suche nach Kurs" list="kurssuche"/>
           <datalist id="kurssuche">
             <option>A</option>
             <option>A</option>
           </datalist>
         </div>
         <div id="inhalt">

         <div id="kurs1">
         <a href="?aktion=kurse#allgemeiner">Star wars Kurs</a>
         <p>Beschreibung!</p>
         <a href="#">bearbeiten  löschen</a>
         </div>

         <div id="kurs1">
         <a href="?aktion=kurse#allgemeiner">Kurs x2y2</a>
         <p>Beschreibung!</p>
         <a href="#">bearbeiten  löschen</a>
         </div>

         <div id="kurs1">
         <a href="?aktion=kurse#allgemeiner">Kurs x3y3</a>
          <p>Beschreibung!</p>
          <a href="#">bearbeiten  löschen</a>
         </div>

         <div id="kurs1">
         <a href="?aktion=kurse#allgemeiner">Kurs x4y4</a>
          <p>Beschreibung!</p>
          <a href="#">bearbeiten  löschen</a>
         </div>

         <div id="kurs1">
         <a href="?aktion=kurse#allgemeiner">Kurs x4y4</a>
          <p>Beschreibung!</p>
          <a href="#">bearbeiten  löschen</a>
         </div>

</div>

  <div id="kurs_erstellbutton">
  <a href="?aktion=kurse_erstellen"><img src="Images/fortbildung_erstellButton.png" id="erstell_button" alt="erstellen" /></a>
  </div>

        </section>
        <section id="funktionen">
            <h2><a href="#funktionen">Teilnehmer</a></h2>
            <!--Simons arbeitsbereich  mit teiler-style-->
            <div id="suchleiste">
             <input type="search" placeholder="Suche nach Teilnehmer" list="kurssuche"/>
             <datalist id="kurssuche">
               <option>A</option>
               <option>A</option>
             </datalist>
            </div>


             <div id="teilnehmer">
               <table>
                 <tr>
                   <th>Name</th>
                   <th>E-Mail</th>
                   <th class="status">Status</th>
                 </tr>
                 <tr>
                   <td>Hans</td>
                   <td>mail@mail</td>
                   <td class="status"> </td>
                 </tr>
                 <tr>
                   <td>lanz</td>
                   <td>mail@mail</td>
                   <td class="status"> </td>
                 </tr>
                 <tr>
                   <td>heinz</td>
                   <td>mail@mail</td>
                   <td style="background-color: red;" class="status"></td>
                 </tr>
                 <tr>
                   <td>meins</td>
                   <td>mail@mail</td>
                   <td style="background-color: green;" class="status"></td>
                 </tr>
                 <tr>
                   <td>deins</td>
                   <td>mail@mail</td>
                   <td style="background-color: red;" class="status"></td>
                 </tr>
             </table>
             </div>
        </section>
        <section id="emailsenden">
            <h2><a href="#emailsenden">E-Mail senden</a></h2>

            <div id="fenster">
            <form action="#" method="post">
                 <div id="summernote" ><p></p></div>
        <script>
               $(document).ready(function() {
        $('#summernote').summernote({height: 420});

    });
  </script>

          <input id="senden" type="button" value="senden">
      </div>
    </form>

        </section>
    </article>
  </div>

</body>
