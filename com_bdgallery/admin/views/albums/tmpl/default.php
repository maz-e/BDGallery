<?php
/**
 * @package     Joomla.Bladis
 * @subpackage  com_bdgallery
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted Access');

JHtml::_('formbehavior.chosen', 'select');

$listOrder     = $this->escape($this->filter_order);
$listDirn      = $this->escape($this->filter_order_Dir);
?>
<div id="j-sidebar-container" class="span2">
    <?php echo $this->sidebar; ?>
</div>
<div id="j-main-container" class="span10">
	<form action="<?php echo JRoute::_('index.php?option=com_bdgallery&view=albums'); ?>" method="post" id="adminForm" name="adminForm">
		<div class="row-fluid">
          <div class="span12">
              <?php
                  //Search tools bar
                  echo JLayoutHelper::render('joomla.searchtools.default', array('view' => $this));
              ?>
          </div>
      </div>
      <?php if (empty($this->items)) : ?>
          <div class="alert alert-no-items">
              <?php echo JText::_('JGLOBAL_NO_MATCHING_RESULTS'); ?>
          </div>
      <?php else : ?>
		<table class="table table-striped table-hover">
			<thead>
			<tr>
				<th width="1%"><?php echo JText::_('COM_BDGALLERY_NUM'); ?></th>
				<th width="2%">
					<?php echo JHtml::_('grid.checkall'); ?>
				</th>
				<th width="8%" class="center">
					 <?php echo JHtml::_('grid.sort', 'COM_BDGALLERY_PUBLISHED', 'published', $listDirn, $listOrder); ?>
				</th>
				<th width="84%">
					 <?php echo JHtml::_('grid.sort', 'COM_BDGALLERY_ALBUMS_NAME', 'album', $listDirn, $listOrder); ?>
				</th>
				<th width="5%" class="center">
					 <?php echo JHtml::_('grid.sort', 'COM_BDGALLERY_ID', 'id', $listDirn, $listOrder); ?>
				</th>
			</tr>
			</thead>
			<tfoot>
				<tr>
					<td colspan="5">
						<?php echo $this->pagination->getListFooter(); ?>
					</td>
				</tr>
			</tfoot>
			<tbody>
				<?php if (!empty($this->items)) : ?>
					<?php foreach ($this->items as $i => $row) :
							$link = JRoute::_('index.php?option=com_bdgallery&task=bdgallery.edit&id=' . $row->id);
					?>
						<tr>
							<td>
								<?php echo $this->pagination->getRowOffset($i); ?>
							</td>
							<td>
								<?php echo JHtml::_('grid.id', $i, $row->id); ?>
							</td>
							<td align="center">
								<?php echo JHtml::_('jgrid.published', $row->published, $i, 'albums.', true, 'cb'); ?>
							</td>
							<td>
								<a href="<?php echo $link; ?>" title="<?php echo JText::_('COM_BDGALLERY_EDIT_ALBUMS'); ?>">
									<?php echo $row->album; ?>
								</a>
							</td>
							<td align="center">
								<?php echo $row->id; ?>
							</td>
						</tr>
					<?php endforeach; ?>
				<?php endif; ?>
			</tbody>
		</table>
		<?php endif; ?>
		<input type="hidden" name="task" value=""/>
		<input type="hidden" name="boxchecked" value="0"/>
		<input type="hidden" name="filter_order" value="<?php echo $listOrder; ?>"/>
      <input type="hidden" name="filter_order_Dir" value="<?php echo $listDirn; ?>"/>
		<?php echo JHtml::_('form.token'); ?>
	</form>
</div>
