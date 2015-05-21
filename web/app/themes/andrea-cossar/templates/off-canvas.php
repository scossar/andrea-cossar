<div class="off-canvas-wrapper">
  <div class="off-canvas">
    <?php
    if (has_nav_menu('off_canvas_navigation')) :
      wp_nav_menu([
        'theme_location' => 'off_canvas_navigation',
        'menu_class' => 'off-canvas-menu'
      ]);
    endif;
    ?>
  </div>
</div>