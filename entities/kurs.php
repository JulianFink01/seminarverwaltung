<?php
class Kurs
{
	protected $id = 0;
	protected $datum = "";
	protected $titel = "";
	protected $maxTeilnehmer = 0;
	protected $referent = "";
	protected $beschreibung = "";
	protected $ort_raum = "";
	protected $kontakt = "";
	protected $von = "";
	protected $bis = "";
	protected $unterschriftsliste_zweispaltig = 0;
	protected $koordination = "";
	protected $anmeldeschluss = "";
	protected $fortbildung_id = 0;
	protected $dauer = 0;
	protected $f_folgekurs_id = Null;

	public function  __toString()
	{
		return 'Id:' . $this->id . ', Datum: ' . $this->datum . ', Titel: ' . $this->titel . ', MaxTeilnehmer: ' . $this->maxTeilnehmer . ', Referent: ' . $this->referent . ', Beschreibung: ' . $this->beschreibung . ', Ort-Raum: ' . $this->ort_raum . ', Kontakt: ' . $this->kontakt . ', Von: ' . $this->von . ', Bis:' . $this->bis . ', Unterschriftsliste-Zweispaltig: ' .
			$this->unterschriftsliste_zweispaltig . ', Koordination: ' . $this->koordination . ', Anmeldeschluss: ' . $this->anmeldeschluss . ', FortbildungsId: ' . $this->fortbildung_id . ', Dauer: ' . $this->dauer;
	}

	public function __construct($daten = array())
	{
		// wenn $daten nicht leer ist, rufe die passenden Setter auf
		if ($daten) {
			foreach ($daten as $k => $v) {
				$setterName = 'set' . ucfirst($k);
				// wenn ein ungültiges Attribut übergeben wurde
				// (ohne Setter), ignoriere es
				if (method_exists($this, $setterName))
					$this->$setterName($v);
			}
		}
	}

	public function toArray($mitId = true)
	{
		$attribute = get_object_vars($this);
		if ($mitId === false)
			// wenn $mitId false ist, entferne den Schlüssel id aus dem Ergebnis
			unset($attribute['id']);
		return $attribute;
	}

	public function speichere()
	{
		if ($this->getId() > 0) {
			// wenn die ID eine Datenbank-ID ist, also größer 0, führe ein UPDATE durch
			$this->_update();
		} else {
			// ansonsten einen INSERT
			$this->_insert();
		}
	}

	public function setId($id)
	{
		$this->id = $id;
	}

	public function getId()
	{
		return $this->id;
	}

	public function setDatum($datum)
	{
		$this->datum = $datum;
	}

	public function getDatum()
	{
		return $this->datum;
	}

	public function setTitel($titel)
	{
		$this->titel = $titel;
	}

	public function getTitel()
	{
		return $this->titel;
	}

	public function setMaxTeilnehmer($maxTeilnehmer)
	{
		$this->maxTeilnehmer = $maxTeilnehmer;
	}

	public function getMaxTeilnehmer()
	{
		return $this->maxTeilnehmer;
	}

	public function setReferent($referent)
	{
		$this->referent = $referent;
	}

	public function getReferent()
	{
		return $this->referent;
	}

	public function setBeschreibung($beschreibung)
	{
		$this->beschreibung = $beschreibung;
	}

	public function getBeschreibung()
	{
		return $this->beschreibung;
	}

	public function getShortBeschreibung()
	{
		return substr($this->beschreibung, 0, 150) . '...';
	}

	public function setOrt_raum($ortRaum)
	{
		$this->ort_raum = $ortRaum;
	}

	public function getOrt_raum()
	{
		return $this->ort_raum;
	}

	public function setKontakt($kontakt)
	{
		$this->kontakt = $kontakt;
	}

	public function getKontakt()
	{
		return $this->kontakt;
	}

	public function setVon($von)
	{
		$this->von = $von;
	}

	public function getVon()
	{
		$von = $this->von;
		$von = substr($von, 0, 5);
		return $von;
	}

	public function setBis($bis)
	{
		$this->bis = $bis;
	}

