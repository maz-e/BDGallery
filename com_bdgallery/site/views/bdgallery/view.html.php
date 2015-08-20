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
 * HTML View class for the BdGallery Component
 *
 * @since 0.0.1
 */
class BdGalleryViewBdGallery extends JViewLegacy
{
   /**
    * Display the BdGallery view
    *
    * @param   string $tpl The name of the template file to parse; automatically searches through the template paths.
    *
    * @return  void
    */
   function display($tpl = null)
   {
      // Assign data to the view
		$this->albums = $this->get('Items');

		// Check for errors.
		if (count($errors = $this->get('Errors')))
		{
			JLog::add(implode('<br />', $errors), JLog::WARNING, 'jerror');

			return false;
		}

      // Display the view
      parent::display($tpl);
   }
}
