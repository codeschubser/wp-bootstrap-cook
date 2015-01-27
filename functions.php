<?php
/**
 * WP Bootstrap Cook functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @link https://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * {@link https://codex.wordpress.org/Plugin_API}
 *
 * @package WordPress
 * @subpackage WP_Bootstrap_Cook
 * @since WP Bootstrap Cook 1.0
 */
/**
 * Security
 *
 * @since WP Bootstrap Cook 1.0
 * @deprecated since version 1.4
 */
#require get_template_directory() . '/includes/security.php';

/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * @since WP Bootstrap Cook 1.0
 */
if (!isset($content_width)) {
    $content_width = 848;
}

/**
 * WP Bootstrap Cook only works in WordPress 4.1 or later.
 */
if (version_compare($GLOBALS['wp_version'], '4.1-alpha', '<')) {
    require get_template_directory() . '/includes/back-compat.php';
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 *
 * @since WP Bootstrap Cook 1.0
 * @deprecated since version 1.4
 */
function wpbscook_setup()
{
    /**
     * Make theme available for translation.
     * Translations can be filed in the /languages/ directory.
     * If you're building a theme based on wpbscook, use a find and replace
     * to change 'wpbscook' to the name of your theme in all the template files
     */
    load_theme_textdomain('wpbscook', get_template_directory() . '/languages');

    // Add default posts and comments RSS feed links to head.
    add_theme_support('automatic-feed-links');

    /**
     * Let WordPress manage the document title.
     * By adding theme support, we declare that this theme does not use a
     * hard-coded <title> tag in the document head, and expect WordPress to
     * provide it for us.
     */
    add_theme_support('title-tag');

    /**
     * Enable support for Post Thumbnails on posts and pages.
     *
     * See: https://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
     */
    add_theme_support('post-thumbnails');
    // featured image large devices
    add_image_size('feature-image-lg', 848, 219, true);
    // featured image medium devices
    add_image_size('feature-image-md', 617, 192, true);
    // featured image medium devices
    add_image_size('feature-image-sm', 470, 152, true);

    // This theme uses wp_nav_menu() in two locations.
    register_nav_menus(array(
        'main-left' => __('Primary left menu', 'wpbscook'),
        'main-right' => __('primary right menu', 'wpbscook'),
    ));

    /**
     * Switch default core markup for search form, comment form, and comments
     * to output valid HTML5.
     */
    add_theme_support('html5',
        array(
        'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
    ));

    /**
     * Enable support for Post Formats.
     *
     * See: https://codex.wordpress.org/Post_Formats
     */
    add_theme_support('post-formats',
        array('gallery', 'status'));

    // Setup the WordPress core custom background feature.
    add_theme_support('custom-background');

    // Setup the WordPress core custom header image feature.
    add_theme_support('custom-header', array('width' => 130, 'height' => 130));

    // Setup the WordPress core custom editor styles.
    add_editor_style();
}
#add_action('after_setup_theme', 'wpbscook_setup');

/**
 * Make theme available for translation.
 * Translations can be filed in the /languages/ directory.
 * If you're building a theme based on wpbscook, use a find and replace
 * to change 'wpbscook' to the name of your theme in all the template files.
 * 
 * @since WP Bootstrap Cook 1.0
 */
function wpbscook_load_textdomain()
{
    load_theme_textdomain('wpbscook', get_template_directory() . '/languages');
}
add_action('after_setup_theme', 'wpbscook_load_textdomain');

/**
 * Add default posts and comments RSS feed links to head.
 * 
 * @since WP Bootstrap Cook 1.4
 */
function wpbscook_add_automatic_feed_links()
{
    add_theme_support('automatic-feed-links');
}
add_action('after_setup_theme', 'wpbscook_add_automatic_feed_links');

/**
 * Let WordPress manage the document title.
 * By adding theme support, we declare that this theme does not use a
 * hard-coded <title> tag in the document head, and expect WordPress to
 * provide it for us.
 *
 * @since WP Bootstrap Cook 1.4
 */
function wpbscook_add_theme_support()
{
    add_theme_support('title-tag');
    /**
     * Enable support for Post Formats.
     *
     * See: https://codex.wordpress.org/Post_Formats
     */
    add_theme_support('post-formats', array('gallery', 'status'));

    // Setup the WordPress core custom background feature.
    add_theme_support('custom-background');

    // Setup the WordPress core custom header image feature.
    add_theme_support('custom-header', array('width' => 130, 'height' => 130));
}
add_action('after_setup_theme', 'wpbscook_add_theme_support');

/**
 * Enable support for Post Thumbnails on posts and pages.
 *
 * @since WP Bootstrap Cook 1.4
 *
 * See: https://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
 */
function wpbscook_add_thumbnail_support()
{
    add_theme_support('post-thumbnails');
    // featured image large devices
    add_image_size('feature-image-lg', 848, 219, true);
    // featured image medium devices
    add_image_size('feature-image-md', 617, 192, true);
    // featured image medium devices
    add_image_size('feature-image-sm', 470, 152, true);
}
add_action('after_setup_theme', 'wpbscook_add_thumbnail_support');

/**
 * This theme uses wp_nav_menu() in two locations.
 *
 * @since WP Bootstrap Cook 1.4
 */
function wpbscook_register_menus()
{
    register_nav_menus(array(
        'main-left' => __('Primary left menu', 'wpbscook'),
        'main-right' => __('primary right menu', 'wpbscook'),
    ));
}
add_action('after_setup_theme', 'wpbscook_register_menus');

/**
 * Switch default core markup for search form, comment form, and comments
 * to output valid HTML5.
 *
 * @since WP Bootstrap Cook 1.4
 */
function wpbscook_add_html5_theme_support()
{
    add_theme_support('html5',
        array(
        'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
    ));
}
add_action('after_setup_theme', 'wpbscook_add_html5_theme_support');

/**
 * Setup the WordPress core custom editor styles.
 *
 * @since WP Bootstrap Cook 1.4
 */
function wpbscook_add_editor_style()
{
    add_editor_style();
}
add_action('after_setup_theme', 'wpbscook_add_editor_style');

/**
 * Register widget area.
 *
 * @since WP Bootstrap Cook 1.0
 *
 * @link https://codex.wordpress.org/Function_Reference/register_sidebar
 */
function wpbscook_widgets_init()
{
    // General sidebar
    register_sidebar(array(
        'name' => __('Sidebar', 'wpbscook'),
        'id' => 'sidebar-1',
        'description' => __('Add widgets here to appear in your sidebar.', 'wpbscook'),
        'before_widget' => '<div class="panel panel-default">',
        'after_widget' => '</div>',
        'before_title' => '<h5 class="panel-heading widget-title">',
        'after_title' => '</h5>',
    ));
    // Footer sidebars
    register_sidebar(array(
        'name' => __('Left footer sidebar', 'wpbscook'),
        'id' => 'footer-sidebar-1',
        'description' => __('Add widgets here to appear in your left footer sidebar.', 'wpbscook'),
        'before_widget' => '<div id="footer-sidebar-1" class="col-xs-12 col-sm-4 col-md-3 col-lg-3 widget %2$s" role="complementary">',
        'after_widget' => '</div>',
        'before_title' => '<h6 class="text-center widget-title">',
        'after_title' => '</h6>',
    ));
    register_sidebar(array(
        'name' => __('Middle footer sidebar', 'wpbscook'),
        'id' => 'footer-sidebar-2',
        'description' => __('Add widgets here to appear in your middle footer sidebar.', 'wpbscook'),
        'before_widget' => '<div id="footer-sidebar-2" class="col-xs-12 col-sm-4 col-md-6 col-lg-6 widget %2$s" role="complementary">',
        'after_widget' => '</div>',
        'before_title' => '<h6 class="text-center widget-title">',
        'after_title' => '</h6>',
    ));
    register_sidebar(array(
        'name' => __('Right footer sidebar', 'wpbscook'),
        'id' => 'footer-sidebar-3',
        'description' => __('Add widgets here to appear in your right footer sidebar.', 'wpbscook'),
        'before_widget' => '<div id="footer-sidebar-3" class="col-xs-12 col-sm-4 col-md-3 col-lg-3 widget %2$s" role="complementary">',
        'after_widget' => '</div>',
        'before_title' => '<h6 class="text-center widget-title">',
        'after_title' => '</h6>',
    ));
    register_sidebar(array(
        'name' => __('Left bottom sidebar', 'wpbscook'),
        'id' => 'footer-left-bottom',
        'description' => __('Add widgets here to appear in your left copyright footer sidebar.',
            'wpbscook'),
        'before_widget' => '<div id="footer-left-bottom" class="copyright col-xs-12 col-md-6 text-left widget %2$s" role="complementary">',
        'after_widget' => '</div>',
        'before_title' => '',
        'after_title' => '',
    ));
    register_sidebar(array(
        'name' => __('Right bottom sidebar', 'wpbscook'),
        'id' => 'footer-right-bottom',
        'description' => __('Add widgets here to appear in your right copyright footer sidebar.',
            'wpbscook'),
        'before_widget' => '<div id="footer-right-bottom" class="subnav col-xs-12 col-md-6 text-center widget %2$s" role="complementary">',
        'after_widget' => '</div>',
        'before_title' => '',
        'after_title' => '',
    ));
}
add_action('widgets_init', 'wpbscook_widgets_init');

/**
 * Register stylesheets.
 * 
 * @since WP Bootstrap Cook 1.4
 */
function wpbscook_register_styles()
{
    if (!is_admin()) {
        // Bootstrap stylesheet
        wp_register_style('wpbscook_bootstrap',
            get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), '3.3.2');
        // Font awesome stylesheet
        wp_register_style('wpbscook_fontawesome',
            get_template_directory_uri() . '/assets/css/font-awesome.min.css', array(), '4.3.0');
        // Google font great vibes stylesheet
        wp_register_style('wpbscook_greatvibes', '//fonts.googleapis.com/css?family=Great+Vibes',
            array(), null);
        // Main stylesheet
        wp_register_style('wpbscook_style', get_stylesheet_uri(),
            array('wpbscook_bootstrap', 'wpbscook_fontawesome', 'wpbscook_greatvibes'), null);
    }
}
add_action('wp_loaded', 'wpbscook_register_styles');

