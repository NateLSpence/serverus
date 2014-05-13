<div id="login-sidebar">
	<?php
	if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('sidebar-login') ) {


    // Default to login widget
		the_widget( 'Serverus_Login_Widget', array(
			'name' => __('Login Location', 'serverus'),
		    'id' => 'sidebar-login',
		    'description' => 'Leave this blank.',
		), array(   
			'before_widget' => '<div class="login-register-widget">',
		    'after_widget' => '</div>',
		    'before_title' => '',
		    'after_title' => ''));
	} 
	?>
</div>