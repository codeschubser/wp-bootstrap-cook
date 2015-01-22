<?php
$url = rawurlencode(get_the_permalink());
$title = esc_html(get_the_title());
$thumb = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
$excerpt = esc_html(get_the_excerpt());
?>
<ul class="list-inline social-navigation pull-left hidden-xs hidden-sm">
    <li><?php _e('Share on:', 'wpbscook'); ?></li>
    <li>
        <a href="javascript:window.open('https://www.facebook.com/sharer/sharer.php?u=<?php echo $url; ?>','facebook_share','height=320,width=640,toolbar=no,menubar=no,scrollbars=no,resizable=no,location=no,directories=no,status=no');" title="<?php printf(__('Share %s on facebook',
        'wpbscook'), $title); ?>">
            <span class="fa fa-facebook-square fa-fw"></span>
        </a>
    </li>
    <li>
        <a href="javascript:window.open('https://plus.google.com/share?url=<?php echo $url; ?>', 'google_plus_share', 'height=320,width=640,toolbar=no,menubar=no,scrollbars=no,resizable=no,location=no,directories=no,status=no');" title="<?php printf(__('Share %s on google plus',
                'wpbscook'), $title); ?>">
            <span class="fa fa-google-plus-square fa-fw"></span>
        </a>
    </li>
    <li>
        <a href="javascript:window.open('https://twitter.com/home?status=<?php echo $title; ?>:%20<?php echo $url; ?>', 'twitter_share', 'height=320,width=640,toolbar=no,menubar=no,scrollbars=no,resizable=no,location=no,directories=no,status=no');" title="<?php printf(__('Share %s on twitter',
                'wpbscook'), $title); ?>">
            <span class="fa fa-twitter-square fa-fw"></span>
        </a>
    </li>
    <li>
        <a href="javascript:window.open('https://pinterest.com/pin/create/button/?url=<?php echo $url; ?>&media=<?php echo $thumb; ?>&description=<?php echo $excerpt; ?>', 'pinterest_share', 'height=320,width=640,toolbar=no,menubar=no,scrollbars=no,resizable=no,location=no,directories=no,status=no');" title="<?php printf(__('Share %s on pinterest',
                'wpbscook'), $title); ?>">
            <span class="fa fa-pinterest-square fa-fw"></span>
        </a>
    </li>
    <li>
        <a href="javascript:window.open('https://www.xing.com/app/user?op=share;url=<?php echo $url; ?>;title=<?php echo $title; ?>;provider=<?php echo urlencode(get_bloginfo('name')); ?>', 'xing_share', 'height=320,width=640,toolbar=no,menubar=no,scrollbars=no,resizable=no,location=no,directories=no,status=no');" title="<?php printf(__('Share %s on xing',
                'wpbscook'), $title); ?>">
            <span class="fa fa-xing-square fa-fw"></span>
        </a>
    </li>
    <li>
        <a href="javascript:window.open('https://www.linkedin.com/shareArticle?mini=true&url=<?php echo $url; ?>&title=<?php echo $title; ?>&summary=<?php echo esc_html_e(get_the_excerpt()); ?>', 'linkedin_share', 'height=320,width=640,toolbar=no,menubar=no,scrollbars=no,resizable=no,location=no,directories=no,status=no');" title="<?php printf(__('Share %s on linkedin',
                'wpbscook'), $title); ?>">
            <span class="fa fa-linkedin-square fa-fw"></span>
        </a>
    </li>
</ul>