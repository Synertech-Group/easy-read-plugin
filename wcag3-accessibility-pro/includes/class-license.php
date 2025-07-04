<?php
/**
 * Licensing logic for validating single-use keys.
 */
class WCAG3AP_License {

    /**
     * Plugin activation hook.
     */
    public static function activate() {
        // Placeholder for activation tasks.
    }

    /**
     * Plugin deactivation hook.
     */
    public static function deactivate() {
        // Placeholder for deactivation cleanup.
    }

    /**
     * Prompt user for license key if needed.
     */
    public static function maybe_prompt_for_key() {
        // Stub for license check on init.
    }

    /**
     * Validate license key using remote API.
     *
     * @param string $key License key.
     * @return bool
     */
    public static function validate_license( $key ) {
        $response = wp_remote_post( 'https://example.com/api/validate', [
            'body'    => [ 'license_key' => $key, 'site' => home_url() ],
            'timeout' => 15,
        ] );

        if ( is_wp_error( $response ) ) {
            return false;
        }

        $body = wp_remote_retrieve_body( $response );
        $data = json_decode( $body, true );

        return ! empty( $data['valid'] ) && true === $data['valid'];
    }
}