/**
 * Register javascripts.
 *
 * @since WP Bootstrap Cook 1.4
 */
function wpbscook_register_scripts()
{
    if (!is_admin()) {
        // TODO: move jquery to footer

        // bootstrap script
        wp_register_script('wpbscook_bootstrap_script',
                get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), '3.3.2',
            true);
    }
}
add_action('wp_loaded', 'wpbscook_register_scripts');

/**
 * Enqueue stylesheets and scripts.
 *
 * @since WP Bootstrap Cook 1.4
 */
function wpbscook_enqueue_scripts()
{
    if (!is_admin()) {
        // Stylesheets
        wp_enqueue_style('wpbscook_bootstrap');
        wp_enqueue_style('wpbscook_fontawesome');
        wp_enqueue_style('wpbscook_greatvibes');
        wp_enqueue_style('wpbscook_style');

        // Scripts
        wp_enqueue_script('jquery');
        wp_enqueue_script('wpbscook_bootstrap_script');

        // Comments script
        if (is_singular() && comments_open() && get_option('thread_comments')) {
            wp_enqueue_script('comment-reply');
        }
    }
}
add_action('wp_enqueue_scripts', 'wpbscook_enqueue_scripts');

/**
 * Enqueue scripts and styles.
 *
 * @since WP Bootstrap Cook 1.0
 * @deprecated since version 1.4
 */
