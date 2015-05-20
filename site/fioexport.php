<?php
defined('_JEXEC') or die('Restricted access');
JLoader::register('FioCache', __DIR__.'/helpers/fiocache.php');
JLoader::register('FioClient', __DIR__.'/helpers/fioclient.php');
JLoader::register('FioDate', __DIR__.'/helpers/fiodate.php');
JLoader::register('FioParser', __DIR__.'/helpers/fioparser.php');
JLoader::register('TransactionList', __DIR__.'/helpers/transactionlist.php');
JLoader::register('TransactionItem', __DIR__.'/helpers/transactionitem.php');

$controller = JControllerLegacy::getInstance('FioExport');
$input = JFactory::getApplication()->input;
$controller->execute($input->getCmd('task'));
$controller->redirect();
