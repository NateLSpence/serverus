<?php
/**
 * Custom functions
 */




/**
 *	Customization options 
 */
function customize_register( $wp_customize ) {

	/**
  	 * Remove default sections
 	 */

	$wp_customize->remove_section( 'static_front_page' );
	$wp_customize->remove_section( 'nav' );
	$wp_customize->remove_section( 'colors' );

	// Remove Default Controls
	$wp_customize->remove_control( 'blogdescription' );
	$wp_customize->remove_control( 'display_header_text' );





	/**
  	 * New Color Control
 	 */
/*
	class Serverus_Customize_Color_Control extends WP_Customize_Color_Control {
	    public $type = 'color';
	 
		public function render_content() {
			$this_default = $this->setting->default;
			$default_attr = '';
			if ( $this_default ) {

				if ( $this_default !== 'false' ) {
					if ( false === strpos( $this_default, '#' ) )
						$this_default = '#' . $this_default;
				}

				$default_attr = ' data-default-color="' . esc_attr( $this_default ) . '"';
			}
			// The input's value gets set by JS. Don't fill it.
			?>
			<label>
				<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<div class="customize-control-content">
					<input class="color-picker-hex" type="text" maxlength="7" placeholder="<?php esc_attr_e( 'Hex Value' ); ?>"<?php echo $default_attr; ?> />
				</div>
			</label>
			<?php
		}
	}

	$wp_customize->add_section( 'test_section' , array(
	    'title'      => __('Test Section','serverus'),
	    'priority'   => 35,
	) );

	$wp_customize->add_setting( 'test_setting', array(
	    'default'        => 'false',
	) );
	 
	$wp_customize->add_control( new Serverus_Customize_Color_Control( $wp_customize, 'test_setting', array(
	    'label'   => 'Test Setting',
	    'section' => 'test_section',
	    'settings'   => 'test_setting',
	) ) );
*/



	/**
  	 * Add new sections / modify
 	 */

	// rename Title/Tagline section
	$wp_customize->add_section( 'title_tagline' , array(
		'title'		=> __('Site Title','serverus'),
		'priority'	=> 20,
	) );

	$wp_customize->add_section( 'colors_main' , array(
	    'title'      => __('Main Colors','serverus'),
	    'priority'   => 21,
	) );

	$wp_customize->add_section( 'colors_nav' , array(
	    'title'      => __('Navbar Colors','serverus'),
	    'priority'   => 22,
	) );

	$wp_customize->add_section( 'color_schemes' , array(
	    'title'      => __('Color Schemes','serverus'),
	    'priority'   => 30,
	) );


	/**
  	 * Site title and tagline
 	 */

	// Display Header Text?

	$wp_customize->add_setting( 'toggle_header_text' , array(
		'transport'   => 'refresh',
		'default'	  => '1',
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 
		'toggle_header_text',
        array(
            'label'          => __( 'Display Header Text', 'serverus' ),
            'section'        => 'title_tagline',
            'settings'       => 'toggle_header_text',
        	'priority'   	 => 15,
        	'type'     		 => 'checkbox',
        )
    ) );



	// Header text color
	$wp_customize->add_setting( 'color_header_text' , array(
    	'transport'   => 'refresh',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'color_header_text', array(
		'label'        => __( 'Title Color', 'serverus' ),
		'section'    => 'title_tagline',
		'settings'   => 'color_header_text',
        'priority'   => 21
	) ) );


	// Header text bg color
	$wp_customize->add_setting( 'color_header_bg' , array(
    	'transport'   => 'refresh',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'color_header_bg', array(
		'label'        => __( 'Title BG Color', 'serverus' ),
		'section'    => 'title_tagline',
		'settings'   => 'color_header_bg',
        'priority'   => 22
	) ) );


	// Title BG Transparency
	$wp_customize->add_setting( 'color_header_alpha' , array(
		'transport'   => 'refresh',
		'default'	  => '70',
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 
		'color_header_alpha',
        array(
            'label'          => __( 'Title Opacity (1-100)', 'serverus' ),
            'section'        => 'title_tagline',
            'settings'       => 'color_header_alpha',
        	'priority'   	 => 23
        )
    ) );


	// Title Vertical Position
	$wp_customize->add_setting( 'header_title_vertical_position' , array(
		'transport'   => 'refresh',
		'default'	  => '48',
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 
		'header_title_vertical_position',
        array(
            'label'          => __( 'Title Vertical Position', 'serverus' ),
            'section'        => 'title_tagline',
            'settings'       => 'header_title_vertical_position',
        	'priority'   	 => 30
        )
    ) );


	// Title Horizontal Position
	$wp_customize->add_setting( 'header_title_horizontal_position' , array(
		'transport'   => 'refresh',
		'default'	  => '48',
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 
		'header_title_horizontal_position',
        array(
            'label'          => __( 'Title Horizontal Position', 'serverus' ),
            'section'        => 'title_tagline',
            'settings'       => 'header_title_horizontal_position',
        	'priority'   	 => 30
        )
    ) );


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


	/**
  	 * Main Colors
 	 */


	// Background color (@back-bg)
	$wp_customize->add_setting( 'color_bg_serverus' , array(
    	'transport'   => 'refresh',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'color_bg_serverus', array(
		'label'        => __( 'Background Color', 'serverus' ),
		'section'    => 'colors_main',
		'settings'   => 'color_bg_serverus',
        'priority'   => 10
	) ) );


	// Text color (@text-color)
	$wp_customize->add_setting( 'color_text_serverus' , array(
    	'transport'   => 'refresh',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'color_text_serverus', array(
		'label'        => __( 'Text Color', 'serverus' ),
		'section'    => 'colors_main',
		'settings'   => 'color_text_serverus',
        'priority'   => 12
	) ) );


	// Brand primary color
	$wp_customize->add_setting( 'color_brand_primary' , array(
    	'transport'   => 'refresh',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'color_brand_primary', array(
		'label'        => __( 'Primary Accent', 'serverus' ),
		'section'    => 'colors_main',
		'settings'   => 'color_brand_primary',
        'priority'   => 21
	) ) );



	// Brand primary text contrast color
	$wp_customize->add_setting( 'color_brand_primary_text' , array(
    	'transport'   => 'refresh',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'color_brand_primary_text', array(
		'label'        => __( 'Primary Accent Text', 'serverus' ),
		'section'    => 'colors_main',
		'settings'   => 'color_brand_primary_text',
        'priority'   => 22
	) ) );

	// Brand complement color
	$wp_customize->add_setting( 'color_brand_complement' , array(
    	'transport'   => 'refresh',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'color_brand_complement', array(
		'label'        => __( 'Complementary Accent', 'serverus' ),
		'section'    => 'colors_main',
		'settings'   => 'color_brand_complement',
        'priority'   => 23
	) ) );

	// Brand complement text contrast color
	$wp_customize->add_setting( 'color_brand_complement_text' , array(
    	'transport'   => 'refresh',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'color_brand_complement_text', array(
		'label'        => __( 'Complementary Accent Text', 'serverus' ),
		'section'    => 'colors_main',
		'settings'   => 'color_brand_complement_text',
        'priority'   => 24
	) ) );

	// Link color
	$wp_customize->add_setting( 'color_link' , array(
    	'transport'   => 'refresh',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'color_link', array(
		'label'        => __( 'Link Color', 'serverus' ),
		'section'    => 'colors_main',
		'settings'   => 'color_link',
        'priority'   => 30
	) ) );

	// Link hover color
	$wp_customize->add_setting( 'color_link_hover' , array(
    	'transport'   => 'refresh',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'color_link_hover', array(
		'label'        => __( 'Link Hover Color', 'serverus' ),
		'section'    => 'colors_main',
		'settings'   => 'color_link_hover',
        'priority'   => 31
	) ) );


	/**
  	 * Navbar Colors
 	 */

	// Nav bg color
	$wp_customize->add_setting( 'color_nav_bg' , array(
    	'transport'   => 'refresh',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'color_nav_bg', array(
		'label'        => __( 'Navbar Color', 'serverus' ),
		'section'    => 'colors_nav',
		'settings'   => 'color_nav_bg',
        'priority'   => 10
	) ) );


	// Nav bg color active
	$wp_customize->add_setting( 'color_nav_bg_active' , array(
    	'transport'   => 'refresh',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'color_nav_bg_active', array(
		'label'        => __( 'Navbar BG Active Color', 'serverus' ),
		'section'    => 'colors_nav',
		'settings'   => 'color_nav_bg_active',
        'priority'   => 11
	) ) );


	// Nav bg color hover
	$wp_customize->add_setting( 'color_nav_bg_hover' , array(
    	'transport'   => 'refresh',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'color_nav_bg_hover', array(
		'label'        => __( 'Navbar BG Hover Color', 'serverus' ),
		'section'    => 'colors_nav',
		'settings'   => 'color_nav_bg_hover',
        'priority'   => 12
	) ) );


	// Nav border color
	$wp_customize->add_setting( 'color_nav_border' , array(
    	'transport'   => 'refresh',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'color_nav_border', array(
		'label'        => __( 'Navbar Border Color', 'serverus' ),
		'section'    => 'colors_nav',
		'settings'   => 'color_nav_border',
        'priority'   => 15
	) ) );


	// Nav Link color
	$wp_customize->add_setting( 'color_nav_link' , array(
    	'transport'   => 'refresh',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'color_nav_link', array(
		'label'        => __( 'Nav Link Color', 'serverus' ),
		'section'    => 'colors_nav',
		'settings'   => 'color_nav_link',
        'priority'   => 20
	) ) );

	// Nav Link hover color
	$wp_customize->add_setting( 'color_nav_link_hover' , array(
    	'transport'   => 'refresh',
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'color_nav_link_hover', array(
		'label'        => __( 'Nav Link Hover/Active Color', 'serverus' ),
		'section'    => 'colors_nav',
		'settings'   => 'color_nav_link_hover',
        'priority'   => 21
	) ) );



	/**
  	 * Color Schemes
 	 */

	// Color Scheme radio buttons
	$wp_customize->add_setting( 'scheme_picker' , array(
		'transport'   => 'refresh',
		'default'	  => 'light-blue',
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 
		'scheme_picker',
        array(
            'label'          => __( 'Choose a base color scheme:', 'serverus' ),
            'section'        => 'color_schemes',
            'settings'       => 'scheme_picker',
            'type'           => 'radio',
            'choices'        => array(
                'light-blue'   => __( 'Default Blue' ),
                'light-brown'  => __( 'Minecraft' ),
                'light-red'  => __( 'Red' ),
                'light-teal'  => __( 'League' ),
                'dark-tan'  => __( 'Diablo (Dark)' ),
                'dark-yellow'  => __( 'Yellow (Dark)' )
            )
        )
    ) );



}
add_action( 'customize_register', 'customize_register' );


