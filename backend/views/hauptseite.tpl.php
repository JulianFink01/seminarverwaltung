<?php
if(!isset($_SESSION["loggedIn"])){
  header('Location: index.php?aktion=login');
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../styles/logo.png">
  <link rel="stylesheet" type="text/css" href="styles/hauptseite-style.css">
  <link rel="stylesheet" type="text/css" href="styles/main-style.css">
</head>

<body>

  <div id="gesamt">
    <header id="kopf">
      <h1>Verwaltung der Veranstaltungen</h1>
    </header>

    <main id="hintergrund">
      <div id="kurs_erstellbutton">
        <a onclick="triggerTextfeld()"><img src="images/fortbildung_erstellButton.png" id="erstell_button" alt="erstellen" /></a>
            <form id="textfeld" action="index.php?aktion=saveFortbildung" method="post">
              <legend>Veranstaltungen - erstellen:</legend>
              <input type="text" name="titel" placeholder="Titel"><br/>
              <input type="submit" value="erstellen" name="erstellen" id="button">
            </form>

      </div>
      <div id="inhalt">

        <?php
          foreach($fortbildungen as $fortbildung){
        ?>

        <div id="textdeco">

              <div class="f_inhalt">
                <a href="index.php?aktion=alle_kurse&fortbildung_id=<?php echo $fortbildung->getId();?>#allgemeiner" >
                <?php echo $fortbildung->getName();?>
              </a>
                <a href="?aktion=loescheFortbildung&fortbildung_id=<?php echo $fortbildung->getId();?>" id="loesche_f"><img class="kurs_icons" width="35px" src="images/muelleimer_icon.png" title="löschen" /></a>
              </div>
        <?php }?>

      </div>
</div>


  </main>


</body>
</html>

<script type="text/javascript">

  function triggerTextfeld(){
    var textfeld = document.getElementById("textfeld");
    textfeld.classList.toggle("show");
  }
</script>
