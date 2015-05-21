<?php
defined('_JEXEC') or die('Restricted access');
jimport('joomla.application.component.view');

class FioExportViewFioExport extends JViewLegacy {

  public function display($tpl = null) {
    $this->addToolBar();
		parent::display($tpl);
  }

  private function addToolBar() {
		JToolBarHelper::title(JText::_('COM_FIOEXPORT'));
		if (JFactory::getUser()->authorise('core.admin', 'com_fioexport')) {
    	JToolBarHelper::preferences('com_fioexport');
		}
  }

}
