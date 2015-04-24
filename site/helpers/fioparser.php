<?php
abstract class FioParser {

  public static function getTransactionList($data) {
    $info = $data->accountStatement->info;

    $list = array();
    foreach ($data->accountStatement->transactionList->transaction as $transaction) {
      $list[] = self::getTransactionItem($transaction);
    }

    return new TransactionList(
      $info->accountId,
      $info->bankId,
      $info->currency,
      $info->iban,
      $info->bic,
      $info->openingBalance,
      $info->closingBalance,
      $info->dateStart,
      $info->dateEnd,
      $list);
  }

  public static function getTransactionItem($data) {
    $idPohybu = $datum = $objem = $mena = $protiucet = $nazevProtiuctu = $kodBanky = $nazevBanky = $ks = $vs = $ss = $identifikace = $zprava = $typ = $bic = '';
    
    foreach (get_object_vars($data) as $column) {
      if (is_null($column)) continue;

      switch ($column->name) {
        case 'ID pohybu';
          $idPohybu = $column->value;
          break;
        case 'Datum';
          $datum = $column->value;
          break;
        case 'Objem';
          $objem = $column->value;
          break;
        case 'Měna';
          $mena = $column->value;
          break;
        case 'Protiúčet';
          $protiucet = $column->value;
          break;
        case 'Název protiúčtu';
          $nazevProtiuctu = $column->value;
          break;
        case 'Kód banky';
          $kodBanky = $column->value;
          break;
        case 'Název banky';
          $nazevBanky = $column->value;
          break;
        case 'KS';
          $ks = $column->value;
          break;
        case 'VS';
          $vs = $column->value;
          break;
        case 'SS';
          $ss = $column->value;
          break;
        case 'Uživatelská identifikace';
          $identifikace = $column->value;
          break;
        case 'Zpráva pro příjemce';
          $zprava = $column->value;
          break;
        case 'Typ';
          $typ = $column->value;
          break;
        case 'BIC';
          $bic = $column->value;
          break;
      }
    }

    return new TransactionItem(
        $idPohybu,
        $datum,
        $objem,
        $mena,
        $protiucet,
        $nazevProtiuctu,
        $kodBanky,
        $nazevBanky,
        $ks,
        $vs,
        $ss,
        $identifikace,
        $zprava,
        $typ,
        $bic);
  }

}
