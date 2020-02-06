<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="styles/hauptseite-style.css">
  <link rel="stylesheet" type="text/css" href="styles/main-style.css">
</head>

<body>

  <div id="gesamt">
    <header id="kopf">
      <h1>Fortbildungen - Verwaltung</h1>
    </header>

    <main id="hintergrund">
      <div id="suchleiste">
        <input type="search" placeholder="Suche nach Fortbildung" list="fortbildungsuche"/>
        <datalist id="fortbildungsuche">
          <option>$value</option>
        </datalist>
      </div>

      <div id="inhalt">

        <?php
          require_once('models/fortbildung.php');
          foreach($fortbildungen as $fortbildung){
        ?>

        <div class="f_inhalt">
          <a href="?aktion=kurse#allgemeiner"><?php echo $fortbildung->getName();?></a>
        </div>
        <?php }?>

      </div>

      <div id="kurs_erstellbutton">
        <a onclick="triggerTextfeld()"><img src="Images/fortbildung_erstellButton.png" id="erstell_button" alt="erstellen" /></a>
          <div id="textfeld">
            <form action="#" method="post">
            <legend>Fortbildung - erstellen:</legend>
            <input type="text" name="titel" placeholder="Titel"><br/>
            <input type="submit" value="erstellen" name="erstellen" id="eingabe_b">
          </form>
          </div>
      </div>



  </main>
  </div>

</body>


<script type="text/javascript">

  function triggerTextfeld(){
    var textfeld = document.getElementById("textfeld");
    textfeld.classList.toggle("show");
  }
</script>
