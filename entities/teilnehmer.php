<?php


class Teilnehmer{

protected $id = 0;
protected $vorname = "";
protected $nachname = "";
protected $email = "";
protected $token = "";

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
    return 'Id:'. $this->id .', Vorname: '.$this->vorname.', Nachname: '.$this->nachname.', Email: '.$this->email.', Token: '.$this->token;
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
        $this->genereateToken();
        $this->_insert();
    }
}

public function setId($id){
   $this->id = $id;
}
public function getId(){
  return $this->id;
}
public function setVorname($vorname){
   $this->vorname = $vorname;
}
public function getVorname(){
  return $this->vorname;
}
public function setNachname($nachname){
   $this->nachname = $nachname;
}
public function getNachname(){
  return $this->nachname;
}
public function setEmail($email){
   $this->email = $email;
}
public function getEmail(){
  return $this->email ;
}
public function setToken($token){
   $this->token = $token;
}
public function getToken(){
  return $this->token;
}

public function loesche()
{
    $sql = 'DELETE FROM teilnehmer WHERE id=?';
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

    $sql = 'INSERT INTO teilnhermer (vorname, nachname, email, token)'
         . 'VALUES (:vorname, :nachname, :email, :token)';

    $abfrage = DB::getDB()->prepare($sql);
    $abfrage->execute($this->toArray(false));
    // setze die ID auf den von der DB generierten Wert
    $this->id = DB::getDB()->lastInsertId();
}
public function genereateToken(){
  $email = $this->getEmail();
  $arr = explode("@", $email, 2);
  $first = $arr[0];
  $this->setToken($first);
}
private function _update()
{
    $sql = 'UPDATE teilnhermer SET vorname=:vorname, nachname=:nachname, email=:email,token=:token'
        . 'WHERE id=:id';
    $abfrage = self::$db->prepare($sql);
    $abfrage->execute($this->toArray());
}
/* ***** Public Methoden ***** */
public static function findeAlle()
{
    $sql = 'SELECT * FROM teilnehmer';
    $abfrage = DB::getDB()->query($sql);
    $abfrage->setFetchMode(PDO::FETCH_CLASS, 'Teilnehmer');
    return $abfrage->fetchAll();
}

public static function finde($id){
  $sql = 'SELECT * FROM teilnehmer WHERE id=?';
  $abfrage = DB::getDB()->prepare($sql);
  $abfrage->execute(array($id));
  $abfrage->setFetchMode(PDO::FETCH_CLASS, 'Teilnehmer');
  return $abfrage->fetch();
}

public static function findeNachKurs(Kurs $kurs)
{
    $sql = 'SELECT teilnehmer.* FROM teilnehmer '
         . 'JOIN nimmt_teil ON teilnehmer.id=nimmt_teil.teilnehmer_id '
         . 'WHERE nimmt_teil.kurs_id=?';
    $abfrage = DB::getDB()->prepare($sql);
    $abfrage->execute( array($kurs->getId()));
    $abfrage->setFetchMode(PDO::FETCH_CLASS, 'Teilnehmer');
    return $abfrage->fetchAll();
}
public static function findeNachToken($token)
{
    $sql = 'SELECT teilnehmer.* FROM teilnehmer '
         . 'WHERE token like ?';
         $abfrage = DB::getDB()->prepare($sql);
         $abfrage->execute(array($token));
         $abfrage->setFetchMode(PDO::FETCH_CLASS, 'Teilnehmer');
         return $abfrage->fetch();
}
public static function findeNachEmail($email)
{
    $sql = 'SELECT teilnehmer.* FROM teilnehmer '
         . 'WHERE email like ?';
         $abfrage = DB::getDB()->prepare($sql);
         $abfrage->execute(array($email));
         $abfrage->setFetchMode(PDO::FETCH_CLASS, 'Teilnehmer');
         return $abfrage->fetch();
}
public static function findeNachFortbildung(Fortbildung $fortbildung)
{
    $sql = 'SELECT teilnehmer.* FROM teilnehmer '
         . 'JOIN nimmt_teil ON teilnehmer.id=nimmt_teil.teilnehmer_id '
         . 'WHERE nimmt_teil.fortbildung_id=?';
    $abfrage = DB::getDB()->prepare($sql);
    $abfrage->execute( array($fortbildung->getId()) );
    $abfrage->setFetchMode(PDO::FETCH_CLASS, 'Teilnehmer');
    return $abfrage->fetchAll();
}


public function getTermine(){
    return Kurs::findeNachBenutzer($this);
}

public function nimmtAnKurseTeil(){
  if(empty($this->getTermine())){
      return false;
    }else {
      return true;
    }
}

}


?>
