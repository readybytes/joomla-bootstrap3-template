<?php
/**
 * @package     Joomla.Plugin
 * @subpackage  System.Overrides
 *
 * @copyright   Copyright (C) 2012 Don Gilbert. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE
 */


// Use JLoader to register all the classes you want to override
JLoader::register('JHtmlBootstrap', JPATH_THEMES.'/frontbs3/site/libraries/cms/html/bootstrap.php', true);
JLoader::register('JHtmlJquery', JPATH_THEMES.'/frontbs3/site/libraries/cms/html/jquery.php', true);
JLoader::register('JHtmlIcon', JPATH_THEMES.'/frontbs3/site/libraries/cms/html/icon.php', true);
