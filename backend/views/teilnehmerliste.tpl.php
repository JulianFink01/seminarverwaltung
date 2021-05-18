<?php if(!isset($_SESSION["loggedIn"])){
  header('Location: index.php?aktion=login');}
?>

<!DOCTYPE html>
<html>
<head>
  <link rel="icon" href="../styles/logo.png">
  <!-- https://t3n.de/news/css3-dynamische-tabs-ohne-365861/ -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0" charset="utf-8">
  <link rel="stylesheet" type="text/css" href="../backend/styles/main-style.css">
  <link rel="stylesheet" type="text/css" href="../backend/styles/teilnehmerliste.css">
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
</head>
<body>

  <main>
    <header id="kopf">
      <img src="../backend/images/logo.png" alt="Logo"/>
    </header>

    <div id="beschreibung">
      <h1>Unterschriftenliste</h1>
      <table id="infos-table">
        <tr>
          <td>THEMA:</td><td><?php echo $kurse->getTitel()?></td>
        </tr>
        <tr>
          <td>TAG:</td><td><?php echo str_replace('/', '.', date("d/m/Y", strtotime($kurse->getDatum())));?></td>
        </tr>
        <tr>
          <td>UHRZEIT:</td><td>von <?php echo $kurse->getVon()?> bis <?php echo $kurse->getBis()?></td>
        </tr>
        <tr>
          <td>REFERENT:</td><td> <?php echo $kurse->getReferent()?></td>
        </tr>
        <tr>
          <td>RAUM:</td><td><?php echo $kurse->getOrt_raum()?></td>
        </tr>
      </table>
    </div>

    <div id="teilnehmer">
      <table id="tn-table">
        <tr>
          <th class="nr">Nr.</th>
          <th>Name</th>

          <?php if ($vormittag) { ?>
          <th>Vormittag</th>
          <?php
            } 
            elseif ($nachmittag) {
          ?>
          <th>Nachmittag</th>
          <?php
            }
            else{
          ?>
          <th>Vormittag</th>
          <th>Nachmittag</th>
          <?php
            } 
          ?>

        </tr>

        <?php
          $i = 1;
            foreach ($teilnehmern as $teilnehmer){
        ?>

        <tr>
          <td class="nr"><?php echo $i?></td>
          <td><?php echo $teilnehmer->getVorUndNachname();?></td>

          <?php if ($vormittag || $nachmittag) { ?>
          <td></td>
          <?php
            } 
            else{
          ?>
            <td></td>
            <td></td>
          <?php
            }
          ?>
          
        </tr>

        <?php $i++; } ?>

      </table>
    </div>
  </main>

</body>
</html>
