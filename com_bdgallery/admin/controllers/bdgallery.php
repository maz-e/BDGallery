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
 * BdGallery Controller
 *
 * @package     Joomla.Bladis
 * @subpackage  com_bdgallery
 * @since       0.0.8
 */
class BdGalleryControllerBdGallery extends JControllerForm
{
   function __construct() {
        $this->view_list = 'albums';
        parent::__construct();
    }
}
