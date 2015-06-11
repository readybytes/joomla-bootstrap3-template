<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_]
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

// For modules in the menu navigation we will add the BS class for navbars
if ($module->position == 'menu')
{
	$class_sfx .= ' navbar-nav';
}

$isNavbarNav = stristr($class_sfx, 'navbar-nav');
?>

<ul class="nav navbar-nav menu<?php echo $class_sfx;?>"<?php
	$tag = '';
	if ($params->get('tag_id') != null)
	{
		$tag = $params->get('tag_id').'';
		echo ' id="'.$tag.'"';
	}
?>>
<?php
//echo "<pre>";print_r($list); echo "</pre>";

foreach ($list as $i => &$item) :

	$item->isNavbarNav = $isNavbarNav;

if ($item->id == 489)
	{
		//echo "<pre>";print_r($item); echo "</pre>"; exit;
	}

	$class = 'item-'.$item->id;
	if ($item->id == $active_id)
	{
		$class .= ' current';
	}

	if (in_array($item->id, $path))
	{
		$class .= ' active';
	}
	elseif ($item->type == 'alias')
	{
		$aliasToId = $item->params->get('aliasoptions');
		if (count($path) > 0 && $aliasToId == $path[count($path) - 1])
		{
			$class .= ' active';
		}
		elseif (in_array($aliasToId, $path))
		{
			$class .= ' alias-parent-active';
		}
	}

	if ($item->type == 'separator')
	{
		$class .= ' divider';
	}

	if ($item->deeper)
	{
		$class .= ' deeper';
	}

	$item->isParentAnchor = false;

	if ($item->parent)
	{
		$class .= ' parent';
		$item->isParentAnchor = true;

		if ($isNavbarNav)
		{
			$class .= ' dropdown';

			if ($item->level > 1)
			{
				$class .= ' dropdown-submenu';
			}
		}
	}

	if (!empty($class))
	{
		$class = ' class="'.trim($class) .'"';
	}

	echo '<li'.$class.'>';

	// Render the menu item.
	switch ($item->type) :
		case 'separator':
		case 'url':
		case 'component':
		case 'heading':
			require JModuleHelper::getLayoutPath('mod_menu', 'default_'.$item->type);
			break;

		default:
			require JModuleHelper::getLayoutPath('mod_menu', 'default_url');
			break;
	endswitch;

	// The next item is deeper.
	if ($item->deeper)
	{
		$childClasses = "nav-child unstyled small";

		if ($isNavbarNav)
		{
			$childClasses .= ' dropdown-menu';
		}

		echo '<ul class="' . $childClasses . '">';
	}
	// The next item is shallower.
	elseif ($item->shallower)
	{
		echo '</li>';
		echo str_repeat('</ul></li>', $item->level_diff);
	}
	// The next item is on the same level.
	else {
		echo '</li>';
	}
endforeach;
?></ul>
