<?php
/**
 * Plugin Name: WCAG 3 Accessibility Pro
 * Description: Tools for achieving WCAG 3.0 & WCAG 2.2 compliance.
 * Version:     1.0.0
 * Author:      Your Name / Company
 */

defined( 'ABSPATH' ) || exit;

define( 'WCAG3AP_VERSION', '1.0.0' );
define( 'WCAG3AP_PLUGIN_FILE', __FILE__ );
define( 'WCAG3AP_PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
define( 'WCAG3AP_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

require_once WCAG3AP_PLUGIN_PATH . 'includes/class-autoloader.php';
WCAG3AP_Autoloader::register();

WCAG3AP_Init::init();

