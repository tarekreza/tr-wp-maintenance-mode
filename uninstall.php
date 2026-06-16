<?php
/**
 * Uninstall file for WP Maintenance Mode
 */

// If uninstall not called from WordPress, exit
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
    exit;
}

// Delete plugin options
delete_option( 'tr_maintenance_mode_settings' );

