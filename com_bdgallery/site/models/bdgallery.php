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
class BdGalleryModelBdGallery extends JModelListItem
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
			$this->albums = 'Hello World!';
		}

		return $this->albums;
	}
}
