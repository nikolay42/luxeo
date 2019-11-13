<?php
function google_rating_activate() {
	global $wpdb;
	set_transient( '_wp_category_tag_rating_welcome_screen', true, 30 );
	$table_name = $wpdb->prefix . "google_ratings";
	$sql        = "CREATE TABLE $table_name (
  					id int(11) NOT NULL AUTO_INCREMENT,
					object_id int(11) NOT NULL,					
					rating int(2) NOT NULL,
					ip varchar(40) NOT NULL,
					PRIMARY KEY (id)
					) ENGINE=InnoDB  DEFAULT CHARSET=utf8;";
	require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
	dbDelta( $sql );

	add_option( 'google_rating_ip_check', '0' );
	add_option( 'google_rating_show_in_posts', '1' );
	add_option( 'google_rating_votes_label', 'votes' );
}