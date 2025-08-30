<?php
/**
 * Admin menu page handler.
 *
 * @package BlitzDock
 * @since 0.3.0
 * @license GPL-2.0-or-later
 */

namespace BlitzDock\Admin;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Handles the Blitz Dock admin page.
 *
 * @since 0.3.0
 */
class MenuPage {

    /**
     * Hook suffix for the admin page.
     *
     * @since 0.3.0
     *
     * @var string
     */
    protected string $hook_suffix = '';

    /**
     * Get the page slug.
     *
     * @since 0.3.0
     *
     * @return string
     */
    public function get_slug() : string {
        return 'blitz-dock';
    }

    /**
     * Register the top-level menu page.
     *
     * @since 0.3.0
     *
     * @return void
     */
    public function register() : void {
        $this->hook_suffix = add_menu_page(
            __( 'Blitz Dock', 'blitz-dock' ),
            __( 'Blitz Dock', 'blitz-dock' ),
            'manage_options',
            $this->get_slug(),
            array( $this, 'render' ),
            'dashicons-admin-generic'
        );
    }

    /**
     * Render the admin screen.
     *
     * @since 0.3.0
     *
     * @return void
     */
    public function render() : void {
        if ( ! current_user_can( 'manage_options' ) ) {
            return;
        }

        $template = plugin_dir_path( BLITZ_DOCK_FILE ) . 'templates/admin/dashboard.php';

        if ( is_readable( $template ) ) {
            require $template;
        }
    }

    /**
     * Get the page hook suffix.
     *
     * @since 0.3.0
     *
     * @return string
     */
    public function get_hook_suffix() : string {
        return $this->hook_suffix;
    }
}