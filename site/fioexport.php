<?php
defined('_JEXEC') or die('Restricted access');
//JLoader::register('FioClient', JPATH_COMPONENT.DS.'helpers'.DS.'fioclient.php');
jimport('joomla.application.component.controller');

$controller = JController::getInstance('FioExport');
$input = JFactory::getApplication()->input;
$controller->execute($input->getCmd('task'));
$controller->redirect();
