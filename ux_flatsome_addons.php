<?php
/*
Plugin Name: UX Flatsome Addons
Plugin URI: https://ux-addons.com
Description: UX Flatsome Addons
Contributors: ux addons, addons flatsome theme
Version: 1.0.0
Author: UX Teams
Text Domain: uxaddons
Domain Path: /languages
Tags: ux-addons.com, UX Teams, Flatsome Addons
Tested up to: 5.7.0
Requires PHP: 7.0
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
Donate link: https://ux-addons.com
*/

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

define('UX_Flatsome_Addons_DIR', plugin_dir_path(__FILE__));
define('UX_Flatsome_Addons_URL', plugins_url('/', __FILE__));

class UX_Flatsome_Addons
{
    /**
     * UX_Flatsome_Addons constructor.
     */
    public function __construct()
    {
        add_action('ux_builder_setup', array($this, 'ux_builder_element'));
        $this->includes();
    }
    public function includes()
    {

    }
    public function ux_builder_element()
    {
        include(UX_Flatsome_Addons_DIR . '/builder/ux-count-number.php' );
        include(UX_Flatsome_Addons_DIR . '/builder/ux-category-post.php' );
        include(UX_Flatsome_Addons_DIR . '/builder/ux-slider.php' );
        include(UX_Flatsome_Addons_DIR . '/builder/ux-flatsome-title-category.php' );
        include(UX_Flatsome_Addons_DIR . '/builder/ux-image-compare.php' );
    }
}
function UX_Flatsome_Addons_Start()
{
    new UX_Flatsome_Addons();
}
add_action('after_setup_theme', 'UX_Flatsome_Addons_Start');

require_once (UX_Flatsome_Addons_DIR. '/shortcodes/ux-count-number.php');
require_once (UX_Flatsome_Addons_DIR. '/shortcodes/ux-category-post.php');
require_once (UX_Flatsome_Addons_DIR. '/shortcodes/ux-slider.php');
require_once (UX_Flatsome_Addons_DIR. '/shortcodes/ux-flatsome-title-category.php');
require_once (UX_Flatsome_Addons_DIR. '/shortcodes/ux-image-compare.php');