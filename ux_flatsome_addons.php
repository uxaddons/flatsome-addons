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

define('UXFSA_Flatsome_Addons_DIR', plugin_dir_path(__FILE__));
define('UXFSA_Flatsome_Addons_URL', plugin_dir_url( __FILE__ ) . 'assets/');

class UXFSA_Flatsome_Addons
{
    /**
     * UXFSA_Flatsome_Addons constructor.
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
        include(UXFSA_Flatsome_Addons_DIR . '/builder/uxfsa-count-number.php' );
        include(UXFSA_Flatsome_Addons_DIR . '/builder/uxfsa-category-post.php' );
        include(UXFSA_Flatsome_Addons_DIR . '/builder/uxfsa-slider.php' );
        include(UXFSA_Flatsome_Addons_DIR . '/builder/uxfsa-flatsome-title-category.php' );
        include(UXFSA_Flatsome_Addons_DIR . '/builder/uxfsa-image-compare.php' );
    }
}
function UXFSA_Flatsome_Addons_Start()
{
    new UXFSA_Flatsome_Addons();
}
add_action('after_setup_theme', 'UXFSA_Flatsome_Addons_Start');

require_once (UXFSA_Flatsome_Addons_DIR. '/shortcodes/uxfsa-count-number.php');
require_once (UXFSA_Flatsome_Addons_DIR. '/shortcodes/uxfsa-category-post.php');
require_once (UXFSA_Flatsome_Addons_DIR. '/shortcodes/uxfsa-slider.php');
require_once (UXFSA_Flatsome_Addons_DIR. '/shortcodes/uxfsa-flatsome-title-category.php');
require_once (UXFSA_Flatsome_Addons_DIR. '/shortcodes/uxfsa-image-compare.php');