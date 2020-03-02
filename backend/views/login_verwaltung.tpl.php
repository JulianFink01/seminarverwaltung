<?php
if(!isset($_SESSION["loggedIn"])){
  header('Location: index.php?aktion=login');
}
?>
<html>
<head>
    <link rel="icon" href="../logo.png">
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

        <form id="login-form">
          <legend>Login - Verwaltung</legend>
          <input type="text" placeholder="Personal key" name="key" required>
          <input type="password" placeholder="Password" name="passwd" required>
          <input type="submit" value="Login">
        </form>

      </div>
  </div>
</body>
</html>
