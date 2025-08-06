<?php
/**
 * Licensing handler.
 */
class WCAG3_License {

    /**
     * Singleton instance.
     *
     * @var WCAG3_License
     */
    protected static $instance = null;

    /**
     * Get singleton instance.
     *
     * @return WCAG3_License
     */
    public static function instance() {
        if ( null === self::$instance ) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * Constructor.
     */
    private function __construct() {
        // Placeholder for licensing hooks.
    }
}
