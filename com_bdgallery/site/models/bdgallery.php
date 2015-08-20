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
 * BdGallery Model
 *
 * @since  0.0.1
 */
class BdGalleryModelBdGallery extends JModelList
{
	/**
	 * Method to build an SQL query to load the list data.
	 *
	 * @return      string  An SQL query
	 */
	protected function getListQuery()
	{
		// Request the selected id
		$jinput = JFactory::getApplication()->input;
		$catid  = $jinput->get('id', 1, 'INT');

		// Initialize variables.
		$db    = JFactory::getDbo();
		$query = $db->getQuery(true);
      $query->select('*');
      $query->from('#__bdgallery');
		$query->where('catid = ' . (int) $catid);

		return $query;
	}
}
