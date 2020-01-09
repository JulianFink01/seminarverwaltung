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
  public function setOrtRaum($ortRaum){
    $this->ort_raum = $ortRaum;
  }
  public function getOrtRaum(){
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
    return $this->von;
  }
  public function setBis($bis){
    $this->bis = $bis;
  }
  public function getBis(){
    return $this->bis;
  }
  public function setUnterschriftslisteZweispaltig($bool){
    $this->unterschriftsliste_zweispaltig = $bool;
  }
  public function isUnterschriftslisteZweispaltig(){
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
  public function setFortbildungId($fortbildung_id){
    $this->fortbildung_id = $fortbildung_id;
  }
  public function getFortbildungId(){
    return $this->fortbildung_id;
  }
  public function setDauer($dauer){
    $this->dauer = $dauer;
  }
  public function getDauer(){
    return $this->dauer;
  }
}


?>
