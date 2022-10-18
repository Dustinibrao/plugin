<?php
/**
 * @package DustinPlugin
 */
/*
Plugin Name: Dustin Plugin
Plugin URI: https://example.com/plugins/
Description: This is my first attemt at writing a custom plugin for this amazing tutorial series.
Version: 1.0.0
Author: Dustin Ibrao
Author URI: https://author.example.com/
License: GPLv2 or later
Text Domain: dustin-plugin
 */

/*
{Plugin Name} is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.

{Plugin Name} is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with {Plugin Name}. If not, see {URI to Plugin License}.
*/

// If this file is called directly, abort
if (!defined("ABSPATH")) {
    die();
}

// Require once the composer autoload
if (file_exists(dirname(__FILE__) . "/vendor/autoload.php")) {
    require_once dirname(__FILE__) . "/vendor/autoload.php";
}

// Code that runs during plugin activation
function activate_dustin_plugin()
{
    Includes\Base\Activate::activate();
}
register_activation_hook(__FILE__, "activate_dustin_plugin");

// Code that runs during plugin deactivation
function deactivate_dustin_plugin()
{
    Includes\Base\Deactivate::deactivate();
}
register_deactivation_hook(__FILE__, "deactivate_dustin_plugin");

// Initializes all the core classes of the plugin
if (class_exists("Includes\\Init")) {
    Includes\Init::register_services();
}
