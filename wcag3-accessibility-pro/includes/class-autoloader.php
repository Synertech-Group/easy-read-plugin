<?php
/**
 * Simple class autoloader following PSR-4 style for WCAG3AP classes.
 */
class WCAG3AP_Autoloader {
    /**
     * Register autoloader with SPL.
     */
    public static function register() {
        spl_autoload_register( [ __CLASS__, 'autoload' ] );
    }

    /**
     * Autoload WCAG3AP classes.
     *
     * @param string $class Class name.
     */
    public static function autoload( $class ) {
        if ( 0 !== strpos( $class, 'WCAG3AP_' ) ) {
            return;
        }
        $file = strtolower( str_replace( '_', '-', $class ) );
        $path = WCAG3AP_PLUGIN_PATH . 'includes/' . $file . '.php';
        if ( file_exists( $path ) ) {
            require $path;
        }
    }
}
