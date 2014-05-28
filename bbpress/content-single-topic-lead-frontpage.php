<?php

/**
 * Single Topic Lead Content Part
 *
 * @package bbPress
 * @subpackage Theme
 */

?>

<?php do_action( 'bbp_template_before_lead_topic' ); ?>

<ul id="bbp-topic-<?php bbp_topic_id(); ?>-lead" class="bbp-lead-topic">

	<li class="bbp-header">

		<?php echo bbp_get_topic_title(); ?>


	</li><!-- .bbp-header -->

	<li class="bbp-body">

		<div id="post-<?php bbp_topic_id(); ?>" <?php bbp_topic_class(); ?>>

			<div class="bbp-topic-content">

				<?php do_action( 'bbp_theme_before_topic_content' ); ?>

				<?php 

				// TODO clean up this mess. This filter is being applied twice, somewhere, and 	I really should pull out the second call rather than removing this, but I think the problem is in the core bbPress files. This should be fine if the duplicate is taken out, but it's just silly. 
				remove_filter( 'bbp_get_topic_content', 'bbp_topic_content_append_revisions',  99 );

				if ( ! has_filter( 'bbp_get_topic_content', 'bbp_topic_content_append_revisions' ) )
				    add_filter( 'bbp_get_topic_content', 'bbp_topic_content_append_revisions', 99, 2 );


				if ( srv_frontpage_class::$attr['char_limit'] == 0 ) {
					echo bbp_get_topic_content();
				} else {
					echo substr ( bbp_get_topic_content() , 0 , (srv_frontpage_class::$attr['char_limit'] + 3) ); //correcting 3 char offset 
				}

				?> 

				<?php do_action( 'bbp_theme_after_topic_content' ); ?>

			</div><!-- .bbp-topic-content -->

		</div><!-- #post-<?php bbp_topic_id(); ?> -->

	</li><!-- .bbp-body -->

	<div class="bbp-frontpage-topic-footer">

		<div class="bbp-meta">

			<?php do_action( 'bbp_theme_before_topic_author_details' ); ?>

			By <?php bbp_topic_author_link( array( 'sep' => '' , 'show_role' => false , 'type' => 'name' ) );  ?> on <?php bbp_topic_post_date(); ?> | <a href="<?php bbp_topic_permalink(); ?>">Comments (<?php bbp_topic_reply_count(); ?>)</a>

			<?php do_action( 'bbp_theme_after_topic_author_details' ); ?> 

		</div><!-- .bbp-meta -->

	</div><!-- .bbp-topic-header -->

</ul><!-- #bbp-topic-<?php bbp_topic_id(); ?>-lead -->

<?php do_action( 'bbp_template_after_lead_topic' ); ?>
