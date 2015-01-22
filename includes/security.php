<?php
/**
 * WP Bootstrap Cook security functionality
 *
 * Prevents WP Bootstrap Cook from knowned security reasons.
 *
 * @package WordPress
 * @subpackage WP_Bootstrap_Cook
 * @since WP Bootstrap Cook 1.0
 */

if (!function_exists('wpbscook_clean_header')) {
    /**
     * Remove various content from header
     *
     * @since WP Bootstrap Cook 1.0
     */
    function wpbscook_clean_header()
    {
        // remove generator and version from head
        remove_action('wp_head', 'wp_generator');
        // remove windows live writer
        remove_action('wp_head', 'wlwmanifest_link');
    }
} // wpbscook_clean_header
add_action('after_setup_theme', 'wpbscook_clean_header');

if (!function_exists('wpbscook_remove_version_from_rss')) {
    /**
     * Remove the WordPress version number from rss feed
     *
     * @since WP Bootstrap Cook 1.0
     */
    function wpbscook_remove_version_from_rss()
    {
        return '';
    }
} // wpbscook_remove_version_from_rss
add_filter('the_generator', 'wpbscook_remove_version_from_rss');

if (!function_exists('wpbscook_remove_version_from_scripts')) {

    /**
     * Remove WordPress version number from styles and scripts
     *
     * @since WP Bootstrap Cook 1.0
     *
     * @global string $wp_version
     * @param string $source
     * @return string
     */
    function wpbscook_remove_version_from_scripts($source)
    {
        global $wp_version;
        $query = null;
        parse_str(parse_url($source, PHP_URL_QUERY), $query);
        if (!empty($query['ver']) && $query['ver'] === $wp_version) {
            $source = remove_query_arg('ver', $source);
        }
        return $source;
    }
} // wpbscook_remove_version_from_scripts
add_filter('style_loader_src', 'wpbscook_remove_version_from_scripts');
add_filter('script_loader_src', 'wpbscook_remove_version_from_scripts');

if (!function_exists('wpbscook_remove_readme_files')) {
    /**
     * Delete readme file in WordPress directory
     *
     * @since WP Bootstrap Cook 1.0
     */
    function wpbscook_remove_readme_files()
    {
        if (file_exists(ABSPATH . '/readme.html')) {
            @unlink(ABSPATH . '/readme.html');
        }
        if (file_exists(ABSPATH . '/liesmich.html')) {
            @unlink(ABSPATH . '/liesmich.html');
        }
    }
} // wpbscook_remove_readme_files
add_action('after_setup_theme', 'wpbscook_remove_readme_files');
