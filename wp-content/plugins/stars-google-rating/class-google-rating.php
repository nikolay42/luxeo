<?php

if ( ! class_exists( 'Google_Rating' ) ) :

	class Google_Rating {
		public $id;
		public $avg;
		public $title;
		public $avg_string;
		public $total_count;
		public $total_rating;
		public $best_rating;
		public $worst_rating;
		public $percents;

		/**
		 * Google_Rating constructor.
		 *
		 * @param bool $id
		 */
		function __construct( $id = false ) {

			$this->id = $id ? $id : get_queried_object_id();

			$results = $this->get_results( $this->id );

			$this->title = $this->get_title( get_queried_object() );

			$this->total_count  = 0;
			$this->best_rating  = 0;
			$this->worst_rating = 0;
			$this->total_rating = 0;

			if ( $results ) {
				$this->total_count  = count( $results );
				$this->best_rating  = max( $results );
				$this->worst_rating = min( $results );
			}

			foreach ( $results as $row ) {
				$this->total_rating += (int) $row;
			}
			
			if ( $this->total_count == 0 ) {
				$this->avg      = 0;
				$this->percents = 0;
			} else {
				$this->avg      = $this->total_rating / $this->total_count;
				$this->percents = intval( $this->avg / 5 * 100 );
			}
			$this->avg_string = number_format( $this->avg, 2, '.', ' ' );
		}

		/**
		 * Select all ratings for id object
		 *
		 * @param $id integer
		 *
		 * @return array
		 */
		function get_results( $id ) {
			global $wpdb;
			$table_name = $wpdb->prefix . "google_ratings";
			$query      = "SELECT rating FROM {$table_name} WHERE object_id = {$id}";

			return $wpdb->get_col( $query );
		}

		/**
		 * Get title of object
		 *
		 * @param $object
		 *
		 * @return mixed|void
		 */
		function get_title( $object ) {
			$title = '';
			if ( isset( $object->name ) ) {
				$title = $object->name;
			}
			if ( isset( $object->post_title ) ) {
				$title = $object->post_title;
			}

			return apply_filters( 'the_title', $title );
		}
	}

endif;