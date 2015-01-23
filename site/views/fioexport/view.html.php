<?php
defined('_JEXEC') or die('Restricted access');
jimport('joomla.application.component.view');

class FioExportViewFioExport extends JView {

  function display($tpl = null) {
    $this->list = array();

    parent::display($tpl);
  }

}
