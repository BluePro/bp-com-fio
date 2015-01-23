<?php
defined('_JEXEC') or die('Restricted access');
jimport('joomla.application.component.controller');

$controller = JController::getInstance('FioExport');
$jinput = JFactory::getApplication()->input;
$task = $jinput->get('task', '', 'STR' );
$controller->execute($task);
$controller->redirect();
