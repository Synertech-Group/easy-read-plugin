<?php
/**
 * Front-end accessibility toolbar.
 */
class WCAG3_Toolbar {

    /**
     * Singleton instance.
     *
     * @var WCAG3_Toolbar
     */
    protected static $instance = null;

    /**
     * Get singleton instance.
     *
     * @return WCAG3_Toolbar
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
        add_action( 'wp_enqueue_scripts', array( $this, 'enqueue_assets' ) );
        add_action( 'wp_footer', array( $this, 'render_toolbar' ) );
    }

    /**
     * Enqueue scripts and styles.
     */
    public function enqueue_assets() {
        wp_enqueue_style( 'wcag3-toolbar', WCAG3_ACCESSIBILITY_URL . 'assets/css/toolbar.css', array(), WCAG3_ACCESSIBILITY_VERSION );
        wp_enqueue_script( 'wcag3-toolbar', WCAG3_ACCESSIBILITY_URL . 'assets/js/toolbar.js', array( 'jquery' ), WCAG3_ACCESSIBILITY_VERSION, true );
    }

    /**
     * Render toolbar markup.
     */
    public function render_toolbar() {
        echo '<div id="wcag3-toolbar">Accessibility Toolbar</div>';
    }
}