	public function getBis()
	{
		$bis = $this->bis;
		$bis = substr($bis, 0, 5);
		return $bis;
	}

	public function getF_folgekurs_id()
	{
		return $this->f_folgekurs_id;
	}

	public function setF_folgekurs_id($id)
	{
		$this->f_folgekurs_id = $id;
	}

	public function getFormatedDate()
	{
		$jahr = substr($this->getDatum(), 0, 4);
		$monat = substr($this->getDatum(), 5, 2);
		$tag = substr($this->getDatum(), 8, 2);

		$monat = $this->formatMonth($monat);

		$datum = $tag . '. ' . $monat . ' ' . $jahr;
		$von = substr($this->getVon(), 0, 5);
		$bis = substr($this->getBis(), 0, 5);
		if ($von != "") {
			$datum = $datum . ' <span class="info-not-important">von </span>' . $von . '<span class="info-not-important"> - </span>' . $bis . ' Uhr';
		}
		return $datum;
	}

	public function istAbgelaufen()
	{
		$currentDate =  date("Y-m-d H:i:s");
		$kursdate = $this->getDatum();
		return (new DateTime($kursdate) <= new DateTime($currentDate)) ? true : false;
	}

	public function getFormatedAnmeldeschluss()
	{
		$jahr = substr($this->getDatum(), 0, 4);
		$monat = substr($this->getDatum(), 5, 2);
		$tag = substr($this->getDatum(), 8, 2);

		$monat = $this->formatMonth($monat);

		return $tag . '. ' . $monat . ' ' . $jahr;
	}

	public function formatMonth($monat)
	{
		switch ($monat) {
			case '01':
				return "Januar";
			case '02':
				return "Februar";
			case '03':
				return "März";
			case '04':
				return "April";
			case '05':
				return "Mai";
			case '06':
				return "Juni";
			case '07':
				return "Juli";
			case '08':
				return "August";
			case '09':
				return "September";
			case '10':
				return "Oktober";
			case '11':
				return "November";
			case '12':
				return "Dezember";
		}
	}
	public function setUnterschriftsliste_zweispaltig($bool)
	{
		$this->unterschriftsliste_zweispaltig = ($bool) ? 1 : 0;
	}

	public function getUnterschriftsliste_zweispaltig()
	{
		return $this->unterschriftsliste_zweispaltig;
	}

	public function setKoordination($koordination)
	{
		$this->koordination = $koordination;
	}

	public function getKoordination()
	{
		return $this->koordination;
	}

	public function setAnmeldeschluss($anmeldeschluss)
	{
		$this->anmeldeschluss = $anmeldeschluss;
	}

	public function getAnmeldeSchluss()
	{
		return $this->anmeldeschluss;
	}

	public function setFortbildung_id($fortbildung_id)
	{
		$this->fortbildung_id = $fortbildung_id;
	}

	public function getFortbildung_id()
	{
		return $this->fortbildung_id;
	}

	public function setDauer($dauer)
	{
		$this->dauer = $dauer;
	}

	public function getDauer()
	{
		return $this->dauer;
	}

	public function loesche()
	{
		$hauptkurs = $this->istFolgekursVon();
		//var_dump($hauptkurs);

		//überprüfen ob der Kurs, Folgekurse hat
		if($this->getF_folgekurs_id() != NULL){
			$f_folgekurs_id = $this->getF_folgekurs_id();
			$folgekurs = kurs::finde($f_folgekurs_id);
			$folgekurs->loesche();
		}

		//üperprüfen ob das ein Folgekurs ist
		if ($hauptkurs != null) {
			// Beim Hauptkurs die Folgekursid auf Null setzen
			$hauptkurs->setF_folgekurs_id(null);
			$hauptkurs->speichere();
		}
		//Aus nimmt_teil löschen
		$sql2 = 'UPDATE f_nimmt_teil set kurs_id = NULL WHERE kurs_id=?';
		$abfrage2 = DB::getDB()->prepare($sql2);
		$abfrage2->execute(
			array(
				$this->getId()
			)
		);
		//Kurs löschen
		$sql = 'DELETE FROM f_kurs WHERE id=?';
		$abfrage = DB::getDB()->prepare($sql);
		$abfrage->execute(
			array(
				$this->getId()
			)
		);

		// Objekt existiert nicht mehr in der DB, also muss die ID zurückgesetzt werden
		$this->id = 0;
	}
	public function getAllTeilnehmer()
	{
		return NimmtTeil::findeAlleKursTeilnehmer($this);
	}


