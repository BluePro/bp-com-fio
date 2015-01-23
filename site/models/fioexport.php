<?php
defined('_JEXEC') or die('Restricted access');
jimport('joomla.application.component.modelitem');

class FioExportModelFioExport extends JModelItem {

  private $client;

  public function __construct() {

    parent::__construct();
  }

  public function getList() {
    $list = $this->client->call('periods', [$dateFrom, $dateTo]);
    return array();
  }

  public function getById() {
    $list = $this->client->call('by-id', [$year, $id]);
  }

  public function getLast() {
    $this->client->call('last', []);
  }

}
