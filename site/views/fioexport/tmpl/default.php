<?php defined('_JEXEC') or die('Restricted access'); ?>
<h1>Fio export</h1>
<table>
<tr><th>Datum</th><th>Částka</th><th>Účet</th><th>VS</th><th>Identifikace</th><th>Typ</th></tr>
<?php 
foreach ($this->transactionList as $transaction) {
	echo sprintf('<tr><td>%s</td><td>%s</td><td>%s/%s</td><td>%s</td><td>%s</td><td>%s</td></tr>',
			JHtml::date($transaction->getDatum(), 'j. F Y'), $transaction->getObjem(), $transaction->getProtiucet(), $transaction->getKodBanky(), $transaction->getVS(), $transaction->getIdentifikace(), $transaction->getTyp());
}
?>
</table>
