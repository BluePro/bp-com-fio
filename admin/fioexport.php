<?php
defined('_JEXEC') or die('Restricted access');

$controller = JControllerLegacy::getInstance('FioExport');
$input = JFactory::getApplication()->input;
$controller->execute($input->getCmd('task'));
$controller->redirect();
