<?php
/**
 * Asset management.
 *
 * @package BlitzDock
 * @since 0.3.0
 * @license GPL-2.0-or-later
 */

namespace BlitzDock\Core;

use BlitzDock\Admin\MenuPage;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Enqueue admin assets conditionally.
 *
 * @since 0.3.0
 */
class Assets {

    /**
     * Menu page reference.
     *
     * @since 0.3.0
     *
     * @var MenuPage
     */
    protected MenuPage $menu_page;

    /**
     * Constructor.
     *
     * @since 0.3.0
     *
     * @param MenuPage $menu_page Menu page instance.
     */
    public function __construct( MenuPage $menu_page ) {
        $this->menu_page = $menu_page;
    }

    /**
     * Enqueue admin styles.
     *
     * @since 0.3.0
     *
     * @param string $hook_suffix Current admin page hook suffix.
     *
     * @return void
     */
    public function enqueue_admin( string $hook_suffix ) : void {
        if ( $hook_suffix !== $this->menu_page->get_hook_suffix() ) {
            return;
        }

        wp_enqueue_style(
            'blitz-dock-admin',
            Plugin::URL . 'assets/css/admin.css',
            array(),
            Plugin::VERSION
        );
    }
}