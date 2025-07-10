<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<body class="main__body">
    <html>
<header>
    <!-- Navbar -->
    <div class="header">
        <div class="container">
            <div class="navbar">
                <div class="logo">
                <a href="<?php echo esc_url(home_url('/')); ?>">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" alt="<?php echo esc_attr(get_bloginfo('name')); ?>">
</a>
                </div>
                <nav>
                    <ul class="menu">
                        <li class="menu__item"><a href="#" class="menu__item-link" data-scroll>Home</a></li>
                        <li class="menu__item"><a href="#" class="menu__item-link" data-scroll>Coaching</a></li>
                        <li class="menu__item"><a href="#" class="menu__item-link" data-scroll>Shop</a></li>
                        <li class="menu__item"><a href="#" class="menu__item-link" data-scroll>Blog </a></li>
                        <li class="menu__item"><a href="#" class="menu__item-link" data-scroll>Testimonials </a></li>
                        <li class="menu__item"><a href="#" class="menu__item-link" data-scroll>Contact </a></li>
                    </ul>
                </nav>

                <button class="burger">
                    <span></span>
                </button>
            </div>
        </div>
    </div>
</header>