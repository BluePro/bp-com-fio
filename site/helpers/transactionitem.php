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
    return $this->idPohybu;
  }

  public function getDatum() {
    return $this->datum;
  }

  public function getObjem() {
    return $this->objem;
  }

  public function getMena() {
    return $this->mena;
  }

  public function getProtiucet() {
    return $this->protiucet;
  }

  public function getNazevProtiuctu() {
    return $this->nazevProtiuctu;
  }

  public function getKodBanky() {
    return $this->kodBanky;
  }

  public function getNazevBanky() {
    return $this->nazevBanky;
  }

  public function getKS() {
    return $this->ks;
  }

  public function getVS() {
    return $this->vs;
  }

  public function getSS() {
    return $this->ss;
  }

  public function getIdentifikace() {
    return $this->identifikace;
  }

  public function getZprava() {
    return $this->zprava;
  }

  public function getTyp() {
    return $this->typ;
  }

  public function getBIC() {
    return $this->bic;
  }

}
