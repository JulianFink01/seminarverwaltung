<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="styles/hauptseite-style.css">
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
<!--<div class="f_inhalt">
<a href="?aktion=kurse#allgemeiner">Fortbildung x2y2</a>

</div>

<div class="f_inhalt">
<a href="?aktion=kurse#allgemeiner">Fortbildung x3y3</a>

</div>

<div class="f_inhalt">
<a href="?aktion=kurse#allgemeiner">Fortbildung x4y4</a>

</div>

<div class="f_inhalt">
<a href="?aktion=kurse#allgemeiner">Fortbildung x4y4</a>

</div>

<div class="f_inhalt">
<a href="?aktion=kurse#allgemeiner">Star wars</a>

</div>

<div class="f_inhalt">
<a href="?aktion=kurse#allgemeiner">Fortbildung x2y2</a>

</div>

<div class="f_inhalt">
<a href="?aktion=kurse#allgemeiner">Fortbildung x3y3</a>

</div>

<div class="f_inhalt">
<a href="?aktion=kurse#allgemeiner">Fortbildung x4y4</a>

</div>

<div class="f_inhalt">
<a href="?aktion=kurse#allgemeiner">Fortbildung x4y4</a>

</div>-->


</div>
<div id="kurs_erstellbutton">
<a onclick="triggerTextfeld()"><img src="Images/fortbildung_erstellButton.png" id="erstell_button" alt="erstellen" /></a>
<div id="textfeld">
  <legend>Fortbildung - erstellen:</legend>
  <input type="text" placeholder="Titel"><br/>
  <input type="button" value="erstellen" name="erstellen" id="eingabe_b">
</div>

</div>

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
