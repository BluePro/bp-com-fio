<?php
defined('_JEXEC') or die('Restricted access');
jimport('joomla.application.component.view');

class FioExportViewFioExport extends JView {

  public function display($tpl = null) {
    $this->list = $this->get('List');

    if ($errors = $this->get('Errors')) {
      JLog::add(implode('<br />', $errors), JLog::WARNING, 'jerror');
      return false;
    }

    parent::display($tpl);
  }

}
