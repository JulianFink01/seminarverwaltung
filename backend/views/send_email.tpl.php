<?php
if(!isset($_SESSION["loggedIn"])){
  header('Location: index.php?aktion=login');
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Kurse Email gesendet</title>
        <meta charset="utf-8" />
        <link rel="stylesheet" type="text/css" href="styles/main-style.css">
        <link rel="stylesheet" type="text/css" href="styles/kurse-style.css">
    </head>
    <body>
        <header><h1>e-mail - senden</h1></header>
        <main>
                <p id="erfolg">Ihre E-mail wurde erfolgreich versendet</p>
        </main>
        <footer>
        </footer>
    </body>
</html>
