<?php

/**
 * User Login Form
 *
 * @package bbPress
 * @subpackage Theme
 */

?>
<div class="col-md-6">
	<h2>Login</h2>
	<form method="post" action="<?php bbp_wp_login_action( array( 'context' => 'login_post' ) ); ?>" class="bbp-login-form">
		<fieldset class="bbp-form">
			<legend><?php _e( 'Log In', 'bbpress' ); ?></legend>

			<div class="bbp-username form-group">
				<!-- <label for="user_login"><?php _e( 'Username', 'bbpress' ); ?>: </label> -->
				<input type="text" class="form-control" name="log" value="<?php bbp_sanitize_val( 'user_login', 'text' ); ?>" size="20" id="user_login" tabindex="<?php bbp_tab_index(); ?>" placeholder="<?php _e( 'Username', 'bbpress' ); ?>" />
			</div>

			<div class="bbp-password form-group">
				<!-- <label for="user_pass"><?php _e( 'Password', 'bbpress' ); ?>: </label> -->
				<input type="password" class="form-control" name="pwd" value="<?php bbp_sanitize_val( 'user_pass', 'password' ); ?>" size="20" id="user_pass" tabindex="<?php bbp_tab_index(); ?>" placeholder="<?php _e( 'Password', 'bbpress' ); ?>" />
			</div>

			<div class="bbp-submit-wrapper form-group">

				<button type="submit" class="btn btn-primary btn-block" tabindex="<?php bbp_tab_index(); ?>" name="user-submit" class="button submit user-submit"><?php _e( 'Log In', 'bbpress' ); ?></button>

				<?php bbp_user_login_fields(); ?>

			</div>

			<div class="bbp-remember-me checkbox">
				<input type="checkbox" name="rememberme" value="forever" <?php checked( bbp_get_sanitize_val( 'rememberme', 'checkbox' ) ); ?> id="rememberme" tabindex="<?php bbp_tab_index(); ?>" />
				<label for="rememberme"><?php _e( 'Remember me?', 'bbpress' ); ?></label>
			</div>

			<?php do_action( 'login_form' ); ?>

		</fieldset>
	</form>
</div>