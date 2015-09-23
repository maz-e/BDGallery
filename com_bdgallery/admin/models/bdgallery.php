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
 * BdGallery Model
 *
 * @since  0.0.1
 */
class BdGalleryModelBdGallery extends JModelAdmin
{
	/**
	 * Method to get a table object, load it if necessary.
	 *
	 * @param   string  $type    The table name. Optional.
	 * @param   string  $prefix  The class prefix. Optional.
	 * @param   array   $config  Configuration array for model. Optional.
	 *
	 * @return  JTable  A JTable object
	 *
	 * @since   1.6
	 */
	public function getTable($type = 'BdGallery', $prefix = 'BdGalleryTable', $config = array())
	{
		return JTable::getInstance($type, $prefix, $config);
	}

	/**
	 * Method to get the record form.
	 *
	 * @param   array    $data      Data for the form.
	 * @param   boolean  $loadData  True if the form is to load its own data (default case), false if not.
	 *
	 * @return  mixed    A JForm object on success, false on failure
	 *
	 * @since   1.6
	 */
	public function getForm($data = array(), $loadData = true)
	{
		// Get the form.
		$form = $this->loadForm(
			'com_bdgallery.bdgallery',
			'bdgallery',
			array(
				'control' => 'jform',
				'load_data' => $loadData
			)
		);

		if (empty($form))
		{
			return false;
		}

		return $form;
	}

	/**
	 * Method to get the script that have to be included on the form
	 *
	 * @return string	Script files
	 */
	public function getScript()
	{
		return 'administrator/components/com_bdgallery/models/forms/bdgallery.js';
	}

	/**
	 * Method to create thumbnail before safe form.
	 *
	 * @param   $form
	 */
	protected function prepareTable($form)
	{
		if( !empty($form->imgfolder) && file_exists(JPATH_SITE.'/'.$form->imgfolder) ){

			jimport('joomla.filesystem.file');
			jimport( 'joomla.image.image' );

			if (!class_exists('JFolder')){
				jimport('joomla.filesystem.folder');
			}

			//Set the paths for the photo directories
			$asset_dir = JPath::clean( JPATH_SITE.'/images/albums/'. $form->folderlist .'/thumbs/' );

			//Create the gallery folder
			if( !JFolder::exists( $asset_dir ) ){
				JFolder::create( $asset_dir );
				JFile::copy( JPATH_SITE.'/images/index.html', $asset_dir.'index.html');
			}

			$native_dest = JPATH_SITE.'/'.$form->imgfolder;
			$nativeProps = Jimage::getImageFileProperties( $native_dest );
			$thumbnail_dest = $asset_dir . JFile::getName($native_dest);

			//Generate thumbnail
			$jimage	= new JImage();
			$jimage->loadFile( $native_dest );
			$thumbnail = $jimage->cropResize('300', '300', $createNew = true);
			$thumbnail->toFile( $thumbnail_dest, $nativeProps->type );


			$form->imgfolder = 'images/albums/'. $form->folderlist .'/thumbs/'. JFile::getName($native_dest);
		}

		return true;
	}

	/**
	 * Method to get the data that should be injected in the form.
	 *
	 * @return  mixed  The data for the form.
	 *
	 * @since   1.6
	 */
	protected function loadFormData()
	{
		// Check the session for previously entered form data.
		$data = JFactory::getApplication()->getUserState(
			'com_bdgallery.edit.bdgallery.data',
			array()
		);

		if (empty($data))
		{
			$data = $this->getItem();
		}

		return $data;
	}
}
