<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "site-content" div and all content after.
 *
 * @package WordPress
 * @subpackage WP_Bootstrap_Cook
 * @since WP Bootstrap Cook 1.0
 */
?>
            </div><!-- /.row -->
        </main><!-- /.container -->

        <footer id="footer" class="hidden-print">
            <div class="container">
                <div class="row">
<?php
if (is_active_sidebar('footer-sidebar-1')) {
    dynamic_sidebar('footer-sidebar-1');
}
if (is_active_sidebar('footer-sidebar-2')) {
    dynamic_sidebar('footer-sidebar-2');
}
if (is_active_sidebar('footer-sidebar-3')) {
    dynamic_sidebar('footer-sidebar-3');
}
?>
                </div><!-- /.row -->
                <div class="row">
                    <?php
                    if (is_active_sidebar('footer-left-bottom')) {
                        dynamic_sidebar('footer-left-bottom');
                    }
                    if (is_active_sidebar('footer-right-bottom')) {
                        dynamic_sidebar('footer-right-bottom');
                    }
                    ?>
                </div><!-- /.row -->
            </div><!-- /.container -->
        </footer><!-- /footer -->
<?php wp_footer(); ?>
    </body>
</html>