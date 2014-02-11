<?php
/**
 * Custom functions
 */


/**
 * Customization options
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