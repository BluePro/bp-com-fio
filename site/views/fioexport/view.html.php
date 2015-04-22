<?php
defined('_JEXEC') or die('Restricted access');
jimport('joomla.application.component.view');

class FioExportViewFioExport extends JView {

  public function display($tpl = null) {
    $input = JFactory::getApplication()->input;
    $dateFrom = $input->getString('dateFrom');
    $dateTo = $input->get('dateTo');

    $model = $this->getModel();
    $list = $model->getList($dateFrom, $dateTo);

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
