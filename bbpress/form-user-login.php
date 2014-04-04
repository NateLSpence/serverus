<?php

/**
 * User Login Form
 *
 * @package bbPress
 * @subpackage Theme
 */

?>
<div class="col-md-6">
<div class="serverus-login-wrapper">
<div class="serverus-login-title">Login</div>
<div class="serverus-login-inner">
	
	<form method="post" action="<?php bbp_wp_login_action( array( 'context' => 'login_post' ) ); ?>" class="bbp-login-form">
		<fieldset class="bbp-form">
			<legend><?php _e( 'Log In', 'bbpress' ); ?></legend>

			<div class="bbp-username form-group">
				<label for="user_login" class="sr-only"><?php _e( 'Username', 'bbpress' ); ?>: </label>
				<input type="text" class="form-control" name="log" value="<?php bbp_sanitize_val( 'user_login', 'text' ); ?>" size="20" id="user_login" tabindex="<?php bbp_tab_index(); ?>" placeholder="<?php _e( 'Username', 'bbpress' ); ?>" />
			</div>

			<div class="bbp-password form-group">
				<label for="user_pass" class="sr-only"><?php _e( 'Password', 'bbpress' ); ?>: </label>
				<input type="password" class="form-control" name="pwd" value="<?php bbp_sanitize_val( 'user_pass', 'password' ); ?>" size="20" id="user_pass" tabindex="<?php bbp_tab_index(); ?>" placeholder="<?php _e( 'Password', 'bbpress' ); ?>" />
			</div>

			<div class="bbp-submit-wrapper form-group">

				<button type="submit" class="btn btn-primary btn-block" tabindex="<?php bbp_tab_index(); ?>" name="user-submit" class="button submit user-submit"><?php _e( 'Log In', 'bbpress' ); ?></button>

				<?php bbp_user_login_fields(); ?>

			</div>

			<div class="form-group">
				<div class="bbp-remember-me checkbox">
					<input type="checkbox" name="rememberme" value="forever" <?php checked( bbp_get_sanitize_val( 'rememberme', 'checkbox' ) ); ?> id="rememberme" tabindex="<?php bbp_tab_index(); ?>" />
					<label for="rememberme"><?php _e( 'Remember me?', 'bbpress' ); ?></label>
				</div>

			</div>

			<?php do_action( 'login_form' ); ?>

		</fieldset>
	</form>

</div>

	<div class="serverus-show-lost-pass">
		<?php bbp_get_template_part( 'button', 'lostpass' ); ?> 
	</div>
	
	<form method="post" action="<?php bbp_wp_login_action( array( 'action' => 'lostpassword', 'context' => 'login_post' ) ); ?>" class="bbp-login-form serverus-lost-pass-form hidden">
		<fieldset class="bbp-form">
			<legend><?php _e( 'Lost Password', 'bbpress' ); ?></legend>

			<div class="bbp-username">
				<label for="user_login" class="hide"><?php _e( 'Username or Email', 'bbpress' ); ?>: </label>
				<input type="text" class="form-control" name="user_login" value="" size="20" id="user_login" tabindex="<?php bbp_tab_index(); ?>" placeholder="<?php _e( 'Username or Email', 'bbpress' ); ?>" />
			</div>

			<?php do_action( 'login_form', 'resetpass' ); ?>

			<div class="bbp-submit-wrapper">

				<button type="submit" tabindex="<?php bbp_tab_index(); ?>" name="user-submit" class="button btn btn-default form-control submit user-submit"><?php _e( 'Reset My Password', 'bbpress' ); ?></button>

				<?php bbp_user_lost_pass_fields(); ?>

			</div>
		</fieldset>
	</form>

</div></div>