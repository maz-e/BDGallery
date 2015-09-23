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
$i = 1;
?>

<div class="row">
   <?php foreach ($this->albums as $album) : ?>
      <div class="col s12 m4">
         <div class="card blue-grey">
            <div class="card-image waves-effect waves-block waves-light">
               <img class="activator" src="<?php echo $album->imgfolder; ?>">
            </div>
            <div class="card-content">
               <span class="card-title activator grey-text text-lighten-4"><?php echo $album->album_name; ?></span>
            </div>
            <div class="card-reveal grey lighten-4">
               <span class="card-title grey-text text-darken-4"><i class="material-icons right">close</i><br><?php echo $album->album_name; ?></span>
               <p><?php echo $album->description; ?></p>
               <p class="center-align">
                  <a class="btn" href="<?php echo JRoute::_('index.php?option=com_bdgallery&view=album&id=' . (int) $album->id); ?>">Ver Galería</a>
               </p>
            </div>
         </div>
      </div>
   <?php
      if( ($i % 3) == 0) {
         echo '</div><div class="row">';
      }
      $i++;
   ?>
   <?php endforeach; ?>
</div>
