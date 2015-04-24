<?php
defined('_JEXEC') or die('Restricted access');
jimport('joomla.application.component.view');

class FioExportViewFioExport extends JViewLegacy {

  public function display($tpl = null) {
    $input = JFactory::getApplication()->input;
    $dateFrom = $input->getString('dateFrom', '2015-01-01');
    $dateTo = $input->get('dateTo', '2015-01-31');

    $cache = JFactory::getCache();
		$model = $this->getModel();
    $list = $cache->call(array($model, 'getList'), $dateFrom, $dateTo);

    if ($errors = $this->get('Errors')) {
      JLog::add(implode('<br />', $errors), JLog::WARNING, 'jerror');
      return false;
    }

    $this->dateFrom = $dateFrom;
    $this->dateTo = $dateTo;
    $this->list = $list;

    parent::display($tpl);
  }

}
