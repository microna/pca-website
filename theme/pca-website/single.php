<?php get_header(); ?>

<main class="main-content">
    <section class="blog blog__post">
        <div class="container">
            <!-- Blog Banner -->
            <header class="blog__banner" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/blog-page-bg.jpg');">
                <h1 class="blog__content-title header-l">
                    Performance and <span class="blog__content-title--yellow">Lifestyle Blog!</span>
                </h1>
                <p class="blog__content-text">
                    Based on my journey in professional sport and psychology studies, this blog shares practical lessons, training routines, nutrition strategies and mental health insights. Whether you're chasing performance goals or simply striving for a healthier mindset,
                    you'll find real-world advice supporting long-term growth—both on and off the field.
                </p>
            </header>

            <!-- Category Navigation -->
            <nav class="blog__tagbar" aria-label="Blog Categories">
                <ul class="blog__tagbar-list">
                    <!-- All Posts Link -->
                    <li class="blog__tagbar-item">
                        <a href="<?php echo esc_url(get_permalink(get_option('page_for_posts')) ?: home_url('/blog')); ?>" 
                           class="blog__tagbar-link">
                            All Posts
                        </a>
                    </li>
                    
                    <?php
                    // Get categories with posts
                    $categories = get_categories(array(
                        'orderby' => 'name',
                        'order' => 'ASC',
                        'hide_empty' => true,
                        'exclude' => array(1),
                        'number' => 6
                    ));

                    // Get current post categories for highlighting
                    $current_post_categories = get_the_category();
                    $current_category_ids = array();
                    if ($current_post_categories) {
                        foreach ($current_post_categories as $cat) {
                            $current_category_ids[] = $cat->term_id;
                        }
                    }

                    if (!empty($categories)) :
                        foreach ($categories as $category) :
                            $active_class = in_array($category->term_id, $current_category_ids) ? ' active' : '';
                    ?>
                        <li class="blog__tagbar-item">
                            <a href="<?php echo esc_url(get_category_link($category->term_id)); ?>" 
                               class="blog__tagbar-link<?php echo $active_class; ?>">
                                <?php echo esc_html($category->name); ?>
                            </a>
                        </li>
                    <?php 
                        endforeach;
                    endif;
                    ?>
                </ul>
            </nav>

            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            
            <!-- Post Content -->
            <article class="blog__post-content" itemscope itemtype="https://schema.org/BlogPosting">
                <div class="blog__post-wrapper">
                    <!-- Post Meta -->
                    <div class="blog__item-info-content">
                        <span class="blog__item-info-content-author" itemprop="author">
                            <?php echo esc_html(get_the_author()); ?>
                        </span>
                        <time class="blog__item-info-content-date" 
                              datetime="<?php echo esc_attr(get_the_date('c')); ?>" 
                              itemprop="datePublished">
                            <?php echo esc_html(get_the_date('d M, Y')); ?>
                        </time>
                    </div>
                    
                    <!-- Post Title -->
                    <h1 class="blog__post-title header-l" itemprop="headline">
                        <?php 
                        $title = get_the_title();
                        $words = explode(' ', $title);
                        $word_count = count($words);
                        
                        if ($word_count > 3) {
                            // Highlight the last 2-3 words
                            $highlight_start = $word_count - 2;
                            $normal_words = array_slice($words, 0, $highlight_start);
                            $highlighted_words = array_slice($words, $highlight_start);
                            
                            echo esc_html(implode(' ', $normal_words)) . ' <span class="blog__post-title--yellow">' . esc_html(implode(' ', $highlighted_words)) . '</span>';
                        } else {
                            echo esc_html($title);
                        }
                        ?>
                    </h1>
                    
                    <!-- Post Categories -->
                    <?php 
                    $post_categories = get_the_category();
                    if ($post_categories) :
                    ?>
                    <div class="blog__post-categories">
                        <?php foreach ($post_categories as $category) : ?>
                            <a href="<?php echo esc_url(get_category_link($category->term_id)); ?>" 
                               class="blog__item-info-tags-item" 
                               rel="category tag">
                                <?php echo esc_html($category->name); ?>
                            </a>
                        <?php endforeach; ?>
                    </div>
                    <?php endif; ?>
                    
                    <!-- Post Content -->
                    <div class="blog__post-text" itemprop="articleBody">
                        <?php 
                        the_content();
                        
                        // Handle pagination in posts
                        wp_link_pages(array(
                            'before' => '<div class="page-links">',
                            'after' => '</div>',
                            'link_before' => '<span>',
                            'link_after' => '</span>'
                        ));
                        ?>
                    </div>
                    
                    <!-- Post Tags -->
                    <?php 
                    $post_tags = get_the_tags();
                    if ($post_tags) :
                    ?>
                    <div class="blog__post-tags">
                        <strong>Tags:</strong>
                        <?php foreach ($post_tags as $tag) : ?>
                            <a href="<?php echo esc_url(get_tag_link($tag->term_id)); ?>" 
                               class="blog__tag-link" 
                               rel="tag">
                                <?php echo esc_html($tag->name); ?>
                            </a>
                        <?php endforeach; ?>
                    </div>
                    <?php endif; ?>
                </div>
                
                <!-- Sidebar with Related Posts -->
                <aside class="blog__post-aside">
                    <h3 class="blog__aside-title">Related Posts</h3>
                    
                    <?php
                    // Get related posts based on categories
                    $related_posts = new WP_Query(array(
                        'post_type' => 'post',
                        'posts_per_page' => 3,
                        'post__not_in' => array(get_the_ID()),
                        'category__in' => $current_category_ids,
                        'orderby' => 'rand'
                    ));
                    
                    if ($related_posts->have_posts()) :
                        while ($related_posts->have_posts()) : $related_posts->the_post();
                            
                            // Get featured image
                            $featured_image = get_the_post_thumbnail_url(get_the_ID(), 'medium');
                            if (!$featured_image) {
                                $featured_image = get_template_directory_uri() . '/assets/images/blog-image.jpg';
                            }
                            
                            // Get post categories
                            $sidebar_categories = get_the_category();
                    ?>
                    
                    <article class="blog__item">
                        <div class="blog__image" style="background-image: url('<?php echo esc_url($featured_image); ?>');">
                            <a href="<?php the_permalink(); ?>" 
                               class="blog__image-btn" 
                               aria-label="Read <?php echo esc_attr(get_the_title()); ?>">
                                <svg width="72" height="73" viewBox="0 0 72 73" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M21 51.0811L51 21.0811" stroke="white" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M21 21.0811H51V51.0811" stroke="white" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </a>
                        </div>
                        
                        <div class="blog__item-info">
                            <div class="blog__item-info-tags">
                                <?php 
                                if ($sidebar_categories) :
                                    $count = 0;
                                    foreach ($sidebar_categories as $category) :
                                        if ($count >= 2) break;
                                ?>
                                    <a href="<?php echo esc_url(get_category_link($category->term_id)); ?>" 
                                       class="blog__item-info-tags-item">
                                        <?php echo esc_html($category->name); ?>
                                    </a>
                                <?php 
                                        $count++;
                                    endforeach;
                                endif;
                                ?>
                            </div>
                            
                            <div class="blog__item-info-content">
                                <h4 class="blog__item-info-content--title">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php echo wp_trim_words(get_the_title(), 8); ?>
                                    </a>
                                </h4>
                                <span class="blog__item-info-content-author">
                                    <?php echo esc_html(get_the_author()); ?>
                                </span>
                                <time class="blog__item-info-content-date" 
                                      datetime="<?php echo esc_attr(get_the_date('c')); ?>">
                                    <?php echo esc_html(get_the_date('d M, Y')); ?>
                                </time>
                            </div>
                        </div>
                    </article>
                    
                    <?php 
                        endwhile;
                        wp_reset_postdata();
                    else :
                        // Fallback: Show recent posts if no related posts found
                        $recent_posts = new WP_Query(array(
                            'post_type' => 'post',
                            'posts_per_page' => 3,
                            'post__not_in' => array(get_the_ID()),
                            'orderby' => 'date',
                            'order' => 'DESC'
                        ));
                        
                        if ($recent_posts->have_posts()) :
                            while ($recent_posts->have_posts()) : $recent_posts->the_post();
                                $featured_image = get_the_post_thumbnail_url(get_the_ID(), 'medium');
                                if (!$featured_image) {
                                    $featured_image = get_template_directory_uri() . '/assets/images/blog-image.jpg';
                                }
                    ?>
                    
                    <article class="blog__item">
                        <div class="blog__image" style="background-image: url('<?php echo esc_url($featured_image); ?>');">
                            <a href="<?php the_permalink(); ?>" class="blog__image-btn">
                                <svg width="72" height="73" viewBox="0 0 72 73" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M21 51.0811L51 21.0811" stroke="white" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M21 21.0811H51V51.0811" stroke="white" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </a>
                        </div>
                        
                        <div class="blog__item-info">
                            <div class="blog__item-info-tags">
                                <span class="blog__item-info-tags-item">Recent</span>
                            </div>
                            
                            <div class="blog__item-info-content">
                                <h4 class="blog__item-info-content--title">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php echo wp_trim_words(get_the_title(), 8); ?>
                                    </a>
                                </h4>
                                <span class="blog__item-info-content-author">
                                    <?php echo esc_html(get_the_author()); ?>
                                </span>
                                <time class="blog__item-info-content-date" 
                                      datetime="<?php echo esc_attr(get_the_date('c')); ?>">
                                    <?php echo esc_html(get_the_date('d M, Y')); ?>
                                </time>
                            </div>
                        </div>
                    </article>
                    
                    <?php 
                            endwhile;
                            wp_reset_postdata();
                        endif;
                    endif;
                    ?>
                </aside>
            </article>
            
            <!-- Post Navigation -->
            <nav class="blog__post-navigation">
                <div class="nav-previous">
                    <?php previous_post_link('%link', '&laquo; Previous Post'); ?>
                </div>
                <div class="nav-next">
                    <?php next_post_link('%link', 'Next Post &raquo;'); ?>
                </div>
            </nav>
            
            <?php 
            endwhile;
            else :
            ?>
            
            <!-- Post not found -->
            <article class="blog__post-content">
                <div class="blog__post-wrapper">
                    <h1 class="blog__post-title header-l">
                        Post <span class="blog__post-title--yellow">Not Found</span>
                    </h1>
                    <div class="blog__post-text">
                        <p>Sorry, the post you're looking for doesn't exist or has been moved.</p>
                        <p><a href="<?php echo home_url('/blog'); ?>" class="btn-primary">Back to Blog</a></p>
                    </div>
                </div>
            </article>
            
            <?php endif; ?>
        </div>
    </section>
</main>

<?php get_footer(); ?>