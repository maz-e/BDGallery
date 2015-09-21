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

abstract class BdGalleryHelper
{
   /**
    * BdGallery component helper.
    *
    * @param   string  $folder  The folder directory
    *
    * @return  array   $images  The images of the directory
    *
    * @since   1.6
    */

   public static function getImages($folder)
   {
      // Set directory path
      $dir = JPATH_BASE . '/images/albums/' . $folder;

      // Check if directory exists
		if (is_dir($dir))
		{
         $files = scandir($dir);

			foreach ($files as $img)
			{
				if (!is_dir($dir . '/' . $img))
				{
					if (preg_match('/' . 'png' . '/', $img) || preg_match('/' . 'jpg' . '/', $img))
					{
						$images[] = $img;
					}
				}
			}
      }
      if(!empty($images)) {
         return $images;
      } else {
         return JText::_('COM_BDGALLERY_IMAGE_NOT_FOUND');
      }
   }
}
