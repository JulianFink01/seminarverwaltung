<?php
if (!isset($_SESSION["loggedIn"])) header('Location: index.php?aktion=login');
?>
<!DOCTYPE html>
<html>

<head>

	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="../styles/logo.png">
	<link rel="stylesheet" type="text/css" href="styles/main-style.css">
	<link rel="stylesheet" type="text/css" href="styles/hauptseite-style.css">
	<meta name="noindex" content="noindex" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />

</head>


<body>

	<header id="kopf">

		<div id="logout_hauptseite">
			<a href="?aktion=logout">
				<img class="kurs_icons" id="home" src="images/logout.png" title="Abmelden" />
			</a>
		</div>

		<h1>Verwaltung der Veranstaltungen</h1>

	</header>


	<main id="hintergrund">

		<div id="f-erstellen">
			<a onclick="triggerTextfeld()">
				<img src="images/fortbildung_erstellButton.png" title="Veranstaltung erstellen" id="erstell_button" alt="erstellen" />
			</a>
		</div>

		<div id="inhalt">

			<?php
			foreach ($fortbildungen as $fortbildung) {
			?>
				<div id="textdeco">
					<div class="f_inhalt <?php if ($fortbildung->getStatus() == 0) echo 'disabled'; ?>">

						<a href="index.php?aktion=alle_kurse&fortbildung_id=<?php echo $fortbildung->getId(); ?>#allgemeiner">
							<?php echo $fortbildung->getName(); ?>
						</a>

						<?php
						//Loading right images
						$img_status = ($fortbildung->getStatus() == 1)
							? 'images/status_aendern_durchgestrichen.png'
							: 'images/status_aendern.png';
						?>

						<a href="?aktion=loescheFortbildung&fortbildung_id=<?php echo $fortbildung->getId(); ?>" id="loesche_f">
							<img class="kurs_icons" width="35px" src="images/muelleimer_icon.png" title="löschen" />
						</a>

						<a href="?aktion=duplicateFortbildung&fortbildung_id=<?php echo $fortbildung->getId(); ?>" id="duplicate_f">
							<img class="kurs_icons" width="35px" src="images/clon_icon.png" title="duplizieren" />
						</a> 

						<a href="?aktion=statusAendern&fortbildung_id=<?php echo $fortbildung->getId(); ?>" id="duplicate_f">
							<img class="kurs_icons" width="35px" src="<?php echo $img_status; ?>" title="aktivieren/deaktivieren" />
						</a>

						<a href="#" onclick="bearbeiteName('<?php echo $fortbildung->getName(); ?>',<?php echo $fortbildung->getId(); ?>)" id="duplicate_f">
							<img class="kurs_icons" width="35px" src="images/stift.png" title="Name ändern" />
						</a>

					</div>
				</div>
			<?php
			}
			?>

		</div>

	</main>

	<?php
	include("views/aendereVeranstaltungstitel.tpl.html");
	include("views/kurs_hinzufuegen.tpl.html");
	?>

</body>

</html>


<script type="text/javascript">
	function triggerTextfeld() {
		let field = document.getElementById("kurs-add");
		field.classList.toggle("show_name");
		document.getElementById("gesamt").classList.toggle("blur");
	}

	function closePopUp() {
		let field = document.getElementById("titel-aendern");
		field.classList.toggle("show_name");
		document.getElementById("gesamt").classList.toggle("blur");
	}

	function bearbeiteName(titel, fid) {
		let field = document.getElementById("titel-aendern");
		let form = document.getElementById("t_aendern_form");
		field.classList.toggle("show_name");

		let l = document.createElement("LEGEND");
		let t = document.createTextNode("Veranstaltungstitel ändern");
		l.appendChild(t);
		let br1 = document.createElement("BR");
		let br2 = document.createElement("BR");

		let n = document.createElement("input");
		n.type = "text";
		n.name = "titel";
		n.value = titel;
		let id = document.createElement("input");
		id.type = "hidden";
		id.name = "fid";
		id.value = fid;
		let submit = document.createElement("input");
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