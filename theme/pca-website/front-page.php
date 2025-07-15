<?php
get_header();
?>
<main>
    <!-- Modal -->
 <div class="modal__wrapper">
    <div class="modal">
        <div class="modal__close"> <img src="<?php echo get_template_directory_uri(); ?>/assets/images/cancel.svg" alt="cancel" width="10px" height="10px"></div>
        <div class="modal__title  header-l"><span class="hero__title--yellow"> Get in touch</span>  with me</div>
        <div class="modal__body">
            <?php echo do_shortcode('[contact-form-7 id="8d4ef69" title="Contact form 1"]'); ?>
        </div>
    </div>
</div> 
<section class="home" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/hero-main.png');">
    <div class="container">
        <div class="hero">
            <div class="hero__content">
                <h1 class="hero__title header-xl">
                    Unlock Your Full Potential - <span class="hero__title--yellow">On and Off the Field</span>
                </h1>
                <div class="hero__advantages">
                    <div class="hero__advantages-item">
                        <p class="hero__advantages-item-text">
                            Guiding athletes with real-world experience, holistic coaching and evidence-based performance strategies.
                        </p>
                    </div>


                    <div class="hero__advantages-content">
                        <div class="hero__advantages-content-stars">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/stars.svg" alt="star">
                        </div>
                        <h3 class="hero__advantages-title header-l">
                            3 Years
                        </h3>
                        <p class="hero__advantages-content-text">Experince</p>
                    </div>
                </div>
                <div class="hero__content-btn">
                    <a href="#" class="btn-primary modal__btn">
                        Start Your Journey
                    </a>
                </div>

            </div>

        </div>
</section>



<section class="coaching" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/coaching-image.png');">
    <div class="container">
        <div class="coaching__wrapper">

            <div class="coaching__content">
                <h2 class="coaching__title header-l">
                    <span class="coaching__title--yellow">Coaching </span>for Young Athletes
                </h2>
                <div class="coaching__content-text">
                    <p>
                        As a professional cricketer with coaching experience in both England and Australia, I offer tailored one-on-one and group cricket coaching designed to elevate your game and mentoring applicable to all sports from entry levels all the way to the top. My
                        approach goes beyond just technique—blending skill development with mental resilience, game awareness, and performance strategy.</p>
                    <p>
                        Whether you're just starting your journey or training for elite-level competition, I’m here to guide you—every step of the way.
                    </p>
                </div>
                <div class="coaching__advantages">
                    <div class="coaching__advantages-item">
                        <h3 class="coaching__advantages-title header-m">
                            45+
                        </h3>
                        <p class="coaching__advantages-text">Athletes Trained</p>
                    </div>
                    <div class="coaching__advantages-item">
                        <h3 class="coaching__advantages-title header-m">
                            25+
                        </h3>
                        <p class="coaching__advantages-text">Competition-ready athletes</p>
                    </div>
                </div>
                <div class="coaching__content-btn">
                    <a href="#" class="btn-primary">
                        Book Your Session
                    </a>
                </div>
            </div>

        </div>

    </div>
</section>


