<?php

/**
 * This file will handle the front-end functionality of the plugin.
 */

namespace WpMaintenance\Public;

defined('ABSPATH') || die('No script kiddies please!');
class FrontEnd
{
    private static $instance = null;
    public function __construct()
    {
        add_action( 'template_redirect', [ $this, 'maybe_maintenance_mode' ] );
    }
    public function maybe_maintenance_mode() {
        $opts = get_option( 'tr_maintenance_mode_settings', ['maintenance'=> false,
          'headline'=> 'Site Under Maintenance',
          'message'=> "We're performing scheduled maintenance. Please try again later."] );
 
        // 1. If maintenance mode is not enabled, do nothing.
        if ( empty( $opts['maintenance'] ) ) {
            return;
        }
 
        // 2. Administrators always bypass — they can still use the site.
        if ( current_user_can( 'manage_options' ) ) {
            return;
        }
 
        // 3. Send HTTP headers BEFORE any output.
        $retry = isset( $opts['retry_after'] ) ? absint( $opts['retry_after'] ) : 3600;
 
        header( 'HTTP/1.1 503 Service Unavailable' );
        header( 'Retry-After: ' . $retry );
 
        // 4. Load the maintenance template and stop WordPress from doing anything else.
        include WP_MAINTENANCE_DIR . 'public/view/maintenance.php';
        exit;
    }

    public static function init()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }
}
