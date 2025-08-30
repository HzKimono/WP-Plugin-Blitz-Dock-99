<?php
/**
 * Bootstrap file for the Blitz Dock plugin.
 *
 * @package BlitzDock
 * @license GPL-2.0-or-later
 *
 * @wordpress-plugin
 * Plugin Name:       Blitz Dock
 * Description:       Provides the Blitz Dock admin interface.
 * Version:           0.3.0
 * Requires at least: 6.6
 * Requires PHP:      7.4
 * Tested up to:      6.6
 * License:           GPLv2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       blitz-dock
 * Domain Path:       /languages
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

define( 'BLITZ_DOCK_FILE', __FILE__ );
define( 'BLITZ_DOCK_PATH', plugin_dir_path( BLITZ_DOCK_FILE ) );
define( 'BLITZ_DOCK_URL', plugin_dir_url( BLITZ_DOCK_FILE ) );
define( 'BLITZ_DOCK_VERSION', '0.3.0' );

spl_autoload_register(
    static function ( $class ) {
        if ( 0 !== strpos( $class, 'BlitzDock\\' ) ) {
            return;
        }

        $relative = substr( $class, strlen( 'BlitzDock\\' ) );
        $relative = str_replace( '\\', '/', $relative );
        $file     = BLITZ_DOCK_PATH . 'includes/' . $relative . '.php';

        if ( is_readable( $file ) ) {
            require $file;
        }
    }
);

new \BlitzDock\Core\Plugin();