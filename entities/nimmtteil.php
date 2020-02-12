<?php

class NimmtTeil{

  protected $fortbildung_id = 0;
  protected $teilnehmer_id = 0;
  protected $kurs_id = NULL;

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

  public function setFortbildung_id($fortbildungsid){
      $this->fortbildung_id = $fortbildungsid;
  }

  public function getFortbildung_id(){
    return $this->fortbildung_id;
  }

  public function setTeilnehmer_id($teilnehmerid){
    $this->teilnehmer_id = $teilnehmerid;
  }

  public function getTeilnehmer_id(){
      return $this->teilnehmer_id;
  }

  public function setKurs_id($kursId){
    $this->kurs_id = $kursId;
  }

  public function getKurs_id(){
    return $this->kurs_id;
  }
  public static function loescheAusFortbildung()
  {
      $sql = 'DELETE FROM nimmt_teil WHERE teilnehmer_id=?';
      $abfrage = DB::getDB()->prepare($sql);
      $abfrage->execute( array($this->getTeilnehmer_id()) );
      // Objekt existiert nicht mehr in der DB, also muss die ID zurückgesetzt werden
      $this->id = 0;
  }

  /* ***** Private Methoden ***** */

  private function _insert()
  {
      //Token generiren
      $this->setToken("");

      $sql = 'INSERT INTO nimmt_teil (fortbildung_id,teilnehmer_id, kurs_id)'
           . 'VALUES (:fortbildung_id, :teilnehmer_id, :kurs_id)';

      $abfrage = DB::getDB()->prepare($sql);
      $abfrage->execute($this->toArray(false));
      // setze die ID auf den von der DB generierten Wert
      $this->id = DB::getDB()->lastInsertId();
  }

  private function _update()
  {
      $sql = 'UPDATE nimmt_teil SET fortbildung_id=:fortbildung_id, kurs_id=:kurs_id'
          . 'WHERE teilnehmer_id=:teilnehmer_id';
      $abfrage = self::$db->prepare($sql);
      $abfrage->execute($this->toArray());
  }

  /* ***** public Methoden **** */

  public static function findeAlleKursTeilnehmer(Kurs $kurs){
    $sql = 'SELECT teilnehmer.* FROM teilnehmer JOIN nimmt_teil on teilnehmer.id = nimmt_teil.teilnehmer_id WHERE kurs_id=?';
    $abfrage = DB::getDB()->prepare($sql);
    $abfrage->execute(array($kurs->getId()));
    $abfrage->setFetchMode(PDO::FETCH_CLASS, 'Teilnehmer');
    return $abfrage->fetchAll();
  }
  public static function findeAlleFortbildungTeilnehmer(Fortbildung $fortbildung){
    $sql = 'SELECT teilnehmer.* FROM teilnehmer JOIN nimmt_teil on teilnehmer_id = nimmt_teil.teilnehmer_id WHERE fortbildung_id=?';
    $abfrage = DB::getDB()->prepare($sql);
    $abfrage->execute(array($fortbildung->getId()));
    $abfrage->setFetchMode(PDO::FETCH_CLASS, 'Teilnehmer');
    return  $abfrage->fetchAll();

  }
  public static function findeAlleKurseNachTeilnehmer(Teilnehmer $teilnehmer){
    $sql = 'SELECT kurs.* FROM kurs JOIN nimmt_teil on kurs.id = nimmt_teil.kurs_id WHERE nimmt_teil.teilnehmer_id=?';
    $abfrage = DB::getDB()->prepare($sql);
    $abfrage->execute(array($teilnehmer->getId()));
    $abfrage->setFetchMode(PDO::FETCH_CLASS, 'Kurs');
    return $abfrage->fetchAll();
  }
  public static function findeAlleFortbildungenNachTeilnehmer(Teilnehmer $teilnehmer){
    $sql = 'SELECT fortbildung.* FROM fortbildung JOIN nimmt_teil on fortbildung.id = nimmt_teil.fortbildung_id WHERE nimmt_teil.teilnehmer_id=?';
    $abfrage = DB::getDB()->prepare($sql);
    $abfrage->execute(array($teilnehmer->getId()));
    $abfrage->setFetchMode(PDO::FETCH_CLASS, 'Fortbildung');
    return $abfrage->fetchAll();
  }



}


?>
