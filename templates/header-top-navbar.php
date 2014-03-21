<header class="banner navbar navbar-default navbar-static-top" role="banner">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <!-- <a class="navbar-brand" href="<?php echo home_url(); ?>/"><?php bloginfo('name'); ?></a> -->
    </div>

    <nav class="collapse navbar-collapse" role="navigation">
      <?php
        if (has_nav_menu('primary_navigation')) :
          wp_nav_menu(array('theme_location' => 'primary_navigation', 'menu_class' => 'nav navbar-nav'));
        endif;
      ?>

      <div class="pull-right">
        <?php include roots_sidebar_login_path(); ?>
      </div>

    </nav>

  </div>
</header>



<!-- <img src="<?php header_image(); ?>" height="" width="<?php echo get_custom_header()->width; ?>" alt="" /> -->


<div class="header-image"><div class="container"><a href="<?php echo home_url(); ?>/"><h1 class="header-image-title" >HELLO2</h1></a></div></div>