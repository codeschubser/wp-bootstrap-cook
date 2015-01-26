<?php
if (have_posts()) :
    $cuisine = get_the_term_list($post->ID, 'cuisine', '', ', ', '');
    $cats = get_the_term_list($post->ID, 'post_tag', '', ', ', '');
    $ingredients = get_the_term_list($post->ID, 'ingredient', '', ', ', '');
    while (have_posts()) : the_post();
        ?>
        <section id="content" class="col-xs-12 col-sm-8 col-md-8 col-lg-9">
            <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> itemscope itemtype="http://schema.org/Recipe">
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
                                            wp_count_comments($post->ID)->approved, 'wpbscook'),
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
                                    <h2 class="entry-title" itemprop="name"><?php the_title(); ?></h2>
                        </header><!-- /.entry-header -->

                        <section class="entry-meta pull-right col-xs-12 col-sm-6 col-md-5 col-lg-4">
                                    <meta itemprop="ingredients" content="<?php echo strip_tags($ingredients); ?>">
                                    <ul class="list-inline">
                                <li>
                                                    <meta itemprop="prepTime" content="<?php echo wprr_convert_times(get_post_meta($post->ID,
                'wprr_prep_time', true));
        ?>">
                                            <span class="fa fa-clock-o fa-fw"></span>
                                                    <?php _e('Prep time:',
                                                        'wpbscook');
        ?> <?php echo get_post_meta($post->ID, 'wprr_prep_time', true); ?>
                                                </li>
                                                <li>
                                                                    <meta itemprop="cookTime" content="<?php echo wprr_convert_times(get_post_meta($post->ID,
                                                    'wprr_cook_time', true));
                                                    ?>">
                                                            <span class="fa fa-clock-o fa-fw"></span>
                                                    <?php _e('Cook time:',
                                                        'wpbscook');
        ?> <?php echo get_post_meta($post->ID, 'wprr_cook_time', true); ?>
                                                                </li>
                                                <li>
                                                    <meta itemprop="totalTime" content="<?php
                                                                  echo wprr_convert_times(get_post_meta($post->ID,
                                                                          'wprr_total_time', true));
                                                                    ?>">
                                                            <span class="fa fa-clock-o fa-fw"></span>
                                                    <?php _e('Total time:',
                                                        'wpbscook');
        ?> <?php echo get_post_meta($post->ID, 'wprr_total_time', true); ?>
                                                                </li>
                    </ul>
                    <ul class="list-inline">
                                        <li>
                                                            <span class="fa fa-pie-chart fa-fw"></span>
                                                    <?php _e('Yield:',
                                        'wpbscook');
        ?> <span itemprop="recipeYield"><?php echo get_post_meta($post->ID, 'wprr_yield', true); ?></span>
                                        </li>
                                                <li>
                                                    <span class="fa fa-globe fa-fw"></span>
                                                            <?php _e('Cuisine:',
                                                'wpbscook');
                                            ?> <span itemprop="recipeCuisine"><?php echo $cuisine; ?></span>
                                                </li>
                                                        <li>
                                                            <span class="fa fa-file fa-fw"></span>
                                                                    <?php
                                                    _e('Category:', 'wpbscook');
                                                    ?> <span itemprop="recipeCategory"><?php echo $cats; ?></span>
                                                                </li>
                            </ul>
                                        </section>

                        <section class="entry-content clearfix"><?php
                                    the_content();

                    wp_link_pages(array(
                    'before' => '<div class="page-links"><span class="page-links-title">' . __('Pages:',
                        'wpbscook') . '</span>',
                    'after' => '</div>',
                    'link_before' => '<span>',
                    'link_after' => '</span>',
                    'pagelink' => '<span class="screen-reader-text">' . __('Page', 'wpbscook') . ' </span>%',
                    'separator' => '<span class="screen-reader-text">, </span>',
                ));
                    ?>
                </section>
                                        <section class="entry-tags hidden-print"><small><?php
                                        printf(__('Ingredients: %s', 'wpbscook'), $ingredients);
                                        ?></small></section>
        <?php get_template_part('entry-footer'); ?>
            </article>
                <?php if (comments_open() || get_comments_number()) : ?>
                <div id="comments" class="comments-area hidden-print"><?php comments_template(); ?></div>
            <?php endif; ?>
        </section>
            <?php
        endwhile;
    else :
        get_template_part('content', 'none');
endif;