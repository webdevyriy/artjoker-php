<?php

add_action( 'wp_enqueue_scripts', 'include_css', 25 );

function include_css() {
    wp_enqueue_style( 'bootstrap', get_stylesheet_directory_uri() . '/public/assets/css/bootstrap.min.css');
    wp_enqueue_style( 'owl.carousel', get_stylesheet_directory_uri() . '/public/assets/css/owl.carousel.min.css');
    wp_enqueue_style( 'flaticon', get_stylesheet_directory_uri() . '/public/assets/css/flaticon.css');
    wp_enqueue_style( 'slicknav', get_stylesheet_directory_uri() . '/public/assets/css/slicknav.css');
    wp_enqueue_style( 'animate', get_stylesheet_directory_uri() . '/public/assets/css/animate.min.css');
    wp_enqueue_style( 'magnific-popup', get_stylesheet_directory_uri() . '/public/assets/css/magnific-popup.css');
    wp_enqueue_style( 'fontawesome-all', get_stylesheet_directory_uri() . '/public/assets/css/fontawesome-all.min.css');
    wp_enqueue_style( 'themify-icons', get_stylesheet_directory_uri() . '/public/assets/css/themify-icons.css');
    wp_enqueue_style( 'slick', get_stylesheet_directory_uri() . '/public/assets/css/slick.css');
    wp_enqueue_style( 'nice-select', get_stylesheet_directory_uri() . '/public/assets/css/nice-select.css');
    wp_enqueue_style( 'style', get_stylesheet_directory_uri() . '/public/assets/css/style.css');
    wp_enqueue_style( 'wp-fix', get_stylesheet_directory_uri() . '/wp-fix.css');
}

add_action( 'init', 'true_jquery_register' );

function true_jquery_register() {
    if ( !is_admin() ) {
        wp_deregister_script( 'jquery' );
        wp_register_script( 'jquery', ( get_template_directory_uri() . '/public/assets/js/vendor/jquery-1.12.4.min.js' ), false, null, true );
        wp_enqueue_script( 'jquery' );
    }
}

add_action("wp_enqueue_scripts", "include_js", 25);

function include_js()
{
    wp_enqueue_script('modernizr', get_template_directory_uri() . '/public/assets/js/vendor/modernizr-3.5.0.min.js', null, null, true);
    wp_enqueue_script('popper', get_template_directory_uri() . '/public/assets/js/popper.min.js', array('jquery'), null, true);
    wp_enqueue_script('bootstrap', get_template_directory_uri() . '/public/assets/js/bootstrap.min.js', array('jquery'), null, true);
    wp_enqueue_script('slicknav', get_template_directory_uri() . '/public/assets/js/jquery.slicknav.min.js', array('jquery'), null, true);
    wp_enqueue_script('owl.carousel.min.js', get_template_directory_uri() . '/public/assets/js/owl.carousel.min.js', array('jquery'), null, true);
    wp_enqueue_script('slick.min.js', get_template_directory_uri() . '/public/assets/js/slick.min.js', array('jquery'), null, true);
    wp_enqueue_script('wow.min.js', get_template_directory_uri() . '/public/assets/js/wow.min.js', array('jquery'), null, true);
    wp_enqueue_script('animated.headline.js', get_template_directory_uri() . '/public/assets/js/animated.headline.js', array('jquery'), null, true);
    wp_enqueue_script('jquery.magnific-popup.js', get_template_directory_uri() . '/public/assets/js/jquery.magnific-popup.js', array('jquery'), null, true);
    wp_enqueue_script('jquery.scrollUp.min.js', get_template_directory_uri() . '/public/assets/js/jquery.scrollUp.min.js', array('jquery'), null, true);
    wp_enqueue_script('jquery.nice-select.min.js', get_template_directory_uri() . '/public/assets/js/jquery.nice-select.min.js', array('jquery'), null, true);
    wp_enqueue_script('jquery.sticky.js', get_template_directory_uri() . '/public/assets/js/jquery.sticky.js', array('jquery'), null, true);
    wp_enqueue_script('contact.js', get_template_directory_uri() . '/public/assets/js/contact.js', array('jquery'), null, true);
    wp_enqueue_script('jquery.form.js', get_template_directory_uri() . '/public/assets/js/jquery.form.js', array('jquery'), null, true);
    wp_enqueue_script('jquery.validate.min.js', get_template_directory_uri() . '/public/assets/js/jquery.validate.min.js', array('jquery'), null, true);
    wp_enqueue_script('mail-script.js', get_template_directory_uri() . '/public/assets/js/mail-script.js', array('jquery'), null, true);
    wp_enqueue_script('jquery.ajaxchimp.min.js', get_template_directory_uri() . '/public/assets/js/jquery.ajaxchimp.min.js', array('jquery'), null, true);
    wp_enqueue_script('plugins.js', get_template_directory_uri() . '/public/assets/js/plugins.js', array('jquery'), null, true);
    wp_enqueue_script('main.js', get_template_directory_uri() . '/public/assets/js/main.js', array('jquery'), null, true);
    wp_enqueue_script('function.js', get_template_directory_uri() . '/function.js', array('jquery'), null, true);
};