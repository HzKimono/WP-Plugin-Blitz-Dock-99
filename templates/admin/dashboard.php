<?php
/**
 * Admin dashboard template.
 *
 * @package BlitzDock
 * @since 0.3.0
 * @license GPL-2.0-or-later
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

?>
<div class="wrap">
    <h1><?php echo esc_html__( 'Blitz Dock', 'blitz-dock' ); ?></h1>
    <p><?php esc_html_e( 'This screen will host the Blitz Dock controls.', 'blitz-dock' ); ?></p>
    <?php
    $sidebar = BLITZ_DOCK_PATH . 'templates/admin/partials/sidebar.php';
    if ( is_readable( $sidebar ) ) {
        require $sidebar;
    }
    ?>
</div>