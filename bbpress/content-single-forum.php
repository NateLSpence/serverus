<?php

/**
 * Single Forum Content Part
 *
 * @package bbPress
 * @subpackage Theme
 */

?>

<div id="bbpress-forums">

	<?php bbp_breadcrumb(); ?>

	
	<div class="clearfix">
		<?php if ( !bbp_is_forum_category() ) : ?>
			<?php bbp_get_template_part( 'button', 'newtopic' ); ?> 
		<?php endif; ?>

		<?php bbp_forum_subscription_link(); ?>

		<?php if ( bbp_allow_search() ) : ?>

			<div class="bbp-search-form pull-right">

				<?php bbp_get_template_part( 'form', 'search' ); ?>

			</div>

		<?php endif; ?>

	</div>

	<?php if ( !bbp_is_forum_category() ) : ?>
		<?php bbp_get_template_part( 'form',       'topic'     ); ?>
	<?php endif; ?>

	<?php do_action( 'bbp_template_before_single_forum' ); ?>

	<?php if ( post_password_required() ) : ?>
		<?php bbp_get_template_part( 'form', 'protected' ); ?>

	<?php else : ?>
		<?php //bbp_single_forum_description(); ?>

		<?php if ( bbp_has_forums() ) : ?>

			<?php bbp_get_template_part( 'loop', 'forums' ); ?>

		<?php endif; ?>

		<?php if ( !bbp_is_forum_category() && bbp_has_topics() ) : ?>

			<?php //bbp_get_template_part( 'pagination', 'topics'    ); ?>

			<?php bbp_get_template_part( 'loop',       'topics'    ); ?> 

			<?php bbp_get_template_part( 'pagination', 'topics'    ); ?>

			<?php //bbp_get_template_part( 'button', 'newtopic' ); ?> 
			<?php //bbp_get_template_part( 'form',       'topic'     ); ?>

		<?php elseif ( !bbp_is_forum_category() ) : ?>

			<?php if ( current_user_can( 'moderate' ) ) { ?>
				<h5>Forum ID <?php bbp_forum_id(); ?></h5>
			<?php } ?>

			<?php bbp_get_template_part( 'feedback',   'no-topics' ); ?>

			<?php //bbp_get_template_part( 'button', 'newtopic' ); ?> 
			<?php //bbp_get_template_part( 'form',       'topic'     ); ?>

		<?php endif; ?>

	<?php endif; ?>

	<?php do_action( 'bbp_template_after_single_forum' ); ?>

</div>
