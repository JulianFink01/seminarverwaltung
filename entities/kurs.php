<?php

class Kurs{

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
protected $unterschriftsliste_zweispaltig = false;
protected $koordination = "";
protected $anmeldeschluss = "";
protected $fortbildung_id = 0;
protected $dauer = 0;

public function  __toString()
{
    return 'Id:'. $this->id .', Datum: '.$this->datum.', Titel: '.$this->titel.', MaxTeilnehmer: '.$this->maxTeilnehmer.', Referent: '.$this->referent.', Beschreibung: '.$this->beschreibung.', Ort-Raum: '.$this->ort_raum.', Kontakt: '.$this->kontakt.', Von: '.$this->von.', Bis:'.$this->bis.', Unterschriftsliste-Zweispaltig: '.
    $this->unterschriftsliste_zweispaltig.', Koordination: '.$this->koordination.', Anmeldeschluss: '.$this->anmeldeschluss.', FortbildungsId: '.$this->fortbildung_id.', Dauer: '.$this->dauer;
}
public function __construct($daten = array())
{
    // wenn $daten nicht leer ist, rufe die passenden Setter auf
    if ($daten) {
        foreach ($daten as $k => $v) {
            $setterName = 'set' . ucfirst($k);
            // wenn ein ungültiges Attribut übergeben wurde
            // (ohne Setter), ignoriere es
            if (method_exists($this, $setterName)) {
                $this->$setterName($v);
            }
        }
    }
}

public function toArray($mitId = true)
{
    $attribute = get_object_vars($this);
    if ($mitId === false) {
        // wenn $mitId false ist, entferne den Schlüssel id aus dem Ergebnis
        unset($attribute['id']);
    }
    return $attribute;
}

public function speichere()
{
    if ( $this->getId() > 0 ) {
        // wenn die ID eine Datenbank-ID ist, also größer 0, führe ein UPDATE durch
        $this->_update();
    } else {
        // ansonsten einen INSERT
        $this->_insert();
    }
}
  public function setId($id){
    $this->id = $id;
  }
  public function getId(){
    return $this->id;
  }
  public function setDatum($datum){
    $this->datum = $datum;
  }
  public function getDatum(){
    return $this->datum;
  }
  public function setTitel($titel){
    $this->titel = $titel;
  }
  public function getTitel(){
    return $this->titel;
  }
  public function setMaxTeilnehmer($maxTeilnehmer){
    $this->maxTeilnehmer = $maxTeilnehmer;
  }
  public function getMaxTeilnehmer(){
    return $this->maxTeilnehmer;
  }
  public function setReferent($referent){
    $this->referent = $referent;
  }
  public function getReferent(){
    return $this->referent;
  }
  public function setBeschreibung($beschreibung){
    $this->beschreibung = $beschreibung;
  }
  public function getBeschreibung(){
    return $this->beschreibung;
  }
  public function getShortBeschreibung(){
    return substr($this->beschreibung,0,300);
  }
  public function setOrt_raum($ortRaum){
    $this->ort_raum = $ortRaum;
  }
  public function getOrt_raum(){
    return $this->ort_raum;
  }
  public function setKontakt($kontakt){
    $this->kontakt = $kontakt;
  }
  public function getKontakt(){
    return $this->kontakt;
  }
  public function setVon($von){
    $this->von = $von;
  }
  public function getVon(){
    $von = $this->von;
    $von = substr($von,0,5);
    return $von;
  }
  public function setBis($bis){
    $this->bis = $bis;
  }
  public function getBis(){
    $bis = $this->bis;
    $bis = substr($bis,0,5);
    return $bis;
  }
  public function getFormatedDate(){
    $jahr = substr($this->getDatum(), 0, 4);
    $monat = substr($this->getDatum(), 5, 2);
    $tag = substr($this->getDatum(), 8, 2);

    switch ($monat) {
      case '01':
        $monat = "Jannuar";
      break;
      case '02':
        $monat = "Februar";
      break;
      case '03':
        $monat = "März";
      break;
      case '04':
        $monat = "April";
      break;
      case '05':
        $monat = "Mai";
      break;
      case '06':
        $monat = "Juni";
      break;
      case '07':
        $monat = "Juli";
      break;
      case '08':
        $monat = "August";
      break;
      case '09':
        $monat = "September";
      break;
      case '10':
        $monat = "Oktober";
      break;
      case '11':
        $monat = "November";
      break;
      case '12':
        $monat = "Dezember";
      break;
    }

    $datum = $tag.' '.$monat.' '.$jahr;
    $von = substr($this->getVon(),0,5);
    $bis = substr($this->getBis(),0,5);
    if($von!=""){
    $datum = $datum.' von '.$von.' - '.$bis.' Uhr';
    }
    return $datum;

  }
  public function setUnterschriftsliste_zweispaltig($bool){
    $this->unterschriftsliste_zweispaltig = $bool;
  }
  public function getUnterschriftsliste_zweispaltig(){
    return $this->unterschriftsliste_zweispaltig;
  }
  public function setKoordination($koordination){
    $this->koordination = $koordination;
  }
  public function getKoordination(){
    return $this->koordination;
  }
  public function setAnmeldeschluss($anmeldeschluss){
    $this->anmeldeschluss = $anmeldeschluss;
  }
  public function getAnmeldeSchluss(){
    return $this->anmeldeschluss;
  }
  public function setFortbildung_id($fortbildung_id){
    $this->fortbildung_id = $fortbildung_id;
  }
  public function getFortbildung_id(){
    return $this->fortbildung_id;
  }
  public function setDauer($dauer){
    $this->dauer = $dauer;
  }
  public function getDauer(){
    return $this->dauer;
  }
  public function loesche()
  {
      $sql = 'DELETE FROM kurs WHERE id=?';
      $abfrage = DB::getDB()->prepare($sql);
      $abfrage->execute( array($this->getId()) );
      // Objekt existiert nicht mehr in der DB, also muss die ID zurückgesetzt werden
      $this->id = 0;
  }
  public function getAllTeilnehmer(){
    $result = NimmtTeil::findeAlleKursTeilnehmer($this);
    return $result;
  }
  /* ***** Private Methoden ***** */

