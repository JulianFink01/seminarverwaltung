<?php

  if(isset( $_SESSION["loggedIn"])){
    header('Location: index.php?aktion=hauptseite');
  }
?>
<html>
<head>
    <link rel="icon" href="../styles/logo.png">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="styles/main-style.css">
  <link rel="stylesheet" type="text/css" href="styles/login-style.css">
</head>
<body>
  <div id="login">

      <div class="login-item">
          <img src="Images/login-icon.png" alt="login-image">
      </div>

      <div class="login-item">

        <form id="login-form" method="get" action="index.php?aktion=login">
          <legend>Administrationpanel</legend>
          <input type="text" placeholder="Benutzername" name="key" required>
          <input type="password" placeholder="Passwort" name="passwd" required>
          <input type="submit" name="Login" value="Login">
        </form>

      </div>
  </div>
</body>
</html>
