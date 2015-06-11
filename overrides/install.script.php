<?php
/**
 * @package     Joomla Plugin for Paycart template
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE
 * @author      Rakesh
 */

defined('_JEXEC') or die;

jimport('joomla.filesystem.file');
jimport('joomla.filesystem.folder');

class plgsystemoverridesInstallerScript
{
    /**
     * Called before any type of action
     *
     * @param   string  $type  Which action is happening (install|uninstall|discover_install)
     * @param   object  $parent  The object responsible for running this script
     *
     * @return  boolean  True on success
     */
    public function preflight($type, $parent)
    {}

    /**
     * Called on installation
     *
     * @param   object  $parent  The object responsible for running this script
     *
     * @return  boolean  True on success
     */
    function install($parent)
    { }

    /**
     * Called on uninstallation
     *
     * @param   object  $parent  The object responsible for running this script
     *
     * @return  boolean  True on success
     */
    function uninstall($parent)
    { }

    /**
     * Called after install
     *
     * @param   string  $type  Which action is happening (install|uninstall|discover_install)
     * @param   object  $parent  The object responsible for running this script
     *
     * @return  boolean  True on success
     */
    public function postflight($type, $parent)
    {       $query          = "UPDATE `#__extensions` SET `enabled`=1 WHERE `element` = 'overrides' AND `folder` = 'system' ";
        return JFactory::getDbo()->setQuery($query)->query();
   }

}