function wpbscook_scripts()
{
    /**
     * Stylesheets
     */
    if (!is_admin()) {
        // Bootstrap stylesheet
        wp_register_style('wpbscook_bootstrap',
            get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), '3.3.2');
        // Font awesome stylesheet
        wp_register_style('wpbscook_fontawesome',
            get_template_directory_uri() . '/assets/css/font-awesome.min.css', array(), '4.2.0');
        // Google font great vibes stylesheet
        wp_register_style('wpbscook_greatvibes', '//fonts.googleapis.com/css?family=Great+Vibes',
            array(), null);
        // Main stylesheet
        wp_register_style('wpbscook_style', get_stylesheet_uri(),
            array('wpbscook_bootstrap', 'wpbscook_fontawesome', 'wpbscook_greatvibes'), null);

        wp_enqueue_style('wpbscook_bootstrap');
        wp_enqueue_style('wpbscook_fontawesome');
        wp_enqueue_style('wpbscook_greatvibes');
        wp_enqueue_style('wpbscook_style');
    }

    /**
     * Javascripts
     */
    if (!is_admin()) {
        // TODO: move jquery to footer
        wp_deregister_script('jquery');
        wp_enqueue_script('jquery', ("/wp-includes/js/jquery/jquery.js"), false, '1.11.1', true);
        // bootstrap script
        wp_register_script('wpbscook_bootstrap_script',
                get_template_directory_uri() . '/assets/js/bootstrap.min.js', array('jquery'), '3.3.2',
            true);

        wp_enqueue_style('wpbscook_bootstrap_script');

        // Comments script
        if (is_singular() && comments_open() && get_option('thread_comments')) {
            wp_enqueue_script('comment-reply');
        }
    }
}
#add_action('wp_enqueue_scripts', 'wpbscook_scripts');

