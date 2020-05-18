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
    <link rel="stylesheet" type="text/css" href="styles/main-style.css">
  <link rel="stylesheet" type="text/css" href="styles/hauptseite-style.css">
    <meta name="noindex" content="noindex" />
</head>

<body >

  <div id="gesamt">
    <header id="kopf">

      <h1>Verwaltung der Veranstaltungen</h1>
      <div id="logout_hauptseite"><a href="?aktion=logout"><img class="kurs_icons" id="home" src="images/logout.png" title="Abmelden" /></a></div>



    </header>

    <main id="hintergrund">
      <div id="f-erstellen">  <a onclick="triggerTextfeld()"><img src="images/fortbildung_erstellButton.png" title="Name ändern" id="erstell_button" alt="erstellen" /></a>
      </div>

      <div id="inhalt">

        <?php
          foreach($fortbildungen as $fortbildung){
        ?>

        <div id="textdeco">

              <div class="f_inhalt <?php if($fortbildung->getStatus() == 0){echo 'disabled';}?>">
                <a href="index.php?aktion=alle_kurse&fortbildung_id=<?php echo $fortbildung->getId();?>#allgemeiner" >
                <?php echo $fortbildung->getName();?>
              </a>

              <?php
              //Loading right image
              $img_status = 'images/status_aendern.png';
              if($fortbildung->getStatus() == 1){
                $img_status = 'images/status_aendern_durchgestrichen.png';
              }else{
                  $img_status = 'images/status_aendern.png';
              }

              ?>

                <a href="?aktion=loescheFortbildung&fortbildung_id=<?php echo $fortbildung->getId();?>" id="loesche_f"><img class="kurs_icons" width="35px" src="images/muelleimer_icon.png" title="löschen" /></a>
                <a href="?aktion=duplicateFortbildung&fortbildung_id=<?php echo $fortbildung->getId();?>" id="duplicate_f"><img class="kurs_icons" width="35px" src="images/clon_icon.png" title="duplizieren" /></a>
                <a href="?aktion=statusAendern&fortbildung_id=<?php echo $fortbildung->getId();?>" id="duplicate_f"><img class="kurs_icons" width="35px" src="<?php echo $img_status;?>" title="aktivieren/deaktivieren" /></a>
                <a href="#" onclick="bearbeiteName('<?php echo $fortbildung->getName();?>',<?php echo $fortbildung->getId();?>)" id="duplicate_f"><img class="kurs_icons" width="35px"  src="images/stift.png" title="Name ändern" /></a>
              </div>
        <?php }?>

      </div>
</div>


  </main>
</div>
  <?php
    include("views/aendereVeranstaltungstitel.tpl.html");
      include("views/kurs_hinzufuegen.tpl.html");
  ?>

</body>
</html>

<script type="text/javascript">

  function triggerTextfeld(){
    var field = document.getElementById("kurs-add");
    field.classList.toggle("show_name");
    document.getElementById("gesamt").classList.toggle("blur");
  }

  function closePopUp(){
    var field = document.getElementById("titel-aendern");
    field.classList.toggle("show_name");
    document.getElementById("gesamt").classList.toggle("blur");
  }

  function bearbeiteName(titel,fid){
    var field = document.getElementById("titel-aendern");
    var form = document.getElementById("t_aendern_form");
    field.classList.toggle("show_name");

    var l = document.createElement("LEGEND");
    var t = document.createTextNode("Veranstaltungstitel ändern");
            l.appendChild(t);
    var br1 = document.createElement("BR");
    var br2 = document.createElement("BR");

    var n = document.createElement("input");
                  n.type = "text";
                  n.name = "titel";
                  n.value = titel;
    var id = document.createElement("input");
                      id.type = "hidden";
                      id.name = "fid";
                      id.value = fid;
    var submit = document.createElement("input");
                      submit.id = "tbutton";
                      submit.type = "submit";
                      submit.name = "submit";
                      submit.value = "ändern";

    form.innerHTML = "";
    form.appendChild(l);
    form.appendChild(n);
    form.appendChild(br1);
    form.appendChild(br2);
    form.appendChild(id);
    form.appendChild(submit);
document.getElementById("gesamt").classList.toggle("blur");
  }
</script>
