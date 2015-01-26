<?php
if (have_posts()) :
    while (have_posts()) : the_post();
        ?>
            <section id="content" class="col-xs-12 col-sm-8 col-md-8 col-lg-9">
                <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> itemscope itemtype="http://schema.org/BlogPosting">
                            <header class="entry-header">
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="visible-xs">
                                <?php
                                the_post_thumbnail('large',
                                    array(
                                    'class' => 'img-responsive img-thumbnail post-thumbnail',
                                    'alt' => get_post_meta(get_post_thumbnail_id($post->ID),
                                        '_wp_attachment_image_alt', true)
                                    )
                                );
                                ?>
                            </div>
                            <div class="visible-sm">
                                <?php
                                the_post_thumbnail('feature-image-sm',
                                    array(
                                    'class' => 'img-responsive img-thumbnail post-thumbnail',
                                    'alt' => get_post_meta(get_post_thumbnail_id($post->ID),
                                        '_wp_attachment_image_alt', true)
                                    )
                                );
                                ?>
                            </div>
                            <div class="visible-md">
                                <?php
                                the_post_thumbnail('feature-image-md',
                                    array(
                                    'class' => 'img-responsive img-thumbnail post-thumbnail',
                                    'alt' => get_post_meta(get_post_thumbnail_id($post->ID),
                                        '_wp_attachment_image_alt', true)
                                    )
                                );
                                ?>
                            </div>
                            <div class="visible-lg">
                                <?php
                                the_post_thumbnail('feature-image-lg',
                                    array(
                                    'class' => 'img-responsive img-thumbnail post-thumbnail',
                                    'alt' => get_post_meta(get_post_thumbnail_id($post->ID),
                                        '_wp_attachment_image_alt', true)
                                    )
                                );
                                ?>
                                                    </div>
                                        <?php
                                        if (get_comments_number()) :
                                            ?>
                                            <div class="comment-count pull-right hidden-print">
                                                <?php
                                                printf('<a href="%1$s" title="%2$s" class="hidden-print"><span class="fa fa-comments fa-fw"></span></a>',
                                                    get_comments_link($post->ID),
                                                    sprintf(_n('One comment', '%s comments',
                                                            wp_count_comments($post->ID)->approved,
                                                            'wpbscook'),
                                                        wp_count_comments($post->ID)->approved)
                                                );
                                                ?>
                                            </div>
                                            <?php endif;
                                        ?>
        <?php endif; ?>
                        <div class="entry-actions pull-right hidden-xs hidden-print">
                            <a href="javascript:window.print()" title="<?php
                    echo sprintf(__('Print: %s', 'wpbscook'), esc_attr(get_the_title()));
                    ?>">
                                <span class="fa fa-print fa-2x fa-fw"></span>
                            </a>
                        </div>
                        <h2 class="entry-title" itemprop="headline"><?php the_title(); ?></h2>
                    </header><!-- /.entry-header -->

                    <section class="entry-content"><?php
                        the_content();

                        wp_link_pages(array(
                            'before' => '<div class="page-links"><span class="page-links-title">' . __('Pages:',
                                'wpbscook') . '</span>',
                            'after' => '</div>',
                            'link_before' => '<span>',
                            'link_after' => '</span>',
                            'pagelink' => '<span class="screen-reader-text">' . __('Page',
                                'wpbscook') . ' </span>%',
                            'separator' => '<span class="screen-reader-text">, </span>',
                        ));
                        ?>
                                    </section><hr>
                            <?php get_template_part('entry-footer'); ?>
                </article>
                        <?php if (comments_open() || get_comments_number()) : ?>
                <div id="comments" class="comments-area hidden-print clearfix"><?php comments_template(); ?></div>
                        <?php endif; ?>
            </section>
        <?php
    endwhile;
else :
    get_template_part('content', 'none');
endif;