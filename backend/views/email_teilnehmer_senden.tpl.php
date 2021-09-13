<div id="email_teilnehmer_senden">
	<span id="close" onclick="teilnehmer_senden()">X</span>

	<form id="teilnehmer_senden" action="?aktion=send_email_teilnehmer&kurs_id=<?php echo $kurs->getId() ?>" method="post">

		<legend id="email_titel">Email an alle Teilnehmer Erstellen:</legend>

		<textarea name="email_text" id="email_text" cols="30" rows="10"></textarea>

		<input name="fortbildung_id" type="hidden" id="fortbildung_id" value="<?php echo $_REQUEST['fortbildung_id'] ?>" />

		<input id="tbutton" type="submit" value="Senden" name="senden" id="button" />

	</form>
</div>