function serverus_enqueue_stylesheet() {
	switch ( get_theme_mod('scheme_picker') ) {
		case 'light-blue':
			wp_enqueue_style('roots_main', get_template_directory_uri() . '/assets/css/default.min.css', false);
			break;
		
		case 'light-brown':
			wp_enqueue_style('roots_main', get_template_directory_uri() . '/assets/css/light-brown.min.css', false);
			break;

		case 'light-red':
			wp_enqueue_style('roots_main', get_template_directory_uri() . '/assets/css/light-red.min.css', false);
			break;

		case 'light-teal':
			wp_enqueue_style('roots_main', get_template_directory_uri() . '/assets/css/light-teal.min.css', false);
			break;

		case 'dark-tan':
			wp_enqueue_style('roots_main', get_template_directory_uri() . '/assets/css/dark-tan.min.css', false);
			break;

		case 'dark-yellow':
			wp_enqueue_style('roots_main', get_template_directory_uri() . '/assets/css/dark-yellow.min.css', false);
			break;

		default:
			wp_enqueue_style('roots_main', get_template_directory_uri() . '/assets/css/main.a57a4dc8.min.css', false, null);
			break;
	}

	//
}
add_action( 'wp_enqueue_scripts', 'serverus_enqueue_stylesheet', 99 );
// Custom Login form
add_action( 'login_enqueue_scripts', 'serverus_enqueue_stylesheet', 99 );
?>


