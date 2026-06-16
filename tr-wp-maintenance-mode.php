<?php
/***
 * Plugin Name: WP Maintenance Mode
 * Plugin URI: https://www.muhammadtarekreza.com
 * Description: A simple site-wide maintenance mode toggle with customizable headline and message.
 * Version: 1.0.0
 * Author: Muhammad Tarek Reza
 * Author URI: https://www.muhammadtarekreza.com
 * Requires at least: 6.7
 * Requires PHP: 7.4
 * Text Domain: wp-maintenance-mode
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 */

defined('ABSPATH') || die('No script kiddies please!'); 

// ── Plugin constants ──────────────────────────────────────────────────────────
define( 'WP_MAINTENANCE_VERSION', '1.0.0' );
define( 'WP_MAINTENANCE_FILE',    __FILE__ );
define('WP_MAINTENANCE_DIR', plugin_dir_path(__FILE__));
define('WP_MAINTENANCE_URL', plugin_dir_url(__FILE__));


// ── PSR-4 Autoloader (Composer) ───────────────────────────────────────────────
if(file_exists(WP_MAINTENANCE_DIR . 'vendor/autoload.php')){
    require_once WP_MAINTENANCE_DIR . 'vendor/autoload.php';
}

// ── Bootstrap ─────────────────────────────────────────────────────────────────
WpMaintenance\Inc\Main::init();