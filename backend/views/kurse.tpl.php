<head>
  <!-- https://t3n.de/news/css3-dynamische-tabs-ohne-365861/-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="styles/kurse-style.css">
  <script src="http://cdn.ckeditor.com/4.6.2/standard-all/ckeditor.js"></script>
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

            <main id="kurse_anzeigen">

            </main>

<aside id="kreisbutton">
  <div></div>
</aside>

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
               <th>Status</th>
             </tr>
             <tr>
               <td>Hans</td>
               <td>mail@mail</td>
               <td>Ausegewehlt</td>
             </tr>
         </table>
         </div>
        </section>
        <section id="preise">
            <h2><a href="#preise">E-Mail senden</a></h2>

            <div id="fenster">
          <textarea  id="editor1" name="editor1"  rows="25" cols="100" style="width: 1000px;">Hier Text eingeben.</textarea>
           <script>
      CKEDITOR.replace( "editor1", {
          height: 260,
          width: 700,
      } );
  </script>

          <input id="senden" type="button" value="senden">
      </div>

        </section>
    </article>
  </div>

</body>
