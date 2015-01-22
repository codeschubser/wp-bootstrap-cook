<?php
get_header();
if (have_posts()) :
    while (have_posts()) : the_post();
?>
                <section id="content" class="col-xs-12 col-sm-8 col-md-8 col-lg-9">
                    <header class="page-header">
                        <h2 class="page-title"><?php the_title(); ?></h2>
                    </header><!-- .page-header -->
                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>><?php the_content(); ?></article>
                </section>
<?php
    endwhile;
else :
    get_template_part('404');
endif;
get_sidebar();
get_footer();
