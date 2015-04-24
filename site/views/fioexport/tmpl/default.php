<?php defined('_JEXEC') or die('Restricted access'); ?>
<h1>Fio export</h1>
<table>
<?php
echo sprintf('<tr><th>Účet:</th><td>%s/%s</td></tr>',
		$this->transactionList->getAccountId(), $this->transactionList->getBankId());
echo sprintf('<tr><th>Od:</th><td>%s</td><th>Do:</th><td>%s</td></tr>',
		JHtml::date($this->transactionList->getDateStart(), 'j. F Y'), JHtml::date($this->transactionList->getDateEnd(), 'j. F Y'));
echo sprintf('<tr><th>Počáteční stav:</th><td>%s</td><th>Koncový stav</th><td>%s</td></tr>',
		$this->transactionList->getOpeningBalance(), $this->transactionList->getClosingBalance());
?>
<table>
<tr><th>Datum</th><th>Částka</th><th>Účet</th><th>VS</th><th>Identifikace</th><th>Typ</th></tr>
<?php 
foreach ($this->transactionList as $transaction) {
	echo sprintf('<tr><td>%s</td><td>%s</td><td>%s/%s</td><td>%s</td><td>%s</td><td>%s</td></tr>',
			JHtml::date($transaction->getDatum(), 'j. F Y'), $transaction->getObjem(), $transaction->getProtiucet(), $transaction->getKodBanky(), $transaction->getVS(), $transaction->getIdentifikace(), $transaction->getTyp());
}
?>
</table>
