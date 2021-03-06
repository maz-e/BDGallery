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

JHtml::_('bootstrap.tooltip');
JHtml::_('behavior.multiselect');
JHtml::_('formbehavior.chosen', 'select');

$listOrder = $this->state->get('list.ordering', 'a.album_name');
$listDirn  = $this->state->get('list.direction', 'asc');
$saveOrder = $listOrder == 'a.ordering';
if ($saveOrder)
{
	$saveOrderingUrl = 'index.php?option=com_bdgallery&task=albums.saveOrderAjax&tmpl=component';
	JHtml::_('sortablelist.sortable', 'fileList', 'adminForm', strtolower($listDirn), $saveOrderingUrl);
}
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
		<table class="table table-striped table-hover" id="fileList">
			<thead>
			<tr>
            <?php if (isset($this->items[0]->ordering)): ?>
					<th width="1%" class="nowrap center hidden-phone">
						<?php echo JHtml::_('grid.sort', '<i class="icon-menu-2"></i>', 'a.ordering', $listDirn, $listOrder, null, 'asc', 'JGRID_HEADING_ORDERING'); ?>
					</th>
				<?php endif; ?>
				<th width="2%">
					<?php echo JHtml::_('grid.checkall'); ?>
				</th>
				<th width="8%" class="center">
					<?php echo JHtml::_('grid.sort', 'COM_BDGALLERY_PUBLISHED', 'a.published', $listDirn, $listOrder); ?>
				</th>
				<th width="64%">
					<?php echo JHtml::_('grid.sort', 'COM_BDGALLERY_ALBUMS_NAME', 'a.album_name', $listDirn, $listOrder); ?>
				</th>
            <th width="5%" class="center">
               <i class="icon-picture"></i>
            </th>
            <th width="5%">
               <?php echo JText::_('COM_BDGALLERY_THUMBNAIL'); ?>
            </th>
            <th width="10%" class="center">
					<?php echo JHtml::_('grid.sort', 'COM_BDGALLERY_CATEGORY', 'c.title', $listDirn, $listOrder); ?>
				</th>
				<th width="5%" class="center">
					<?php echo JHtml::_('grid.sort', 'COM_BDGALLERY_ID', 'a.id', $listDirn, $listOrder); ?>
				</th>
			</tr>
			</thead>
			<tfoot>
				<tr>
					<td colspan="9">
						<?php echo $this->pagination->getListFooter(); ?>
					</td>
				</tr>
			</tfoot>
			<tbody>
				<?php if (!empty($this->items)) : ?>
					<?php foreach ($this->items as $i => $row) :
                     $ordering = ($listOrder == 'a.ordering');
							$link     = JRoute::_('index.php?option=com_bdgallery&task=bdgallery.edit&id=' . $row->id);
					?>
						<tr>
                  <?php if (isset($this->items[0]->ordering)): ?>
							<td class="order nowrap center hidden-phone">
                        <?php
                           $disableClassName = '';
   								$disabledLabel    = '';
                           if (!$saveOrder) :
      								$disabledLabel    = JText::_('JORDERINGDISABLED');
      								$disableClassName = 'inactive tip-top';
      							endif;
                        ?>
								<span class="sortable-handler hasTooltip <?php echo $disableClassName ?>" title="<?php echo $disabledLabel ?>">
							     <i class="icon-menu"></i>
						      </span>
								<input type="text" style="display:none" name="order[]" size="5" value="<?php echo $row->ordering; ?>" class="width-20 text-area-order " />
							</td>
						<?php endif; ?>
							<td>
								<?php echo JHtml::_('grid.id', $i, $row->id); ?>
							</td>
							<td class="center">
								<?php echo JHtml::_('jgrid.published', $row->published, $i, 'albums.', true, 'cb'); ?>
							</td>
							<td>
								<a href="<?php echo $link; ?>" title="<?php echo JText::_('COM_BDGALLERY_EDIT_ALBUMS'); ?>">
									<?php echo $row->album_name; ?>
								</a>
							</td>
                     <td class="center">
                        <?php
                           echo $this->totalimg[$i];
                        ?>
                     </td>
                     <td class="center">
                        <?php if($row->imgfolder != NULL) : ?>
                           <i class="icon-ok"></i>
                        <?php endif;?>
                     </td>
                     <td class="center">
								<?php echo $row->title; ?>
							</td>
							<td class="center">
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
