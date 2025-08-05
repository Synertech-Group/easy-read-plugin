<?php
/**
 * Front-end accessibility toolbar.
 */
class WCAG3AP_Toolbar {
    /**
     * Hook actions to render the toolbar.
     */
    public static function init() {
        add_action( 'wp_enqueue_scripts', [ __CLASS__, 'enqueue_assets' ] );
        add_action( 'wp_footer', [ __CLASS__, 'render_toolbar' ] );
    }

    /**
     * Enqueue toolbar assets.
     */
    public static function enqueue_assets() {
        wp_enqueue_style( 'wcag3ap-toolbar', WCAG3AP_PLUGIN_URL . 'front-end/css/toolbar.css', [], WCAG3AP_VERSION );
        wp_enqueue_script( 'wcag3ap-toolbar', WCAG3AP_PLUGIN_URL . 'front-end/js/toolbar.js', [ 'jquery' ], WCAG3AP_VERSION, true );
    }

    /**
     * Render toolbar markup.
     */
    public static function render_toolbar() {
        include WCAG3AP_PLUGIN_PATH . 'front-end/views/toolbar.php';
    }
}
