<?php defined('_JEXEC') or die('Restricted access'); ?>
<h1><?php echo JText::_('COM_FIOEXPORT'); ?></h1>
<div class="com_fioexport">
<form action="<?php echo JRoute::_('index.php'); ?>" method="get">
<div class="filter">
<table class="form">
<?php
echo sprintf('<tr><th>Účet:</th><td>%s/%s</td></tr>',
		$this->transactionList->getAccountId(), $this->transactionList->getBankId());
echo sprintf('<tr><th>Počáteční stav:</th><td>%s</td><th>Koncový stav:</th><td>%s</td></tr>',
		number_format($this->transactionList->getOpeningBalance(), 2, ',', '&nbsp;'), number_format($this->transactionList->getClosingBalance(), 2, ',', '&nbsp;'));
echo sprintf('<tr><th>Od:</th><td>%s</td><th>Do:</th><td>%s</td></tr>',
		JHTML::calendar($this->transactionList->getDateStart(), 'dateFrom', 'fioexportDateFrom'), JHTML::calendar($this->transactionList->getDateEnd(), 'dateTo', 'fioexportDateTo'));
?>
	<tr>
		<td colspan="2">
			<input type="hidden" name="showExpense" value="0" />
			<input type="checkbox" name="showExpense" id="showExpense" value="1" <?php echo $this->showExpense ? 'checked="checked" ' : ''; ?>/>
			<label for"showExpense">Zobrazit výdaje</label>
		</td>
		<td colspan="2">
			<input type="hidden" name="showIncome" value="0" />
			<input type="checkbox" name="showIncome" id="showIncome" value="1" <?php echo $this->showIncome ? 'checked="checked" ' : ''; ?>/>
			<label for"showIncome">Zobrazit příjmy</label>
		</td>
	</tr>
</table>
<div class="button"><input type="submit" value="Změnit" /></div>
</div>
</form>
<table class="stripes">
<tr><th>Datum</th><th>Částka</th><th>Účet</th><th>VS</th><th>Identifikace</th><th>Typ</th></tr>
<?php 
$i = 0;
$sum = 0;
foreach ($this->transactionList as $transaction) {
	$isExpense = $transaction->getObjem() < 0;
	if ($this->showExpense && $isExpense ||
			$this->showIncome && !$isExpense) {
		$i++;
		$sum += $transaction->getObjem();
		echo sprintf(
				'<tr class="%s %s"><td class="date">%s</td><td class="amount">%s</td><td class="account">%s</td><td class="vs">%s</td><td class="identification"">%s</td><td class="type">%s</td></tr>',
				$i % 2 ? 'odd' : 'even', $isExpense ? 'expense' : 'income', JHtml::date($transaction->getDatum(), 'j. F Y'), number_format($transaction->getObjem(), 2, ',', '&nbsp;'), $transaction->getProtiucetAndKodBanky(), $transaction->getVS(), nl2br($transaction->getPopis()), $transaction->getTyp());
	}
}
?>
<tr class="<?php echo $sum < 0 ? 'expense' : 'income'; ?>"><th></th><th class="amount"><?php echo number_format($sum, 2, ',', '&nbsp;'); ?></th><th colspan="4"></th></tr>
</table>
</div>
