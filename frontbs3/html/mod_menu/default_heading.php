<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_menu
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

// Added ability to have bootstrap icon in menu 
if ( (!$item->menu_image) && ($item->note) )
		{
			?><span class="nav-header <?php echo $item->note ?>">&nbsp;<?php echo $item->title; ?></span>
<?php } else {?>
<span class="nav-header"><?php echo $item->title; ?></span>
<?php } ?>