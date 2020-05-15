<div id="teilnehmer-erstellen">
    <span id="close" onclick="teilnehmerErstellen()">X</span>
    <form action="index.php?aktion=saveTeilnehmer&fortbildung_id=<?php echo $fortbildung->getId() ?>" id="t_bearbeiten_form" method="post">


            <form id="textfeld" action="index.php?aktion=saveTeilnehmer&fortbildung_id=<?php echo $_REQUEST["fortbildung_id"]?>" method="post">
              <legend>Teilnehmer erstellen</legend>
              <input type="text" name="vorname" placeholder="Vorname" required><br><br>
              <input type="text" name="nachname" placeholder="Nachname" required><br><br>
              <input type="text" name="email" placeholder="E-Mail" required><br>
              <input id="tbutton"type="submit" value="erstellen" name="erstellen" id="button">
            </form>
    </form>
</div>
