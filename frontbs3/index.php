<?php
/**
 * @package     Joomla.Site
 * @subpackage  Templates.frontbs3
 *
 * @copyright   Copyright (C) 209 - 2015 Ready Bytes Software Labs. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

$app             = JFactory::getApplication();
$doc             = JFactory::getDocument();
$user            = JFactory::getUser();
$this->language  = $doc->language;
$this->direction = $doc->direction;
$tpath 			 = $this->baseurl.'/templates/'.$this->template;

// Getting params from template
$params 			= $app->getTemplate(true)->params;
$templateColor 	= $this->params->get('templateColor');
$backgroundColor 	= $this->params->get('templateBackgroundColor-lbl');
$googleFontName	= $this->params->get('googleFontName');


// generator tag
$this->setGenerator(null);


// Detecting Active Variables
$option   = $app->input->getCmd('option', '');
$view     = $app->input->getCmd('view', '');
$layout   = $app->input->getCmd('layout', '');
$task     = $app->input->getCmd('task', '');
$itemid   = $app->input->getCmd('Itemid', '');
$sitename = $app->get('sitename');


if($task == "edit" || $layout == "form" ) {
	$fullWidth = 1;
}
else {
	$fullWidth = 0;
}

// Add JavaScript Frameworks
JHtml::_('bootstrap.framework');

//Add Boostrap CSS from template folder
$doc->addStyleSheet($tpath.'/css/bootstrap.min.css');

//Add Fontawesome CSS from template folder
$doc->addStyleSheet($tpath.'/css/font-awesome.min.css');

// Add Stylesheets
$doc->addStyleSheet($tpath . '/css/style.css');

// Adjusting content width
if ($this->countModules('sidebar-right') && $this->countModules('sidebar-left')) {
	$col_class = "col-sm-6";
}
elseif ($this->countModules('sidebar-right') && !$this->countModules('sidebar-left')) {
	$col_class = "col-sm-9";
}
elseif (!$this->countModules('sidebar-right') && $this->countModules('sidebar-left')) {
	$col_class = "col-sm-9";
}
else {
	$col_class = "col-sm-12";
}


// Logo file or site title param
if ($this->params->get('logoFile')) {
	$logo = '<img class="img-responsive" src="' . JUri::root() . $this->params->get('logoFile') . '" alt="' . $sitename . '" />';
}
elseif ($this->params->get('sitetitle')) {
	$logo = '<span class="site-title" title="' . $sitename . '">' . htmlspecialchars($this->params->get('sitetitle')) . '</span>';
}
else {
	$logo = '<span class="site-title" title="' . $sitename . '">' . $sitename . '</span>';
}

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<jdoc:include type="head" />

	<!-- Use of Google Font -->
	<?php if ($googleFontName) : ?>
		<link href='//fonts.googleapis.com/css?family=<?php echo $googleFontName; ?>' rel='stylesheet' type='text/css' />
	<?php endif; ?>	
	
	<style type="text/css">	
		<?php if ($templateColor) : ?>
			a { color: <?php echo $templateColor ?>;}
		<?php endif; ?>		
		a:hover { text-decoration: none; }
		<?php if ($templateColor) : ?>
			html,body{ font-family: '<?php echo str_replace('+', ' ', $googleFontName); ?>', sans-serif; }
		<?php endif; ?>		
	</style>
	
	<!--[if lt IE 9]>
		<script src="<?php echo $this->baseurl; ?>/media/jui/js/html5.js"></script>
	<![endif]-->	
</head>

<body class="site <?php echo $option
	. ' view-' . $view
	. ($layout ? ' layout-' . $layout : ' no-layout')
	. ($task ? ' task-' . $task : ' no-task')
	. ($itemid ? ' itemid-' . $itemid : '')
	. ($params->get('fluidContainer') ? ' fluid' : '');
?>">

	<!-- Body -->
	<div class="body">
	
		<!-- Header Start -->
		<header class="header">
			<nav class="navbar navbar-default">
				<div class="container<?php echo ($params->get('fluidContainer') ? '-fluid' : ''); ?>">
					<!-- Brand and toggle get grouped for better mobile display -->
					<div class="navbar-header">
						<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-main-menu">
							<span class="sr-only">Toggle navigation</span>
							<span class="fa fa-bars"></span>
						</button>
						<a class="navbar-brand" href="<?php echo $this->baseurl; ?>">
							<?php echo $logo; ?>
							<?php if ($this->params->get('sitedescription')) : ?>
								<?php echo '<div class="site-description">' . htmlspecialchars($this->params->get('sitedescription')) . '</div>'; ?>
							<?php endif; ?>
						</a>
					</div>
			
					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse" id="navbar-main-menu">
						<?php if ($this->countModules('main-menu')) : ?>
						<!-- Joomla NavBar Start -->
						<div class="main-menu">			
							<jdoc:include type="modules" name="main-menu" style="none" />
						</div>
						<!-- Joomla NavBar End-->
						<?php endif; ?>
						
						<?php if ($this->countModules('header-search')) : ?>
							<jdoc:include type="modules" name="header-search" style="none" />
						<?php endif; ?>
						
					</div><!-- /.navbar-collapse -->
				</div><!-- /.container-fluid -->
			</nav>
		</header>
		<!-- Header End -->						

		
		<?php if ($this->countModules('banner')) : ?>
		<!-- banner Start -->	
		<div id="banner" class="banner">
			<div class="container<?php echo ($params->get('fluidContainer') ? '-fluid' : ''); ?>">
				<jdoc:include type="modules" name="banner" />
			</div>
		</div>
		<!-- banner End -->
		<?php endif; ?>
		
		<?php if ($this->countModules('breadcrumbs')) : ?>
		<!-- breadcrumbs Start -->
		<div id="breadcrumbs" class="breadcrumbs">
			<div class="container<?php echo ($params->get('fluidContainer') ? '-fluid' : ''); ?>">
				<jdoc:include type="modules" name="breadcrumbs" />
			</div>
		</div>
		<!-- breadcrumbs Start -->
		<?php endif; ?>
  		
		
		<!--Start Main Content -->
		<div class="main-content">
			<div class="container<?php echo ($params->get('fluidContainer') ? '-fluid' : ''); ?>">				
			  	<div class="row">
					<?php if ($this->countModules('sidebar-left')) : ?>
						<!-- Begin Sidebar left-->
						<div id="sidebar" class="col-sm-3">
							<div class="sidebar-nav">
								<jdoc:include type="modules" name="sidebar-left" style="xhtml" />
							</div>
						</div>
						<!-- End Sidebar left-->
					<?php endif; ?>
					
					<main id="content" role="main" class="<?php echo $col_class;?>">
						<!-- Begin Content -->
						<jdoc:include type="modules" name="top-a" style="xhtml" />
						<jdoc:include type="message" />
						<jdoc:include type="component" />
						<jdoc:include type="modules" name="top-b" style="none" />
						<!-- End Content -->
					</main>
					
					<?php if ($this->countModules('sidebar-right')) : ?>
						<div id="aside" class="col-sm-3">
							<!-- Begin Right Sidebar -->
							<jdoc:include type="modules" name="sidebar-right" style="well" />
							<!-- End Right Sidebar -->
						</div>
					<?php endif; ?>
				</div>			  	
		  	</div>	
  		</div>
  		<!--End Main Content -->		
		
		<!-- Footer starts -->
		<footer class="footer" role="contentinfo">
			<div class="container<?php echo ($params->get('fluidContainer') ? '-fluid' : ''); ?>">
				<hr />
				<jdoc:include type="modules" name="footer" style="none" />
				<p class="pull-right">
					<a href="#top" id="back-top">
						<?php echo JText::_('TPL_FRONTBS3_BACKTOTOP'); ?>
					</a>
				</p>
				<p>&copy; <?php echo date('Y'); ?> <?php echo $sitename; ?></p>
			</div>
		</footer>
		<!-- Footer End -->
	</div>

	<jdoc:include type="modules" name="debug" style="none" />	
</body>

</html>
