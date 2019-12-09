<?php
/**
  * DBClass
*/

class db {

    protected $connection;
	  protected $query;
	  public $query_count = 0;

	   public function __construct() {
       try {
        $this->connection = new PDO('mysql:host=localhost;dbname=seminarverwaltung;port=3306', 'root');
        //$this->connection = new PDO('mysql:host=localhost;dbname=id11805685_roommanager', 'id11805685_fink', 'Fungog04');
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
          echo $e->getMessage();
        }
      return $this->connection;
     }

     public function query($sql) {
       $ergebnis = array();
       if ($this->connection != null) {
         $erg = $this->connection->query($sql);
         $ergebnis = $erg->fetchAll();
       }
       return $ergebnis;
      }

      public function update($sql){
        $statement = $this->connection->prepare($sql);
        $statement->execute();
      }

     public function close() {
		    $this->connection = null;
       }

      public function getFortbildungen(){
          $sql= "select * from fortbildung";
          $ergebnis = $this->query($sql);
          return $ergebnis;
        }
      public function getFortbildung($id){
         $sql= "select * from fortbildung where id = $id";
         $ergebnis = $this->query($sql);
         return $ergebnis;
       }

       public function getKurse($fid){
         $sql= "select * from kurs where fortbildung_id = $fid";
         $ergebnis = $this->query($sql);
         return $ergebnis;
       }

       public function BenutzerNimmtTeilanFortbildung($benutzer_id){
         $sql= "SELECT id, name, status FROM fortbildung left join nimmt_teil on fortbildung.id = nimmt_teil.fortbildung_id where nimmt_teil.teilnehmer_id = $benutzer_id";
         $ergebnis = $this->query($sql);
         return $ergebnis;
       }

       public function BenutzerNimmtTeilanKurs($benutzer_id){
         $sql= "SELECT * FROM kurs left join nimmt_teil on kurs.id = nimmt_teil.kurs_id where nimmt_teil.teilnehmer_id = $benutzer_id";
         $ergebnis = $this->query($sql);
         return $ergebnis;
       }

      public function getUserInformations($token){
        $sql= "select * from teilnehmer where token = '$token'";
        $ergebnis = $this->query($sql);
        return $ergebnis;
      }

}



?>
