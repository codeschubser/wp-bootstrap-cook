<?php
/**
 * WP Bootstrap Cook back compat functionality
 *
 * Prevents WP Bootstrap Cook from running on WordPress versions prior to 4.1,
 * since this theme is not meant to be backward compatible beyond that and
 * relies on many newer functions and markup changes introduced in 4.1.
 *
 * @package WordPress
 * @subpackage WP_Bootstrap_Cook
 * @since WP Bootstrap Cook 1.0
 */

/**
 * Prevent switching to WP Bootstrap Cook on old versions of WordPress.
 *
 * Switches to the default theme.
 *
 * @since WP Bootstrap Cook 1.0
 */
function wpbscook_switch_theme()
{
    switch_theme(WP_DEFAULT_THEME, WP_DEFAULT_THEME);
    unset($_GET['activated']);
    add_action('admin_notices', 'wpbscook_upgrade_notice');
}

add_action('after_switch_theme', 'wpbscook_switch_theme');

/**
 * Add message for unsuccessful theme switch.
 *
 * Prints an update nag after an unsuccessful attempt to switch to
 * WP Bootstrap Cook on WordPress versions prior to 4.1.
 *
 * @since WP Bootstrap Cook 1.0
 */
function wpbscook_upgrade_notice()
{
    $message = sprintf(__('WP Bootstrap Cook requires at least WordPress version 4.1. You are running version %s. Please upgrade and try again.',
            'wpbscook'), $GLOBALS['wp_version']);
    printf('<div class="error"><p>%s</p></div>', $message);
}

/**
 * Prevent the Customizer from being loaded on WordPress versions prior to 4.1.
 *
 * @since WP Bootstrap Cook 1.0
 */
function wpbscook_customize()
{
    wp_die(sprintf(__('WP Bootstrap Cook requires at least WordPress version 4.1. You are running version %s. Please upgrade and try again.',
                'wpbscook'), $GLOBALS['wp_version']), '', array(
        'back_link' => true,
    ));
}

add_action('load-customize.php', 'wpbscook_customize');

/**
 * Prevent the Theme Preview from being loaded on WordPress versions prior to 4.1.
 *
 * @since WP Bootstrap Cook 1.0
 */
function wpbscook_preview()
{
    if (isset($_GET['preview'])) {
        wp_die(sprintf(__('WP Bootstrap Cook requires at least WordPress version 4.1. You are running version %s. Please upgrade and try again.',
                    'wpbscook'), $GLOBALS['wp_version']));
    }
}

add_action('template_redirect', 'wpbscook_preview');
