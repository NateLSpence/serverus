<?php

/**
 * Statistics Content Part
 *
 * @package bbPress
 * @subpackage Serverus
 */

// Get the statistics
$stats = bbp_get_statistics(); ?>

<ul class="list-group">
	
	<?php do_action( 'bbp_before_statistics' ); ?>

	<li class="list-group-item">
		<?php _e( 'Registered Users', 'bbpress' ); ?>
		<span class="badge"><?php echo esc_html( $stats['user_count'] ); ?></span>
	</li>
	
	<li class="list-group-item">
		<?php _e( 'Topics', 'bbpress' ); ?>
		<span class="badge"><?php echo esc_html( $stats['topic_count'] ); ?></span>
	</li>
	
	<li class="list-group-item">
		<?php _e( 'Replies', 'bbpress' ); ?>
		<span class="badge"><?php echo esc_html( $stats['reply_count'] ); ?></span>
	</li>

	<?php do_action( 'bbp_after_statistics' ); ?>

</ul>

<?php unset( $stats );