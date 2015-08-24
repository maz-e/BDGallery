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

/**
 * BdGallery component helper.
 *
 * @param   string  $submenu  The name of the active view.
 *
 * @return  void
 *
 * @since   1.6
 */
abstract class BdGalleryHelper
{
	/**
	 * Configure the Linkbar.
	 *
	 * @return Bool
	 */

	public static function addSubmenu($submenu)
	{
		JSubMenuHelper::addEntry(
			JText::_('COM_BDGALLERY_SUBMENU_MESSAGES'),
			'index.php?option=com_bdgallery',
			$submenu == 'albums'
		);

		JSubMenuHelper::addEntry(
			JText::_('COM_BDGALLERY_SUBMENU_CATEGORIES'),
			'index.php?option=com_categories&view=categories&extension=com_bdgallery',
			$submenu == 'categories'
		);

		// // Set some global property
		// $document = JFactory::getDocument();
		// $document->addStyleDeclaration('.icon-48-helloworld ' .
		// 								'{background-image: url(../media/com_helloworld/images/tux-48x48.png);}');
		// if ($submenu == 'categories')
		// {
		// 	$document->setTitle(JText::_('COM_HELLOWORLD_ADMINISTRATION_CATEGORIES'));
		// }
	}
}