<?php 
function serverus_customize_css() {

	if( get_theme_mod('color_brand_primary') ) { ?>

    <style type="text/css">
		.text-primary{color:<?php echo get_theme_mod('color_brand_primary'); ?>}
		.form-control:focus{border-color:<?php echo get_theme_mod('color_brand_primary'); ?>;}
		.btn-primary{background-color:<?php echo get_theme_mod('color_brand_primary'); ?>;}
		.btn-primary.active{background-color:<?php echo get_theme_mod('color_brand_primary'); ?>;}
		.btn-primary:hover,.btn-primary:focus,.btn-primary:active,.btn-primary.active,.open .dropdown-toggle.btn-primary{background-color:<?php echo get_theme_mod('color_brand_complement'); ?>;}
		.btn-primary .badge{color:<?php echo get_theme_mod('color_brand_primary'); ?>;}
		.dropdown-menu>.active>a,.dropdown-menu>.active>a:hover,.dropdown-menu>.active>a:focus{background-color:<?php echo get_theme_mod('color_brand_primary'); ?>}
		.nav-pills>li.active>a,.nav-pills>li.active>a:hover,.nav-pills>li.active>a:focus{background-color:<?php echo get_theme_mod('color_brand_primary'); ?>}
		.navbar-default .navbar-toggle{border-color:<?php echo get_theme_mod('color_brand_primary'); ?>}
		.navbar-default .navbar-toggle:hover,.navbar-default .navbar-toggle:focus{background-color:<?php echo get_theme_mod('color_brand_primary'); ?>}
		.pagination>.active>a,.pagination>.active>span,.pagination>.active>a:hover,.pagination>.active>span:hover,.pagination>.active>a:focus,.pagination>.active>span:focus{background-color:<?php echo get_theme_mod('color_brand_primary'); ?>;border-color:<?php echo get_theme_mod('color_brand_primary'); ?>;}
		.label-primary{background-color:<?php echo get_theme_mod('color_brand_primary'); ?>}
		.progress-bar{background-color:<?php echo get_theme_mod('color_brand_primary'); ?>;}
		a.list-group-item.active,a.list-group-item.active:hover,a.list-group-item.active:focus{background-color:<?php echo get_theme_mod('color_brand_primary'); ?>;border-color:<?php echo get_theme_mod('color_brand_primary'); ?>}
		.panel-primary{border-color:<?php echo get_theme_mod('color_brand_primary'); ?>}
		.panel-primary>.panel-heading{background-color:<?php echo get_theme_mod('color_brand_primary'); ?>;border-color:<?php echo get_theme_mod('color_brand_primary'); ?>}
		.panel-primary>.panel-heading+.panel-collapse .panel-body{border-top-color:<?php echo get_theme_mod('color_brand_primary'); ?>}
		.panel-primary>.panel-footer+.panel-collapse .panel-body{border-bottom-color:<?php echo get_theme_mod('color_brand_primary'); ?>}
		.widget .widget-title{border-left-color:<?php echo get_theme_mod('color_brand_primary'); ?>;}
		.bbp-pagination-links a:hover{border-color:<?php echo get_theme_mod('color_brand_primary'); ?>}
		.bbp-pagination-links span.current{background-color:<?php echo get_theme_mod('color_brand_primary'); ?>;}
		#bbpress-forums li.bbp-header{background-color:<?php echo get_theme_mod('color_brand_primary'); ?>;}
		#bbpress-forums li.bbp-header span#subscription-toggle{color:<?php echo get_theme_mod('color_brand_primary'); ?>}
		#bbpress-forums #new-post .form-group select:focus{border-color:<?php echo get_theme_mod('color_brand_primary'); ?>;}
		#bbpress-forums #new-post textarea:focus{border-color:<?php echo get_theme_mod('color_brand_primary'); ?>;}
		.serverus-login-title{border-bottom-color:<?php echo get_theme_mod('color_brand_primary'); ?>;}
		body.login div#login form#loginform input#user_login:focus,body.login div#login form#loginform input#user_pass:focus,body.login div#login form#registerform input#user_login:focus,body.login div#login form#registerform input#user_email:focus,body.login div#login form#lostpasswordform input#user_login:focus{border-color:<?php echo get_theme_mod('color_brand_primary'); ?>;}
		body.login div#login form#loginform p.submit input#wp-submit,body.login div#login form#registerform p.submit input#wp-submit,body.login div#login form#lostpasswordform p.submit input#wp-submit{background-color:<?php echo get_theme_mod('color_brand_primary'); ?>;}
		body.login div#login form#loginform p.submit input#wp-submit.disabled,body.login div#login form#registerform p.submit input#wp-submit.disabled,body.login div#login form#lostpasswordform p.submit input#wp-submit.disabled,body.login div#login form#loginform p.submit input#wp-submit[disabled],body.login div#login form#registerform p.submit input#wp-submit[disabled],body.login div#login form#lostpasswordform p.submit input#wp-submit[disabled],fieldset[disabled] body.login div#login form#loginform p.submit input#wp-submit,fieldset[disabled] body.login div#login form#registerform p.submit input#wp-submit,fieldset[disabled] body.login div#login form#lostpasswordform p.submit input#wp-submit,body.login div#login form#loginform p.submit input#wp-submit.disabled:hover,body.login div#login form#registerform p.submit input#wp-submit.disabled:hover,body.login div#login form#lostpasswordform p.submit input#wp-submit.disabled:hover,body.login div#login form#loginform p.submit input#wp-submit[disabled]:hover,body.login div#login form#registerform p.submit input#wp-submit[disabled]:hover,body.login div#login form#lostpasswordform p.submit input#wp-submit[disabled]:hover,fieldset[disabled] body.login div#login form#loginform p.submit input#wp-submit:hover,fieldset[disabled] body.login div#login form#registerform p.submit input#wp-submit:hover,fieldset[disabled] body.login div#login form#lostpasswordform p.submit input#wp-submit:hover,body.login div#login form#loginform p.submit input#wp-submit.disabled:focus,body.login div#login form#registerform p.submit input#wp-submit.disabled:focus,body.login div#login form#lostpasswordform p.submit input#wp-submit.disabled:focus,body.login div#login form#loginform p.submit input#wp-submit[disabled]:focus,body.login div#login form#registerform p.submit input#wp-submit[disabled]:focus,body.login div#login form#lostpasswordform p.submit input#wp-submit[disabled]:focus,fieldset[disabled] body.login div#login form#loginform p.submit input#wp-submit:focus,fieldset[disabled] body.login div#login form#registerform p.submit input#wp-submit:focus,fieldset[disabled] body.login div#login form#lostpasswordform p.submit input#wp-submit:focus,body.login div#login form#loginform p.submit input#wp-submit.disabled:active,body.login div#login form#registerform p.submit input#wp-submit.disabled:active,body.login div#login form#lostpasswordform p.submit input#wp-submit.disabled:active,body.login div#login form#loginform p.submit input#wp-submit[disabled]:active,body.login div#login form#registerform p.submit input#wp-submit[disabled]:active,body.login div#login form#lostpasswordform p.submit input#wp-submit[disabled]:active,fieldset[disabled] body.login div#login form#loginform p.submit input#wp-submit:active,fieldset[disabled] body.login div#login form#registerform p.submit input#wp-submit:active,fieldset[disabled] body.login div#login form#lostpasswordform p.submit input#wp-submit:active,body.login div#login form#loginform p.submit input#wp-submit.disabled.active,body.login div#login form#registerform p.submit input#wp-submit.disabled.active,body.login div#login form#lostpasswordform p.submit input#wp-submit.disabled.active,body.login div#login form#loginform p.submit input#wp-submit[disabled].active,body.login div#login form#registerform p.submit input#wp-submit[disabled].active,body.login div#login form#lostpasswordform p.submit input#wp-submit[disabled].active,fieldset[disabled] body.login div#login form#loginform p.submit input#wp-submit.active,fieldset[disabled] body.login div#login form#registerform p.submit input#wp-submit.active,fieldset[disabled] body.login div#login form#lostpasswordform p.submit input#wp-submit.active{background-color:<?php echo get_theme_mod('color_brand_primary'); ?>;}
		body.login div#login form#loginform p.submit input#wp-submit .badge,body.login div#login form#registerform p.submit input#wp-submit .badge,body.login div#login form#lostpasswordform p.submit input#wp-submit .badge{color:<?php echo get_theme_mod('color_brand_primary'); ?>;}
		#bbpress-forums #bbp-your-profile fieldset input:focus,#bbpress-forums #bbp-your-profile fieldset textarea:focus,#bbpress-forums #bbp-your-profile fieldset select:focus{border-color:<?php echo get_theme_mod('color_brand_primary'); ?>;
		#bbpress-forums #bbp-your-profile fieldset.submit button{background-color:<?php echo get_theme_mod('color_brand_primary'); ?>;}
		#bbpress-forums #bbp-your-profile fieldset.submit button.disabled,#bbpress-forums #bbp-your-profile fieldset.submit button[disabled],fieldset[disabled] #bbpress-forums #bbp-your-profile fieldset.submit button,#bbpress-forums #bbp-your-profile fieldset.submit button.disabled:hover,#bbpress-forums #bbp-your-profile fieldset.submit button[disabled]:hover,fieldset[disabled] #bbpress-forums #bbp-your-profile fieldset.submit button:hover,#bbpress-forums #bbp-your-profile fieldset.submit button.disabled:focus,#bbpress-forums #bbp-your-profile fieldset.submit button[disabled]:focus,fieldset[disabled] #bbpress-forums #bbp-your-profile fieldset.submit button:focus,#bbpress-forums #bbp-your-profile fieldset.submit button.disabled:active,#bbpress-forums #bbp-your-profile fieldset.submit button[disabled]:active,fieldset[disabled] #bbpress-forums #bbp-your-profile fieldset.submit button:active,#bbpress-forums #bbp-your-profile fieldset.submit button.disabled.active,#bbpress-forums #bbp-your-profile fieldset.submit button[disabled].active,fieldset[disabled] #bbpress-forums #bbp-your-profile fieldset.submit button.active{background-color:<?php echo get_theme_mod('color_brand_primary'); ?>;}
		#bbpress-forums #bbp-your-profile fieldset.submit button .badge{color:<?php echo get_theme_mod('color_brand_primary'); ?>;}

	</style>
	<?php } ?>

	<?php if( get_theme_mod('color_brand_primary_text') ) {	?>
    <style type="text/css">
		.btn-primary{color:<?php echo get_theme_mod('color_brand_primary_text'); ?>;}
		.btn-primary:hover,.btn-primary:focus,.btn-primary:active,.btn-primary.active,.open .dropdown-toggle.btn-primary{color:<?php echo get_theme_mod('color_brand_primary_text'); ?>;}
		.btn-warning{color:<?php echo get_theme_mod('color_brand_primary_text'); ?>;}
		.btn-warning:hover,.btn-warning:focus,.btn-warning:active,.btn-warning.active,.open .dropdown-toggle.btn-warning{color:<?php echo get_theme_mod('color_brand_primary_text'); ?>;}
		.btn-danger{color:<?php echo get_theme_mod('color_brand_primary_text'); ?>;}
		.btn-danger:hover,.btn-danger:focus,.btn-danger:active,.btn-danger.active,.open .dropdown-toggle.btn-danger{color:<?php echo get_theme_mod('color_brand_primary_text'); ?>;}
		.btn-success{color:<?php echo get_theme_mod('color_brand_primary_text'); ?>;}
		.btn-success:hover,.btn-success:focus,.btn-success:active,.btn-success.active,.open .dropdown-toggle.btn-success{color:<?php echo get_theme_mod('color_brand_primary_text'); ?>;}
		.btn-info{color:<?php echo get_theme_mod('color_brand_primary_text'); ?>;}
		.btn-info:hover,.btn-info:focus,.btn-info:active,.btn-info.active,.open .dropdown-toggle.btn-info{color:<?php echo get_theme_mod('color_brand_primary_text'); ?>;}
		.dropdown-menu>.active>a,.dropdown-menu>.active>a:hover,.dropdown-menu>.active>a:focus{color:<?php echo get_theme_mod('color_brand_primary_text'); ?>;}
		.nav-pills>li.active>a,.nav-pills>li.active>a:hover,.nav-pills>li.active>a:focus{color:<?php echo get_theme_mod('color_brand_primary_text'); ?>;}
		.pagination>.active>a,.pagination>.active>span,.pagination>.active>a:hover,.pagination>.active>span:hover,.pagination>.active>a:focus,.pagination>.active>span:focus{color:<?php echo get_theme_mod('color_brand_primary_text'); ?>;}
		.label{color:<?php echo get_theme_mod('color_brand_primary_text'); ?>;}
		.label[href]:hover,.label[href]:focus{color:<?php echo get_theme_mod('color_brand_primary_text'); ?>;}
		.progress-bar{color:<?php echo get_theme_mod('color_brand_primary_text'); ?>;}
		a.list-group-item.active,a.list-group-item.active:hover,a.list-group-item.active:focus{color:<?php echo get_theme_mod('color_brand_primary_text'); ?>;}
		.panel-primary>.panel-heading{color:<?php echo get_theme_mod('color_brand_primary_text'); ?>;}
		.carousel-control{color:<?php echo get_theme_mod('color_brand_primary_text'); ?>;}
		.carousel-control:hover,.carousel-control:focus{color:<?php echo get_theme_mod('color_brand_primary_text'); ?>;}
		.carousel-caption{color:<?php echo get_theme_mod('color_brand_primary_text'); ?>;}
		.bbp-pagination-links span.current{color:<?php echo get_theme_mod('color_brand_primary_text'); ?>;}
		#bbpress-forums li.bbp-header{color:<?php echo get_theme_mod('color_brand_primary_text'); ?>;}
		body.login div#login form#loginform p.submit input#wp-submit,body.login div#login form#registerform p.submit input#wp-submit,body.login div#login form#lostpasswordform p.submit input#wp-submit{color:<?php echo get_theme_mod('color_brand_primary_text'); ?>;}
		body.login div#login form#loginform p.submit input#wp-submit:hover,body.login div#login form#registerform p.submit input#wp-submit:hover,body.login div#login form#lostpasswordform p.submit input#wp-submit:hover,body.login div#login form#loginform p.submit input#wp-submit:focus,body.login div#login form#registerform p.submit input#wp-submit:focus,body.login div#login form#lostpasswordform p.submit input#wp-submit:focus,body.login div#login form#loginform p.submit input#wp-submit:active,body.login div#login form#registerform p.submit input#wp-submit:active,body.login div#login form#lostpasswordform p.submit input#wp-submit:active,body.login div#login form#loginform p.submit input#wp-submit.active,body.login div#login form#registerform p.submit input#wp-submit.active,body.login div#login form#lostpasswordform p.submit input#wp-submit.active,.open .dropdown-togglebody.login div#login form#loginform p.submit input#wp-submit,.open .dropdown-togglebody.login div#login form#registerform p.submit input#wp-submit,.open .dropdown-togglebody.login div#login form#lostpasswordform p.submit input#wp-submit{color:<?php echo get_theme_mod('color_brand_primary_text'); ?>;}
		#bbpress-forums #bbp-your-profile fieldset.submit button{color:<?php echo get_theme_mod('color_brand_primary_text'); ?>;}
		#bbpress-forums #bbp-your-profile fieldset.submit button:hover,#bbpress-forums #bbp-your-profile fieldset.submit button:focus,#bbpress-forums #bbp-your-profile fieldset.submit button:active,#bbpress-forums #bbp-your-profile fieldset.submit button.active,.open .dropdown-toggle#bbpress-forums #bbp-your-profile fieldset.submit button{color:<?php echo get_theme_mod('color_brand_primary_text'); ?>;}
	</style>
	<?php } ?>


	<?php if( get_theme_mod('color_brand_complement') ) {	?>
    <style type="text/css">

		.widget .widget-title{background-color:<?php echo get_theme_mod('color_brand_complement'); ?>;}
		.serverus-login-title{background-color:<?php echo get_theme_mod('color_brand_complement'); ?>;}
		.serverus-login-wrapper,.serverus-registration-wrapper{-webkit-box-shadow:0 0 6px 1px <?php echo get_theme_mod('color_brand_complement'); ?>;box-shadow:0 0 6px 1px <?php echo get_theme_mod('color_brand_complement'); ?>;}
		body.login div#login form#loginform,body.login div#login form#registerform,body.login div#login form#lostpasswordform{-webkit-box-shadow:0 0 6px 1px <?php echo get_theme_mod('color_brand_complement'); ?>;box-shadow:0 0 6px 1px <?php echo get_theme_mod('color_brand_complement'); ?>;}
		.serverus-ad{-webkit-box-shadow:0 0 6px 1px <?php echo get_theme_mod('color_brand_complement'); ?>;box-shadow:0 0 6px 1px <?php echo get_theme_mod('color_brand_complement'); ?>;}

	</style>
	<?php } ?>


	<?php if( get_theme_mod('color_brand_complement_text') ) {	?>
    <style type="text/css">

		.widget .widget-title{color:<?php echo get_theme_mod('color_brand_complement_text'); ?>;}
		.serverus-login-title{color:<?php echo get_theme_mod('color_brand_complement_text'); ?>;}
	</style>
	<?php } ?>



	<?php if( get_theme_mod('color_link') ) { ?>
        <style type="text/css">

			a{color:<?php echo get_theme_mod('color_link'); ?>;}
			.btn-link{color:<?php echo get_theme_mod('color_link'); ?>;}
			.dropdown-menu>li>a{color:<?php echo get_theme_mod('color_link'); ?>;}
			a:focus{border-color:<?php echo get_theme_mod('color_link'); ?>}
			a.list-group-item.active>.badge,.nav-pills>.active>a>.badge{color:<?php echo get_theme_mod('color_link'); ?>;}
			a.thumbnail:hover,a.thumbnail:focus,a.thumbnail.active{border-color:<?php echo get_theme_mod('color_link'); ?>}
			a.list-group-item{color:<?php echo get_theme_mod('color_link'); ?>}
			.login-register-widget .bbp-logged-in .logout-link{color:<?php echo get_theme_mod('color_link'); ?>;}

		</style>
	<?php } ?>


	<?php if( get_theme_mod('color_link_hover') ) { ?>
        <style type="text/css">

			a:hover,a:focus{color:<?php echo get_theme_mod('color_link_hover'); ?>;}
			.btn-link:hover,.btn-link:focus{color:<?php echo get_theme_mod('color_link_hover'); ?>;}
			.dropdown-menu>li>a:hover,.dropdown-menu>li>a:focus{color:<?php echo get_theme_mod('color_link_hover'); ?>;}
			.nav-tabs>li.active>a,.nav-tabs>li.active>a:hover,.nav-tabs>li.active>a:focus{color:<?php echo get_theme_mod('color_link_hover'); ?>;}
			@media (max-width:767px){body.bbpress nav .menu-forums,body.bbpress nav .menu-forums:hover,body.bbpress nav .menu-forums:focus{color:<?php echo get_theme_mod('color_link_hover'); ?>;}}
			a.list-group-item.active>.badge,.nav-pills>.active>a>.badge{background-color:<?php echo get_theme_mod('color_link_hover'); ?>}
			a.list-group-item .list-group-item-heading{color:<?php echo get_theme_mod('color_link_hover'); ?>}

		</style>
	<?php } ?>

	
	<?php if( get_theme_mod('color_nav_link') ) { ?>
        <style type="text/css">

			.navbar-default .navbar-brand{color:<?php echo get_theme_mod('color_nav_link'); ?>}
			.navbar-default .navbar-nav>li>a{color:<?php echo get_theme_mod('color_nav_link'); ?>}
			@media (max-width:767px){.navbar-default .navbar-nav .open .dropdown-menu>li>a{color:<?php echo get_theme_mod('color_nav_link'); ?>}}
			.navbar-default .navbar-link{color:<?php echo get_theme_mod('color_nav_link'); ?>}	
	
		</style>
	<?php } ?>


	<?php if( get_theme_mod('color_nav_link_hover') ) { ?>
        <style type="text/css">
			body.bbpress nav .menu-forums,body.bbpress nav .menu-forums:hover,body.bbpress nav .menu-forums:focus{color:<?php echo get_theme_mod('color_nav_link_hover'); ?>;}
			.navbar-default .navbar-nav>li>a:hover,.navbar-default .navbar-nav>li>a:focus{color:<?php echo get_theme_mod('color_nav_link_hover'); ?>;}
			.navbar-default .navbar-nav>.active>a,.navbar-default .navbar-nav>.active>a:hover,.navbar-default .navbar-nav>.active>a:focus{color:<?php echo get_theme_mod('color_nav_link_hover'); ?>;}
			.navbar-default .navbar-nav>.open>a,.navbar-default .navbar-nav>.open>a:hover,.navbar-default .navbar-nav>.open>a:focus{color:<?php echo get_theme_mod('color_nav_link_hover'); ?>}
			.navbar-default .navbar-nav .open .dropdown-menu>li>a:hover,.navbar-default .navbar-nav .open .dropdown-menu>li>a:focus{color:<?php echo get_theme_mod('color_nav_link_hover'); ?>;}
			.navbar-default .navbar-nav .open .dropdown-menu>.active>a,.navbar-default .navbar-nav .open .dropdown-menu>.active>a:hover,.navbar-default .navbar-nav .open .dropdown-menu>.active>a:focus{color:<?php echo get_theme_mod('color_nav_link_hover'); ?>;}
			.navbar-default .navbar-link:hover{color:<?php echo get_theme_mod('color_nav_link_hover'); ?>}
	
		</style>
	<?php } ?>



	<?php if( get_theme_mod('color_nav_bg') ) { ?>
	    <style type="text/css">
	
			.navbar-default {background-color: <?php echo get_theme_mod('color_nav_bg'); ?>;}
	
		</style>
	<?php } ?>



	<?php if( get_theme_mod('color_nav_bg_active') ) { ?>
        <style type="text/css">
	
			.navbar-default .navbar-nav>.active>a, .navbar-default .navbar-nav>.active>a:hover, .navbar-default .navbar-nav>.active>a:focus {background-color: <?php echo get_theme_mod('color_nav_bg_active'); ?>;}

		</style>
	<?php } ?>



	<?php if( get_theme_mod('color_nav_border') ) { ?>
        <style type="text/css">
	
			.navbar-default {border-color: <?php echo get_theme_mod('color_nav_border'); ?>;}
			.navbar-default .navbar-collapse, .navbar-default .navbar-form {border-color: <?php echo get_theme_mod('color_nav_border'); ?>;}
	
		</style>
	<?php } ?>


	<?php if( get_theme_mod('color_nav_bg_hover') ) { ?>
        <style type="text/css">
	
			.navbar-default .navbar-nav>li>a:hover, .navbar-default .navbar-nav>li>a:focus {background-color: <?php echo get_theme_mod('color_nav_bg_hover'); ?>;}
	
		</style>
	<?php } ?>


	<?php if( get_theme_mod('color_header_text') ) { ?>
        <style type="text/css">
	
			.header-image .header-image-title-wrapper .header-image-title {color: <?php echo get_theme_mod('color_header_text'); ?>;}
	
		</style>
	<?php } ?>


	<?php if( get_theme_mod('color_header_bg') ) { ?>
        <style type="text/css">
	
			.header-image .header-image-title-wrapper .header-image-title-bg {background-color: <?php echo get_theme_mod('color_header_bg'); ?>;}
	
		</style>
	<?php } ?>


	<?php if( get_theme_mod('color_header_alpha') ) { ?>
        <style type="text/css">
	
			.header-image .header-image-title-wrapper .header-image-title-bg {opacity: <?php echo get_theme_mod('color_header_alpha')/100; ?>;}
	
		</style>
	<?php } ?>


	<?php if( get_theme_mod('header_title_vertical_position') ) { ?>
        <style type="text/css">
	
			.header-image .header-image-title-wrapper .header-image-title {top: <?php echo get_theme_mod('header_title_vertical_position'); ?>px;}
	
		</style>
	<?php } ?>


	<?php if( get_theme_mod('header_title_horizontal_position') ) { ?>
        <style type="text/css">
	
			.header-image .header-image-title-wrapper .header-image-title {left: <?php echo get_theme_mod('header_title_horizontal_position'); ?>px;}
	
		</style>
	<?php } ?>


	<?php if( get_theme_mod('color_bg_serverus') ) { ?>
        <style type="text/css">
			body { 
		   		background-color: <?php echo get_theme_mod('color_bg_serverus'); ?>;
		   	}
		</style>
	<?php } ?>


	<?php if( get_theme_mod('color_text_serverus') ) { ?>
        <style type="text/css">
			body {
  				color: <?php echo get_theme_mod('color_text_serverus'); ?>;
			}
		</style>
	<?php } ?>

<!-- 
	<?php if( get_theme_mod('var_name') ) { ?>
	        <style type="text/css">
	
	
		</style>
	<?php } ?>
 -->

    <?php
}
add_action( 'wp_head', 'serverus_customize_css');
add_action( 'login_enqueue_scripts', 'serverus_customize_css', 99 );
?>


