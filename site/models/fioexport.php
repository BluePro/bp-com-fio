<?php
defined('_JEXEC') or die('Restricted access');
jimport('joomla.application.component.modelitem');
jimport('joomla.application.component.helper');

class FioExportModelFioExport extends JModelItem {

  private $client;

  public function __construct() {
    $params = JComponentHelper::getParams('com_fioexport');
		$fioCache = new FioCache(
				JFactory::getDBO(),
				$params->get('cache'));
    $this->client = new FioClient(
				$fioCache,
        $params->get('url'),
        $params->get('token'));

    parent::__construct();
  }

  public function getList($dateFrom, $dateTo) {
    $list = $this->client->call('periods', [$dateFrom, $dateTo]);
		if ($list) {
	    return FioParser::getTransactionList($list);
		} else {
			$this->setError(JText::_('COM_FIOEXPORT_ERROR_NO_DATA'));
			return false;
		}
  }

  public function getById($year, $id) {
    $list = $this->client->call('by-id', [$year, $id]);
		if ($list) {
	    return FioParser::getTransactionList($list);
		} else {
			$this->setError(JText::_('COM_FIOEXPORT_ERROR_NO_DATA'));
			return false;
		}
  }

  public function getLast() {
    $list = $this->client->call('last', []);
		if ($list) {
    	return FioParser::getTransactionList($list);
		} else {
			$this->setError(JText::_('COM_FIOEXPORT_ERROR_NO_DATA'));
			return false;
		}
  }

}
