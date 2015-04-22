<?php
defined('_JEXEC') or die('Restricted access');
jimport('joomla.application.component.view');

class FioExportViewFioExport extends JView {

  public function display($tpl = null) {
    $this->addToolBar();
  }

  private function addToolBar() {
    JToolBarHelper::preferences('com_fioexport');
  }

}
