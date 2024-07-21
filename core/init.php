<?php

if (!function_exists('ophim_theme_setup')) {
    function ophim_theme_setup()
    {

        /*
         * Tự chèn RSS Feed links trong <head>
         */
        add_theme_support('automatic-feed-links');
        /*
         * Thêm chức năng title-tag để tự thêm <title>
         */
        add_theme_support('title-tag');
        add_theme_support('custom-logo');
        add_theme_support('post-thumbnails');

        /*
         * Tạo menu cho theme
         */
        register_nav_menu('primary-menu', __('Primary Menu', 'ophim'));

    }

    add_action('init', 'ophim_theme_setup');

}


function ophim_pagination()
{

    global $wp_query;

    if ($wp_query->max_num_pages <= 1) return;
    $big = 999999999;

    $pages = paginate_links(array('base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))), 'prev_text'          => '<',
        'next_text'          => '>',
        'format' => '?paged=%#%', 'current' => max(1, get_query_var('paged')), 'total' => $wp_query->max_num_pages, 'type' => 'array',));

    if (is_array($pages)) {
        echo '  <div class="pages top20">
        <div class="page-info">';
        foreach ($pages as $page) {
            $page = str_replace('page-numbers','page-link',$page);
            $page = str_replace('current','ho',$page);
            $page = str_replace('span','a',$page);
            echo "$page";
        }
        echo '</div>
    </div>';
    }
}

add_action('admin_enqueue_scripts', 'ophim_include_custom_admin_script');
function ophim_include_custom_admin_script()
{
    wp_enqueue_style('admin_custom_style', get_stylesheet_directory_uri() . '/admin/css/admin.css', false, '');
}