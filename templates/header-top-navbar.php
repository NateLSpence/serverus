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



<div class="header-image"><div class="container">

  <?php if( get_theme_mod('toggle_header_text') ) { ?>
    <a href="<?php echo home_url(); ?>/" class="header-image-title-wrapper"><h1 class="header-image-title" ><?php bloginfo('name'); ?><div class="header-image-title-bg"></div></h1></a>
  <?php } ?>

</div></div>