<?php
/**
 * Plugin Name:       Result Table
 * Description:       Block to display the current standings of a team of Legion Wasserschloss.
 * Requires at least: 6.1
 * Requires PHP:      7.0
 * Version:           0.1.0
 * Author:            Dominik Bumbacher
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       result-table
 *
 * @package Lws
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Registers the block using the metadata loaded from the `block.json` file.
 * Behind the scenes, it registers also all assets so they can be enqueued
 * through the block editor in the corresponding context.
 *
 * @see https://developer.wordpress.org/reference/functions/register_block_type/
 */
function lws_result_table_block_init() {
	register_block_type( __DIR__ . '/build' );
}
add_action( 'init', 'lws_result_table_block_init' );
