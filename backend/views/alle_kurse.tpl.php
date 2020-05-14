<?php
if(!isset($_SESSION["loggedIn"])){
  header('Location: ../index.php?aktion=login');
}
?>
<!DOCTYPE html>
<html>
<head>
  <!-- https://t3n.de/news/css3-dynamische-tabs-ohne-365861/-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0" charset="utf-8">
    <link rel="icon" href="../styles/logo.png">
  <link rel="stylesheet" type="text/css" href="styles/main-style.css">
<link rel="stylesheet" type="text/css" href="styles/kurse-style.css">
  <meta name="noindex" content="noindex" />
</head>
<body>
  <header id="kopf">
    <a href="?aktion=hauptseite"><img class="kurs_icons" id="home" src="images/home_icon.png" title="Hauptseite" /></a>
 <h1>Kursverwaltung - <?php echo $fortbildung->getName() ?></h1>
   </header>

  <div id="leiste">
    <article class="infobox">
        <section id="allgemeiner">
            <h2><a href="#allgemeiner">Kurse</a></h2>


         <div id="inhalt">

           <?php
           if($kurse != NULL){
             foreach($kurse as $kurs){ ?>
         <div class="kurs">
         <h1><?php echo $kurs->getTitel();?></h1>
         <a href="?aktion=kurs_bearbeiten&fortbildung_id=<?php echo $_REQUEST["fortbildung_id"]?>&kurs_id=<?php echo $kurs->getId()?>"><img class="kurs_icons" width="35px" src="images/stift.png" title="bearbeiten" /></a>
         <a href="?aktion=loesche&fortbildung_id=<?php echo $_REQUEST["fortbildung_id"]?>&kurs_id=<?php echo $kurs->getId()?>"><img class="kurs_icons" width="35px" src="images/muelleimer_icon.png" title="löschen" /></a>
         <a href="?aktion=teilnehmerliste&kurs_id=<?php echo $kurs->getId()?>" target="drucken"><img class="kurs_icons" width="35px" src="images/personen.png" title="Teilnehmerliste" /></a>
         </div>
 <?php    }} ?>

</div>
<div id="kurs_erstellbutton">
<a href="index.php?aktion=kurse_erstellen&fortbildung_id=<?php echo $_REQUEST['fortbildung_id']?>#allgemeiner"><img src="images/fortbildung_erstellButton.png" id="erstell_button" alt="erstellen" /></a>
</div>

        </section>
        <section id="funktionen">
            <h2><a href="#funktionen">Teilnehmer</a></h2>


            <div class="csv">
              <form method="post" enctype="multipart/form-data" action="index.php?aktion=import_lehrer&fortbildung_id=<?php echo $_REQUEST['fortbildung_id']?>#funktionen">
                <label>
                  <span>CSV Datei(*.csv)</span>
                  <input name="datei" type="file" size="50" accept=".csv" class="button">
                </label>
                <input type="submit" id="csv_button" name="submit" value="hochladen">
              </form>
            </div>
            <div id="t_erstellen_btn"><a onclick="teilnehmerErstellen()"><img width="75px" src="images/teilnehmer-hinzufuegen.png" title="Teilnehmer hinzufuegen" /></a></div>



            <div id="teilnehmer">
               <table id="teilnehmer-tabelle">
                 <tr>
                   <th onclick="sortTableAlphabeticalVorname()">Vorname ↓</th>
                   <th onclick="sortTableAlphabeticalNachname()">Nachname ↓</th>
                   <th>Email</th>
                   <th>Token</th>
                   <th onclick="sortTableStatus()">Status ↓</th>
                 </tr>

                 <?php foreach ($teilnehmern as $teilnehmer){
                   ?>
                 <tr>
                   <td><?php echo $teilnehmer->getVorname();?></td>
                   <td><?php echo $teilnehmer->getNachname();?></td>
                   <td><?php echo $teilnehmer->getEmail();?></td>
                   <td><?php echo $teilnehmer->getToken();?></td>
                   <td class="hidden" ><?php if(NimmtTeil::findeNachFortbildungUndTeilnehemer($fortbildung,$teilnehmer)->getStatusFarbe() == 'blue'){echo 'A';}else{echo 'B';} ?></td>
                   <td style="background-color: var(--main-<?php echo NimmtTeil::findeNachFortbildungUndTeilnehemer($fortbildung,$teilnehmer)->getStatusFarbe();?>);">&nbsp;</td>
                   <td class="b_l"><a href="index.php?aktion=remove_lehrer_nimmtTeil&teilnehmer_id=<?php echo $teilnehmer->getId()?>&fortbildung_id=<?php echo $_REQUEST['fortbildung_id']?>#funktionen"><img width="45px" src="images/teilnehmer-entfernen.png" title="Teilnehmer entfernen" /></a></td>
                   <td class="b_l"><a onclick="bearbeiteBenutzer('<?php echo $teilnehmer->getToken();?>','<?php echo $teilnehmer->getVorname();?>', '<?php echo $teilnehmer->getNachname();?>', '<?php echo $teilnehmer->getEmail();?>', '<?php echo $_REQUEST['fortbildung_id']?>' )"><img width="45px" src="images/teilnehmer-bearbeiten.png" title="Teilnehmer bearbeiten" /></a></td>
                 </tr>
                 <?php } ?>

             </table>
             </div>
        </section>
        <section id="emailsenden">
            <h2><a href="#emailsenden">E-Mail senden</a></h2>

            <div id="fenster">
              <span>Der hier eingegebene Text wird zusammen mit einem personalisierten Anmeldelink an die Lehrer versendet.
                 Er kann auch als Erinnerungsemail für diejenigen genutzt werden, die sich noch nicht angemeldet haben,
                  da die Email immer nur an diejenigen, die sich noch nicht eingeteilt haben.</span>
            <form action="index.php?aktion=send_email&fortbildung_id=<?php echo $_REQUEST['fortbildung_id']?>" method="post">
              <textarea name="message" rows="30" cols="160" id="text"></textarea>

              <input id="btn_email_sendn"type="submit" id="button" name="senden" value="Senden" />
      </div>
    </form>

        </section>
    </article>
  </div>