/**
 * Redirect attachment to parent post.
 *
 * @since WP Bootstrap Cook 1.0
 *
 * @global type $post
 */
function wpbscook_attachment_redirect()
{
    global $post;
    if (is_attachment() AND isset($post->post_parent) AND is_numeric($post->post_parent)) {
        wp_redirect(get_permalink($post->post_parent), 301);
        #var_dump(get_permalink($post->post_parent));
        exit();
    }
}
add_action('template_redirect', 'wpbscook_attachment_redirect', 1);

function wpbscook_comments($comment, $args, $depth)
{
    $GLOBALS['comment'] = $comment;

    echo '<li id="comment-' . get_comment_ID() . '" class="media" itemtype="http://schema.org/Comment" itemscope="itemscope" itemprop="comment">';
    echo '    <a class="media-left" href="' . htmlspecialchars(get_comment_link($comment->comment_ID)) . '">';
    if ($args['avatar_size'] != 0) {
        echo get_avatar($comment, 64);
    }
    echo '    </a>';
    echo '    <div class="media-body">';
    echo '        <p>';
    echo '            <small>';
    printf(__('<span itemprop="author">%1$s</span>: <time itemprop="dateCreated" datetime="%4$s">%2$s at %3$s</time>',
            'wpbscook'), get_comment_author(), get_comment_date(), get_comment_time(),
        get_comment_date('c'));
    echo '            </small>';
    echo '        </p>';
    echo '        <div itemprop="text">';
    echo comment_text();
    echo '        </div>';
    echo '        <div class="reply">';
    comment_reply_link(array_merge($args,
            array('depth' => $depth, 'max_depth' => (int)$args['max_depth'])));
    echo '        </div>';
    echo '    </div>';
    echo '</li>';
}

/**
 * Count words in post content.
 *
 * @since WP Bootstrap Cook 1.0
 *
 * @global object $post
 * @return integer
 */
function wpbscook_word_count()
{
    global $post;
    $content = get_post_field('post_content', $post->ID);
    $word_count = str_word_count(strip_tags($content));
    return $word_count;
}

/**
 * Format the comment form fields.
 *
 * @since WP Bootstrap Cook 1.0
 *
 * @param array $fields
 * @return string
 */
