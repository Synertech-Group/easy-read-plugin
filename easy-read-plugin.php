<?php
/*
Plugin Name: Easy Read Plugin
Description: Provides accessibility audits including images without alt text, ARIA issues, heading hierarchy, and keyboard focus indicator checks.
Version: 0.1.0
Author: Example
*/

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

class Easy_Read_Plugin {
    public function __construct() {
        add_action( 'admin_menu', array( $this, 'register_admin_menu' ) );
    }

    public function register_admin_menu() {
        add_menu_page(
            'Easy Read Audit',
            'Easy Read Audit',
            'manage_options',
            'easy-read-audit',
            array( $this, 'render_settings_page' ),
            'dashicons-universal-access'
        );
    }

    public function render_settings_page() {
        if ( ! current_user_can( 'manage_options' ) ) {
            wp_die( esc_html__( 'You do not have permission to access this page.' ) );
        }
        $results = $this->run_audit();
        include plugin_dir_path( __FILE__ ) . 'admin/views/settings-page.php';
    }

    private function run_audit() {
        $results = array(
            'missing_alt' => array(),
            'aria_issues' => array(),
            'heading_hierarchy' => array(),
            'focus_indicators' => array(),
        );

        $query = new WP_Query(
            array(
                'post_type'      => array( 'post', 'page' ),
                'post_status'    => 'publish',
                'posts_per_page' => -1,
            )
        );

        foreach ( $query->posts as $post ) {
            $content = $post->post_content;
            $dom     = new DOMDocument();
            libxml_use_internal_errors( true );
            $dom->loadHTML( '<?xml encoding="utf-8" ?>' . $content );
            libxml_clear_errors();

            // Images without alt text.
            foreach ( $dom->getElementsByTagName( 'img' ) as $img ) {
                if ( ! $img->hasAttribute( 'alt' ) || '' === trim( $img->getAttribute( 'alt' ) ) ) {
                    $results['missing_alt'][] = array(
                        'post_id' => $post->ID,
                        'src'     => $img->getAttribute( 'src' ),
                    );
                }
            }

            // ARIA role without labels.
            $xpath = new DOMXPath( $dom );
            $nodes = $xpath->query( '//*[@role]' );
            foreach ( $nodes as $node ) {
                if ( ! $node->hasAttribute( 'aria-label' ) && ! $node->hasAttribute( 'aria-labelledby' ) ) {
                    $results['aria_issues'][] = array(
                        'post_id' => $post->ID,
                        'html'    => $dom->saveHTML( $node ),
                    );
                }
            }

            // Heading hierarchy.
            $current_level = 0;
            $headings      = $dom->getElementsByTagName('*');
            foreach ( $headings as $el ) {
                if ( preg_match( '/^h([1-6])$/i', $el->nodeName, $m ) ) {
                    $level = intval( $m[1] );
                    if ( 0 !== $current_level && $level > $current_level + 1 ) {
                        $results['heading_hierarchy'][] = array(
                            'post_id' => $post->ID,
                            'html'    => $dom->saveHTML( $el ),
                        );
                    }
                    $current_level = $level;
                }
            }

            // Inline style disabling focus outline.
            foreach ( $dom->getElementsByTagName( '*' ) as $node ) {
                if ( $node->hasAttribute( 'style' ) && preg_match( '/outline\s*:\s*none/i', $node->getAttribute( 'style' ) ) ) {
                    $results['focus_indicators'][] = array(
                        'post_id' => $post->ID,
                        'html'    => $dom->saveHTML( $node ),
                    );
                }
            }
        }

        return $results;
    }
}

new Easy_Read_Plugin();
