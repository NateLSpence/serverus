<footer class="content-info container" role="contentinfo">
  <div class="row">
    <div class="col-lg-12">
      <?php dynamic_sidebar('sidebar-footer'); ?>
      <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. <a href="#"><!-- TODO -->Serverus</a>.</p>
    </div>
  </div>
</footer>

<?php wp_footer(); ?>
