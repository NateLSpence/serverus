<?php
/**
 * Custom functions
 */

// Disable WP admin bar
add_filter('show_admin_bar', '__return_false');


// Replace bbPress time since function to only output the largest chunk of time passed. 
// There ought to be a better way. This is replacing the functionality of already-run code. 

add_filter( 'bbp_get_time_since', 'serverus_get_time_since', 1, 3 );

	/**
	 * Return formatted time to display human readable time difference.
	 * Modified for Serverus theme.
	 *
	 * @since bbPress (r2544)
	 *
	 * @param string $older_date Unix timestamp from which the difference begins.
	 * @param string $newer_date Optional. Unix timestamp from which the
	 *                            difference ends. False for current time.
	 * @uses current_time() To get the current time in mysql format
	 * @uses human_time_diff() To get the time differene in since format
	 * @uses apply_filters() Calls 'bbp_get_time_since' with the time
	 *                        difference and time
	 * @return string Formatted time
	 */
function serverus_get_time_since( $output, $older_date, $newer_date = false ) {
	
	$gmt = false;

	// Setup the strings
	$unknown_text   = apply_filters( 'bbp_core_time_since_unknown_text',   __( 'sometime',  'bbpress' ) );
	$right_now_text = apply_filters( 'bbp_core_time_since_right_now_text', __( 'right now', 'bbpress' ) );
	$ago_text       = apply_filters( 'bbp_core_time_since_ago_text',       __( '%s ago',    'bbpress' ) );

	// array of time period chunks
	$chunks = array(
		array( 60 * 60 * 24 * 365 , __( 'year',   'bbpress' ), __( 'years',   'bbpress' ) ),
		array( 60 * 60 * 24 * 30 ,  __( 'month',  'bbpress' ), __( 'months',  'bbpress' ) ),
		array( 60 * 60 * 24 * 7,    __( 'week',   'bbpress' ), __( 'weeks',   'bbpress' ) ),
		array( 60 * 60 * 24 ,       __( 'day',    'bbpress' ), __( 'days',    'bbpress' ) ),
		array( 60 * 60 ,            __( 'hour',   'bbpress' ), __( 'hours',   'bbpress' ) ),
		array( 60 ,                 __( 'minute', 'bbpress' ), __( 'minutes', 'bbpress' ) ),
		array( 1,                   __( 'second', 'bbpress' ), __( 'seconds', 'bbpress' ) )
	);

	if ( !empty( $older_date ) && !is_numeric( $older_date ) ) {
		$time_chunks = explode( ':', str_replace( ' ', ':', $older_date ) );
		$date_chunks = explode( '-', str_replace( ' ', '-', $older_date ) );
		$older_date  = gmmktime( (int) $time_chunks[1], (int) $time_chunks[2], (int) $time_chunks[3], (int) $date_chunks[1], (int) $date_chunks[2], (int) $date_chunks[0] );
	}

	// $newer_date will equal false if we want to know the time elapsed
	// between a date and the current time. $newer_date will have a value if
	// we want to work out time elapsed between two known dates.
	$newer_date = ( !$newer_date ) ? strtotime( current_time( 'mysql', $gmt ) ) : $newer_date;

	// Difference in seconds
	$since = $newer_date - $older_date;

	// Something went wrong with date calculation and we ended up with a negative date.
	if ( 0 > $since ) {
		$output = $unknown_text;

	// We only want to output one chunk of time here, eg:
	//     x years
	//     x days
	// so there's only one bit of calculation below:
	} else {

		// Step one: the first chunk
		for ( $i = 0, $j = count( $chunks ); $i < $j; ++$i ) {
			$seconds = $chunks[$i][0];

			// Finding the biggest chunk (if the chunk fits, break)
			$count = floor( $since / $seconds );
			if ( 0 != $count ) {
				break;
			}
		}

		// If $i iterates all the way to $j, then the event happened 0 seconds ago
		if ( !isset( $chunks[$i] ) ) {
			$output = $right_now_text;

		} else {

			// Set output var
			$output = ( 1 == $count ) ? '1 '. $chunks[$i][1] : $count . ' ' . $chunks[$i][2];

			// No output, so happened right now
			if ( ! (int) trim( $output ) ) {
				$output = $right_now_text;
			}
		}
	}

	// Append 'ago' to the end of time-since if not 'right now'
	if ( $output != $right_now_text ) {
		$output = sprintf( $ago_text, $output );
	}

	return $output;
}



/**
 *	Customization options
 */
function customize_register( $wp_customize ) {
	
	/**
 	* Header
 	*/

 		// Header Repeat?
	$wp_customize->add_setting( 'header_repeat' , array(
		'default' 	=>	'false',
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 
		'header_repeat',
        array(
            'label'          => __( 'Repeat the header image horizontally?', 'serverus' ),
            'section'        => 'header_image',
            'settings'       => 'header_repeat',
            'type'           => 'select',
            'choices'        => array(
                'true'   => __( 'Yes' ),
                'false'  => __( 'No' )
            )
        )
    ) );

}
add_action( 'customize_register', 'customize_register' );


/**
 * Custom Style Declaration and hook (Ahjira)
 */
add_action( 'wp_head', 'insert_custom_style_overrides' );
function insert_custom_style_overrides() {

  echo '<style type="text/css">' . "\n";
  do_action( 'insert_custom_styles' );
  echo '</style>' . "\n";

}


