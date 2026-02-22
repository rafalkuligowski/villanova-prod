                <footer>
                    <div class="footer-banner">
                        <div class="container">
                            <div class="banner">
                                <?php
                                    $front_page_id = get_option('page_on_front');
                                ?>
                                <div class="content">
                                    <?php
                                    $banner_footer = get_field('banner_footer', $front_page_id);
                                    ?>
                                    <p class="subtitle"><?php echo $banner_footer['label']; ?></p>
                                    <p class="title"><?php echo $banner_footer['tytul']; ?></p>
                                    <div class="buttons">
                                        <?php if($banner_footer['przycisk_cta']['wyswietl']): ?>
                                            <a href="<?php echo $banner_footer['przycisk_cta']['odnosnik_do_strony']; ?>">
                                                <button class="button filled black"><?php echo $banner_footer['przycisk_cta']['tekst_przycisku']; ?></button>
                                            </a>
                                        <?php endif; ?>
                                        <?php if($banner_footer['przycisk_2']['wyswietl']): ?>
                                            <a href="<?php echo $banner_footer['przycisk_2']['odnosnik_do_strony']; ?>">
                                                <button class="button clear primary"><?php echo $banner_footer['przycisk_2']['tekst_przycisku']; ?></button>
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div class="photo">
                                    <img src="/wp-content/uploads/2023/09/dremmafooter-.webp" alt="banner-image"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="sidebars-wrapper">
                            <?php if (get_locale() == 'en_GB'): ?>
                                <?php if ( is_active_sidebar( 'footer_1_en' ) ) : ?>
                                    <div id="footer_1" class="footer-sidebar widget-area" role="complementary">
                                        <?php dynamic_sidebar( 'footer_1_en' ); ?>
                                    </div>
                                <?php endif; ?>
                                <?php if ( is_active_sidebar( 'footer_2_en' ) ) : ?>
                                    <div id="footer_2" class="footer-sidebar widget-area" role="complementary">
                                        <?php dynamic_sidebar( 'footer_2_en' ); ?>
                                    </div>
                                <?php endif; ?>
                                <?php if ( is_active_sidebar( 'footer_3_en' ) ) : ?>
                                    <div id="footer_3" class="footer-sidebar widget-area" role="complementary">
                                        <?php dynamic_sidebar( 'footer_3_en' ); ?>
                                    </div>
                                <?php endif; ?>
                            <?php else: ?>
                                <?php if ( is_active_sidebar( 'footer_1_pl' ) ) : ?>
                                    <div id="footer_1" class="footer-sidebar widget-area" role="complementary">
                                        <?php dynamic_sidebar( 'footer_1_pl' ); ?>
                                    </div>
                                <?php endif; ?>
                                <?php if ( is_active_sidebar( 'footer_2_pl' ) ) : ?>
                                    <div id="footer_2" class="footer-sidebar widget-area" role="complementary">
                                        <?php dynamic_sidebar( 'footer_2_pl' ); ?>
                                    </div>
                                <?php endif; ?>
                                <?php if ( is_active_sidebar( 'footer_3_pl' ) ) : ?>
                                    <div id="footer_3" class="footer-sidebar widget-area" role="complementary">
                                        <?php dynamic_sidebar( 'footer_3_pl' ); ?>
                                    </div>
                                <?php endif; ?>
                            <?php endif; ?>
                        </div>
                        <div class="copyrights-wrapper">
                            <?php if (get_locale() == 'en_GB'): ?>
                                <?php if ( is_active_sidebar( 'footer_copyrights_en' ) ) : ?>
                                    <div id="footer_copyrights" class="footer-sidebar widget-area" role="complementary">
                                        <?php dynamic_sidebar( 'footer_copyrights_en' ); ?>
                                    </div>
                                <?php endif; ?>
                            <?php else: ?>
                                <?php if ( is_active_sidebar( 'footer_copyrights_pl' ) ) : ?>
                                    <div id="footer_copyrights" class="footer-sidebar widget-area" role="complementary">
                                        <?php dynamic_sidebar( 'footer_copyrights_pl' ); ?>
                                    </div>
                                <?php endif; ?>
                            <?php endif; ?>
                            <div id="footer_copyrights_menu" class="footer-sidebar widget-area" role="complementary">
                                <nav class="navigation" role="navigation">
                                    <?php wp_nav_menu(array('theme_location' => 'footer_copyrights'));?>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <a href="https://imperit.pl" target="_blank" rel="nofollow" class="footer-love">
                        Website created with <span class="heart">❤</span> in <u>Poland</u>.
                    </a>
                </footer>
                <?php wp_footer(); ?>
                <script>
                (function($) {
                    $(window).scroll(function() {
                        var scroll = $(window).scrollTop();
                        if (scroll >= 50) {
                            $("#header").addClass("scroll");
                            $("#mobile-header").addClass("scroll");
                        } else {
                            $("#header").removeClass("scroll");
                            $("#mobile-header").removeClass("scroll");
                        }
                    });
                })(jQuery);
                </script>
            </body>
        </html>

        <!--



        <footer>
            <div class="footer-banner">
                <div class="container">
                    <div class="banner">
                        <?php
                            $front_page_id = get_option('page_on_front');
                        ?>
                        <div class="content">
                            <?php
                            $banner_footer = get_field('banner_footer', $front_page_id);
                            ?>
                            <p class="subtitle"><?php echo $banner_footer['label']; ?></p>
                            <span class="title"><?php echo $banner_footer['tytul']; ?></span>
                            <div class="buttons">
                                <?php if($banner_footer['przycisk_cta']['wyswietl']): ?>
                                    <a href="<?php echo $banner_footer['przycisk_cta']['odnosnik_do_strony']; ?>">
                                        <button class="button filled black"><?php echo $banner_footer['przycisk_cta']['tekst_przycisku']; ?></button>
                                    </a>
                                <?php endif; ?>
                                <?php if($banner_footer['przycisk_2']['wyswietl']): ?>
                                    <a href="<?php echo $banner_footer['przycisk_2']['odnosnik_do_strony']; ?>">
                                        <button class="button clear primary"><?php echo $banner_footer['przycisk_2']['tekst_przycisku']; ?></button>
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="photo">
                            <img src="https://villanova.imperit.pl/wp-content/uploads/2023/09/dremmafooter-.webp" alt="banner-image"/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="sidebars-wrapper">
                    <?php if (get_locale() == 'en_GB'): ?>
                        <?php if ( is_active_sidebar( 'footer_1_en' ) ) : ?>
                            <div id="footer_1" class="footer-sidebar widget-area" role="complementary">
                                <?php dynamic_sidebar( 'footer_1_en' ); ?>
                            </div>
                        <?php endif; ?>
                        <?php if ( is_active_sidebar( 'footer_2_en' ) ) : ?>
                            <div id="footer_2" class="footer-sidebar widget-area" role="complementary">
                                <?php dynamic_sidebar( 'footer_2_en' ); ?>
                            </div>
                        <?php endif; ?>
                        <?php if ( is_active_sidebar( 'footer_3_en' ) ) : ?>
                            <div id="footer_3" class="footer-sidebar widget-area" role="complementary">
                                <?php dynamic_sidebar( 'footer_3_en' ); ?>
                            </div>
                        <?php endif; ?>
                    <?php else: ?>
                        <?php if ( is_active_sidebar( 'footer_1_pl' ) ) : ?>
                            <div id="footer_1" class="footer-sidebar widget-area" role="complementary">
                                <?php dynamic_sidebar( 'footer_1_pl' ); ?>
                            </div>
                        <?php endif; ?>
                        <?php if ( is_active_sidebar( 'footer_2_pl' ) ) : ?>
                            <div id="footer_2" class="footer-sidebar widget-area" role="complementary">
                                <?php dynamic_sidebar( 'footer_2_pl' ); ?>
                            </div>
                        <?php endif; ?>
                        <?php if ( is_active_sidebar( 'footer_3_pl' ) ) : ?>
                            <div id="footer_3" class="footer-sidebar widget-area" role="complementary">
                                <?php dynamic_sidebar( 'footer_3_pl' ); ?>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
                <div class="copyrights-wrapper">
                    <?php if (get_locale() == 'en_GB'): ?>
                        <?php if ( is_active_sidebar( 'footer_copyrights_en' ) ) : ?>
                            <div id="footer_copyrights" class="footer-sidebar widget-area" role="complementary">
                                <?php dynamic_sidebar( 'footer_copyrights_en' ); ?>
                            </div>
                        <?php endif; ?>
                    <?php else: ?>
                        <?php if ( is_active_sidebar( 'footer_copyrights_pl' ) ) : ?>
                            <div id="footer_copyrights" class="footer-sidebar widget-area" role="complementary">
                                <?php dynamic_sidebar( 'footer_copyrights_pl' ); ?>
                            </div>
                        <?php endif; ?>
                    <?php endif; ?>
                    <div id="footer_copyrights_menu" class="footer-sidebar widget-area" role="complementary">
                        <nav class="navigation" role="navigation">
                            <?php wp_nav_menu(array('theme_location' => 'footer_copyrights'));?>
                        </nav>
                    </div>
                </div>
            </div>
            <a href="https://imperit.pl" target="_blank" class="footer-love">
                Website created with <span class="heart">❤</span> in <u>Poland</u>.
            </a>
        </footer>
        <?php wp_footer(); ?>
        <script>
            $(window).scroll(function() {
                var scroll = $(window).scrollTop();
                if (scroll >= 50) {
                    $("#header").addClass("scroll");
                    $("#mobile-header").addClass("scroll");
                } else {
                    $("#header").removeClass("scroll");
                    $("#mobile-header").removeClass("scroll");
                }
            });
        </script>
        <!-- Google Tag Manager (noscript) -->
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-M96PJ2JS"
                          height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
        <!-- End Google Tag Manager (noscript) -->
    </body>
</html>-->