<?php 
/**
 *	General WP changes
 */
 ?>

<?php 
//Login page tweaks
function custom_login_logo_url() {
    return get_bloginfo( 'url' );
}
add_filter( 'login_headerurl', 'custom_login_logo_url' );

function custom_login_logo_url_title() {
    return 'Home';
}
add_filter( 'login_headertitle', 'custom_login_logo_url_title' );
?>

<?php 
// Disable Admin Bar for everyone but administrators
if (!function_exists('disable_admin_bar')) {

	function disable_admin_bar() {
		
		if (bbp_get_user_role( bbp_get_current_user_id() ) != 'bbp_moderator' && bbp_get_user_role( bbp_get_current_user_id() ) != 'bbp_keymaster') {
		
			// for the admin page
			remove_action('admin_footer', 'wp_admin_bar_render', 1000);
			// for the front-end
			remove_action('wp_footer', 'wp_admin_bar_render', 1000);
			
			// css override for the admin page
			function remove_admin_bar_style_backend() { 
				echo '<style>body.admin-bar #wpcontent, body.admin-bar #adminmenu { padding-top: 0px !important; }</style>';
			}	  
			add_filter('admin_head','remove_admin_bar_style_backend');
			
			// css override for the frontend
			function remove_admin_bar_style_frontend() {
				echo '<style type="text/css" media="screen">
				html { margin-top: 0px !important; }
				* html body { margin-top: 0px !important; }
				</style>';
			}
			add_filter('wp_head','remove_admin_bar_style_frontend', 99);
			
		}
  	}
}
add_action('init','disable_admin_bar');



