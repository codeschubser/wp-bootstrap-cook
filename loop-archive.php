<?php
if (have_posts()) :
    while (have_posts()) : the_post();
        ?>
        <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?>>
            <?php if (has_post_thumbnail()) : ?>
                                <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" rel="bookmark">
            <?php
            the_post_thumbnail('thumbnail',
                array(
                'class' => 'alignleft img-responsive img-thumbnail',
                'alt' => get_post_meta(get_post_thumbnail_id($post->ID), '_wp_attachment_image_alt',
                    true)
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
                <?php
    endwhile;
    get_template_part('pagination');
else :
    get_template_part('content', 'none');
endif;