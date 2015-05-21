<header class="banner" role="banner">
  <div class="container">
    <div class="row">
      <div class="nav-container-secondary hidden-xs">
        <nav class="secondary-navigation">
          <?php get_template_part('templates/secondary-menu'); ?>
        </nav>
      </div>
      <div class="banner-top-level">
        <a href="<?php echo esc_url(home_url('/')); ?>">
          <img
            src="<?php echo get_template_directory_uri(); ?>/assets/images/acg-logo.png"
            alt="Andrea Cossar Gallery"/>
        </a>
        <button type="button" class="navbar-toggle">
          Menu
        </button>
      </div>
      <div class="nav-container-primary hidden-xs">
        <nav class="primary-navigation" role="navigation">
          <?php
          if (has_nav_menu('primary_navigation')) :
            wp_nav_menu([
              'theme_location' => 'primary_navigation',
              'menu_class'     => 'nav navbar-nav'
            ]);
          endif;
          ?>
        </nav>
      </div>
    </div>
  </div>
</header>