/**
 *	Dashboard Widgets
 */

// Add theme setup walkthrough widget
function serverus_add_dashboard_widgets() {
	add_meta_box('serverus_dashboard_widget_setup', __('Serverus Configuration'), 'serverus_dashboard_widget_setup_function', 'dashboard', 'side', 'high');
}
add_action( 'wp_dashboard_setup', 'serverus_add_dashboard_widgets' );

function serverus_dashboard_widget_setup_function() {
	// Display whatever it is you want to show.
	$output = '';
	$output .= '
<div>
	<p>We assembled some links to get you started:</p>
	<div>
		<div>
			<a class="button button-primary button-hero" href="' . '#' . '">Setup Tutorial</a>
		</div>
		<div>
			<h4>Next Steps</h4>
			<ul>
				<li><a href="http://localhost/wordpress-2/wp-admin/post.php?post=4&amp;action=edit">Edit your front page</a></li>
				<li><a href="http://localhost/wordpress-2/wp-admin/post-new.php?post_type=page">Add additional pages</a></li>
						<li><a href="http://localhost/wordpress-2/">View your site</a></li>
			</ul>
		</div>
		<div>
			<h4>More Actions</h4>
			<ul>
				<li><div class="welcome-icon welcome-widgets-menus">Manage <a href="http://localhost/wordpress-2/wp-admin/widgets.php">widgets</a> or <a href="http://localhost/wordpress-2/wp-admin/nav-menus.php">menus</a></div></li>
						<li><a href="http://localhost/wordpress-2/wp-admin/options-discussion.php" class="welcome-icon welcome-comments">Turn comments on or off</a></li>
				<li><a href="http://codex.wordpress.org/First_Steps_With_WordPress" class="welcome-icon welcome-learn-more">Learn more about getting started</a></li>
				<a class="button button-primary button-hero" href="' . get_admin_url( null, "customize.php" ) . '">Customize</a>

			</ul>
		</div>
	</div>
</div>

	';

	echo $output;
} 


