<?php
defined( 'ABSPATH' ) || exit();

if ( is_admin() ) {
	add_action( 'admin_menu', 'google_rating_settings_menu' );
	add_action( 'admin_init', 'google_rating_settings' );
}
function google_rating_settings_menu() {
	add_options_page( 'Настройки Google Rating', 'Google Rating', 'manage_options', 'google_rating',
		'google_rating_settings_menu_callback' );
}

function google_rating_settings_menu_callback() {
	?>
  <div class="wrap">
    <h1>Настройки Google Rating</h1>

    <form method="post" action="options.php">
		<?php settings_fields( 'google-rating' ); ?>
		<?php do_settings_sections( 'google-rating' ); ?>
      <table class="form-table">

		  <?php $ip_check = google_rating_check_ip() ?>
        <tr valign="top">
          <th scope="row">Unique voting based on User IP</th>
          <td>
            <input type="radio" name="ip_check" <?php if ( $ip_check == 1 ) {
				echo 'checked';
			} ?> value="1"/> Yes<br>
            <input type="radio" name="ip_check" <?php if ( $ip_check == 0 ) {
				echo 'checked';
			} ?> value="0"/> No
          </td>
        </tr>

		  <?php $show_in_posts = google_rating_show_in_posts() ?>
        <tr valign="top">
          <th scope="row">Show in Posts</th>
          <td>
            <input type="radio" name="google_rating_show_in_posts" <?php if ( $show_in_posts == 1 ) {
				echo 'checked';
			} ?> value="1"/> Yes <br>
            <input type="radio" name="google_rating_show_in_posts" <?php if ( $show_in_posts == 0 ) {
				echo 'checked';
			} ?> value="0"/> No <br>
          </td>
        </tr>

		  <?php $votes_label = google_rating_votes_label() ?>
        <tr valign="top">
          <th scope="row">Label vote[-s]</th>
          <td>
            <input type="text" name="google_rating_votes_label" value="<?php echo $votes_label ?>"/>
          </td>
        </tr>
      </table>

		<?php submit_button(); ?>

    </form>
    <h3>Usage</h3>
    <p>For use in theme files:</p>
    <code>
      &lt;?php if(function_exists('the_google_rating')) { echo the_google_rating();} ?&gt;
    </code>
  </div>
	<?php
}

function google_rating_settings() {
	register_setting( 'google-rating', 'google_rating_ip_check' );
	register_setting( 'google-rating', 'google_rating_show_in_posts' );
	register_setting( 'google-rating', 'google_rating_votes_label' );
}