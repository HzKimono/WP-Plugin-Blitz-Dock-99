<?php
/**
 * Core plugin class.
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
 * Bootstrap the plugin.
 *
 * @since 0.3.0
 */
class Plugin {

    public const FILE = BLITZ_DOCK_FILE;
    public const PATH = BLITZ_DOCK_PATH;
    public const URL = BLITZ_DOCK_URL;
    public const VERSION = BLITZ_DOCK_VERSION;

    /**
     * Menu page handler.
     *
     * @since 0.3.0
     *
     * @var MenuPage
     */
    protected MenuPage $menu_page;

    /**
     * Asset manager.
     *
     * @since 0.3.0
     *
     * @var Assets
     */
    protected Assets $assets;

    /**
     * Constructor.
     *
     * @since 0.3.0
     */
    public function __construct() {
        $this->menu_page = new MenuPage();
        $this->assets    = new Assets( $this->menu_page );

        add_action( 'plugins_loaded', array( $this, 'load_textdomain' ) );
        add_action( 'admin_menu', array( $this->menu_page, 'register' ) );
        add_action( 'admin_enqueue_scripts', array( $this->assets, 'enqueue_admin' ) );
    }

    /**
     * Load plugin text domain for translations.
     *
     * @since 0.3.0
     *
     * @return void
     */
    public function load_textdomain() : void {
        load_plugin_textdomain( 'blitz-dock', false, dirname( plugin_basename( self::FILE ) ) . '/languages' );
    }
}