// Remove unused Widgets from the Dashboard
function remove_dashboard_widgets() {
    // Globalize the metaboxes array, this holds all the widgets for wp-admin
    global $wp_meta_boxes;
     

    //Main column (left)
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_activity']);
	unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);

    //Side column (right)
	unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
}
add_action('wp_dashboard_setup', 'remove_dashboard_widgets' );


// Remove unused Widgets from Appearance->Widgets page
function unregister_default_widgets() {
	// WordPress defaults
	unregister_widget('WP_Widget_Pages');
	unregister_widget('WP_Widget_Calendar');
	unregister_widget('WP_Widget_Archives');
	//unregister_widget('WP_Widget_Links');
	unregister_widget('WP_Widget_Meta');
	unregister_widget('WP_Widget_Search');
	// unregister_widget('WP_Widget_Text');
	unregister_widget('WP_Widget_Categories');
	unregister_widget('WP_Widget_Recent_Posts');
	unregister_widget('WP_Widget_Recent_Comments');
	unregister_widget('WP_Widget_RSS');
	unregister_widget('WP_Widget_Tag_Cloud');
	//unregister_widget('WP_Nav_Menu_Widget');

	// bbPress defaults
	unregister_widget('BBP_Login_Widget');
	unregister_widget('BBP_Views_Widget');
	unregister_widget('BBP_Search_Widget');
	unregister_widget('BBP_Topics_Widget');
	unregister_widget('BBP_Replies_Widget');
}
add_action('widgets_init', 'unregister_default_widgets', 11);