	/* ***** Private Methoden ***** */

	public function nimmtAnKursTeil(Teilnehmer $teilnehmer)
	{
		$sql = 'SELECT * FROM f_nimmt_teil WHERE kurs_id=? and teilnehmer_id = ? and fortbildung_id = ?';
		$abfrage = DB::getDB()->prepare($sql);
		$abfrage->execute(array($this->getId(), $teilnehmer->getId(), $this->getFortbildung_id()));
		$erg = $abfrage->fetchAll();
		return ($erg) ? true : false;
	}

	//SELECT count(*) FROM nimmt_teil WHERE kurs_id=1 and fortbildung_id = 1
	public function getTeilnehmerAnzahl()
	{
		$sql = 'SELECT count(*) as anzahl FROM f_nimmt_teil WHERE kurs_id=? and fortbildung_id = ?';
		$abfrage = DB::getDB()->prepare($sql);
		$abfrage->execute(
			array(
				$this->getId(),
				$this->getFortbildung_id()
			)
		);
		$erg = $abfrage->fetchAll();
		return $erg[0]['anzahl'];
	}

	private function _insert()
	{
		if ($this->getMaxTeilnehmer() <= 0) $this->setMaxTeilnehmer(NULL);
		if ($this->getAnmeldeschluss() == "") $this->setAnmeldeschluss(NULL);
		$sql = 'INSERT INTO f_kurs ( datum, titel, maxTeilnehmer, referent, beschreibung, ort_raum,kontakt, von, bis, unterschriftsliste_zweispaltig, koordination, anmeldeschluss, fortbildung_id, dauer, f_folgekurs_id)'
			. 'VALUES (:datum, :titel, :maxTeilnehmer, :referent, :beschreibung, :ort_raum,:kontakt,:von,:bis,:unterschriftsliste_zweispaltig, :koordination, :anmeldeschluss, :fortbildung_id, :dauer, :f_folgekurs_id)';
		$abfrage = DB::getDB()->prepare($sql);
		$abfrage->execute(
			$this->toArray(false)
		);
		// setze die ID auf den von der DB generierten Wert
		$this->id = DB::getDB()->lastInsertId();
	}

	private function _update()
	{
		if ($this->getMaxTeilnehmer() <= 0) $this->setMaxTeilnehmer(NULL);
		if ($this->getAnmeldeschluss() == "") $this->setAnmeldeschluss(NULL);
		$sql = 'UPDATE f_kurs SET id=:id, datum=:datum, titel=:titel,maxTeilnehmer=:maxTeilnehmer,referent=:referent,beschreibung=:beschreibung,ort_raum=:ort_raum,kontakt=:kontakt,von=:von,bis=:bis,unterschriftsliste_zweispaltig=:unterschriftsliste_zweispaltig,koordination=:koordination,anmeldeschluss=:anmeldeschluss,fortbildung_id=:fortbildung_id,dauer=:dauer,f_folgekurs_id=:f_folgekurs_id WHERE id=:id';
		$abfrage = DB::getDB()->prepare($sql);
		$abfrage->execute(
			$this->toArray()
		);
	}


	/* ***** public Methoden ***** */

	public static function findeAlle()
	{
		$sql = 'SELECT * FROM f_kurs';
		$abfrage = DB::getDB()->query($sql);
		$abfrage->setFetchMode(
			PDO::FETCH_CLASS,
			'Kurs'
		);
		return $abfrage->fetchAll();
	}

