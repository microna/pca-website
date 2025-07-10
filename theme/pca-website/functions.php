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
        array('swiper-js'), // Depends on Swiper library
        '1.0.0',
        true // Load in footer
    );
}
add_action('wp_enqueue_scripts', 'pca_enqueue_scripts');


function pca_disable_gutenberg_widgets() {
    remove_theme_support('widgets-block-editor');
}
add_action('after_setup_theme', 'pca_disable_gutenberg_widgets');


// Register Services Custom Post Type
function pca_register_services_cpt() {
    $labels = array(
        'name'                  => _x('Services', 'Post type general name', 'pca-theme'),
        'singular_name'         => _x('Service', 'Post type singular name', 'pca-theme'),
        'menu_name'             => _x('Services', 'Admin Menu text', 'pca-theme'),
        'name_admin_bar'        => _x('Service', 'Add New on Toolbar', 'pca-theme'),
        'add_new'               => __('Add New', 'pca-theme'),
        'add_new_item'          => __('Add New Service', 'pca-theme'),
        'new_item'              => __('New Service', 'pca-theme'),
        'edit_item'             => __('Edit Service', 'pca-theme'),
        'view_item'             => __('View Service', 'pca-theme'),
        'all_items'             => __('All Services', 'pca-theme'),
        'search_items'          => __('Search Services', 'pca-theme'),
        'parent_item_colon'     => __('Parent Services:', 'pca-theme'),
        'not_found'             => __('No services found.', 'pca-theme'),
        'not_found_in_trash'    => __('No services found in Trash.', 'pca-theme'),
        'featured_image'        => _x('Service Featured Image', 'Overrides the "Featured Image" phrase for this post type. Added in 4.3', 'pca-theme'),
        'set_featured_image'    => _x('Set service image', 'Overrides the "Set featured image" phrase for this post type. Added in 4.3', 'pca-theme'),
        'remove_featured_image' => _x('Remove service image', 'Overrides the "Remove featured image" phrase for this post type. Added in 4.3', 'pca-theme'),
        'use_featured_image'    => _x('Use as service image', 'Overrides the "Use as featured image" phrase for this post type. Added in 4.3', 'pca-theme'),
        'archives'              => _x('Service archives', 'The post type archive label used in nav menus. Default "Post Archives". Added in 4.4', 'pca-theme'),
        'insert_into_item'      => _x('Insert into service', 'Overrides the "Insert into post"/"Insert into page" phrase (used when inserting media into a post). Added in 4.4', 'pca-theme'),
        'uploaded_to_this_item' => _x('Uploaded to this service', 'Overrides the "Uploaded to this post"/"Uploaded to this page" phrase (used when viewing media attached to a post). Added in 4.4', 'pca-theme'),
        'filter_items_list'     => _x('Filter services list', 'Screen reader text for the filter links heading on the post type listing screen. Default "Filter posts list"/"Filter pages list". Added in 4.4', 'pca-theme'),
        'items_list_navigation' => _x('Services list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default "Posts list navigation"/"Pages list navigation". Added in 4.4', 'pca-theme'),
        'items_list'            => _x('Services list', 'Screen reader text for the items list heading on the post type listing screen. Default "Posts list"/"Pages list". Added in 4.4', 'pca-theme'),
    );

    $args = array(
        'labels'             => $labels,
        'description'        => __('Description.', 'pca-theme'),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'services'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 20,
        'menu_icon'          => 'dashicons-admin-tools',
        'supports'           => array('title', 'editor', 'excerpt', 'thumbnail', 'custom-fields'),
        'show_in_rest'       => true,
    );

    register_post_type('services', $args);
}
add_action('init', 'pca_register_services_cpt');