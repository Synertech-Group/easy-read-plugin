<?php
/**
 * Main plugin initializer.
 */
class WCAG3AP_Init {
    /**
     * Hook plugin initialization.
     */
    public static function init() {
        add_action( 'plugins_loaded', [ __CLASS__, 'load_modules' ] );
    }

    /**
     * Load all plugin modules.
     */
    public static function load_modules() {
        WCAG3AP_License::maybe_prompt_for_key();
        WCAG3AP_Toolbar::init();
        WCAG3AP_Audit::init();
        WCAG3AP_Update_Checker::init();
    }
}
