<?php
if (!isset($_SESSION["loggedIn"])) header('Location: index.php?aktion=login');
?>
<!DOCTYPE html>
<html>

<head>

	<link rel="icon" href="../styles/logo.png">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="styles/main-style.css">
	<link rel="stylesheet" type="text/css" href="styles/login-style.css">
	<meta name="noindex" content="noindex" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />

</head>


<body>

	<div id="login">

		<div class="login-item">
			<img src="images/login-icon.png" alt="login-images">
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