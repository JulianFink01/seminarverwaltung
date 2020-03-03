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
      <h1>Fortbildungen - Verwaltung</h1>
    </header>

    <main id="hintergrund">
      <div id="kurs_erstellbutton">
        <a onclick="triggerTextfeld()"><img src="Images/fortbildung_erstellButton.png" id="erstell_button" alt="erstellen" /></a>
            <form id="textfeld" action="index.php?aktion=saveFortbildung" method="post">
              <legend>Fortbildung - erstellen:</legend>
              <input type="text" name="titel" placeholder="Titel"><br/>
              <input type="submit" value="erstellen" name="erstellen" id="button">
            </form>

      </div>
      <div id="inhalt">

        <?php
          foreach($fortbildungen as $fortbildung){
        ?>

        <div id="textdeco">
          <a href="index.php?aktion=alle_kurse&fortbildung_id=<?php echo $fortbildung->getId();?>#allgemeiner" >
              <div class="f_inhalt">
                <?php echo $fortbildung->getName();?>
              </div>
            </a>
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
