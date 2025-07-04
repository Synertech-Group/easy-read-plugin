<?php
/**
 * Admin audit tools for accessibility checks.
 */
class WCAG3AP_Audit {
    /**
     * Initialize admin hooks.
     */
    public static function init() {
        if ( is_admin() ) {
            add_action( 'admin_menu', [ __CLASS__, 'add_menu' ] );
            add_action( 'admin_enqueue_scripts', [ __CLASS__, 'enqueue_assets' ] );
        }
    }

    /**
     * Enqueue admin CSS.
     */
    public static function enqueue_assets() {
        wp_enqueue_style( 'wcag3ap-admin', WCAG3AP_PLUGIN_URL . 'admin/css/admin.css', [], WCAG3AP_VERSION );
    }

    /**
     * Add admin menu page.
     */
    public static function add_menu() {
        add_menu_page( __( 'Accessibility Audit', 'wcag3ap' ), __( 'Accessibility Audit', 'wcag3ap' ), 'manage_options', 'wcag3ap_audit', [ __CLASS__, 'render_page' ] );
    }

    /**
     * Render admin page.
     */
    public static function render_page() {
        include WCAG3AP_PLUGIN_PATH . 'admin/views/settings-page.php';
    }
}
