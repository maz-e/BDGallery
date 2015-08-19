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
	 * @var string albums
	 */
	protected $albums;

	/**
	 * Get the albums
         *
	 * @return  string  The albums to be displayed to the user
	 */
	public function getAlbums()
	{
		if (!isset($this->albums))
		{
         $jinput = JFactory::getApplication()->input;
			$id     = $jinput->get('id', 1, 'INT');

			switch ($id)
			{
            case 3:
					$this->albums = 'Formacion';
					break;
            case 2:
					$this->albums = 'Proyectos';
					break;
				default:
				case 1:
					$this->albums = 'Exposicion';
					break;
			}
		}

		return $this->albums;
	}
}
