<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_menu
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

$itemAttributes = array();
$itemAttributes['class'] = $item->anchor_css ? $item->anchor_css : null;
$itemAttributes['title'] = $item->anchor_title ? $item->anchor_title : null;

if ($item->isParentAnchor)
{
	$itemAttributes['data-toggle'] = 'dropdown';
	$itemAttributes['class'] .= ' dropdown-toggle';
}

// Convert attributes to string
$attributes = '';

if (!empty($itemAttributes))
{
	foreach ($itemAttributes as $attribute => $value)
	{
		if (null !== $value)
		{
			$attributes .= ' ' . $attribute . '="' . trim((string) $value) . '"';
		}
	}
}

if ($item->menu_image)
	{
		$item->params->get('menu_text', 1) ?
		$linktype = '<img src="'.$item->menu_image.'" alt="'.$item->title.'" /><span class="image-title">'.$item->title.'</span> ' :
		$linktype = '<img src="'.$item->menu_image.'" alt="'.$item->title.'" />';
}
else
{
	$linktype = $item->title;

	// Added ability to have bootstrap icon in menu 
if ( (!$item->menu_image) && ($item->note) )
		{
			$linktype = '<i class="' . $item->note . '">&nbsp;</i>' . $linktype;

}

	// Add Bootstrap caret
	if ($item->isParentAnchor)
	{
		$linktype .= ' <span class="caret"></span>';
	}
}


$flink = $item->flink;
$flink = JFilterOutput::ampReplace(htmlspecialchars($flink));

switch ($item->browserNav) :
	default:
	case 0:
?><a <?php echo $attributes; ?>href="<?php echo $flink; ?>"><?php echo $linktype; ?></a><?php
		break;
	case 1:
		// _blank
?><a <?php echo $attributes; ?>href="<?php echo $flink; ?>" target="_blank"><?php echo $linktype; ?></a><?php
		break;
	case 2:
		// window.open
		$options = 'toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes,'.$params->get('window_open');
			?><a <?php echo $attributes; ?>href="<?php echo $flink; ?>" onclick="window.open(this.href,'targetWindow','<?php echo $options;?>');return false;"><?php echo $linktype; ?></a><?php
		break;
endswitch;
