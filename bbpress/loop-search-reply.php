<?php

/**
 * Search Loop - Single Reply
 *
 * @package bbPress
 * @subpackage Serverus
 */

?>

<div class="bbp-reply-header">

	<div class="bbp-meta">

		<a href="<?php bbp_reply_url(); ?>" class="bbp-reply-permalink" title="Post ID <?php bbp_reply_id(); ?>"><span class="glyphicon glyphicon-link"></span></a>

	</div><!-- .bbp-meta -->

	<div class="bbp-reply-title">

		<h3><?php _e( 'Reply in: ', 'bbpress' ); ?>
		<a class="bbp-topic-permalink" href="<?php bbp_topic_permalink( bbp_get_reply_topic_id() ); ?>"><?php bbp_topic_title( bbp_get_reply_topic_id() ); ?></a></h3>
		<span class="bbp-reply-post-date"><?php bbp_reply_post_date(); ?></span>

	</div><!-- .bbp-reply-title -->

</div><!-- .bbp-reply-header -->

<div id="post-<?php bbp_reply_id(); ?>" <?php bbp_reply_class(); ?>>

	<div class="bbp-reply-author">

		<?php do_action( 'bbp_theme_before_reply_author_details' ); ?>

		<?php bbp_reply_author_link( array( 'sep' => '', 'show_role' => true ) ); ?>

		<?php if ( bbp_is_user_keymaster() ) : ?>

			<?php do_action( 'bbp_theme_before_reply_author_admin_details' ); ?>

			<div class="bbp-reply-ip"><?php bbp_author_ip( bbp_get_reply_id() ); ?></div>

			<?php do_action( 'bbp_theme_after_reply_author_admin_details' ); ?>

		<?php endif; ?>

		<?php do_action( 'bbp_theme_after_reply_author_details' ); ?>

	</div><!-- .bbp-reply-author -->

	<div class="bbp-reply-content">

		<?php do_action( 'bbp_theme_before_reply_content' ); ?>

		<?php 
			//Messy
			remove_filter( 'bbp_get_reply_content', 'bbp_reply_content_append_revisions',  99 );
			if ( ! has_filter( 'bbp_get_reply_content', 'bbp_reply_content_append_revisions' ) )
			    add_filter( 'bbp_get_reply_content', 'bbp_reply_content_append_revisions', 99, 2 );
			bbp_reply_content();

		?>

		<?php do_action( 'bbp_theme_after_reply_content' ); ?>

	</div><!-- .bbp-reply-content -->

</div><!-- #post-<?php bbp_reply_id(); ?> -->




