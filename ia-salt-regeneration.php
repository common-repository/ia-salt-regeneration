<?php

use GoSuccess\IA_Salt_Regeneration\Plugin;

/**
 * Plugin Name:       IA Salt Regeneration
 * Description:       Generates a new visitor token salt for Independent Analytics every day.
 * Version:           1.0.3
 * Requires at least: 6.0
 * Requires PHP:      8.0
 * Author:            GoSuccess
 * Author URI:        https://gosuccess.io
 * Text Domain:       ia-salt-regeneration
 * License:           GPL v3 or later
 * License URI:       https://www.gnu.org/licenses/gpl-3.0.html
 */

if( ! defined( 'ABSPATH' ) ) {
    exit();
}

define(
    constant_name:  'IASR_FILE',
    value:          __FILE__,
);

define(
    constant_name:  'IASR_PATH',
    value:          plugin_dir_path( IASR_FILE ),
);

define(
    constant_name:  'IASR_INDEPENDENT_ANALYTICS_PATH',
    value:          [ 'independent-analytics/iawp.php',  'independent-analytics-pro/iawp.php' ]
);

require_once IASR_PATH . 'includes/classes/Plugin.php';

new Plugin();