	public static function finde($id)
	{
		$sql = 'SELECT * FROM f_kurs WHERE id=?';
		$abfrage = DB::getDB()->prepare($sql);
		$abfrage->execute(
			array($id)
		);
		$abfrage->setFetchMode(
			PDO::FETCH_CLASS,
			'Kurs'
		);
		return $abfrage->fetch();
	}

	public static function findeNachFortbildung(Fortbildung $fortbildung)
	{
		$sql = 'SELECT * FROM f_kurs WHERE fortbildung_id=?';
		$abfrage = DB::getDB()->prepare($sql);
		$abfrage->execute(
			array(
				$fortbildung->getId()
			)
		);
		$abfrage->setFetchMode(
			PDO::FETCH_CLASS,
			'Kurs'
		);
		return $abfrage->fetchAll();
	}

	public static function findeNachBenutzer(Teilnehmer $teilnehmer)
	{
		return NimmtTeil::findeAlleKurseNachTeilnehmer($teilnehmer);
	}

	public static function findeNachBenutzerUndFortbildung(Teilnehmer $teilnehmer, Fortbildung $fortbildung)
	{
		return NimmtTeil::findeNachFortbildungUndTeilnehemer($fortbildung, $teilnehmer);
	}

	public static function findeAlleTeilnehmer(Kurs $kurs)
	{
		return NimmtTeil::findeAlleKursTeilnehmer($kurs);
	}

	public function loescheTeilnehmer(Teilnehmer $teilnehmer)
	{
		$sql = 'Update f_nimmt_teil set kurs_id = null'
			. 'WHERE teilnehmer_id=? AND kurs_id=?';
		$abfrage = DB::getDB()->prepare($sql);
		$abfrage->execute(
			array(
				$teilnehmer->getId(),
				$this->getId()
			)
		);
	}

	public function teilnehmen(Teilnehmer $teilnehmer)
	{
		$sql = 'Update f_nimmt_teil set kurs_id = ? WHERE teilnehmer_id = ? and fortbildung_id = ?';
		$abfrage = DB::getDB()->prepare($sql);
		$abfrage->execute(
			array(
				$this->getId(),
				$teilnehmer->getId(),
				$this->getFortbildung_id()
			)
		);
	}
	public function abmelden(Teilnehmer $teilnehmer)
	{
		$sql = 'Update f_nimmt_teil set kurs_id = NULL WHERE teilnehmer_id = ? and fortbildung_id = ?';

		$abfrage = DB::getDB()->prepare($sql);
		$abfrage->execute(
			array(
				$teilnehmer->getId(),
				$this->getFortbildung_id()
			)
		);
	}

	public function istFolgekursVon()
	{
		$alleKurse = Kurs::findeAlle();
		foreach ($alleKurse as $kurs) {
			if ($this->getId() == $kurs->getF_folgekurs_id())
				return $kurs;
		}
		return null;
	}

	
	public static function getHauptkurs($kursid)
	{
		$kurs = Kurs::finde($kursid);
		if($kurs->istFolgekursVon() != null){
			return Kurs::getHauptkurs($kurs->istFolgekursVon()->getId());
		}else{
			return $kurs;
		}
	}

	public function hatFolgekurs()
	{
		return ($this->getF_folgekurs_id() != null) ? true : false;
	}


	public function completeKurs()
	{
		if ($this->getDatum() == null) $this->setDatum(date("Y-m-d"));
		if ($this->getTitel() == null) $this->setTitel("Unbennanter Kurs");
		if ($this->getMaxTeilnehmer() == null) $this->setMaxTeilnehmer(100);
		if ($this->getReferent() == null) $this->setReferent("Kein Refferent");
		if ($this->getBeschreibung() == null) $this->setBeschreibung("Keine Beschreibung vorhanden");
		if ($this->getOrt_raum() == null) $this->setOrt_raum(" ");
		if ($this->getKontakt() == null) $this->setKontakt(" ");
		if ($this->getVon() == null) $this->setVon("00:00:00");
		if ($this->getBis() == null) $this->setBis("24:00:00");
		if ($this->getKoordination() == null) $this->setKoordination(" ");
		if ($this->getDauer() == null) $this->setDauer("8");
	}
}