// Remove unused Menus from the Wordpress Admin view
function remove_menus(){
  //remove_menu_page( 'index.php' );                  //Dashboard
  remove_menu_page( 'edit.php' );                   //Posts
  //remove_menu_page( 'upload.php' );                 //Media
  //remove_menu_page( 'edit.php?post_type=page' );    //Pages
  remove_menu_page( 'edit-comments.php' );          //Comments
  // remove_menu_page( 'themes.php' );                 //Appearance
  // remove_menu_page( 'plugins.php' );                //Plugins
  // remove_menu_page( 'users.php' );                  //Users
  // remove_menu_page( 'tools.php' );                  //Tools
  // remove_menu_page( 'options-general.php' );        //Settings
}
add_action( 'admin_menu', 'remove_menus' );


//Remove useless links in the Admin Bar/Toolbar
function remove_admin_bar_links( $wp_admin_bar ) {
	$wp_admin_bar->remove_node( 'wp-logo' );
	$wp_admin_bar->remove_node( 'bar-comments' );
	$wp_admin_bar->remove_node( 'new-post' );
}
add_action( 'admin_bar_menu', 'remove_admin_bar_links', 999 );


// Enable Lead Reply
function custom_bbp_show_lead_topic( $show_lead ) {
  $show_lead[] = 'true';
  return $show_lead;
}
add_filter( 'bbp_show_lead_topic', 'custom_bbp_show_lead_topic' );


