<?php
if (!is_paged()) :
    $featured_posts = array();
if (have_posts()) :
    while (have_posts()) : the_post();
        if (has_post_thumbnail()) :
            $args = array(
                'class' => 'img-responsive img-thumbnail',
                'alt' => get_post_meta(get_post_thumbnail_id($post->ID), '_wp_attachment_image_alt',
                    true)
            );
            $featured_posts[] = array(
                'img' => get_the_post_thumbnail($post->ID, 'feature-image-lg', $args),
                'link' => get_the_permalink(),
                'title' => get_the_title(),
                'link' => get_the_permalink()
            );
        endif;
    endwhile;
endif;
if (!empty($featured_posts)) :
?>
<div id="last-posts" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <!--<ol class="carousel-indicators">
        <?php for ($i = 0; $i < count($featured_posts); $i++) : ?>
        <li data-target="#last-posts" data-slide-to="<?php echo $i; ?>"<?php if ($i === 0) echo ' class="active"'; ?>></li>
        <?php endfor; ?>
    </ol>-->

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
            <?php for ($i = 0; $i < count($featured_posts); $i++) : ?>
                <?php if (!empty($featured_posts[$i]['img'])) : ?>
                    <div class="item<?php if ($i === 0) echo ' active'; ?>">
            <?php echo $featured_posts[$i]['img']; ?>
            <div class="carousel-caption visible-lg">
                <a href="<?php echo $featured_posts[$i]['link']; ?>" title="<?php echo $featured_posts[$i]['title']; ?>">
                    <h3><?php echo $featured_posts[$i]['title']; ?></h3>
                </a>
            </div>
                                </div>
                <?php endif; ?>
            <?php endfor; ?>
    </div>

    <!-- Controls -->
            <a class="left carousel-control" href="#last-posts" role="button" data-slide="prev">
            <span class="fa fa-chevron-left fa-fw" aria-hidden="true"></span>
        <span class="sr-only"><?php _e('Previous', 'wpbscook') ?></span>
    </a>
    <a class="right carousel-control" href="#last-posts" role="button" data-slide="next">
        <span class="fa fa-chevron-right fa-fw" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
        </a>
        </div>
    <hr />
    <?php
    endif;
endif;