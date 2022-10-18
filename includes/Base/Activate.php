<?php
/**
 * @package DustinPlugin
 */
namespace Includes\Base;

class Activate
{
    public static function activate()
    {
        flush_rewrite_rules();

        $default = [];

        if (! get_option("dustin_plugin")) {
            update_option("dustin_plugin", $default);
        }

        if (! get_option("dustin_plugin_cpt")) {
            update_option("dustin_plugin_cpt", $default);
        }

        if (! get_option("dustin_plugin_tax")) {
            update_option("dustin_plugin_tax", $default);
        }
    }
}
