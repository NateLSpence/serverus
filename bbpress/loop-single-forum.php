<?php

/**
 * Forums Loop - Single Forum
 *
 * @package bbPress
 * @subpackage Theme
 */

?>





<!-- CONTAINS ALL OF ONE CATEGORY -->
<?php 


$bbp = bbpress();

if( bbp_is_forum_category( bbp_get_forum_id() ) || ( isset( $bbp->forum_query->current_post ) && $bbp->forum_query->current_post < 1 ) ) {

	if( bbp_is_forum_category( bbp_get_forum_id() ) ){ 
		$cat_id = bbp_get_forum_id();
	} else {
		$cat_id = bbp_get_forum_ancestors()[0];	
	}

?>

<ul id="bbp-forum-<?php echo $cat_id; ?>" <?php bbp_forum_class( $cat_id ); ?>>

	<li class="bbp-header">
		<ul class="forum-titles">
			<!-- CATEGORY TITLE -->
			<?php do_action( 'bbp_theme_before_forum_title' ); ?>
			<li class="bbp-forum-info bbp-forum-title"><?php bbp_forum_title( $cat_id ); ?></li>
			<?php do_action( 'bbp_theme_after_forum_title' ); ?>

			<li class="bbp-forum-topic-count"><?php _e( 'Topics', 'bbpress' ); ?></li>
			<li class="bbp-forum-reply-count"><?php bbp_show_lead_topic( $cat_id ) ? _e( 'Replies', 'bbpress' ) : _e( 'Replies', 'bbpress' ); ?></li>
			<li class="bbp-forum-freshness"><?php _e( 'Activity', 'bbpress' ); ?></li>
		</ul>
	</li><!-- .bbp-header -->


	<?php 
		$category_description = bbp_get_forum_content( $cat_id );
		if( !empty($category_description) ) {
	?>
		<li> <!-- description -->
			<?php do_action( 'bbp_theme_before_forum_description' ); ?>

			<div class="bbp-forum-content"><?php echo $category_description; ?></div>

			<?php do_action( 'bbp_theme_after_forum_description' ); ?>
		</li>
	<?php } ?>


	<?php do_action( 'bbp_theme_before_forum_sub_forums' ); ?>



<?php // Create list of forums in each category

$args = '';

// Define used variables
$output = $sub_forums = $topic_count = $reply_count = $counts = '';
//$i = 0;
$count = array();

// Parse arguments against default values
$r = bbp_parse_args( $args, array(
	'show_topic_count'  => true,
	'show_reply_count'  => true,
), 'list_forums' );

// Loop through forums and create a list
$sub_forums = bbp_forum_get_subforums( $cat_id );


if ( !empty( $sub_forums ) ) {

	// Total count (for separator)
	//$total_subs = count( $sub_forums );
	foreach ( $sub_forums as $sub_forum ) {
		//$i++; // Separator count

		// Get forum details
		//$count     = array();
		//$show_sep  = $total_subs > $i ? $r['separator'] : '';
		$permalink = bbp_get_forum_permalink( $sub_forum->ID );
		$title     = bbp_get_forum_title( $sub_forum->ID );
		//$last_reply= bbp_get_forum_freshness_link_custom( $sub_forum->ID );


		echo "<li class='bbp-subforum'><ul>";

			// title, description
			echo "<li class='bbp-forum-info'>";
				// Forum title, link
				echo '<div class="bbp-forum-title"><a href="' . esc_url( $permalink ) . '" class="bbp-forum-link">' . $title . '</a></div>';
				
				// Description
				$forum_content = bbp_get_forum_content( $sub_forum->ID );
				if( !empty($forum_content) ) {
					do_action( 'bbp_theme_before_forum_description' );
					echo '<div class="bbp-forum-content">';
						echo $forum_content;
					echo '</div>';
					do_action( 'bbp_theme_after_forum_description' );
				}

				// Show Sub-Sub-Forums
				$sub_sub_forums = bbp_forum_get_subforums( $sub_forum->ID ); 
				if ( !empty( $sub_sub_forums ) ) {
					$total_subs = count( $sub_sub_forums );
					$count = 0;

					echo "<div class='bbp-forum-content bbp-forum-subsubforums'>Subforums: ";
					foreach ( $sub_sub_forums as $sub_sub_forum ) {
						$sub_permalink = bbp_get_forum_permalink( $sub_sub_forum->ID );
						$sub_title     = bbp_get_forum_title( $sub_sub_forum->ID );

						echo '<a href="' . esc_url( $sub_permalink ) . '" class="bbp-forum-link">' . $sub_title . '</a>';
						if ($count < $total_subs - 1) {
							echo ", ";
						}
						$count++;
					}
					echo "</div>";
				}

				if ( bbp_is_user_home() && bbp_is_subscriptions() ) : 

					echo '<span class="bbp-row-actions">';

						 do_action( 'bbp_theme_before_forum_subscription_action' );

						bbp_forum_subscription_link( array( 'before' => '', 'subscribe' => '+', 'unsubscribe' => '&times;' ) ); 

						do_action( 'bbp_theme_after_forum_subscription_action' ); 

					echo "</span>";

				endif; 

				bbp_forum_row_actions();

			echo "</li>";


			// Show topic count
			echo "<li class='bbp-forum-topic-count'>";
				if ( !empty( $r['show_topic_count'] ) && !bbp_is_forum_category( $sub_forum->ID ) ) {
					echo bbp_get_forum_topic_count( $sub_forum->ID );
				}
			echo "</li>";


			// Show reply count
			echo "<li class='bbp-forum-reply-count'>";
				if ( !empty( $r['show_reply_count'] ) && !bbp_is_forum_category( $sub_forum->ID ) ) {
					echo bbp_get_forum_reply_count( $sub_forum->ID );
				}
			echo "</li>";


			// Show latest reply
			echo "<li class='bbp-forum-freshness'>";
				do_action( 'bbp_theme_before_forum_freshness_link' ); 

				
				// Custom version of bbp_get_forum_freshness_link( $sub_forum->ID );
				$active_id = bbp_get_forum_last_active_id( $sub_forum->ID );
				$link_url  = $reply_title = '';

				if ( empty( $active_id ) )
					$active_id = bbp_get_forum_last_reply_id( $sub_forum->ID );

				if ( empty( $active_id ) )
					$active_id = bbp_get_forum_last_topic_id( $sub_forum->ID );

				if ( bbp_is_topic( $active_id ) ) {
					$link_url = bbp_get_forum_last_topic_permalink( $sub_forum->ID );
					$reply_title    = bbp_get_forum_last_topic_title( $sub_forum->ID );
				} elseif ( bbp_is_reply( $active_id ) ) {
					$link_url = bbp_get_forum_last_reply_url( $sub_forum->ID );
					//$reply_title    = bbp_get_forum_last_reply_title( $sub_forum->ID );
					$reply_title    = bbp_get_forum_last_topic_title( $sub_forum->ID );
					
				}

				$time_since = bbp_get_forum_last_active_time( $sub_forum->ID );

				if ( !empty( $time_since ) && !empty( $link_url ) ) {
					$anchor = '<a href="' . esc_url( $link_url ) . '" title="' . esc_attr( $reply_title ) . '">' . esc_attr( $reply_title ) . '</a>'; 
					$time_since_span = '<span>' . esc_html( $time_since ) . '</span>';
					$no_topics = false;
				} else {
					//$anchor = esc_html__( 'No Topics', 'bbpress' );
					$anchor = "<br />No Topics";
					$no_topics = true;
				}

				echo apply_filters( 'bbp_get_forum_freshness_link', $anchor, $sub_forum->ID, $time_since, $link_url, $reply_title, $active_id );
				// end bbp_get_forum_freshness_link_custom


				do_action( 'bbp_theme_after_forum_freshness_link' ); 

				// Don't display details if no topics exist
				if( $no_topics == true ) {

				} else {
					echo "<p class='bbp-topic-meta'>by ";
						do_action( 'bbp_theme_before_topic_author' );
						
						echo "<span class='bbp-topic-freshness-author'>";
							bbp_author_link( array( 'post_id' => bbp_get_forum_last_active_id( $sub_forum->ID ), 'size' => 14 ) );
						echo "</span>";
						
						do_action( 'bbp_theme_after_topic_author' );
					echo "</p>";
					
					echo "<p class='bbp-topic-meta'>";
						echo $time_since_span; 
					echo "</p>";
				}
			echo "</li>";

		echo "</ul></li>";	
	} /* END FOREACH */

}

?>


	<?php do_action( 'bbp_theme_after_forum_sub_forums' ); ?>

<li class="bbp-category-footer">
	<div class="tr">
		<div class="td colspan4">&nbsp;</div>
	</div><!-- .tr -->
</li><!-- .bbp-category-footer -->

	
</ul><!-- #bbp-forum-<?php bbp_forum_id(); ?> -->
<?php } //end if ?> 