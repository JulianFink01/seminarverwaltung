<?php

class Fortbildung{

protected $id = 0;
protected $name = "";
protected $status = false;

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
public function  __toString()
{
    return 'Id:'. $this->id .', Name: '.$this->name.', Status: '.$this->status;
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
public function setName($name){
  $this->name = $name;
}
public function getName(){
  return $this->name;
}
public function setStatus($status){
  $this->status = $status;
}
public function getStatus(){
  return $this->status;
}

public function loesche()
{
    $sql = 'DELETE FROM fortbildung WHERE id=?';
    $abfrage = DB::getDB()->prepare($sql);
    $abfrage->execute( array($this->getId()) );
    // Objekt existiert nicht mehr in der DB, also muss die ID zurückgesetzt werden
    $this->id = 0;
}

/* ***** Private Methoden ***** */

private function _insert()
{
    //Token generiren
    $this->setToken("");

    $sql = 'INSERT INTO fortbildung (name, status)'
         . 'VALUES (:name, :status)';

    $abfrage = DB::getDB()->prepare($sql);
    $abfrage->execute($this->toArray(false));
    // setze die ID auf den von der DB generierten Wert
    $this->id = DB::getDB()->lastInsertId();
}

private function _update()
{
    $sql = 'UPDATE fortbildung SET name=:name, name=:name, status=:status'
        . 'WHERE id=:id';
    $abfrage = self::$db->prepare($sql);
    $abfrage->execute($this->toArray());
}

/* ***** public Methoden ***** */

public static function findeAlle()
{
    $sql = 'SELECT * FROM fortbildung';
    $abfrage = DB::getDB()->query($sql);
    $abfrage->setFetchMode(PDO::FETCH_CLASS, 'Fortbildung');
    return $abfrage->fetchAll();
}

public static function finde($id){
  $sql = 'SELECT * FROM fortbildung WHERE id=?';
  $abfrage = DB::getDB()->prepare($sql);
  $abfrage->execute(array($id));
  $abfrage->setFetchMode(PDO::FETCH_CLASS, 'Fortbildung');
  return $abfrage->fetch();
}

public static function findeNachName($name){
  $sql = 'SELECT * FROM fortbildung WHERE name=?';
  $abfrage = DB::getDB()->prepare($sql);
  $abfrage->execute(array($name));
  $abfrage->setFetchMode(PDO::FETCH_CLASS, 'Fortbildung');
  return $abfrage->fetch();
}
public static function findeAlleTeilnehmer(Fortbildung $fortbildung){
  $result = NimmtTeil::findeAlleFortbildungTeilnehmer($fortbildung);
  return $result;
}


}


?>
