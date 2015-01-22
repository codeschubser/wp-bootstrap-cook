<?php
/**
 * The sidebar containing the main widget area
 *
 * @package WordPress
 * @subpackage WP_Bootstrap_Cook
 * @since WP Bootstrap Cook 1.0
 */
?>
<aside id="sidebar" class="col-xs-12 col-sm-4 col-md-4 col-lg-3 hidden-print" role="complementary">
<?php if (is_active_sidebar('sidebar-1')) {
    dynamic_sidebar('sidebar-1');
} ?>
</aside><!-- /#sidebar -->