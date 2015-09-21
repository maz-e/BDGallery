<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_bdgallery
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted access');
jimport('joomla.filesystem.folder');

/**
 * Script file of Bdgallery component
 */
class Com_bdgalleryInstallerScript
{
	public $texto;

	/**
	 * method to install the component
	 *
	 * @return void
	 */
	function install($parent)
	{
		// Set the path of the new folder to add
		$path = JPATH_SITE . '/images/albums';

		// Create the folder if not exists
		if(!is_dir($path)){
			$mode = 0755;
			JFolder::create($path, $mode);
			echo '<p>'. JText::_('COM_BDGALLERY_ADD_FOLDER') .'</p>';
		}

		// $parent is the class calling this method
		$parent->getParent()->setRedirectURL('index.php?option=com_bdgallery');
	}

	/**
	 * method to uninstall the component
	 *
	 * @return void
	 */
	function uninstall($parent)
	{
		echo '<p>'. JText::_('COM_BDGALLERY_UNINSTALL_TEXT') .'</p>';
	}

	/**
	 * method to update the component
	 *
	 * @return void
	 */
	function update($parent)
	{
		// Set the path of the new folder to add
		$path = JPATH_SITE . '/images/albums';

		// Create the folder if not exists
		if(!is_dir($path)){
			$mode = 0755;
			JFolder::create($path, $mode);
			echo '<p>'. JText::_('COM_BDGALLERY_ADD_FOLDER') .'</p>';
		}

		// $parent is the class calling this method
		echo '<p>'. JText::sprintf('COM_BDGALLERY_UPDATE_TEXT', $parent->get('manifest')->version) .'</p>';
	}

	/**
	 * method to run before an install/update/uninstall method
	 *
	 * @return void
	 */
	function preflight($type, $parent)
	{
		// $parent is the class calling this method
		// $type is the type of change (install, update or discover_install)
		//echo '<p>' . JText::_('COM_BDGALLERY_PREFLIGHT_' . $type . '_TEXT') . '</p>';
	}

	/**
	 * method to run after an install/update/uninstall method
	 *
	 * @return void
	 */
	function postflight($type, $parent)
	{
		// $parent is the class calling this method
		// $type is the type of change (install, update or discover_install)
		//echo '<p>' . JText::_('COM_BDGALLERY_POSTFLIGHT_' . $type . '_TEXT') . '</p>';
	}
}
