<?php
class TransactionItem {

  private $idPohybu;
  private $datum;
  private $objem;
  private $mena;
  private $protiucet;
  private $nazevProtiuctu;
  private $kodBanky;
  private $nazevBanky;
  private $ks;
  private $vs;
  private $ss;
  private $identifikace;
  private $zprava;
  private $typ;
  private $bic;

  public function __construct($idPohybu, $datum, $objem, $mena, $protiucet, $nazevProtiuctu, $kodBanky, $nazevBanky, $ks, $vs, $ss, $identifikace, $zprava, $typ, $bic) {
    $this->idPohybu = $idPohybu;
    $this->datum = $datum;
    $this->objem = $objem;
    $this->mena = $mena;
    $this->protiucet = $protiucet;
    $this->nazevProtiuctu = $nazevProtiuctu;
    $this->kodBanky = $kodBanky;
    $this->nazevBanky = $nazevBanky;
    $this->ks = $ks;
    $this->vs = $vs;
    $this->ss = $ss;
    $this->identifikace = $identifikace;
    $this->zprava = $zprava;
    $this->typ = $typ;
    $this->bic = $bic;
  }

  public function getIdPohybu() {
    return $idPohybu;
  }

  public function getDatum() {
    return $datum;
  }

  public function getObjem() {
    return $objem;
  }

  public function getMena() {
    return $mena;
  }

  public function getProtiucet() {
    return $protiucet;
  }

  public function getNazevProtiuctu() {
    return $nazevProtiuctu;
  }

  public function getKodBanky() {
    return $kodBanky;
  }

  public function getNazevBanky() {
    return $nazevBanky;
  }

  public function getKS() {
    return $ks;
  }

  public function getVS() {
    return $vs;
  }

  public function getSS() {
    return $ss;
  }

  public function getIdentifikace() {
    return $identifikace;
  }

  public function getZprava() {
    return $zprava;
  }

  public function getTyp() {
    return $typ;
  }

  public function getBIC() {
    return $bic;
  }

}
