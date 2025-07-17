
<footer>
    <div class="container">
        <div class="footer">
            <div class="footer__top">
                <div class="footer__top-left">
                    <h3 class="header-l footer__top-title">
                        Let's Connect There
                    </h3>
                </div>
                <div class="footer__top-right">
                    <a href="#" class="btn-primary modal__btn">Get in Touch</a>
                </div>
            </div>
            <div class="footer__bottom">
                <div class="footer__bottom-col-1">
                <a href="<?php echo esc_url(home_url('/')); ?>">
    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/footer-logo.png" alt="<?php echo esc_attr(get_bloginfo('name')); ?>">
</a>
                    <div class="footer__bottom-col-1--socials">
                        <a href="#" aria-label="Facebook"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/facebook.svg" alt="facebook"></a>
                        <a href="#" aria-label="Instagram"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/instagram.svg" alt="instagram"></a>
                        <a href="#" aria-label="TikTok"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/tiktok.svg" alt="tiktok"></a>
                        <a href="#" aria-label="YouTube"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/youtube.svg" alt="youtube"></a>
                    </div>
                </div>
                <div class="footer__bottom-col-2">
                    <h5 class="footer__bottom-header">
                        Navigation
                    </h5>
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'footer',
                        'menu_class' => 'footer__bottom-col-2--list',
                        'container' => false,
                    ));
                    ?>
                </div>

                <div class="footer__bottom-col-3">
                    <h5 class="footer__bottom-header">
                        Contact
                    </h5>
                    <div class="footer__bottom-col-3--info">
                        <a href="tel:+0711111111">+07 11 11 11 11 11</a>
                        <a href="mailto:benmartindalebmp@gmail.com">benmartindalebmp@gmail.com</a>
                        <a href="https://benmartindalebmp.co.uk" target="_blank">benmartindalebmp.co.uk</a>
                    </div>

                </div>
            </div>
            <div class="footer__exclaimer">
                <div class="footer__exclamation-text">Copyright© 2025. All Rights Reserved.</div>
                <div class="footer__exclamation-links">
                    User Terms & Conditions | Privacy Policy
                </div>
            </div>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>
</html>