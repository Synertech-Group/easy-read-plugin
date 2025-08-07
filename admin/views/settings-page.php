<div class="wrap">
    <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>

    <h2><?php esc_html_e( 'Images Missing Alt Text', 'easy-read' ); ?></h2>
    <?php if ( empty( $results['missing_alt'] ) ) : ?>
        <p><?php esc_html_e( 'No issues found.', 'easy-read' ); ?></p>
    <?php else : ?>
        <ul>
            <?php foreach ( $results['missing_alt'] as $item ) : ?>
                <li>
                    <?php
                        printf(
                            /* translators: 1: post id, 2: image src */
                            esc_html__( 'Post ID %1$s: %2$s', 'easy-read' ),
                            esc_html( $item['post_id'] ),
                            esc_html( $item['src'] )
                        );
                    ?>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <h2><?php esc_html_e( 'ARIA Issues', 'easy-read' ); ?></h2>
    <?php if ( empty( $results['aria_issues'] ) ) : ?>
        <p><?php esc_html_e( 'No issues found.', 'easy-read' ); ?></p>
    <?php else : ?>
        <ul>
            <?php foreach ( $results['aria_issues'] as $item ) : ?>
                <li>
                    <?php
                        printf(
                            /* translators: 1: post id, 2: offending html */
                            esc_html__( 'Post ID %1$s: %2$s', 'easy-read' ),
                            esc_html( $item['post_id'] ),
                            esc_html( wp_strip_all_tags( $item['html'] ) )
                        );
                    ?>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <h2><?php esc_html_e( 'Heading Hierarchy Issues', 'easy-read' ); ?></h2>
    <?php if ( empty( $results['heading_hierarchy'] ) ) : ?>
        <p><?php esc_html_e( 'No issues found.', 'easy-read' ); ?></p>
    <?php else : ?>
        <ul>
            <?php foreach ( $results['heading_hierarchy'] as $item ) : ?>
                <li>
                    <?php
                        printf(
                            esc_html__( 'Post ID %1$s: %2$s', 'easy-read' ),
                            esc_html( $item['post_id'] ),
                            esc_html( wp_strip_all_tags( $item['html'] ) )
                        );
                    ?>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>

    <h2><?php esc_html_e( 'Keyboard Focus Indicator Issues', 'easy-read' ); ?></h2>
    <?php if ( empty( $results['focus_indicators'] ) ) : ?>
        <p><?php esc_html_e( 'No issues found.', 'easy-read' ); ?></p>
    <?php else : ?>
        <ul>
            <?php foreach ( $results['focus_indicators'] as $item ) : ?>
                <li>
                    <?php
                        printf(
                            esc_html__( 'Post ID %1$s: %2$s', 'easy-read' ),
                            esc_html( $item['post_id'] ),
                            esc_html( wp_strip_all_tags( $item['html'] ) )
                        );
                    ?>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</div>
