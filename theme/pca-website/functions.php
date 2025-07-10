<?php
function pca_enqueue_scripts() {
    // Enqueue main CSS file
    wp_enqueue_style(
        'pca-main-style',
        get_template_directory_uri() . '/assets/css/main.css',
        array(),
        '1.0.0'
    );
    
    // Enqueue Swiper CSS (if you have it in assets)
    wp_enqueue_style(
        'swiper-css',
        get_template_directory_uri() . '/assets/css/swiper.min.css',
        array(),
        '1.0.0'
    );
    
    // Enqueue Swiper JavaScript library first
    wp_enqueue_script(
        'swiper-js',
        get_template_directory_uri() . '/assets/js/swiper.min.js',
        array(),
        '1.0.0',
        true
    );
    
    // Enqueue your main JavaScript file (depends on Swiper)
    wp_enqueue_script(
        'pca-main-js',
        get_template_directory_uri() . '/assets/js/main.js',
        array('swiper-js'), // Changed from 'jquery' to 'swiper-js'
        '1.0.0',
        true
    );
}
add_action('wp_enqueue_scripts', 'pca_enqueue_scripts');