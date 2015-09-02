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
 * Albums View
 *
 * @since  0.0.1
 */
class BdGalleryViewAlbums extends JViewLegacy
{
	/**
	 * Display the Albums view
	 *
	 * @param   string  $tpl  The name of the template file to parse; automatically searches through the template paths.
	 *
	 * @return  void
	 */
	function display($tpl = null)
	{
		// Get application
		$app = JFactory::getApplication();
		$context = "bdgallery.list.admin.bdgallery";

		// Get data from the model
		$this->items		= $this->get('Items');
		$this->pagination	= $this->get('Pagination');
		$this->state			= $this->get('State');
		$this->filter_order 	= $app->getUserStateFromRequest($context.'filter_order', 'filter_order', 'a.album_name', 'cmd');
		$this->filter_order_Dir = $app->getUserStateFromRequest($context.'filter_order_Dir', 'filter_order_Dir', 'asc', 'cmd');
		$this->filterForm    	= $this->get('FilterForm');
		$this->activeFilters 	= $this->get('ActiveFilters');

		//Get total images
		$this->totalimg = BdGalleryHelper::countImages($this->items);

		// Check for errors.
		if (count($errors = $this->get('Errors')))
		{
			JError::raiseError(500, implode('<br />', $errors));

			return false;
		}

		// Set the submenu
		BdGalleryHelper::addSubmenu('albums');
		$this->sidebar = JHtmlSidebar::render();

		// Set the toolbar and number of found items
		$this->addToolBar();

		// Display the template
		parent::display($tpl);

		// Set the document
		// $this->setDocument();
	}

	/**
	 * Add the page title and toolbar.
	 *
	 * @return  void
	 *
	 * @since   1.6
	 */
	protected function addToolBar()
	{
		JToolBarHelper::title(JText::_('COM_BDGALLERY_MANAGER_ALBUMS'));
		JToolBarHelper::addNew('bdgallery.add');
		JToolBarHelper::editList('bdgallery.edit');
		JToolBarHelper::publishList('albums.publish');
		JToolBarHelper::unpublishList('albums.unpublish');
		JToolBarHelper::deleteList('', 'albums.delete');
	}
}
