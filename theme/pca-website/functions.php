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

// function custom_enqueue_gsap() {
//     wp_enqueue_script(
//         'gsap', // Handle
//         'https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/gsap.min.js', // Source URL
//         array(), // Dependencies (e.g., jQuery if needed)
//         '3.13.0', // Version
//         true // Load in footer
//     );
// }
// add_action('wp_enqueue_scripts', 'custom_enqueue_gsap');


function pca_disable_gutenberg_widgets() {
    remove_theme_support('widgets-block-editor');
}
add_action('after_setup_theme', 'pca_disable_gutenberg_widgets');

function pca_theme_setup() {
    // Add theme support for post thumbnails (featured images)
    add_theme_support('post-thumbnails');
    
    // Set custom image sizes for your theme
    add_image_size('blog-thumbnail', 400, 432, true); // For blog cards
    add_image_size('blog-large', 800, 600, true); // For blog post headers
    add_image_size('shop-thumbnail', 400, 432, true); // For shop items
    
    // Add theme support for title tag
    add_theme_support('title-tag');
    
    // Add theme support for HTML5 markup
    add_theme_support('html5', array(
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script'
    ));

    register_nav_menus(array(
        'primary' => __('Primary Menu', 'pca-theme'),
        'footer' => __('Footer Menu', 'pca-theme'),
        'mobile' => __('Mobile Menu', 'pca-theme')
    ));
}
add_action('after_setup_theme', 'pca_theme_setup');



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



// In your theme's functions.php
function add_dynamic_shop_css() {
    ?>
    <style>
    .shop__image::before {
        position: absolute;
        width: 174px;
        height: 174px;
        content: "";
        background-image: url("<?php echo get_template_directory_uri(); ?>/assets/images/curv.svg");
        background-size: cover;
        background-position: center;
        border-radius: 20%;
        bottom: -4px; 
        right: -7px;
    }
    .blog__image::before {
    position: absolute;
    width: 174px;
    height: 174px;
    content: "";
    background-image: url("<?php echo get_template_directory_uri(); ?>/assets/images/curv.svg");
    background-size: cover;
    background-position: center;
    border-radius: 20%;
    bottom: -4px;
    right: -7px;
}
.home .hero__advantages-item::before {
    z-index: 100;
    content: "";
    background-image: url("<?php echo get_template_directory_uri(); ?>/assets/images/quote-up.svg");
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    position: absolute;
    top: 24px;
    left: 14px;
    width: 36px;
    height: 36px;
}

.testimonials__item::after {
    content: "";
    position: absolute;
    background-image: url("<?php echo get_template_directory_uri(); ?>/assets/images/quotegreay.svg");
    width: 120px;
    height: 120px;
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    top: 20px;
    right: 20px;
}
    </style>
    <?php
}
add_action('wp_head', 'add_dynamic_shop_css');

function add_class_to_menu_links($atts, $item, $args) {
    $atts['class'] = isset($atts['class']) ? $atts['class'] . ' menu__item-link' : 'menu__item-link';
    return $atts;
}
add_filter('nav_menu_link_attributes', 'add_class_to_menu_links', 10, 3);
