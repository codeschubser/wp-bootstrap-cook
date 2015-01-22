<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package WordPress
 * @subpackage WP_Bootstrap_Cook
 * @since WP Bootstrap Cook 1.0
 */
get_header();
?>
<section id="content" class="col-xs-12 col-sm-8 col-md-8 col-lg-9">
    <header class="page-header">
        <h2 class="page-title"><?php _e("We're sorry...", 'wpbscook'); ?></h2>
    </header><!-- .page-header -->
    <p><?php _e('The page you are looking for cannot be found.', 'wpbscook'); ?></p>
    <p><?php
        printf('<a href="%1$s">%2$s</a>', esc_url(home_url('/')),
            __('Return to the homepage', 'wpbscook'))
        ?></p>
</section>
<?php
get_sidebar();
get_footer();
