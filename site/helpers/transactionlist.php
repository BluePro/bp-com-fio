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
    parent::_construct($transactionList);
    
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
    return $accountId;
  }

  public function getBankId() {
    return $bankId;
  }

  public function getCurrency() {
    return $currency;
  }

  public function getIban() {
    return $iban;
  }

  public function getBic() {
    return $bic;
  }

  public function getOpeningBalance() {
    return $openingBalance;
  }

  public function getClosingBalance() {
    return $closingBalance;
  }

  public function getDateStart() {
    return $dateStart;
  }

  public function getDateEnd() {
    return $dateEnd;
  }

}
