<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_bdgallery
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;


/**
 * Routing class from com_content
 *
 * @since  3.3
 */
class BdGalleryRouter extends JComponentRouterBase
{
   /**
	 * Build the route for the com_bdgallery component
	 *
	 * @param   array  &$query  An array of URL arguments
	 *
	 * @return  array  The URL arguments to use to assemble the subsequent URL.
	 *
	 * @since   3.3
	 */
	public function build(&$query)
	{
      $segments = array();

      if (isset($query['view']) && isset($query['id']))
		{
         // Get the album name
         $db = JFactory::getDbo();
			$dbQuery = $db->getQuery(true)
				->select('album_name')
				->from('#__bdgallery')
				->where('id=' . (int) $query['id']);
			$db->setQuery($dbQuery);
			$alias = $db->loadResult();

         // Making URL safe
         $alias = JFilterOutput::stringURLSafe($alias);

			$query['id'] = $query['id'] . '-' . $alias;

         $view = $query['view'];
         if($view !== 'bdgallery') {
            $segments[] = $query['view'];
            $segments[] = $query['id'];
         }

         unset($query['view']);
         unset($query['id']);
         return $segments;
      }

		// We need to have a view in the query or it is an invalid URL
		return $segments;
	}

	/**
	 * Parse the segments of a URL.
	 *
	 * @param   array  &$segments  The segments of the URL to parse.
	 *
	 * @return  array  The URL attributes to be used by the application.
	 *
	 * @since   3.3
	 */
	public function parse(&$segments)
	{
      $vars = array();

      switch($segments[0])
      {
         case 'bdgallery':
            $vars['view'] = 'bdgallery';
            $id = explode(':', $segments[1]);
            $vars['id'] = (int) $id[0];
            break;

         case 'album':
            $vars['view'] = 'album';
            $id = explode(':', $segments[1]);
            $vars['id'] = (int) $id[0];
            break;
      }

      return $vars;
   }
}
