<?php

/**
 * This file will handle the admin functionality of the plugin.
 */

namespace WpMaintenance\Admin;

defined('ABSPATH') || die('No script kiddies please!');

class Admin
{
    private static $instance = null;
    public function __construct()
    {

        add_action('admin_menu', [$this, 'add_menu']);

        add_action('admin_enqueue_scripts', [$this, 'enqueue_react_app']);

        add_action('admin_init',[$this,'register_settings']);
        add_action('rest_api_init',[$this,'register_settings']);
    }
    // ── Menu ──────────────────────────────────────────────────────────────────
 
    public function add_menu() {
        add_menu_page(
            __( 'Maintenance Mode', 'wp-maintenance-mode' ),  // page <title>
            __( 'Maintenance Mode', 'wp-maintenance-mode' ),     // menu label
            'manage_options',                                    // capability required
            'tr-wp-maintenance-mode',                           // menu slug
            [ $this, 'render_settings_page' ],                   // callback
            'dashicons-admin-tools',                             // icon URL (dashicon class)
            25                                                   // position in menu
        );
    }
     
    public function render_settings_page() {
        include WP_MAINTENANCE_DIR . 'admin/view/settings.php';
    }
    public function register_settings()
    {
        register_setting(
        'tr_maintenance_mode_settings_group', 
        'tr_maintenance_mode_settings',
        [
            'type' => 'object',
            'default' => [
                'maintenance' => false,
                'headline' => 'Site Under Maintenance',
                'message' => "We're performing scheduled maintenance. Please try again later.",
                'imageId' => null,
            ],
            'show_in_rest' => [
                'schema' => [
                    'type' => 'object',
                    'properties' => [
                        'maintenance' => [
                            'type' => 'boolean'
                        ],
                        'headline' => [
                            'type' => 'string'
                        ],
                        'message' => [
                            'type' => 'string'
                        ],
                        'imageId' => [
                            'type' => ['integer', 'null']
                        ]
                    ]
                ]
            ]
        ]
        );
    }

    // React app script and style enqueue
    public function enqueue_react_app()
    {
        $dependencies = require_once WP_MAINTENANCE_DIR . 'build/index.asset.php';
        wp_enqueue_style('wp-components');
        wp_enqueue_media();
        wp_enqueue_script(
            'tr-wp-maintenance-mode-react-app',
            WP_MAINTENANCE_URL . 'build/index.js',
            $dependencies['dependencies'],
            $dependencies['version'],
            true
        );
    }


    public static function init()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }
}
