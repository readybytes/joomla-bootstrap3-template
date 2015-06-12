# Joomla 3 Template Overrides for Bootstrap v3
Simplest template overrides for your Joomla! 3.x website to make it compatible to Twitter Bootstrap v3.x

What it have
--------

Bassically, you are seeing two folders 

1. **frontbs3** - Which is a complete template
2. **overrides** - A system plugin to override three core files of Joomla! (To override some hard coding of Joomla! related to HTML and Bootstrap classes).

Template overrides
--------

In the template **html folder** you will get the overrides of the following things

1. com_contact
2. com_content
3. com_search
4. com_tags
5. com_users
6. com_weblinks
7. Overrides the layouts
8. mod_breadcrumbs
9. mod_search
10. mod_login
11. mod_menu
12. modules.php
13. pagination.php
14. component.php

About Sytem Plugin
--------
Some hard coding in core file had been done by Joomla! related to html and Bootstrap Classes (like bootstrap accordion and modal popup HTML). And in this template you can use fontAwesome v3.x.
As the older versions uses class **icon-** but in fontAwesome v3.x icon class's name has been changed from “icon-” to “fa-”.

A plugin named **overrides** which is a system plugin of Joomla, is also used to override some core files of Joomla!.

These three core files have overridden and placed into => frontbs3/site/SAMEPATH-AS-THE ACTUAL-PATH
And the actual path is:

1. bootstrap.php 	**Path:** libraries/cms/html/bootstrap.php
2. icons.php 	**Path:** libraries/cms/html/icon.php
3. jquery.php 	**Path:** libraries/cms/html/jquery.php


So what you need to do
--------

If you donot want the full template for your site and want only Bootstrap 3 work for your existig template, then you just need to do followins steps:

1. Copy all files of **html folder** into your existing template's html folder.
2. Copy the **site folder** of the template and paste it into your template folder.
3. Fork the **override folder** and make a zip file and install the plugin.
