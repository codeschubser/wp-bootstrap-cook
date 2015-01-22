<?php
/**
 * The template for displaying comments
 *
 * The area of the page that contains both current comments
 * and the comment form.
 *
 * @package WordPress
 * @subpackage WP_Bootstrap_Cook
 * @since WP Bootstrap Cook 1.0
 */
if (have_comments()) :
    ?>
        <h5 class="comments-title page-header"><?php
        printf(_nx('One thought on &ldquo;%2$s&rdquo;', '%1$s thoughts on &ldquo;%2$s&rdquo;',
                get_comments_number(), 'comments title', 'wpbscook'),
            number_format_i18n(get_comments_number()), get_the_title());
        ?></h5>
        <ul class="media-list comment-list"><?php wp_list_comments('type=comment&callback=wpbscook_comments') ?></ul>
    <hr>
    <?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : ?>
        <nav class="navigation comment-navigation" role="navigation">
            <h6 class="screen-reader-text"><?php _e('Comment navigation', 'wpbscook'); ?></h6>
            <div class="nav-links">
                <?php
                if ($prev_link = get_previous_comments_link(__('Older Comments', 'wpbscook'))) :
                    printf('<div class="nav-previous">%s</div>', $prev_link);
                endif;

                if ($next_link = get_next_comments_link(__('Newer Comments', 'wpbscook'))) :
                    printf('<div class="nav-next">%s</div>', $next_link);
                endif;
                ?>
            </div><!-- .nav-links -->
        </nav><!-- .comment-navigation -->
        <?php
    endif;
endif;
comment_form();
