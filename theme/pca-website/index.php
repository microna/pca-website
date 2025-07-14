<?php get_header(); ?>

<main class="main-content">
    <section class="blog">
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
        <?php
        // Add "All Posts" link first
        $all_posts_active = (!is_category()) ? ' active' : '';
        ?>
      
        
        <?php
        // Get categories with posts
        $categories = get_categories(array(
            'orderby' => 'name',
            'order' => 'ASC',
            'hide_empty' => true,
            'exclude' => array(1), // Exclude "Uncategorized"
            'number' => 10 // Limit to 10 categories
        ));

        // Debug: Let's see what we get
        // echo '<!-- Categories found: ' . count($categories) . ' -->';

        // Get current category for active state
        $current_category = 0;
        if (is_category()) {
            $current_category = get_query_var('cat');
        }

        if (!empty($categories)) :
            foreach ($categories as $category) :
                $active_class = ($current_category == $category->term_id) ? ' active' : '';
        ?>
            <li class="blog__tagbar-item">
                <a href="<?php echo esc_url(get_category_link($category->term_id)); ?>" 
                   class="blog__tagbar-link<?php echo $active_class; ?>"
                   <?php if ($current_category == $category->term_id) echo 'aria-current="page"'; ?>>
                    <?php echo esc_html($category->name); ?>
              
                </a>
            </li>
        <?php 
            endforeach;
        else :
            // If no categories found, let's try getting ALL categories (even empty ones)
            $all_categories = get_categories(array(
                'orderby' => 'name',
                'order' => 'ASC',
                'hide_empty' => false,
                'exclude' => array(1)
            ));
            
            if (!empty($all_categories)) :
                foreach ($all_categories as $category) :
        ?>
            <li class="blog__tagbar-item">
                <a href="<?php echo esc_url(get_category_link($category->term_id)); ?>" 
                   class="blog__tagbar-link">
                    <?php echo esc_html($category->name); ?>
                
                </a>
            </li>
        <?php 
                endforeach;
            else :
        ?>
            <li class="blog__tagbar-item">
                <span class="blog__tagbar-link">No categories created yet</span>
            </li>
        <?php 
            endif;
        endif; 
        ?>
    </ul>
</nav>

            <!-- Blog Posts Grid -->
            <div class="blog__posts">
                <?php
                // Query for blog posts
                $blog_query = new WP_Query(array(
                    'post_type' => 'post',
                    'posts_per_page' => get_option('posts_per_page'),
                    'post_status' => 'publish',
                    'orderby' => 'date',
                    'order' => 'DESC',
                    'paged' => get_query_var('paged') ? get_query_var('paged') : 1
                ));

                if ($blog_query->have_posts()) :
                    while ($blog_query->have_posts()) : $blog_query->the_post();
                        // Get featured image
                        $featured_image = get_the_post_thumbnail_url(get_the_ID(), 'large');
                        if (!$featured_image) {
                            $featured_image = get_template_directory_uri() . '/assets/images/blog-image.jpg';
                        }
                        
                        // Get post categories
                        $categories = get_the_category();
                        
                        // Get post date
                        $post_date = get_the_date('d M, Y');
                        
                        // Get author name
                        $author_name = get_the_author();
                ?>
                
                <article class="blog__item" itemscope itemtype="https://schema.org/BlogPosting">
                    <div class="blog__image" style="background-image: url('<?php echo esc_url($featured_image); ?>');">
                        <a href="<?php the_permalink(); ?>" 
                           class="blog__image-btn" 
                           aria-label="Read more about <?php echo esc_attr(get_the_title()); ?>"
                           title="<?php echo esc_attr(get_the_title()); ?>">
                            <svg width="72" height="73" viewBox="0 0 72 73" fill="none" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                <path d="M21 51.0811L51 21.0811" stroke="white" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M21 21.0811H51V51.0811" stroke="white" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </a>
                    </div>
                    
                    <div class="blog__item-info">
                        <div class="blog__item-info-tags">
                            <?php 
                            if ($categories) :
                                $count = 0;
                                foreach ($categories as $category) :
                                    if ($count >= 2) break; // Limit to 2 categories
                            ?>
                                <a href="<?php echo esc_url(get_category_link($category->term_id)); ?>" 
                                   class="blog__item-info-tags-item"
                                   rel="category tag">
                                    <?php echo esc_html($category->name); ?>
                                </a>
                            <?php 
                                    $count++;
                                endforeach;
                            else :
                            ?>
                                <span class="blog__item-info-tags-item">Blog</span>
                            <?php endif; ?>
                        </div>
                        
                        <div class="blog__item-info-content">
                            <h2 class="blog__item-info-content--title" itemprop="headline">
                                <a href="<?php the_permalink(); ?>" itemprop="url">
                                    <?php the_title(); ?>
                                </a>
                            </h2>
                            
                            <div class="blog__item-meta">
                                <span class="blog__item-info-content-author" itemprop="author">
                                    <?php echo esc_html($author_name); ?>
                                </span>
                                <time class="blog__item-info-content-date" 
                                      datetime="<?php echo esc_attr(get_the_date('c')); ?>" 
                                      itemprop="datePublished">
                                    <?php echo esc_html($post_date); ?>
                                </time>
                            </div>
                        </div>
                    </div>
                </article>
                
                <?php 
                    endwhile;
                else :
                ?>
                
                <!-- Fallback when no posts found -->
                <article class="blog__item blog__item--no-posts">
                    <div class="blog__image" style="background-image: url('<?php echo get_template_directory_uri(); ?>/assets/images/blog-image.jpg');">
                        <div class="blog__image-btn" aria-hidden="true">
                            <svg width="72" height="73" viewBox="0 0 72 73" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M21 51.0811L51 21.0811" stroke="white" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
                                <path d="M21 21.0811H51V51.0811" stroke="white" stroke-width="4" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                    </div>
                    
                    <div class="blog__item-info">
                        <div class="blog__item-info-tags">
                            <span class="blog__item-info-tags-item">Blog</span>
                        </div>
                        
                        <div class="blog__item-info-content">
                            <h2 class="blog__item-info-content--title">
                                No posts found
                            </h2>
                            
                            <div class="blog__item-meta">
                                <span class="blog__item-info-content-author">
                                    Admin
                                </span>
                                <time class="blog__item-info-content-date" 
                                      datetime="<?php echo esc_attr(date('c')); ?>">
                                    <?php echo date('d M, Y'); ?>
                                </time>
                            </div>
                        </div>
                    </div>
                </article>
                
                <?php endif; ?>
            </div>

            <!-- Pagination -->
            <?php if ($blog_query->max_num_pages > 1) : ?>
            <nav class="blog__pagination" aria-label="Blog Pagination">
                <?php
                echo paginate_links(array(
                    'total' => $blog_query->max_num_pages,
                    'current' => max(1, get_query_var('paged')),
                    'prev_text' => '&laquo; Previous',
                    'next_text' => 'Next &raquo;',
                    'type' => 'list',
                    'before_page_number' => '<span class="screen-reader-text">Page </span>',
                    'after_page_number' => '<span class="screen-reader-text"> of ' . $blog_query->max_num_pages . '</span>'
                ));
                ?>
            </nav>
            <?php endif; ?>

            <?php wp_reset_postdata(); ?>
        </div>
    </section>
</main>

<?php get_footer(); ?>