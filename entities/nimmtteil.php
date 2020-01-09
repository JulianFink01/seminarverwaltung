<?php

class NimmtTeil{

  protected $fortbildung_id = 0;
  protected $teilnehmer_id = 0;
  protected $kurs_id = 0;

  public function setFortbildungsId($fortbildungsid){
      $this->fortbildung_id = $fortbildungsid;
  }

  public function getFortbildungsId(){
    return $this->fortbildung_id;
  }

  public function setTeilnehmerId($teilnehmerid){
    $this->teilnehmer_id = $teilnehmerid;
}
  }

  public function getTeilnehmerId(){
      return $this->teilnehmer_id;
  }

  public function setKursId($kursId){
    $this->kurs_id = $kursId;
  }

  public function setKursId(){
    return $this->kurs_id;
  }

}


?>
