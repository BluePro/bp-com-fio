<?php
defined('_JEXEC') or die('Restricted access');
jimport('joomla.application.component.modelitem');
jimport('joomla.application.component.helper');

class FioExportModelFioExport extends JModelItem {

  private $client;

  public function __construct() {
    $params = JComponentHelper::getParams('com_fioexport');
    $this->client = new FioClient(
        $params->get('url'),
        $params->get('token'));

    parent::__construct();
  }

  public function getList($dateFrom, $dateTo) {
    $list = $this->client->call('periods', [$dateFrom, $dateTo]);
    return FioParser::getTransactionList($list);
  }

  public function getById($year, $id) {
    $list = $this->client->call('by-id', [$year, $id]);
    return FioParser::getTransactionList($list);
  }

  public function getLast() {
    $list = $this->client->call('last', []);
    return FioParser::getTransactionList($list);
  }

}