<section class="services">
    <div class="container">
        <div class="services__content">
            <h2 class="services__content-title header-l">
                Coaching
                <span class="services__content-title--yellow">Services</span>
            </h2>
            <div class="services__btn">
                <a href="#" class="btn-primary modal__btn">
                    Get in touch
                </a>
            </div>
        </div>
        <div class="services__wrapper swiper">
            <div class="swiper-wrapper">
                <?php
                $services_query = new WP_Query(array(
                    'post_type'      => 'services',
                    'posts_per_page' => -1,
                    'post_status'    => 'publish',
                    'orderby'        => 'menu_order',
                    'order'          => 'ASC',
                ));
                
                if ($services_query->have_posts()) {
                    while ($services_query->have_posts()) {
                        $services_query->the_post();
                        $highlight_color = get_post_meta(get_the_ID(), '_service_highlight_color', true) ?: '#FFB000';
                        $service_icon = get_post_meta(get_the_ID(), '_service_icon', true);
                        $featured_image = get_the_post_thumbnail_url(get_the_ID(), 'full');
                        $background_style = $featured_image ? 'style="background-image: url(' . esc_url($featured_image) . ');"' : '';
                        ?>
                        <div class="services__item swiper-slide"  style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/service-image.jpg"');">
                            <div class="services__item-content">
                                <?php if ($service_icon) : ?>
                                    <div class="services__item-icon">
                                        <img src="<?php echo esc_url($service_icon); ?>" alt="<?php echo esc_attr(get_the_title()); ?>" style="width: 50px; height: 50px; margin-bottom: 20px;">
                                    </div>
                                <?php endif; ?>
                                
                                <h4 class="services__item-title header-l">
                                    <span class="services__item-title--yellow" style="color: <?php echo esc_attr($highlight_color); ?>;">
                                        <?php the_title(); ?>
                                    </span>
                                </h4>
                                
                                <p class="services__item-text">
                                    <?php 
                                    if (has_excerpt()) {
                                        the_excerpt();
                                    } else {
                                        echo esc_html(wp_trim_words(get_the_content(), 30));
                                    }
                                    ?>
                                </p>
                            </div>
                        </div>
                        <?php
                    }
                    wp_reset_postdata();
                } else {
                    // Fallback content if no services exist
                    ?>
                    <div class="services__item swiper-slide">
                        <div class="services__item-content">
                            <h4 class="services__item-title header-l">
                                <span class="services__item-title--yellow">Club</span> Cricket Coach
                            </h4>
                            <p class="services__item-text">
                                I partner with clubs to deliver structured training, match-day coaching, and long-term player development across all age groups.
                            </p>
                        </div>
                    </div>
                    
                    <div class="services__item swiper-slide">
                        <div class="services__item-content">
                            <h4 class="services__item-title header-l">
                                <span class="services__item-title--yellow">Personal</span> Training
                            </h4>
                            <p class="services__item-text">
                                One-on-one coaching sessions tailored to your specific needs and skill level.
                            </p>
                        </div>
                    </div>
                    
                    <div class="services__item swiper-slide">
                        <div class="services__item-content">
                            <h4 class="services__item-title header-l">
                                <span class="services__item-title--yellow">Group</span> Sessions
                            </h4>
                            <p class="services__item-text">
                                Small group training sessions for teams and academies.
                            </p>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
</section>


<section class="about" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/about-image.png');">
    <div class="container">
        <div class="about__wrapper">
            <div class="about__content">
                <h2 class="about__content-title header-l">About <span class="about__content-title--yellow">Me</span>
                </h2>
                <div class="about__content-text">
                    I'm currently a professional cricketer with Nottinghamshire County Cricket Club, with coaching experience in both England and Australia and a ECB Level 2 qualified coach. My goal is to help young athletes develop their skills, build confidence, and reach
                    their full potential—on and off the field.

                    </p>
                    <p>
                        While cricket is my primary sport, my lifelong passion for sports, including the likes of football, athletics, rugby, tennis, and hockey has shaped my broader approach to coaching and mentoring. I believe in the power of sport to build not just performance,
                        but wellbeing also.
                    </p>
                    <p>
                        Through my experience as a professional athlete—and ongoing psychology studies at The Open University—I offer insight into the mental and physical demands of high-level sport. From training and nutrition to recovery and mindset, I aim to share practical
                        guidance that supports long-term development and healthy lifestyles.
                    </p>
                </div>
                <div class="about__content-btn">
                    <a href="#" class="btn-primary modal__btn">
                        Get in touch
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="shop">
    <div class="container">
        <div class="shop__content">
            <h2 class="shop__content-title header-l">
                Train with the
                <span class="shop__content-title--yellow">Right Tools</span>
            </h2>
            <div class="shop__btn">
                <a href="https://www.vinted.co.uk/member/68498979-brknboundaries" class="btn-primary">
                    View Shop Collection
                </a>
            </div>
        </div>

        <!-- Fixed Swiper structure -->
        <div class="shop__wrapper swiper">
            <div class="swiper-wrapper">
                <div class="shop__item swiper-slide">
                    <div class="shop__image" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/1750629206.jpeg');">
                        <a href="https://www.vinted.co.uk/member/68498979-brknboundaries" class="shop__image-btn">
                            <svg width="72" height="73" viewBox="0 0 72 73" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M21 51.0811L51 21.0811" stroke="white" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M21 21.0811H51V51.0811" stroke="white" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
            </a>
                    </div>
                    <div class="shop__item-info">
                        <div class="shop__item-info-content">
                            <span class="shop__item-info-content--size">Size: M</span>
                            <span class="shop__item-info-content--title">Notts Adidas County Championship Shirt</span>
                            <span class="shop__item-info-content--condition">(Very good)</span>
                        </div>
                        <div class="shop__item-info-actions">
                            <div class="shop__item-info-actions-btn">
                                <button class="shop__item-info-actions-btn--color"></button>
                                <button class="shop__item-info-actions-btn--color"></button>
                            </div>
                            <span class="shop__item-info-actions-price">£10.00</span>
                        </div>
                    </div>
                </div>
                <div class="shop__item swiper-slide">
                    <div class="shop__image" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/shop-item1.jpeg');">
                        <a href="https://www.vinted.co.uk/member/68498979-brknboundaries" class="shop__image-btn">
                            <svg width="72" height="73" viewBox="0 0 72 73" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M21 51.0811L51 21.0811" stroke="white" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M21 21.0811H51V51.0811" stroke="white" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
            </a>
                    </div>
                    <div class="shop__item-info">
                        <div class="shop__item-info-content">
                            <span class="shop__item-info-content--size">Size: L</span>
                            <span class="shop__item-info-content--title">Notts Adidas Polo Shir</span>
                            <span class="shop__item-info-content--condition">(Very good)</span>
                        </div>
                        <div class="shop__item-info-actions">
                            <div class="shop__item-info-actions-btn">
                                <button class="shop__item-info-actions-btn--color"></button>
                                <button class="shop__item-info-actions-btn--color"></button>
                            </div>
                            <span class="shop__item-info-actions-price">£13.00</span>
                        </div>
                    </div>
                </div>
                <div class="shop__item swiper-slide">
                    <div class="shop__image" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/shop-item2.jpeg');">
                        <a href="https://www.vinted.co.uk/member/68498979-brknboundaries" class="shop__image-btn">
                            <svg width="72" height="73" viewBox="0 0 72 73" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M21 51.0811L51 21.0811" stroke="white" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M21 21.0811H51V51.0811" stroke="white" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </a>
                    </div>
                    <div class="shop__item-info">
                        <div class="shop__item-info-content">
                            <span class="shop__item-info-content--size">Size: L</span>
                            <span class="shop__item-info-content--title">Adidas Notts Cricket Hoodie </span>
                            <span class="shop__item-info-content--condition">(Very good)</span>
                        </div>
                        <div class="shop__item-info-actions">
                            <div class="shop__item-info-actions-btn">
                                <button class="shop__item-info-actions-btn--color"></button>
                                <button class="shop__item-info-actions-btn--color"></button>
                            </div>
                            <span class="shop__item-info-actions-price">£18.00</span>
                        </div>
                    </div>
                </div>
                <div class="shop__item swiper-slide">
                    <div class="shop__image" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/shop-item3.jpeg');">
                        <a href="https://www.vinted.co.uk/member/68498979-brknboundaries" class="shop__image-btn">
                            <svg width="72" height="73" viewBox="0 0 72 73" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M21 51.0811L51 21.0811" stroke="white" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M21 21.0811H51V51.0811" stroke="white" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
            </a>
                    </div>
                    <div class="shop__item-info">
                        <div class="shop__item-info-content">
                            <span class="shop__item-info-content--size">Size: M</span>
                            <span class="shop__item-info-content--title">Notts Adidas Cricket Playing Trousers</span>
                            <span class="shop__item-info-content--condition">(Very good)</span>
                        </div>
                        <div class="shop__item-info-actions">
                            <div class="shop__item-info-actions-btn">
                                <button class="shop__item-info-actions-btn--color"></button>
                                <button class="shop__item-info-actions-btn--color"></button>
                            </div>
                            <span class="shop__item-info-actions-price">£12.00</span>
                        </div>
                    </div>
                </div>

                <div class="shop__item swiper-slide">
                    <div class="shop__image" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/shop-item4.jpeg');">
                        <a href="https://www.vinted.co.uk/member/68498979-brknboundaries" class="shop__image-btn">
                            <svg width="72" height="73" viewBox="0 0 72 73" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M21 51.0811L51 21.0811" stroke="white" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M21 21.0811H51V51.0811" stroke="white" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </a>
                    </div>
                    <div class="shop__item-info">
                        <div class="shop__item-info-content">
                            <span class="shop__item-info-content--size">Size:  UK10</span>
                            <span class="shop__item-info-content--title">Me + U Cricket Spikes</span>
                            <span class="shop__item-info-content--condition">(Very good)</span>
                        </div>
                        <div class="shop__item-info-actions">
                            <div class="shop__item-info-actions-btn">
                                <button class="shop__item-info-actions-btn--color"></button>
                                <button class="shop__item-info-actions-btn--color"></button>
                            </div>
                            <span class="shop__item-info-actions-price">£80.00</span>
                        </div>
                    </div>
                </div>

                <div class="shop__item swiper-slide">
                    <div class="shop__image" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/shop-item5.jpeg');">
                        <a href="https://www.vinted.co.uk/member/68498979-brknboundaries" class="shop__image-btn">
                            <svg width="72" height="73" viewBox="0 0 72 73" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M21 51.0811L51 21.0811" stroke="white" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M21 21.0811H51V51.0811" stroke="white" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
            </a>
                    </div>
                    <div class="shop__item-info">
                        <div class="shop__item-info-content">
                            <span class="shop__item-info-content--size">Size: M</span>
                            <span class="shop__item-info-content--title">Samurai Derbyshire County Championship Shirt</span>
                            <span class="shop__item-info-content--condition">(Very good)</span>
                        </div>
                        <div class="shop__item-info-actions">
                            <div class="shop__item-info-actions-btn">
                                <button class="shop__item-info-actions-btn--color"></button>
                                <button class="shop__item-info-actions-btn--color"></button>
                            </div>
                            <span class="shop__item-info-actions-price">£18.00</span>
                        </div>
                    </div>
                </div>

               

              

                

            </div>
            <!-- Moved pagination inside swiper container -->
            <div class="swiper-pagination"></div>
        </div>

    </div>
</section>


<section class="testimonials"  style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/testimonials.jpg');">
    <div class="container">
        <div class="testimonials__content">
            <h2 class="testimonials__content-title header-l">
                Testimonials That Speak to <span class="testimonials__content-title--yellow">My Results</span>
            </h2>
        </div>
    </div>
    <div class="swiper">
        <div class="testimonials__wrapper swiper-wrapper">
            <div class="testimonials__item swiper-slide">
                <div class="testimonials__item-content">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/avatar.png" alt="avatar-image">
                    <div class="testimonials__item-content-text">
                        <p class="testimonials__item-content-text--name">Jayesh Patil</p>
                        <p class="testimonials__item-content-text--position">Athletes</p>
                    </div>
                </div>
                <div class="testimonials__item-rate">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/stars.svg" alt="stars-image">
                    <span class="testimonials__item-rate-number">5.0</span>
                </div>
                <div class="testimonials__item-text">
                    <p>consectetur adipiscing elit. Sed congue interdum ligula a dignissim. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed lobortis orci elementum egestas lobortis.Sed lobortis orci elementum egestas lobortis.Sed lobortis orci
                        elementum egestas lobortis.</p>
                </div>
            </div>

            <div class="testimonials__item swiper-slide">
                <div class="testimonials__item-content">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/avatar.png" alt="avatar-image">
                    <div class="testimonials__item-content-text">
                        <p class="testimonials__item-content-text--name">Jayesh Patil</p>
                        <p class="testimonials__item-content-text--position">Athletes</p>
                    </div>
                </div>
                <div class="testimonials__item-rate">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/stars.svg" alt="stars-image">
                    <span class="testimonials__item-rate-number">5.0</span>
                </div>
                <div class="testimonials__item-text">
                    <p>consectetur adipiscing elit. Sed congue interdum ligula a dignissim. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed lobortis orci elementum egestas lobortis.Sed lobortis orci elementum egestas lobortis.Sed lobortis orci
                        elementum egestas lobortis.</p>
                </div>
            </div>

            <div class="testimonials__item swiper-slide">
                <div class="testimonials__item-content">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/avatar.png" alt="avatar-image">
                    <div class="testimonials__item-content-text">
                        <p class="testimonials__item-content-text--name">Jayesh Patil</p>
                        <p class="testimonials__item-content-text--position">Athletes</p>
                    </div>
                </div>
                <div class="testimonials__item-rate">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/stars.svg" alt="stars-image">
                    <span class="testimonials__item-rate-number">5.0</span>
                </div>
                <div class="testimonials__item-text">
                    <p>consectetur adipiscing elit. Sed congue interdum ligula a dignissim. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed lobortis orci elementum egestas lobortis.Sed lobortis orci elementum egestas lobortis.Sed lobortis orci
                        elementum egestas lobortis.</p>
                </div>
            </div>

            <div class="testimonials__item swiper-slide">
                <div class="testimonials__item-content">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/avatar.png" alt="avatar-image">
                    <div class="testimonials__item-content-text">
                        <p class="testimonials__item-content-text--name">Jayesh Patil</p>
                        <p class="testimonials__item-content-text--position">Athletes</p>
                    </div>
                </div>
                <div class="testimonials__item-rate">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/stars.svg" alt="stars-image">
                    <span class="testimonials__item-rate-number">5.0</span>
                </div>
                <div class="testimonials__item-text">
                    <p>consectetur adipiscing elit. Sed congue interdum ligula a dignissim. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed lobortis orci elementum egestas lobortis.Sed lobortis orci elementum egestas lobortis.Sed lobortis orci
                        elementum egestas lobortis.</p>
                </div>
            </div>
            <div class="testimonials__item swiper-slide">
                <div class="testimonials__item-content">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/avatar.png" alt="avatar-image">
                    <div class="testimonials__item-content-text">
                        <p class="testimonials__item-content-text--name">Jayesh Patil</p>
                        <p class="testimonials__item-content-text--position">Athletes</p>
                    </div>
                </div>
                <div class="testimonials__item-rate">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/stars.svg" alt="stars-image">
                    <span class="testimonials__item-rate-number">5.0</span>
                </div>
                <div class="testimonials__item-text">
                    <p>consectetur adipiscing elit. Sed congue interdum ligula a dignissim. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed lobortis orci elementum egestas lobortis.Sed lobortis orci elementum egestas lobortis.Sed lobortis orci
                        elementum egestas lobortis.</p>
                </div>
            </div>
            <div class="testimonials__item swiper-slide">
                <div class="testimonials__item-content">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/avatar.png" alt="avatar-image">
                    <div class="testimonials__item-content-text">
                        <p class="testimonials__item-content-text--name">Jayesh Patil</p>
                        <p class="testimonials__item-content-text--position">Athletes</p>
                    </div>
                </div>
                <div class="testimonials__item-rate">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/stars.svg" alt="stars-image">
                    <span class="testimonials__item-rate-number">5.0</span>
                </div>
                <div class="testimonials__item-text">
                    <p>consectetur adipiscing elit. Sed congue interdum ligula a dignissim. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed lobortis orci elementum egestas lobortis.Sed lobortis orci elementum egestas lobortis.Sed lobortis orci
                        elementum egestas lobortis.</p>
                </div>
            </div>
        </div>
        <!-- Missing pagination div -->
        <div class="swiper-pagination"></div>
    </div>
</section>

<section class="blog blog-slider">
    <div class="container">
        <div class="blog__content">
            <h2 class="blog__content-title header-l">
                Training & Wellness <span class="blog__content-title--yellow">Blog</span>
            </h2>
            <div class="blog__btn">
                <a href="<?php echo home_url('/blog'); ?>" class="btn-primary">
                    Start Reading
                </a>
            </div>
        </div>
        <?php
// Configuration - you can modify these as needed
$blog_config = array(
    'post_type' => 'post',           // Change to your custom post type if needed
    'posts_per_page' => 8,           // Number of posts to show
    'category' => '',                // Specific category slug (optional)
    'exclude_current' => true,       // Exclude current post if on single post page
    'show_excerpt' => false,         // Show excerpt in addition to title
    'excerpt_length' => 20,          // Number of words for excerpt
    'default_image' => 'default-blog-image.jpg' // Default image name
);

// Build query arguments
$query_args = array(
    'post_type' => $blog_config['post_type'],
    'posts_per_page' => $blog_config['posts_per_page'],
    'post_status' => 'publish',
    'orderby' => 'date',
    'order' => 'DESC'
);

// Exclude current post if on single post page
if ($blog_config['exclude_current'] && is_single()) {
    $query_args['post__not_in'] = array(get_the_ID());
}

// Filter by category if specified
if (!empty($blog_config['category'])) {
    $query_args['category_name'] = $blog_config['category'];
}

// Execute query
$blog_query = new WP_Query($query_args);
?>

<div class="blog__wrapper swiper">
    <div class="swiper-wrapper">
        <?php if ($blog_query->have_posts()) : ?>
            <?php while ($blog_query->have_posts()) : $blog_query->the_post(); ?>
                <?php
                // Get featured image with fallback
                $featured_image = get_the_post_thumbnail_url(get_the_ID(), 'large');
                if (!$featured_image) {
                    $featured_image = get_template_directory_uri() . '/assets/images/' . $blog_config['default_image'];
                }
                
                // Get post categories/terms
                $terms = wp_get_post_terms(get_the_ID(), 'category');
                if ($blog_config['post_type'] !== 'post') {
                    // For custom post types, get the first taxonomy
                    $taxonomies = get_object_taxonomies($blog_config['post_type']);
                    if (!empty($taxonomies)) {
                        $terms = wp_get_post_terms(get_the_ID(), $taxonomies[0]);
                    }
                }
                
                // Get formatted date
                $post_date = get_the_date('d M, Y');
                
                // Get author
                $author_name = get_the_author();
                
                // Get excerpt if enabled
                $excerpt = '';
                if ($blog_config['show_excerpt']) {
                    $excerpt = wp_trim_words(get_the_excerpt(), $blog_config['excerpt_length'], '...');
                }
                ?>
                
                <div class="blog__item swiper-slide">
                    <div class="blog__image" style="background-image: url('<?php echo esc_url($featured_image); ?>');">
                        <a href="<?php the_permalink(); ?>" class="blog__image-btn" aria-label="Read more about <?php the_title(); ?>">
                            <svg width="72" height="73" viewBox="0 0 72 73" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M21 51.0811L51 21.0811" stroke="white" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
                                <path d="M21 21.0811H51V51.0811" stroke="white" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
                            </svg>
                        </a>
                    </div>
                    
                    <div class="blog__item-info">
                        <?php if (!empty($terms)) : ?>
                        <div class="blog__item-info-tags">
                            <?php 
                            $count = 0;
                            foreach ($terms as $term) :
                                if ($count >= 2) break; // Limit to 2 terms
                            ?>
                                <a href="<?php echo esc_url(get_term_link($term)); ?>" class="blog__item-info-tags-item">
                                    <?php echo esc_html($term->name); ?>
                                </a>
                            <?php 
                                $count++;
                            endforeach;
                            ?>
                        </div>
                        <?php endif; ?>
                        
                        <div class="blog__item-info-content">
                            <h4 class="blog__item-info-content--title">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h4>
                            
                            <?php if ($blog_config['show_excerpt'] && !empty($excerpt)) : ?>
                            <p class="blog__item-info-content--excerpt">
                                <?php echo esc_html($excerpt); ?>
                            </p>
                            <?php endif; ?>
                            
                            <span class="blog__item-info-content-author">
                                <?php echo esc_html($author_name); ?>
                            </span>
                            <span class="blog__item-info-content-date">
                                <?php echo esc_html($post_date); ?>
                            </span>
                        </div>
                    </div>
                </div>
                
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
            
        <?php else : ?>
            <!-- Fallback when no posts found -->
            <div class="blog__item swiper-slide">
                <div class="blog__image" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/<?php echo $blog_config['default_image']; ?>');">
                    <div class="blog__image-btn">
                        <svg width="72" height="73" viewBox="0 0 72 73" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M21 51.0811L51 21.0811" stroke="white" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M21 21.0811H51V51.0811" stroke="white" stroke-width="4" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </div>
                </div>
                
                <div class="blog__item-info">
                    <div class="blog__item-info-tags">
                        <span class="blog__item-info-tags-item">Blog</span>
                    </div>
                    
                    <div class="blog__item-info-content">
                        <h4 class="blog__item-info-content--title">
                            No posts found
                        </h4>
                        <span class="blog__item-info-content-author">
                            Admin
                        </span>
                        <span class="blog__item-info-content-date">
                            <?php echo date('d M, Y'); ?>
                        </span>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    </div>
    <div class="swiper-pagination"></div>
</div>

    </div>
</section>


</main>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>

<?php
get_footer();
?>