<?php
class TransactionList extends ArrayIterator {

  private $accountId;
  private $bankId;
  private $currency;
  private $iban;
  private $bic;
  private $openingBalance;
  private $closingBalance;
  private $dateStart;
  private $dateEnd;

  public function __construct($accountId, $bankId, $currency, $iban, $bic, $openingBalance, $closingBalance, $dateStart, $dateEnd, array $transactionList) {
    parent::__construct($transactionList);
    
    $this->accountId = $accountId;
    $this->bankId = $bankId;
    $this->currency = $currency;
    $this->iban = $iban;
    $this->bic = $bic;
    $this->openingBalance = $openingBalance;
    $this->closingBalance = $closingBalance;
    $this->dateStart = $dateStart;
    $this->dateEnd = $dateEnd;
  }

  public function getAccountId() {
    return $this->accountId;
  }

  public function getBankId() {
    return $this->bankId;
  }

  public function getCurrency() {
    return $this->currency;
  }

  public function getIban() {
    return $this->iban;
  }

  public function getBic() {
    return $this->bic;
  }

  public function getOpeningBalance() {
    return $this->openingBalance;
  }

  public function getClosingBalance() {
    return $this->closingBalance;
  }

  public function getDateStart() {
    return $this->dateStart;
  }

  public function getDateEnd() {
    return $this->dateEnd;
  }

}
