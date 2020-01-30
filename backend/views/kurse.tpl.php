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
            <form action="" method="post" >
          <textarea  id="editor1" name="editor1"  rows="25" cols="100" style="width: 1000px;">Hier Text eingeben.</textarea>
           <script>
      CKEDITOR.replace( "editor1", {
          height: 260,
          width: 700,
      } );
  </script>

          <input id="senden" type="button" value="senden">
        </form>
      </div>

        </section>
    </article>
  </div>

</body>
