<?php
/**
 * Custom functions
 */

// Disable WP admin bar
add_filter('show_admin_bar', '__return_false');



/*
function bbp_get_forum_title( $anchor, $forum_id = 0 ) {
	$forum_id = 0;
	$forum_id  = bbp_get_forum_id( $forum_id );
	$active_id = bbp_get_forum_last_active_id( $forum_id );
	$link_url  = $title = '';

	if ( empty( $active_id ) )
		$active_id = bbp_get_forum_last_reply_id( $forum_id );

	if ( empty( $active_id ) )
		$active_id = bbp_get_forum_last_topic_id( $forum_id );

	if ( bbp_is_topic( $active_id ) ) {
		$link_url = bbp_get_forum_last_topic_permalink( $forum_id );
		$title    = bbp_get_forum_last_topic_title( $forum_id );
	} elseif ( bbp_is_reply( $active_id ) ) {
		$link_url = bbp_get_forum_last_reply_url( $forum_id );
		$title    = bbp_get_forum_last_reply_title( $forum_id );
	}

	$time_since = bbp_get_forum_last_active_time( $forum_id );

	if ( !empty( $time_since ) && !empty( $link_url ) ) {
		$anchor = '<a href="' . esc_url( $link_url ) . '" title="' . esc_attr( $title ) . '">' . esc_attr( $title ) . '</a>'; 
		$time_since_span = '<span>' . esc_html( $time_since ) . '</span>';
	} else {
		$anchor = esc_html__( 'No Topics', 'bbpress' );
	}

    return $anchor;
    
    
    //return "blarg";
}

add_filter( 'bbp_get_forum_freshness_link', 'bbp_get_forum_title', 9, 2 );*/

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