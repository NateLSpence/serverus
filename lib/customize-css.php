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

			body.bbpress nav li.menu-forums a,body.bbpress nav .menu-forums:hover,body.bbpress nav .menu-forums:focus{color:<?php echo get_theme_mod('color_nav_link_hover'); ?>}
			@media (max-width:767px){body.bbpress nav li.menu-forums a,body.bbpress nav .menu-forums:hover,body.bbpress nav .menu-forums:focus{color:<?php echo get_theme_mod('color_nav_link_hover'); ?>}}
	
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

		body.bbpress nav .menu-forums{background-color:<?php echo get_theme_mod('color_nav_bg_active'); ?>}
		@media (max-width:767px){body.bbpress nav .menu-forums{background-color:<?php echo get_theme_mod('color_nav_bg_active'); ?>}}

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

			body.bbpress nav .menu-forums:hover,body.bbpress nav .menu-forums:focus{background-color:<?php echo get_theme_mod('color_nav_bg_hover'); ?>}
			@media (max-width:767px){body.bbpress nav .menu-forums:hover,body.bbpress nav .menu-forums:focus{background-color:<?php echo get_theme_mod('color_nav_bg_hover'); ?>}}
	
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
