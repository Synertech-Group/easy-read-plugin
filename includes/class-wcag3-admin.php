<?php
/**
 * Admin settings handler.
 */
class WCAG3_Admin {

    /**
     * Singleton instance.
     *
     * @var WCAG3_Admin
     */
    protected static $instance = null;

    /**
     * Get singleton instance.
     *
     * @return WCAG3_Admin
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
        add_action( 'admin_menu', array( $this, 'register_menu' ) );
        add_action( 'admin_init', array( $this, 'register_settings' ) );
    }

    /**
     * Register admin menu.
     */
    public function register_menu() {
        add_options_page(
            __( 'WCAG 3 Accessibility', 'wcag3-accessibility' ),
            __( 'WCAG 3 Accessibility', 'wcag3-accessibility' ),
            'manage_options',
            'wcag3-accessibility',
            array( $this, 'settings_page' )
        );
    }

    /**
     * Register settings.
     */
    public function register_settings() {
        register_setting( 'wcag3_accessibility', 'wcag3_accessibility_options' );
    }

    /**
     * Render settings page.
     */
    public function settings_page() {
        ?>
        <div class="wrap">
            <h1><?php esc_html_e( 'WCAG 3 Accessibility Settings', 'wcag3-accessibility' ); ?></h1>
            <form method="post" action="options.php">
                <?php
                settings_fields( 'wcag3_accessibility' );
                do_settings_sections( 'wcag3_accessibility' );
                submit_button();
                ?>
            </form>
        </div>
        <?php
    }
}
