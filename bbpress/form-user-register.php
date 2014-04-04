<?php

/**
 * User Registration Form
 *
 * @package bbPress
 * @subpackage Theme
 */

?>

<div class="col-sm-6">
<div class="serverus-registration-wrapper">
<div class="serverus-login-title">Register</div>
<div class="serverus-registration-inner">

	<form method="post" action="<?php bbp_wp_login_action( array( 'context' => 'login_post' ) ); ?>" class="bbp-login-form">
		<fieldset class="bbp-form">
			<legend><?php _e( 'Create an Account', 'bbpress' ); ?></legend>

			<div class="bbp-username form-group">
				<label for="user_login" class="sr-only"><?php _e( 'Username', 'bbpress' ); ?>: </label> 
				<input type="text" class="form-control" name="user_login" value="<?php bbp_sanitize_val( 'user_login' ); ?>" size="20" id="user_login" tabindex="<?php bbp_tab_index(); ?>" placeholder="<?php _e( 'Username', 'bbpress' ); ?>" />
			</div>

			<div class="bbp-email form-group">
				<label for="user_email" class="sr-only"><?php _e( 'Email', 'bbpress' ); ?>: </label>
				<input type="email" class="form-control" name="user_email" value="<?php bbp_sanitize_val( 'user_email' ); ?>" size="20" id="user_email" tabindex="<?php bbp_tab_index(); ?>" placeholder="<?php _e( 'Email', 'bbpress' ); ?>" />
			</div>

			<?php do_action( 'register_form' ); ?>

			<div class="bbp-submit-wrapper form-group">

				<button type="submit" class="btn btn-default btn-block" tabindex="<?php bbp_tab_index(); ?>" name="user-submit" class="button submit user-submit"><?php _e( 'Register', 'bbpress' ); ?></button>

				<?php bbp_user_register_fields(); ?>

			</div>

			<div class="bbp-template-notice form-group">
				<p><?php _e( 'Your username must be unique. You can change your display name later.', 'bbpress' ) ?></p>
				<p><?php _e( 'We will email you a password.', 'bbpress' ) ?></p>
			</div>

		</fieldset>
	</form>
</div></div></div>