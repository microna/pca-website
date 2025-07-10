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
<header>
    <!-- Navbar -->
    <div class="header">
        <div class="container">
            <div class="navbar">
                <div class="logo">
                    <a href="#"> <img src="../img/logo.png" alt="logo"></a>
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