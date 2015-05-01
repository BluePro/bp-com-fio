<?php
defined('_JEXEC') or die('Restricted access');
jimport('joomla.application.component.view');

class FioExportViewFioExport extends JViewLegacy {

  public function display($tpl = null) {
    $app = JFactory::getApplication();
    $dateFrom = $app->getUserStateFromRequest('fioexport.dateFrom', 'dateFrom', $this->getDefaultDateFrom());
    $dateTo = $app->getUserStateFromRequest('fioexport.dateTo', 'dateTo', $this->getDefaultDateTo());

    $cache = JFactory::getCache();
		$model = $this->getModel();
		$list = $model->getList($dateFrom, $dateTo);
//    $list = $cache->call(array($model, 'getList'), $dateFrom, $dateTo);

    if ($errors = $this->get('Errors')) {
      JLog::add(implode('<br />', $errors), JLog::WARNING, 'jerror');
      return false;
    }

    $this->dateFrom = $dateFrom;
    $this->dateTo = $dateTo;
    $this->transactionList = $list;

    parent::display($tpl);
  }

	private function getDefaultDateFrom() {
		return date('Y-m-d', strtotime('-1 month'));
	}

	private function getDefaultDateTo() {
		return date('Y-m-d');
	}

}