<?php
  include("views/bearbeite_teilnehmer.tpl.html");
  include("views/teilnehmer_erstellen.tpl.html");
?>
</body>
</html>

<script type="text/javascript">

function teilnehmerErstellen(){
  var textfeld = document.getElementById("teilnehmer-erstellen");
  textfeld.classList.toggle("show_teilnehmer");
  document.getElementById("leiste").classList.toggle("blur");
  document.getElementById("kopf").classList.toggle("blur");
}
function closePopUp(){
  var field = document.getElementById("teilnehmer-bearbeiten");
  field.classList.toggle("show_teilnehmer");
  document.getElementById("leiste").classList.toggle("blur");
  document.getElementById("kopf").classList.toggle("blur");
}
function bearbeiteBenutzer(token, vorname, nachname, email,fortbildung_id){
  var field = document.getElementById("teilnehmer-bearbeiten");
  var form = document.getElementById("t_bearbeiten_form");
  field.classList.toggle("show_teilnehmer");

  var l = document.createElement("LEGEND");
  var t = document.createTextNode("Teilnehmer bearbeiten");
          l.appendChild(t);
  var br1 = document.createElement("BR");
  var br2 = document.createElement("BR");
  var br3 = document.createElement("BR");

  var vn = document.createElement("input");
                vn.type = "text";
                vn.name = "vorname";
                vn.value = vorname;
  var nn = document.createElement("input");
                    nn.type = "text";
                    nn.name = "nachname";
                    nn.value = nachname;
  var em = document.createElement("input");
                    em.type = "email";
                    em.name = "email";
                    em.value = email;
  var t = document.createElement("input");
                    t.type = "hidden";
                    t.name = "token";
                    t.value = token;
  var fid = document.createElement("input");
                    fid.type = "hidden";
                    fid.name = "fortbildung_id";
                    fid.value = fortbildung_id;
  var submit = document.createElement("input");
                    submit.id = "tbutton";
                    submit.type = "submit";
                    submit.name = "submit";
                    submit.value = "ändern";
                    submit.placeholder = "ändern";

  form.innerHTML = "";
  form.appendChild(l);
  form.appendChild(vn);
  form.appendChild(br1);
  form.appendChild(nn);
  form.appendChild(br2);
  form.appendChild(em);
  form.appendChild(br3);
  form.appendChild(t);
  form.appendChild(fid);
  form.appendChild(submit);

  document.getElementById("leiste").classList.toggle("blur");
  document.getElementById("kopf").classList.toggle("blur");
}

function sortTableAlphabeticalVorname() {
  var table, rows, switching, i, x, y, shouldSwitch;
  table = document.getElementById("teilnehmer-tabelle");
  switching = true;

  while (switching) {

    switching = false;
    rows = table.rows;

    for (i = 1; i < (rows.length - 1); i++) {

      shouldSwitch = false;
      x = rows[i].getElementsByTagName("TD")[0].innerHTML+rows[i].getElementsByTagName("TD")[1].innerHTML;
      y = rows[i+1].getElementsByTagName("TD")[0].innerHTML+rows[i+1].getElementsByTagName("TD")[1].innerHTML;

      // Check if the two rows should switch place:
      if (x.toLowerCase() > y.toLowerCase()) {
        // If so, mark as a switch and break the loop:
        shouldSwitch = true;
        break;
      }
    }
    if (shouldSwitch) {

      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
    }
  }
}
function sortTableStatus() {
  var table, rows, switching, i, x, y, shouldSwitch;
  table = document.getElementById("teilnehmer-tabelle");
  switching = true;

  while (switching) {

    switching = false;
    rows = table.rows;

    for (i = 1; i < (rows.length - 1); i++) {

      shouldSwitch = false;
      x = rows[i].getElementsByTagName("TD")[4].innerHTML;
      y = rows[i+1].getElementsByTagName("TD")[4].innerHTML;

      // Check if the two rows should switch place:
      if (x.toLowerCase() > y.toLowerCase()) {
        // If so, mark as a switch and break the loop:
        shouldSwitch = true;
        break;
      }
    }
    if (shouldSwitch) {

      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
    }
  }
}
function sortTableAlphabeticalNachname() {
  var table, rows, switching, i, x, y, shouldSwitch;
  table = document.getElementById("teilnehmer-tabelle");
  switching = true;

  while (switching) {

    switching = false;
    rows = table.rows;

    for (i = 1; i < (rows.length - 1); i++) {

      shouldSwitch = false;
      x = rows[i].getElementsByTagName("TD")[1].innerHTML+rows[i].getElementsByTagName("TD")[0].innerHTML;
      y = rows[i+1].getElementsByTagName("TD")[1].innerHTML+rows[i+1].getElementsByTagName("TD")[0].innerHTML;

      // Check if the two rows should switch place:
      if (x.toLowerCase() > y.toLowerCase()) {
        // If so, mark as a switch and break the loop:
        shouldSwitch = true;
        break;
      }
    }
    if (shouldSwitch) {

      rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
      switching = true;
    }
  }
}
</script>
