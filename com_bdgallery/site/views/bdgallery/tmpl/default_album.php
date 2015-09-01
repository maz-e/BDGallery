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
?>
<div class="row">
   <?php if( is_array($this->images) ) : ?>
      <?php foreach ($this->images as $img) : ?>
         <div class="col s6 m3 l2">
            <?php echo JHtml::_('image', 'images/bladis/' . $this->folder . '/' . $img, $img, 'class="materialboxed" width="100%" style="margin-bottom: 18px;"'); ?>
         </div>
      <?php endforeach; ?>
   <?php else : ?>
      <div class="col s12">
         <div class="card-panel alert-warning animated bounceIn">
      		<div class="valign-wrapper">
      			<i class="large material-icons">announcement</i>&nbsp;
      			<p class="flow-text valign">
      				<?php echo $this->images; ?>
      			</p>
      		</div>
   	  </div>
      </div>
   <?php endif; ?>
</div>
