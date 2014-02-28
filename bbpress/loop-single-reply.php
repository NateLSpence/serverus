<?php

/**
 * Replies Loop - Single Reply
 *
 * @package bbPress
 * @subpackage Theme
 */

?>

<div id="post-<?php bbp_reply_id(); ?>" class="bbp-reply-header">

	<div class="bbp-meta">

		<span class="bbp-reply-post-date"><?php bbp_reply_post_date(); ?></span>

		<?php if ( bbp_is_single_user_replies() ) : ?>

			<span class="bbp-header">
				<?php _e( 'in reply to: ', 'bbpress' ); ?>
				<a class="bbp-topic-permalink" href="<?php bbp_topic_permalink( bbp_get_reply_topic_id() ); ?>"><?php bbp_topic_title( bbp_get_reply_topic_id() ); ?></a>
			</span>

		<?php endif; ?>


		<a href="<?php bbp_reply_url(); ?>" class="bbp-reply-permalink"><span class="glyphicon glyphicon-link"></span><?php //bbp_reply_id(); ?></a>


		<?php do_action( 'bbp_theme_before_reply_admin_links' ); ?>

		<?php bbp_reply_admin_links(); ?>
	<!-- 		'reply_text'   => __( 'Reply', 'bbpress' ), -->

		<?php do_action( 'bbp_theme_after_reply_admin_links' ); ?>

		<span class="caret pull-right bbp-admin-links"></span>
	</div><!-- .bbp-meta -->

</div><!-- #post-<?php bbp_reply_id(); ?> -->

<div <?php bbp_reply_class(); ?>>

	<div class="bbp-reply-author">

		<?php do_action( 'bbp_theme_before_reply_author_details' ); ?>

		<!-- from here -->
		<?php bbp_reply_author_link( array( 'sep' => '', 'show_role' => true ) ); ?>
		<!-- to here -->

		<?php if ( bbp_is_user_keymaster() ) : ?>

			<?php do_action( 'bbp_theme_before_reply_author_admin_details' ); ?>

			<div class="bbp-reply-ip"><?php bbp_author_ip( bbp_get_reply_id() ); ?></div>

			<?php do_action( 'bbp_theme_after_reply_author_admin_details' ); ?>

		<?php endif; ?>

		<?php do_action( 'bbp_theme_after_reply_author_details' ); ?>

	</div><!-- .bbp-reply-author -->

	<div class="bbp-reply-content">

		<?php do_action( 'bbp_theme_before_reply_content' ); ?>

		<?php //bbp_reply_content(); ?>
		<?php //echo get_post_field( 'post_content', $reply_id ); ?>
		<?php 
			// $reply_id = bbp_get_reply_id();
			// $content = get_post_field( 'post_content', $reply_id );
			
			/*remove_all_filters('bbp_get_reply_content');
			
			add_filter( 'bbp_get_reply_content', 'bbp_make_clickable', 4    );
			add_filter( 'bbp_get_reply_content', 'bbp_mention_filter', 5    );
			add_filter( 'bbp_get_reply_content', 'wptexturize',        6    );
			add_filter( 'bbp_get_reply_content', 'convert_chars',      8    );
			add_filter( 'bbp_get_reply_content', 'capital_P_dangit',   10   );
			add_filter( 'bbp_get_reply_content', 'convert_smilies',    20   );
			add_filter( 'bbp_get_reply_content', 'force_balance_tags', 30   );
			add_filter( 'bbp_get_reply_content', 'wpautop',            40   );
			add_filter( 'bbp_get_reply_content', 'bbp_rel_nofollow',   50   );

			// Run wp_kses_data on topic/reply content in admin section
			if ( is_admin() ) {
				add_filter( 'bbp_get_reply_content', 'bbp_kses_data' );

			// Revisions (only when not in admin)
			} else {
				add_filter( 'bbp_get_reply_content', 'bbp_reply_content_append_revisions',  99,  2 );
			}

*/

			// TODO clean up this mess. This filter is being applied twice, somewhere, and I really should pull out the second call rather than removing this. This should be fine if the duplicate is taken out, but it's just silly. 
			remove_filter( 'bbp_get_reply_content', 'bbp_reply_content_append_revisions',  99 );

			if ( ! has_filter( 'bbp_get_reply_content', 'bbp_reply_content_append_revisions' ) )
			    add_filter( 'bbp_get_reply_content', 'bbp_reply_content_append_revisions', 99, 2 );			

			bbp_reply_content();
			//echo apply_filters( 'bbp_get_reply_content', $content, $reply_id );
			//echo bbp_reply_content_append_revisions( $content, $reply_id );
			//echo $content . bbp_get_reply_revision_log( $reply_id );
		?>

		<?php do_action( 'bbp_theme_after_reply_content' ); ?>

	</div><!-- .bbp-reply-content -->

</div><!-- .reply -->