function wpbscook_modify_comment_form($fields)
{
    $commenter = wp_get_current_commenter();

    $req = get_option('require_name_email');
    $aria_req = ( $req ? " aria-required='true'" : '' );
    $html5 = current_theme_supports('html5', 'comment-form') ? 1 : 0;

    $fields = array(
        'author' => '<div class="form-group comment-form-author">' . '<label for="author">' . __('Name',
            'wpbscook') . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
        '<input class="form-control" id="author" name="author" type="text" value="' . esc_attr($commenter['comment_author']) . '" size="30"' . $aria_req . ' /></div>',
        'email' => '<div class="form-group comment-form-email"><label for="email">' . __('Email',
            'wpbscook') . ( $req ? ' <span class="required">*</span>' : '' ) . '</label> ' .
        '<input class="form-control" id="email" name="email" ' . ( $html5 ? 'type="email"' : 'type="text"' ) . ' value="' . esc_attr($commenter['comment_author_email']) . '" size="30"' . $aria_req . ' /></div>',
        'url' => '<div class="form-group comment-form-url"><label for="url">' . __('Website',
            'wpbscook') . '</label> ' .
        '<input class="form-control" id="url" name="url" ' . ( $html5 ? 'type="url"' : 'type="text"' ) . ' value="' . esc_attr($commenter['comment_author_url']) . '" size="30" /></div>',
    );

    return $fields;
}
add_filter('comment_form_default_fields', 'wpbscook_modify_comment_form');

/**
 * Format the comment form textarea.
 *
 * @since WP Bootstrap Cook 1.0
 *
 * @param array $args
 * @return string
 */
function wpbscook_modify_comment_textarea($args)
{
    $args['comment_field'] = '<div class="form-group comment-form-comment">
        <label for="comment">' . __('Comment', 'wpbscook') . '</label>
        <textarea class="form-control" id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea>
    </div>';
    return $args;
}
add_filter('comment_form_defaults', 'wpbscook_modify_comment_textarea');

/**
 * Add a bootstrap styled submit button.
 * (default button hided with css)
 *
 * @since WP Bootstrap Cook 1.0
 */
function wpbscook_modify_comment_submit()
{
    echo '<button id="submit-comment" class="btn btn-default" type="submit">' . __('Post a comment',
        'wpbscook') . '</button>';
}
add_action('comment_form', 'wpbscook_modify_comment_submit');

/**
 * Highlight the search query in excerpt.
 *
 * @since WP Bootstrap Cook 1.0
 *
 * @param string $text
 * @return string
 */
function wpbscook_highlight_search_results($text)
{
    if (is_search()) {
        $query = get_query_var('s');
        $keys = explode(' ', $query);
        $text = preg_replace('/(' . implode('|', $keys) . ')/iu',
            '<strong class="search-excerpt">' . $query . '</strong>', $text);
    }

    return $text;
}
add_filter('the_excerpt', 'wpbscook_highlight_search_results');

/**
 * Add additional classes to all pictures.
 *
 * @since WP Bootstrap Cook 1.0
 *
 * @param string $html
 * @return string
 */
function wpbscook_add_image_class($html)
{
    $classes = 'img-responsive img-thumbnail'; // separated by spaces, e.g. 'img image-link'
    // check if there are already classes assigned to the anchor
    if (preg_match('/img.*? class=".*?"/', $html)) {
        $html = preg_replace('/(<img.*? class=".*?)(".*?>)/', '$1 ' . $classes . '$2', $html);
    } else {
        $html = preg_replace('/(<img.*?)>/', '$1 class="' . $classes . '" >', $html);
    }

    return $html;
}
add_filter('image_send_to_editor', 'wpbscook_add_image_class', 10, 8);

/**
 * Add text to admin footer.
 *
 * @since WP Bootstrap Cook 1.0
 *
 * @param string $text
 * @return string
 */
function wpbscook_add_admin_footer_text($text)
{
    return $text . ' | <em>Powered by WP Bootstrap Cook Theme</em>';
}
add_filter('admin_footer_text', 'wpbscook_add_admin_footer_text');

/**
 * Modify standard widgets
 *
 * @since WP Bootstrap Cook 1.0
 */
require get_template_directory() . '/includes/widgets.php';
