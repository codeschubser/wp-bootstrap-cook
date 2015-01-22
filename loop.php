<?php
if (have_posts()) :
    while (have_posts()) : the_post();
        get_template_part('content', get_post_format());
    endwhile;
    get_template_part('pagination');
else :
    get_template_part('content', 'none');
endif;