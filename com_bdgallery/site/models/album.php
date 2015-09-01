<?php
/**
 * @package     Joomla.Site
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
class BdGalleryModelAlbum extends JModelItem
{

   /**
	 * @var array messages
	 */
	protected $albums;

   /**
	 * Method to get a table object, load it if necessary.
	 *
	 * @param   string  $type    The table name. Optional.
	 * @param   string  $prefix  The class prefix. Optional.
	 * @param   array   $config  Configuration array for model. Optional.
	 *
	 * @return  JTable  A JTable object
	 *
	 * @since   1.6
	 */
	public function getTable($type = 'BdGallery', $prefix = 'BdGalleryTable', $config = array())
	{
      return JTable::getInstance($type, $prefix, $config);
	}

   public function getItem($id = 0)
	{
		if (!is_array($this->albums))
		{
			$this->albums = array();
		}

		if (!isset($this->albums[$id]))
		{
			// Request the selected id
			$jinput = JFactory::getApplication()->input;
			$id     = $jinput->get('id', 0, 'INT');

			// Get a BdGalleryTable instance
			$table = $this->getTable();

			// Load the album
			$table->load($id);


			//Assign the data album
			$this->albums[$id] = array(
										'album_name' => $table->album_name,
										'folder' => $table->folderlist
									);
		}

		return $this->albums[$id];
	}
}