/**
 * Insert custom styles into wp_head
 */
add_action( 'insert_custom_styles', 'set_header_properties' );
function set_header_properties() {
	
	$styles = "div.header-image, div.header-image::after {
		background-image:url('" . get_header_image() . "');
		height:" . get_custom_header()->height . "px; ";

	if( get_theme_mod('header_repeat') == 'true' ){ 
		$styles .= "width: 100%;
			background-repeat: repeat;";
	} else { 
		$styles .= "width: " . get_custom_header()->width . "px;";
	} 


  echo $styles;

}


/**
 *	Custom Shortcodes
 */



// [srv_frontpage forum_id=0 posts_per_page=5 char_limit=250 show_avatar=true show_stickies=false]
function srv_frontpage_func( $attr, $content = '' ) {

	function srv_unset_globals() { //TODO can cull some of this?
		$bbp = bbpress();

		// Unset global queries
		$bbp->forum_query  = new WP_Query();
		$bbp->topic_query  = new WP_Query();
		$bbp->reply_query  = new WP_Query();
		$bbp->search_query = new WP_Query();

		// Unset global ID's
		$bbp->current_view_id      = 0;
		$bbp->current_forum_id     = 0;
		$bbp->current_topic_id     = 0;
		$bbp->current_reply_id     = 0;
		$bbp->current_topic_tag_id = 0;

		// Reset the post data
		wp_reset_postdata();
	}

	/** Output Buffers ********************************************************/

	/**
	 * Start an output buffer.
	 *
	 * This is used to put the contents of the shortcode into a variable rather
	 * than outputting the HTML at run-time. This allows shortcodes to appear
	 * in the correct location in the_content() instead of when it's created.
	 *
	 * @since bbPress (r3079)
	 *
	 * @param string $query_name
	 *
	 * @uses bbp_set_query_name()
	 * @uses ob_start()
	 */
	function srv_start( $query_name = '' ) {

		// Set query name
		bbp_set_query_name( $query_name );

		// Start output buffer
		ob_start();
	}
	

	/**
	 * Return the contents of the output buffer and flush its contents.
	 *
	 * @since bbPress( r3079)
	 *
	 * @uses Serverus_Shortcodes::unset_globals() Cleans up global values
	 * @return string Contents of output buffer.
	 */
	function srv_end() {

		// Unset globals
		srv_unset_globals();

		// Reset the query name
		bbp_reset_query_name();

		// Return and flush the output buffer
		return ob_get_clean();
	}	

	/**
	 * Display the contents of a specific forum ID in an output buffer
	 * and return to ensure that post/page contents are displayed first.
	 *
	 * @since bbPress (r3031)
	 *
	 * @param array $attr
	 * @param string $content
	 * @uses get_template_part()
	 * @uses bbp_single_forum_description()
	 * @return string
	 */

	$attr = bbp_parse_args( $attr, array( //FIXME this isn't getting passed to templates
		'forum_id' 			=> 	'0',
		'posts_per_page'	=> 	'5',
		'char_limit'		=> 	'250',
		'show_avatar'		=> 	true,
		'show_stickies'		=> 	false,
	) );
	

	// Sanity check required info
	if ( !empty( $content ) || ( empty( $attr['forum_id'] ) || !is_numeric( $attr['forum_id'] ) ) )
		return $content;


	// Set passed attribute to $forum_id for clarity
	$forum_id = bbpress()->current_forum_id = $attr['forum_id'];

	// Bail if ID passed is not a forum
	if ( !bbp_is_forum( $forum_id ) )
		return $content;

	// Start output buffer
	srv_start( 'bbp_single_forum' );

	// Check forum caps
	if ( bbp_user_can_view_forum( array( 'forum_id' => $forum_id ) ) ) {

		// Copied template part here to apply arguments from shortcode into bbp_has_topics query
		//bbp_get_template_part( 'content',  'frontpage' );

		if ( post_password_required() ) : 
			bbp_get_template_part( 'form', 'protected' );

		else : 

			if ( bbp_has_topics( array(
				'post_type'      => bbp_get_topic_post_type(), // Narrow query down to bbPress topics
				'post_parent'    => $attr['forum_id'],	       // Forum ID
				'meta_key'       => '_bbp_last_active_time',   // Make sure topic has some last activity time
				'orderby'        => 'date',              	   // 'meta_value', 'author', 'date', 'title', 'modified', 'parent', rand',
				'order'          => 'DESC',                    // 'ASC', 'DESC'
				'posts_per_page' => $attr['posts_per_page'],   // Topics per page
				'paged'          => bbp_get_paged(),           // Page Number
				's'              => $default_topic_search,     // Topic Search
				'show_stickies'  => $attr['show_stickies'],    // Ignore sticky topics?
				'max_num_pages'  => false,                     // Maximum number of pages to show
			) ) ) : 

				 bbp_get_template_part( 'loop',       'fronttopics'    ); 

				 bbp_get_template_part( 'pagination', 'topics'    ); 

			else : 

				 bbp_get_template_part( 'feedback',   'no-topics' ); 

			endif;

		endif;


	// Forum is private and user does not have caps
	} elseif ( bbp_is_forum_private( $forum_id, false ) ) {
		bbp_get_template_part( 'feedback', 'no-access'    );
	}

	// Return contents of output buffer
	return srv_end();	
}
add_shortcode( 'srv_frontpage', 'srv_frontpage_func' );