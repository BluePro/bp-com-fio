<?php defined('_JEXEC') or die('Restricted access'); ?>
<h1>Fio export</h1>
<div class="com_fioexport">
<table class="form">
<?php
echo sprintf('<tr><th>Účet:</th><td>%s/%s</td></tr>',
		$this->transactionList->getAccountId(), $this->transactionList->getBankId());
echo sprintf('<tr><th>Od:</th><td>%s</td><th>Do:</th><td>%s</td></tr>',
		JHtml::date($this->transactionList->getDateStart(), 'j. F Y'), JHtml::date($this->transactionList->getDateEnd(), 'j. F Y'));
echo sprintf('<tr><th>Počáteční stav:</th><td>%s</td><th>Koncový stav</th><td>%s</td></tr>',
		number_format($this->transactionList->getOpeningBalance(), 2, ',', '&nbsp;'), number_format($this->transactionList->getClosingBalance(), 2, ',', '&nbsp;'));
?>
</table>
<table class="grid">
<tr><th>Datum</th><th>Částka</th><th>Účet</th><th>VS</th><th>Identifikace</th><th>Typ</th></tr>
<?php 
$i = 0;
foreach ($this->transactionList as $transaction) {
	$i++;
	echo sprintf('<tr class="%s %s"><td class="date">%s</td><td class="amount">%s</td><td class="account">%s/%s</td><td class="vs">%s</td><td class="identification"">%s</td><td class="type">%s</td></tr>',
			$i % 2 ? 'odd' : 'even', $transaction->getObjem() < 0 ? 'expense' : 'income', JHtml::date($transaction->getDatum(), 'j. F Y'), number_format($transaction->getObjem(), 2, ',', '&nbsp;'), $transaction->getProtiucet(), $transaction->getKodBanky(), $transaction->getVS(), $transaction->getIdentifikace(), $transaction->getTyp());
}
?>
</table>
</div>
