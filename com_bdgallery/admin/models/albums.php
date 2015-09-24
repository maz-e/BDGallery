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

jimport('joomla.application.component.modellist');

/**
 * AlbumList Model
 *
 * @since  0.0.1
 */
class BdGalleryModelAlbums extends JModelList
{
	/**
	 * Constructor.
	 *
	 * @param   array  $config  An optional associative array of configuration settings.
	 *
	 * @see     JController
	 * @since   1.6
	 */
	public function __construct($config = array())
	{
		if (empty($config['filter_fields']))
		{
			$config['filter_fields'] = array(
				'a.id',
				'a.album_name',
				'a.published',
				'a.ordering',
				'c.title'
			);
		}

		parent::__construct($config);
	}

	/**
     * Method to auto-populate the model state.
     *
     */
    protected function populateState($ordering = null, $direction = null) {

		// List state information.
		parent::populateState('a.album_name', 'asc');
    }

	/**
	 * Method to build an SQL query to load the list data.
	 *
	 * @return      string  An SQL query
	 */
	protected function getListQuery()
	{
		// Initialize variables.
		$db    = JFactory::getDbo();
		$query = $db->getQuery(true);

		// Create the base select statement.
		$query->select('a.*, c.title')
                ->from($db->quoteName('#__bdgallery').'AS a')
					 ->join('LEFT', '#__categories AS c ON c.id = a.catid');

		// Filter: like / search
		$search = $this->getState('filter.search');

		if (!empty($search))
		{
			$like = $db->quote('%' . $search . '%');
			$query->where('a.album_name LIKE ' . $like);
		}

		// Filter by published state
		$published = $this->getState('filter.published');

		if (is_numeric($published))
		{
			$query->where('a.published = ' . (int) $published);
		}
		elseif ($published === '')
		{
			$query->where('(a.published IN (0, 1))');
		}

		// Add the list ordering clause.
		$orderCol	= $this->state->get('list.ordering');
		$orderDirn 	= $this->state->get('list.direction');
		if ($orderCol && $orderDirn) {
		   $query->order($db->escape($orderCol . ' ' . $orderDirn));
		}

		return $query;
	}
}
