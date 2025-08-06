<?php
/**
 * Main plugin class.
 */
class WCAG3_Accessibility {

    /**
     * Singleton instance.
     *
     * @var WCAG3_Accessibility
     */
    protected static $instance = null;

    /**
     * Get singleton instance.
     *
     * @return WCAG3_Accessibility
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
        $this->includes();
        $this->init_hooks();
    }

    /**
     * Include required files.
     */
    private function includes() {
        require_once WCAG3_ACCESSIBILITY_PATH . 'includes/class-wcag3-admin.php';
        require_once WCAG3_ACCESSIBILITY_PATH . 'includes/class-wcag3-toolbar.php';
        require_once WCAG3_ACCESSIBILITY_PATH . 'includes/class-wcag3-license.php';
        if ( file_exists( WCAG3_ACCESSIBILITY_PATH . 'includes/class-wcag3-updater.php' ) ) {
            require_once WCAG3_ACCESSIBILITY_PATH . 'includes/class-wcag3-updater.php';
        }
    }

    /**
     * Initialize hooks.
     */
    private function init_hooks() {
        if ( is_admin() ) {
            WCAG3_Admin::instance();
        }

        WCAG3_Toolbar::instance();
        WCAG3_License::instance();

        if ( class_exists( 'WCAG3_Updater' ) ) {
            WCAG3_Updater::instance();
        }
    }
}
