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
		JHtmlSidebar::addEntry(
			JText::_('COM_BDGALLERY_SUBMENU_TITLE_ALBUMS'),
			'index.php?option=com_bdgallery',
			$submenu == 'albums'
		);

		JHtmlSidebar::addEntry(
			JText::_('COM_BDGALLERY_SUBMENU_CATEGORIES'),
			'index.php?option=com_categories&view=categories&extension=com_bdgallery',
			$submenu == 'categories'
		);
	}

	/**
    * BdGallery component helper.
    *
    * @param   array $items  		Items from SQL query
    *
    * @return  array   $totalimg  	The total number of images by album
    *
    * @since   1.6
    */

   public static function countImages($items)
   {
		foreach ($items as $i => $item) {
			// Set directory path
			$folder = $item->folderlist;
	      $dir = JPATH_ROOT . '/images/bladis/' . $folder;

	      // Check if directory exists
			if (is_dir($dir))
			{
				$files = scandir($dir);

				$images = 0;
				foreach ($files as $img)
				{
					if (!is_dir($dir . '/' . $img))
					{
						if (preg_match('/' . 'png' . '/', $img) || preg_match('/' . 'jpg' . '/', $img))
						{
							$images++;
						}
					}
				}
	      }
	      $totalimg[$i] = $images;
		}
		return $totalimg;
   }
}
