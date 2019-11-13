<?php
/**
 * Plugin Name:       Google rating
 * Plugin URI:        https://freelancevip.pro/google-rating/
 * Author:            freelancevip.pro
 * Author URI:        https://freelancevip.pro/
 * Description:       Simple and fast rating system with google rich snippet http://schema.org/AggregateRating
 * Version:           1.0
 *
 * == Copyright ==
 * Copyright 2017 Anatoliy Demchenko (email: freelancevip@yandex.ru)
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program. If not, see <http://www.gnu.org/licenses/>
 */

defined( 'ABSPATH' ) || exit();

require_once plugin_dir_path( __FILE__ ) . 'functions.php';
require_once plugin_dir_path( __FILE__ ) . 'class-google-rating.php';
require_once plugin_dir_path( __FILE__ ) . 'admin.php';


/**
 * On activation
 */
function activate_google_rating_plugin() {
	require_once plugin_dir_path( __FILE__ ) . 'activate-plugin.php';
	google_rating_activate();
}


/**
 * On deactivation
 */
function deactivate_google_rating_plugin() {
	require_once plugin_dir_path( __FILE__ ) . 'deactivate-plugin.php';
	google_rating_deactivate();
}

register_activation_hook( __FILE__, 'activate_google_rating_plugin' );
register_deactivation_hook( __FILE__, 'deactivate_google_rating_plugin' );


/**
 * Register plugin's scripts and styles
 */
function google_rating_styles() {
	wp_enqueue_style( 'google-rating-css', plugins_url( 'style.css', __FILE__ ) );

	wp_enqueue_script( 'jquery' );

	wp_enqueue_script( 'star-rating-svg', plugins_url( 'js/jquery.star-rating-svg.min.js', __FILE__ ) );
	wp_register_script( 'google-rating-js', plugins_url( 'js/script.js', __FILE__ ),
		array( 'jquery', 'star-rating-svg' ) );
	wp_localize_script( 'google-rating-js', 'googleRatingOptions', array(
		'ajaxurl' => admin_url( 'admin-ajax.php' ),
		'nonce'   => wp_create_nonce( 'google-rating' )
	) );
	wp_enqueue_script( 'google-rating-js' );
}

add_action( 'wp_enqueue_scripts', 'google_rating_styles' );


/**
 * Ajax callback
 */
function google_rating_ajax_vote() {
	$rating = (int) $_POST['rating'];
	$id     = (int) $_POST['id'];
	if ( ! $rating || ! $id ) {
		exit();
	}
	if ( ! wp_verify_nonce( $_POST['nonce'], 'google-rating' ) ) {
		exit();
	}

	if ( ! google_rating_can_vote( $id ) ) {
		exit();
	}
	google_rating_insert( $rating, $id );
	echo google_rating_results( $id );
	exit();
}

add_action( 'wp_ajax_google-rating-vote', 'google_rating_ajax_vote' );
add_action( 'wp_ajax_nopriv_google-rating-vote', 'google_rating_ajax_vote' );


/**
 * Add rating to posts
 *
 * @param $content string
 *
 * @return string
 */
function google_rating_add_to_content( $content ) {
	if ( is_single() && google_rating_show_in_posts() ) {
		$rating = the_google_rating();

		return $content . $rating;
	}

	return $content;
}

add_filter( 'the_content', 'google_rating_add_to_content', 1, 10 );
