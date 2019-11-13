<?php
/**
 * Displays the rating.
 * Example of usage
 * the_google_rating()
 */
function the_google_rating() {
	$rating   = new Google_Rating( get_queried_object_id() );
	$can_vote = google_rating_can_vote( $rating->id );
	$out      = "<div id=\"google-rating-element\" data-id=\"{$rating->id}\" data-enabled=\"{$can_vote}\" data-value=\"{$rating->avg}\">";
	$out      .= '</div>';
	$out      .= google_rating_get_snippet( $rating );

	return $out;
}


/**
 * Google rich snippet for rating
 *
 * @param $rating Google_Rating
 *
 * @return string
 */
function google_rating_get_snippet( $rating ) {
	$label = google_rating_votes_label();

	return "<div id=\"google-rating-element-hint\" itemprop=\"aggregateRating\" itemscope=\"\" itemtype=\"http://schema.org/AggregateRating\"><div itemprop=\"name\" class=\"google-rating-title\">{$rating->title}</div><span itemprop=\"ratingValue\">{$rating->avg_string}</span> ({$rating->percents}%) <span itemprop=\"ratingCount\">{$rating->total_count}</span> {$label}<meta itemprop=\"bestRating\" content=\"{$rating->best_rating}\"><meta itemprop=\"worstRating\" content=\"{$rating->worst_rating}\"><div itemprop=\"itemReviewed\" itemscope=\"\" itemtype=\"http://schema.org/CreativeWork\"></div></div>";
}


/**
 * Insert new line to ratings table
 *
 * @param $rating integer
 * @param bool $object_id
 *
 * @return false|int
 */
function google_rating_insert( $rating, $object_id = false ) {
	global $wpdb;
	if ( ! current_user_can( 'manage_options' ) ) {
		return false;
	}
	$table_name = $wpdb->prefix . "google_ratings";
	$object_id  = ! $object_id ? get_queried_object_id() : $object_id;

	return $wpdb->insert( $table_name, array(
		'object_id' => $object_id,
		'rating'    => $rating,
		'ip'        => google_rating_get_IP()

	) );
}


/**
 * Return user's IP address
 * @return mixed
 */
function google_rating_get_IP() {
	if ( ! empty( $_SERVER['HTTP_CLIENT_IP'] ) ) {
		$ip = $_SERVER['HTTP_CLIENT_IP'];
	} elseif ( ! empty( $_SERVER['HTTP_X_FORWARDED_FOR'] ) ) {
		$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
	} else {
		$ip = $_SERVER['REMOTE_ADDR'];
	}

	return $ip;
}


/**
 * Check user can vote
 *
 * @param $id
 *
 * @return bool
 */
function google_rating_can_vote( $id ) {
	global $wpdb;
	if ( ! google_rating_check_ip() ) {
		return true;
	}
	$table_name = $wpdb->prefix . "google_ratings";
	$ip         = google_rating_get_IP();
	$query      = "SELECT * FROM {$table_name} WHERE object_id = {$id} AND ip = '{$ip}'";
	$results    = $wpdb->get_results( $query );

	return count( $results ) == 0 || $results === null;
}


/**
 * Use IP check or no
 * @return bool
 */
function google_rating_check_ip() {
	return (int) get_option( 'google_rating_ip_check' );
}


/**
 * To show rating in single post or not
 * @return int
 */
function google_rating_show_in_posts() {
	return (int) get_option( 'google_rating_show_in_posts' );
}


/**
 * Label vote(-s)
 * @return string
 */
function google_rating_votes_label() {
	return get_option( 'google_rating_votes_label' );
}


/**
 * @param $id
 *
 * @return string
 */
function google_rating_results( $id ) {
	$rating = new Google_Rating( $id );

	return google_rating_get_snippet( $rating );
}