  public function nimmtAnKursTeil(Teilnehmer $teilnehmer){
    $sql = 'SELECT * FROM nimmt_teil WHERE kurs_id=? and teilnehmer_id = ? and fortbildung_id = ?';
    $abfrage = DB::getDB()->prepare($sql);
    $abfrage->execute(array($this->getId(), $teilnehmer->getId(), $this->getFortbildung_id()));
    $erg = $abfrage->fetchAll();
      if($erg){
        return true;
      }else{
        return false;
      }
  }
  //SELECT count(*) FROM nimmt_teil WHERE kurs_id=1 and fortbildung_id = 1
  public function getTeilnehmerAnzahl(){
    $sql = 'SELECT count(*) as anzahl FROM nimmt_teil WHERE kurs_id=? and fortbildung_id = ?';
    $abfrage = DB::getDB()->prepare($sql);
    $abfrage->execute(array($this->getId(),$this->getFortbildung_id()));
    $erg = $abfrage->fetchAll();
    return $erg[0]['anzahl'];
  }
  private function _insert()
  {
      //Token generiren
      $this->setToken("");

      $sql = 'INSERT INTO kurs (id, datum, titel, maxTeilnehmer, referent, beschreibung, ort_raum,kontakt, von, bis, unterschriftsliste_zweispaltig, koordination, anmeldeschluss, fortbildung_id, dauer)'
           . 'VALUES (:id, :datum, :titel, :maxTeilnehmer, :referent, :beschreibung, :ort_raum,:kontakt,:von,:bis,:unterschriftsliste_zweispaltig, :koordination, :anmeldeschluss, :fortbildung_id, :dauer)';

      $abfrage = DB::getDB()->prepare($sql);
      $abfrage->execute($this->toArray(false));
      // setze die ID auf den von der DB generierten Wert
      $this->id = DB::getDB()->lastInsertId();
  }

  private function _update()
  {
      $sql = 'UPDATE teilnhermer SET id=:id, datum=:datum, titel=:titel,maxTeilnehmer=:maxTeilnehmer,referent=:referent,beschreibung=:beschreibung,ort_raum=:ort_raum,kontakt=:kontakt,von=:von,bis=:bis,unterschriftsliste_zweispaltig=:unterschriftsliste_zweispaltig,koordination=:koordination,anmeldeschluss=:anmeldeschluss,fortbildung_id=:fortbildung_id,dauer=:dauer'
          . 'WHERE id=:id';
      $abfrage = self::$db->prepare($sql);
      $abfrage->execute($this->toArray());
  }

  /* ***** public Methoden ***** */
  public static function findeAlle()
  {
      $sql = 'SELECT * FROM kurs';
      $abfrage = DB::getDB()->query($sql);
      $abfrage->setFetchMode(PDO::FETCH_CLASS, 'Kurs');
      return $abfrage->fetchAll();
  }

  public static function finde($id){
    $sql = 'SELECT * FROM kurs WHERE id=?';
    $abfrage = DB::getDB()->prepare($sql);
    $abfrage->execute(array($id));
    $abfrage->setFetchMode(PDO::FETCH_CLASS, 'Kurs');
    return $abfrage->fetch();

  }

  public static function findeNachFortbildung(Fortbildung $fortbildung)
  {
      $sql = 'SELECT * FROM kurs WHERE fortbildung_id=?';
      $abfrage = DB::getDB()->prepare($sql);
      $abfrage->execute(array($fortbildung->getId()));
      $abfrage->setFetchMode(PDO::FETCH_CLASS, 'Kurs');
      return $abfrage->fetchAll();
  }
  public static function findeNachBenutzer(Teilnehmer $teilnehmer)
  {
      return NimmtTeil::findeAlleKurseNachTeilnehmer($teilnehmer);
  }

  public static function findeAlleTeilnehmer(Kurs $kurs){
    $result = NimmtTeil::findeAlleKursTeilnehmer($kurs);
    return $result;
  }

  public function loescheTeilnehmer(Teilnehmer $teilnehmer)
  {
      $sql = 'Update nimmt_teil set kurs_id = null'
           . 'WHERE teilnehmer_id=? AND kurs_id=?';
      $abfrage = DB::getDB()->prepare($sql);
      $abfrage->execute(array(
          $teilnehmer->getId(),
          $this->getId()
      ));
  }

  public function teilnehmen(Teilnehmer $teilnehmer){
    $sql = 'Update nimmt_teil set kurs_id = ? WHERE teilnehmer_id = ? and fortbildung_id = ?';
    $abfrage = DB::getDB()->prepare($sql);
    $abfrage->execute(array(
      $this->getId(),
      $teilnehmer->getId(),
      $this->getFortbildung_id()
    ));
  }
  public function abmelden(Teilnehmer $teilnehmer){
    $sql = 'Update nimmt_teil set kurs_id = NULL WHERE teilnehmer_id = ? and fortbildung_id = ?';

    $abfrage = DB::getDB()->prepare($sql);
    $abfrage->execute(array(
      $teilnehmer->getId(),
      $this->getFortbildung_id()

    ));
  }

}


?>
