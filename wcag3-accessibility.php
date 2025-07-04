<?php
/**
 * Plugin Name: WCAG 3 Accessibility Pro
 * Description: Provides accessibility enhancements and tools compliant with WCAG 3 guidelines.
 * Version: 1.0.0
 * Author: Your Name
 * License: GPL2
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

// Plugin constants.
define( 'WCAG3_ACCESSIBILITY_VERSION', '1.0.0' );
define( 'WCAG3_ACCESSIBILITY_PATH', plugin_dir_path( __FILE__ ) );
define( 'WCAG3_ACCESSIBILITY_URL', plugin_dir_url( __FILE__ ) );

/**
 * Simple autoloader for plugin classes.
 */
function autoload_wcag3_classes() {
    spl_autoload_register( function ( $class ) {
        if ( 0 !== strpos( $class, 'WCAG3_' ) ) {
            return;
        }

        $filename = 'class-' . strtolower( str_replace( '_', '-', $class ) ) . '.php';
        $filepath = WCAG3_ACCESSIBILITY_PATH . 'includes/' . $filename;

        if ( file_exists( $filepath ) ) {
            include $filepath;
        }
    } );
}

/**
 * Initialize the plugin.
 */
function wcag3_accessibility_init() {
    autoload_wcag3_classes();
    return WCAG3_Accessibility::instance();
}

add_action( 'plugins_loaded', 'wcag3_accessibility_init' );
