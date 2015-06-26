<?php
defined('_JEXEC') or die('Restricted access');
jimport('joomla.application.component.view');

class FioExportViewFioExport extends JViewLegacy {

	protected $dateFrom;
	protected $dateTo;
	protected $transactionList;

  public function display($tpl = null) {
    $app = JFactory::getApplication();
    $showIncome = $app->getUserStateFromRequest('fioexport.showIncome', 'showIncome', true);
    $showExpense = $app->getUserStateFromRequest('fioexport.showExpense', 'showExpense', true);
    $dateFrom = $app->getUserStateFromRequest('fioexport.dateFrom', 'dateFrom');
    $dateTo = $app->getUserStateFromRequest('fioexport.dateTo', 'dateTo');
		if (!FioDate::isValidDateInterval($dateFrom, $dateTo)) {
			$dateFrom = FioDate::getDefaultDateFrom();
			$dateTo = FioDate::getDefaultDateTo();
		}

    $cache = JFactory::getCache();
		$model = $this->getModel();
		$list = $model->getList($dateFrom, $dateTo);
//    $list = $cache->call(array($model, 'getList'), $dateFrom, $dateTo);

    if ($errors = $this->get('Errors')) {
			foreach ($errors as $error) {
				$app->enqueueMessage($error, 'error');
			}
      JLog::add(implode('<br />', $errors), JLog::WARNING, 'jerror');
      return false;
    }

		$this->showIncome = $showIncome;
		$this->showExpense = $showExpense;
		$this->dateFrom = $dateFrom;
    $this->dateTo = $dateTo;
    $this->transactionList = $list;

		JHtml::stylesheet('com_fioexport/fioexport.css', array(), true);

    parent::display($tpl);
  }

}
