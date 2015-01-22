<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage WP_Bootstrap_Cook
 * @since WP Bootstrap Cook 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <script>(function(){document.documentElement.className='js'})();</script>
        <?php if (is_single()) : ?>
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
        <?php endif; ?>
        <?php wp_head(); ?>
    </head>

    <body <?php body_class(); ?>>
        <header id="header" class="hidden-print" role="banner">
            <nav class="navbar navbar-default navbar-static-top" role="navigation">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-brand-centered">
                            <span class="sr-only"><?php _e('Toggle navigation', 'wpbscook'); ?></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a href="<?php echo esc_url(home_url('/')); ?>" title="<?php bloginfo('name'); ?>" class="navbar-brand navbar-brand-centered" rel="home">
                            <img src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="<?php bloginfo('name'); ?>" class="hidden-xs hidden-sm img-circle img-thumbnail">
                            <span class="visible-xs"><?php bloginfo('name'); ?></span>
                            <h1 class="text-hide"><?php bloginfo('name'); ?></h1>
                        </a>
                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="navbar-brand-centered">
<?php
                        wp_nav_menu(
                            array(
                                'theme_location' => 'main-left',
                                'menu' => 'main-left',
                                'menu_class' => 'nav navbar-nav',
                                'container' => false,
                                'fallback_cb' => false
                            )
                        );

                        wp_nav_menu(
                            array(
                                'theme_location' => 'main-right',
                                'menu' => 'main-right',
                                'menu_class' => 'nav navbar-nav navbar-right',
                                'container' => false,
                                'fallback_cb' => false
                            )
                        );
?>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container -->
            </nav><!-- /nav -->
        </header><!-- /header -->

        <main class="container" role="main">
            <div class="row">
