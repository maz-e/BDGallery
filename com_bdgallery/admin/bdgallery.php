<?php
/**
 * @package     Joomla.Bladis
 * @subpackage  com_bdgallery
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// Require helper file
JLoader::register('BdGalleryHelper', JPATH_COMPONENT . '/helpers/bdgallery.php');

// Get an instance of the controller prefixed by BdGallery
$controller = JControllerLegacy::getInstance('BdGallery');

// Perform the Request task
$controller->execute(JFactory::getApplication()->input->get('task'));

// Redirect if set by the controller
$controller->redirect();
