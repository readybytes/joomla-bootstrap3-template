<?php
/**
 * @package     Joomla.Plugin
 * @subpackage  System.Overrides
 *
 * @copyright   Copyright (C) 2012 Don Gilbert. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE
 */

defined('JPATH_BASE') or die;

/**
 * System plugin to override core classes terms.
 *
 * @package     Joomla.Plugin
 * @subpackage  System.Overrides
 * @since       2.5
 */


class PlgSystemOverrides extends JPlugin
{
	/* We do our thing in the __construct method
	 * so that our overridden classes will be
	 * available everywhere
	 */
	
	public function __construct(&$subject, $config)
	{
		
		parent::__construct($subject, $config);
		
		//Load config file only at frontend
		$app = JFactory::getApplication();
		if($app->isSite()) {	
			include_once 'config.php';
		}
		
	}
}
