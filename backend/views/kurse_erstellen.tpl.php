<?php
if (!isset($_SESSION["loggedIn"])) header('Location: index.php?aktion=login');
?>
<!DOCTYPE html>
<html>

<head>

	<link href="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.15/dist/summernote.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.15/dist/summernote.min.js"></script>
	<link rel="icon" href="../styles/logo.png">

	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="styles/main-style.css">
	<link rel="stylesheet" type="text/css" href="styles/kurse-style.css">
	<meta name="noindex" content="noindex" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />

</head>


<body>

	<header id="kopf">

		<div id="logout">
			<a href="?aktion=logout">
				<img class="kurs_icons" id="home" src="images/logout.png" title="Abmelden" />
			</a>
		</div>

		<div id="home-redi">
			<a href="?aktion=hauptseite">
				<img class="kurs_icons" id="home" src="images/home_icon.png" title="Hauptseite" />
			</a>
		</div>

		<h1>Kurse erstellen</h1>

	</header>

	</header>

	<div id="kurserstelleninhalt">
		<div id="box">
			<form action="index.php?aktion=kurse_erstellen#allgemeiner" method="post">

				<div id="input">
					<p class="einzug"> Titel <input type="text" name="titel" id="titelkurs" required /></p>
					<p class="einzug"> Datum <input type="date" name="datum" id="datumkurs" required placeholder="31-12-2020" /></p>
				</div>

				<p id="#">Beschreibung</p>

				<div id="summernote"></div>

				<script>
					$(document).ready(function() {
						$('#summernote').summernote({
							height: 280
						});

					});
				</script>

				<table id="kurszeiten">

					<tr>

						<td>
							<a>Dauer in Stunden:</a> &ensp;
							<input type="number" name="dauer" step="0.5" class="zeit" value="0" />
						</td>

						<td>
							<a>Start:</a> &ensp;
							<input type="text" placeholder="10:00" name='von' id="start" class="zeit" pattern="([01]?[0-9]|2[0-3]):[0-5][0-9]" required />
						</td>

						<td>
							&ensp; <a>Ende:</a> &ensp;
							<input type="text" placeholder="10:00" name="bis" id="ende" class="zeit" pattern="([01]?[0-9]|2[0-3]):[0-5][0-9]" required />
						</td>

					</tr>

				</table>

				<div class=kursdaten>

					<a> Koordination: </a>
					<input type="text" name="koordination" id="kurs_koordination_erstellen" />

					<a> Anmeldeschluss: </a>
					<input type="date" name="anmeldeschluss" id="kurs_anmeldeschluss_erstellen" />

					<input type="hidden" id="beschreibung" name="beschreibung" />
					<input type="hidden" id="fortbildung_id" name="fortbildung_id" value="<?php echo $_GET["fortbildung_id"] ?>" />

					<a> Maximale Teilnehmer: </a>
					<input type="number" name="maxTeilnehmer" id="maxTeilnehmer" />

					<a>Kontaktperson: </a>
					<input type="text" name="kontakt" id="kontaktpersonen" />

					<a> Referent: </a>
					<input type="text" name="referent" id="referent" required />

					<a>Raum/Ort : </a>
					<input type="text" name="ort_raum" id="ort_raum" required />

				</div>

				<input class="Senden_erstellen " type="submit" onclick="myFunction()" value="<?php echo (isset($_GET['kurs_id'])) ? 'Bearbeiten' : 'Speichern'; ?>">

				<div id="back">
					<a href="?aktion=alle_kurse&fortbildung_id=<?php echo $_REQUEST["fortbildung_id"] ?>#allgemeiner">
						<img class="kurs_icons" id="zurueck" src="images/zurueck_icon.png" title="Zurück" />
					</a>
				</div>

				<script type="text/javascript">
					function myFunction() {
						//alert("i was cliecked");
						let text = $('#summernote').summernote('code');
						$('#beschreibung').val(text);
						return false;
					}
				</script>

			</form>
		</div>
	</div>

</body>

</html>