// Remove WP filter to wrap the_content in <p> tags on home page.
remove_filter('the_content', 'wpautop');



/**
 *	bbPress changes
 */


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

// [srv_frontpage forum_id=0 posts_per_page=5 char_limit=0 /*show_avatar=true*/ show_stickies=false]
class srv_frontpage_class {

	public static $attr = array();
	private $content = '';

	public function __construct( $attr ){
		
		self::$attr = bbp_parse_args( $attr, array(
			'forum_id' 			=> 	'0',
			'posts_per_page'	=> 	'5',
			'char_limit'		=> 	'0',
			'show_avatar'		=> 	true, 
			'show_stickies'		=> 	false,
		) );

		if( self::$attr['show_avatar'] == 'false' ) {
			self::$attr['show_avatar'] = false;
		} else {
			self::$attr['show_avatar'] = true;
		}


		if( self::$attr['show_stickies'] == 'true' ){
			self::$attr['show_stickies'] = true;
		} else {
			self::$attr['show_stickies'] = false;
		}

	}

	private static function srv_unset_globals() { //TODO can cull some of this?
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
	private static function srv_start( $query_name = '' ) {

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
	private static function srv_end() {

		// Unset globals
		self::srv_unset_globals();

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
	
	public function srv_get_content(){
		// Sanity check required info
		if ( !empty( $this->content ) || ( empty( self::$attr['forum_id'] ) || !is_numeric( self::$attr['forum_id'] ) ) )
			return $this->content;


		// Set passed attribute to $forum_id for clarity
		$forum_id = bbpress()->current_forum_id = self::$attr['forum_id'];

		// Bail if ID passed is not a forum
		if ( !bbp_is_forum( $forum_id ) )
			return $this->content;

		// Start output buffer
		self::srv_start( 'bbp_single_forum' );

		echo "<div id='bbpress-forums' class='srv-front-page'>";

		?>
		<div id="frontpage-ad-sidebar">
			<?php
			if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('frontpage-ad-sidebar') ) :
			endif; ?>
		</div>
		<?php

		// Check forum caps
		if ( bbp_user_can_view_forum( array( 'forum_id' => $forum_id ) ) ) {

			// Copied template part here to apply arguments from shortcode into bbp_has_topics query
			//bbp_get_template_part( 'content',  'frontpage' );

			if ( post_password_required() ) : 
				bbp_get_template_part( 'form', 'protected' );

			else : 

				if ( bbp_has_topics( array(
					'post_type'      => bbp_get_topic_post_type(), // Narrow query down to bbPress topics
					'post_parent'    => $forum_id,	       // Forum ID
					'meta_key'       => '_bbp_last_active_time',   // Make sure topic has some last activity time
					'orderby'        => 'date',              	   // 'meta_value', 'author', 'date', 'title', 'modified', 'parent', rand',
					'order'          => 'DESC',                    // 'ASC', 'DESC'
					'posts_per_page' => self::$attr['posts_per_page'],   // Topics per page
					'paged'          => bbp_get_paged(),           // Page Number
					's'              => $default_topic_search,     // Topic Search
					'show_stickies'  => self::$attr['show_stickies'],    // Ignore sticky topics?
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

		echo "</div>";

		// Return contents of output buffer
		return self::srv_end();	
	}
}


function srv_frontpage_func( $attr ){
	$frontpage = new srv_frontpage_class( $attr );
	return $frontpage->srv_get_content();
}
add_shortcode( 'srv_frontpage', 'srv_frontpage_func' );
