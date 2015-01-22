<?php
/**
 * WP Bootstrap Cook widgets
 *
 * Override standard widgets from WordPress
 *
 * @package WordPress
 * @subpackage WP_Bootstrap_Cook
 * @since WP Bootstrap Cook 1.0
 */

if (!class_exists('WP_Cook_Widget_Search')) {
    /**
     * Override search widget
     *
     * @since WP Bootstrap Cook 1.0
     */
    class WP_Cook_Widget_Search extends WP_Widget_Search
    {
        public function widget($args, $instance)
        {
            /** This filter is documented in wp-includes/default-widgets.php */
            $title = apply_filters('widget_title',
                empty($instance['title']) ? '' : $instance['title'], $instance, $this->id_base);

            if ($title) {
                echo $args['before_title'] . $title . $args['after_title'];
            }

            // Use current theme search form if it exists
            get_search_form();
        }
    }
}

if (!function_exists('wpbscook_modify_widget_search')) {
    /**
     * Register the overridden search widget
     *
     * @since WP Bootstrap Cook 1.0
     */
    function wpbscook_modify_widget_search()
    {
        register_widget('WP_Cook_Widget_Search');
    }
} // wpbscook_modify_widget_search
add_action('widgets_init', 'wpbscook_modify_widget_search');

if (!class_exists('WP_Cook_Widget_Pages')) {
    /**
     * Override pages widget
     *
     * @since WP Bootstrap Cook 1.0
     */
    class WP_Cook_Widget_Pages extends WP_Widget_Pages
    {
        public function widget($args, $instance)
        {
            /**
             * Filter the widget title.
             *
             * @since 2.6.0
             *
             * @param string $title    The widget title. Default 'Pages'.
             * @param array  $instance An array of the widget's settings.
             * @param mixed  $id_base  The widget ID.
             */
            $title = apply_filters('widget_title',
                empty($instance['title']) ? __('Pages', 'wpbscook') : $instance['title'], $instance,
                $this->id_base);

            $sortby = empty($instance['sortby']) ? 'menu_order' : $instance['sortby'];
            $exclude = empty($instance['exclude']) ? '' : $instance['exclude'];

            if ($sortby == 'menu_order')
                $sortby = 'menu_order, post_title';

            /**
             * Filter the arguments for the Pages widget.
             *
             * @since 2.8.0
             *
             * @see wp_list_pages()
             *
             * @param array $args An array of arguments to retrieve the pages list.
             */
            $out = wp_list_pages(apply_filters('widget_pages_args',
                    array('title_li' => '', 'echo' => 0, 'sort_column' => $sortby, 'exclude' => $exclude
                )));

            if (!empty($out)) {
                echo $args['before_widget'];
                if ($title) {
                    echo $args['before_title'] . $title . $args['after_title'];
                }
                ?>
                                <ul class="list-group">
                    <?php echo $out; ?>
                		</ul>
                <?php
                echo $args['after_widget'];
            }
        }
    }
}

if (!function_exists('wpbscook_modify_widget_pages')) {
    /**
     * Register the overridden search widget
     *
     * @since WP Bootstrap Cook 1.0
     */
    function wpbscook_modify_widget_pages()
    {
        register_widget('WP_Cook_Widget_Pages');
    }
} // wpbscook_modify_widget_pages
add_action('widgets_init', 'wpbscook_modify_widget_pages');

if (!function_exists('wpbscook_modify_widget_pages_list')) {
    /**
     * Add a class to list elements and relation to links.
     *
     * @since WP Bootstrap Cook 1.0
     *
     * @param string $list
     * @return string
     */
    function wpbscook_modify_widget_pages_list($list)
    {
        $list = str_replace('<li class="page_item', '<li class="page_item list-group-item', $list);
        $list = str_replace('<a ', '<a rel="bookmark" ', $list);

        return $list;
    }
} // wpbscook_modify_widget_pages_list
add_filter('wp_list_pages', 'wpbscook_modify_widget_pages_list');

if (!class_exists('WP_Cook_Widget_Tag_Cloud')) {

    /**
     * Override tag cloud widget
     *
     * @since WP Bootstrap Cook 1.0
     */
    class WP_Cook_Widget_Tag_Cloud extends WP_Widget_Tag_Cloud
    {
        public function widget($args, $instance)
        {
            $current_taxonomy = $this->_get_current_taxonomy($instance);
            if (!empty($instance['title'])) {
                $title = $instance['title'];
            } else {
                if ('post_tag' == $current_taxonomy) {
                    $title = __('Tags', 'wpbscook');
                } else {
                    $tax = get_taxonomy($current_taxonomy);
                    $title = $tax->labels->name;
                }
            }

            /** This filter is documented in wp-includes/default-widgets.php */
            $title = apply_filters('widget_title', $title, $instance, $this->id_base);

            echo $args['before_widget'];
            if ($title) {
                echo $args['before_title'] . $title . $args['after_title'];
            }
            echo '<div class="tagcloud">';

            /**
             * Filter the taxonomy used in the Tag Cloud widget.
             *
             * @since 2.8.0
             * @since 3.0.0 Added taxonomy drop-down.
             *
             * @see wp_tag_cloud()
             *
             * @param array $current_taxonomy The taxonomy to use in the tag cloud. Default 'tags'.
             */
            $items = wp_tag_cloud(apply_filters('widget_tag_cloud_args',
                    array('taxonomy' => $current_taxonomy, 'format' => 'array')));
            if (!empty($items)) {
                echo '<div class="panel-body"><ul class="list-inline">';
                for ($i = 0; $i < count($items); $i++) {
                    echo '<li>' . $items[$i] . '</li>';
                }
                echo '</ul></div>';
            }

            echo "</div>\n";
            echo $args['after_widget'];
        }
    }
}

if (!function_exists('wpbscook_modify_widget_tag_cloud')) {
    /**
     * Register the overridden tag cloud widget
     *
     * @since WP Bootstrap Cook 1.0
     */
    function wpbscook_modify_widget_tag_cloud()
    {
        register_widget('WP_Cook_Widget_Tag_Cloud');
    }
} // wpbscook_modify_widget_tag_cloud
add_action('widgets_init', 'wpbscook_modify_widget_tag_cloud');

if (!function_exists('wpbscook_modify_widget_tag_cloud_list')) {

    /**
     * Add a class to list elements and relation to links.
     *
     * @since WP Bootstrap Cook 1.0
     *
     * @param string $item
     * @return string
     */
    function wpbscook_modify_widget_tag_cloud_list($item)
    {        
        return str_replace('<a ', '<a rel="tag" ', $item);
    }

} // wpbscook_modify_widget_tag_cloud_list
add_filter('wp_tag_cloud', 'wpbscook_modify_widget_tag_cloud_list');
