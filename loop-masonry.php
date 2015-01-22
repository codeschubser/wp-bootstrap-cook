<?php
 if (have_posts()) : ?>
    <section id="content" class="col-xs-12">
        <header class="page-header">
                    <h2 class="page-title"><?php _e('Category:', 'wpbscook'); ?> <?php single_cat_title(); ?></h2>
            </header><!-- .page-header -->
        <div class="row masonry">
        <?php while (have_posts()) : the_post(); ?>
            <div class="cell col-xs-12 col-sm-6 col-md-3 col-lg-3">
                        <div class="img-thumbnail text-center">
                                            <a href="<?php the_permalink() ?>" title="<?php the_title(); ?>" rel="bookmark">
                                        <?php
            the_post_thumbnail('medium',
                array(
                'class' => 'aligncenter img-responsive',
                'alt' => get_post_meta(get_post_thumbnail_id($post->ID), '_wp_attachment_image_alt',
                    true)
                )
            );
            ?>
                                        </a>
            <?php
            the_title(sprintf('<h3><a href="%s" title="%s" rel="bookmark">',
                    esc_url(get_permalink()),
                    sprintf(__('Permalink: %s', 'wpbscook'), get_the_title())), '</a></h3>');
            ?>
            <?php the_excerpt(); ?>
                                <ul class="list-inline">
                                                    <li><?php printf('<small><span class="fa fa-calendar-o fa-fw"></span> %s</small>',
            get_the_date());
            ?>
                                            </li>
                                        </ul>
                            </div>
                </div>
            <?php
    endwhile;
        ?>
        </div>
    </section>
    <?php
else :
    get_template_part('content', 'none');
    get_sidebar();
endif;
?>
</div>