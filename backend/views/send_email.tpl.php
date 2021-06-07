<?php
if (!isset($_SESSION["loggedIn"])) header('Location: index.php?aktion=login');
?>
<!DOCTYPE html>
<html>

<head>

	<link rel="icon" href="../styles/logo.png">
	<title>Kurse Email gesendet</title>
	<meta charset="utf-8" />
	<link rel="stylesheet" type="text/css" href="styles/main-style.css">
	<link rel="stylesheet" type="text/css" href="styles/send_email.css">
	<meta name="noindex" content="noindex" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />

</head>


<body>

	<div id="nicht-angemeldet">

		<p>Ihre E-mail wurde erfolgreich versendet

			<span id="back-to-login">
				<br>
				<a href="index.php?aktion=hauptseite">Zurück zur Hauptseite</a>
			</span>

		</p>

	</div>

	<footer>
	</footer>

</body>

</html>