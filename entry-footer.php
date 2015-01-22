<?php
$tags = get_the_term_list($post->ID, 'post_tag', '', ', ', '');
$cats = get_the_category_list(_x(', ', 'Used between list items, there is a space after the comma.',
        'wpbscook'));
if (is_single()) :
    get_template_part('social-share');
endif;
?>
<footer class="entry-footer hidden-xs hidden-sm text-right">
    <ul class="list-inline">
        <li><span class="fa fa-calendar fa-fw"></span> <time class="post-date updated"><?php echo get_the_date(); ?></time></li>
        <li><span class="fa fa-comments fa-fw"></span> <?php
            printf('<a href="%1$s" title="%2$s" class="hidden-print" rel="alternate">%3$s</a>',
                get_comments_link($post->ID),
                sprintf(_n('One comment', '%s comments', wp_count_comments($post->ID)->approved,
                        'wpbscook'), wp_count_comments($post->ID)->approved),
                sprintf(_n('One comment', '%s comments', wp_count_comments($post->ID)->approved,
                        'wpbscook'), wp_count_comments($post->ID)->approved)
            );
            ?></li>
        <li><span class="fa fa-edit fa-fw"></span> <?php echo $cats; ?></li>
        <?php if (false !== $tags && !is_single()) : ?>
            <li><span class="fa fa-tags fa-fw"></span> <?php echo $tags; ?></li>
        <?php endif; ?>
        <li class="vcard author post-author hidden"><span class="fn"><?php the_author(); ?></span></li>
    </ul>
    <!-- article meta -->
    <meta itemprop="image" content="<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>">
    <meta itemprop="datePublished" content="<?php the_date(); ?>">
    <meta itemprop="url" content="<?php the_permalink(); ?>">
    <meta itemprop="keywords" content="<?php echo implode(', ',
        get_tags(array('fields' => 'names'))); ?>">
    <meta itemprop="inLanguage" content="<?php bloginfo('language'); ?>">
    <meta itemprop="publisher" content="<?php bloginfo('name'); ?>">
    <meta itemprop="thumbnailUrl" content="<?php echo wp_get_attachment_thumb_url(get_post_thumbnail_id($post->ID)); ?>">
    <?php
    if (get_post_type() === 'post') :
        ?>
        <meta itemprop="wordCount" content="<?php echo wpbscook_word_count(); ?>">
        <?php
    endif;
    ?>
    <meta itemprop="discussionUrl" content="<?php comments_link(); ?>">
</footer><!-- .entry-footer -->