<?php
/**
 * The template for displaying search form.
 *
 * @package WordPress
 * @subpackage WP_Bootstrap_Cook
 * @since WP Bootstrap Cook 1.0
 */
?>

<form action="<?php echo home_url('/'); ?>" method="get" class="search-form" role="search">
    <div class="form-group">
        <label for="query" class="sr-only"><?php _e('Search', 'wpbscook') ?></label>
        <div class="input-group">
            <input 
                id="query"
                type="text"
                name="s"
                value="<?php echo get_search_query() ?>"
                class="form-control"
                placeholder="<?php _e('Search', 'wpbscook') ?>">
            <span class="input-group-btn">
                <button type="submit" class="btn btn-default">
                    <span class="fa fa-search fa-fw"></span>
                </button>
            </span>
        </div>
    </div>
</form><!-- /.form-horizontal -->