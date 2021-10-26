<?php

add_action('after_setup_theme', 'setup_theme');

function setup_theme() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_theme_support('html5');
    add_theme_support('menus');
    add_theme_support('custom-logo');
    add_image_size('post_image', 750, 350, true);
    add_image_size('post_image_mini', 60, 60, true);
	register_nav_menu( 'primary', 'Primary Menu' );
}


// comment
add_action('wp_ajax_ajaxcomments', 'true_add_ajax_comment'); // wp_ajax_{значение параметра action}
add_action('wp_ajax_nopriv_ajaxcomments', 'true_add_ajax_comment'); // wp_ajax_nopriv_{значение параметра action}

function enqueue_comment_reply() {
    wp_enqueue_script('comment-reply');
}

add_action( 'wp_enqueue_scripts', 'enqueue_comment_reply' );


function register_my_widgets(){
    register_sidebar( array(
        'name' => __('Правая боковая панель'),
        'id' => 'homepage-sidebar',
        'before_widget' => '<aside class="single_sidebar_widget tag_cloud_widget">',
        'after_widget' => '</aside>',
        'before_title' => '<h2 class="widget_title">',
        'after_title' => '</h2>',
    ) );
}
add_action( 'widgets_init', 'register_my_widgets' );



/* Add ACF options page */

if (function_exists('acf_add_options_page')) {
    acf_add_options_page();
}

if( function_exists('acf_set_options_page_title') ) {
    acf_set_options_page_title(__('Theme Options'));
}



require_once( dirname(__FILE__) . '/inc/Walker/Numeric_Pagination.php');
require_once( dirname(__FILE__) . '/inc/Walker/Time_Walker_Comment.php');
require_once( dirname(__FILE__) . '/inc/front-style/front-style.php');
require_once( dirname(__FILE__) . '/inc/post-types/post-type.php');
require_once( dirname(__FILE__) . '/inc/mail/mail.php');
require_once( dirname(__FILE__) . '/inc/filter/filter.php');



