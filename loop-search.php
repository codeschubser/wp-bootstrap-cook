<?php
/**
 * The template for displaying search results pages.
 *
 * @package WordPress
 * @subpackage WP_Bootstrap_Cook
 * @since WP Bootstrap Cook 1.0
 */
get_header();
if (have_posts()) :
    $search = new WP_Query("s=$s&showposts=-1");
    wp_reset_query();
    ?>
    <section id="content" class="col-xs-12 col-sm-8 col-md-8 col-lg-9">
        <header class="page-header">
            <h2 class="page-title"><?php
                printf(
                    _n(
                        sprintf(__('Search for "%1$s" returned one result', 'wpbscook'), esc_html($s, 1)),
            sprintf(__('Search for "%1$s" returned %2$s results', 'wpbscook'), esc_html($s, 1),
                $search->post_count), $search->post_count, 'wpbscook'
                    )
                );
                ?></h2>
        </header><!-- .page-header -->
                <?php while (have_posts()) : the_post(); ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?>>
                    <?php if (has_post_thumbnail()) : ?>
                    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" rel="bookmark">
                    <?php
                    the_post_thumbnail('thumbnail',
                        array(
                        'class' => 'alignleft img-responsive img-thumbnail',
                        'alt' => get_post_meta(get_post_thumbnail_id($post->ID),
                            '_wp_attachment_image_alt', true)
                        )
                    );
                    ?>
                    </a>
                    <?php endif; ?>
                <header class="entry-header">
                <?php
                the_title(sprintf('<h3 class="entry-title text-left"><a href="%s" rel="bookmark">',
                        esc_url(get_permalink())), '</a></h3>');
                ?>
                </header>
                <section class="entry-content"><?php the_excerpt(); ?></section>

            </article>
    <?php endwhile; ?>
            <?php get_template_part('pagination'); ?>
        </section>
    <?php
else :
    get_template_part('content', 'none');
endif;
get_sidebar();
get_footer();
