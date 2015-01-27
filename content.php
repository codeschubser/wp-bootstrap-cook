<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <?php
        the_title(sprintf('<h2 class="entry-title text-left"><a href="%s" rel="bookmark">',
                esc_url(get_permalink())), '</a></h2>');
        ?>
    </header><!-- /.entry-header -->

    <section class="entry-content">
        <?php the_excerpt(); ?>
    </section><!-- /.entry-content -->
    <?php get_template_part('entry-footer'); ?>
</article>