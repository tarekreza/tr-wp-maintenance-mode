<?php
namespace WpMaintenance\Inc;

defined('ABSPATH') || die('No script kiddies please!'); 

use WpMaintenance\Admin\Admin;
use WpMaintenance\Public\FrontEnd;

class Main{
    private static $instance = null;

    private function __construct()
    {
        Admin::init();
        FrontEnd::init();
    }
    public static function init()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }
}