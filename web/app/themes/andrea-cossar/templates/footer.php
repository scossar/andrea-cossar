<?php
use Testeleven\PositionedContent\TemplateTags;

?>

<footer class="content-info" role="contentinfo">
  <div class="container">
    <div class="row">
      <div class="footer-1">
        <?php TemplateTags\post_in_position('footer-who', 'positioned_full', 3); ?>
      </div>
      <div class="footer-2">
        <?php TemplateTags\post_in_position('footer-where', 'positioned_full', 3); ?>
      </div>
      <div class="footer-3">
        <?php TemplateTags\post_in_position('footer-site-info', 'positioned_full', 3); ?>
        <?php if (has_nav_menu('footer_navigation')) : ?>
          <?php wp_nav_menu(['theme_location' => 'footer_navigation']); ?>
        <?php endif; ?>
      </div>
      <div class="footer-4">
        <?php dynamic_sidebar('sidebar-footer'); ?>
      </div>
      <div class="testeleven">
        &copy; 2014-<?php echo date("Y"); ?> testeleven web development
      </div>
    </div>
  </div>
</footer>