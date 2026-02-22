<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta name="google-site-verification" content="1Y3YBnjKFxRCsoVYX41O-nVd0kfUA8kOUjzykFlzr14" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="<?php bloginfo('description'); ?>">
        <link rel='preload' id='style-css' href='<?php echo get_template_directory_uri(); ?>/scss/main.css' as='style' onload="this.onload=null;this.rel='stylesheet'" type='text/css' media='all' />
        <link rel='preload' id='style-aos' href='<?php echo get_template_directory_uri(); ?>/scss/aos.css' as='style' onload="this.onload=null;this.rel='stylesheet'" type='text/css' media='all' />
        <link rel='preload' id='style-slick' href='<?php echo get_template_directory_uri(); ?>/scss/slick.css' as='style' onload="this.onload=null;this.rel='stylesheet'" type='text/css' media='all' />
        <noscript>
            <link rel='stylesheet' id='style-css' href='<?php echo get_template_directory_uri(); ?>/scss/main.css' type='text/css' media='all' />
            <link rel='stylesheet' id='style-aos' href='<?php echo get_template_directory_uri(); ?>/scss/aos.css' type='text/css' media='all' />
            <link rel='stylesheet' id='style-slick' href='<?php echo get_template_directory_uri(); ?>/scss/slick.css' type='text/css' media='all' />
        </noscript>
        <link rel="preload" as="image" href="https://villanova.pl/wp-content/uploads/2023/08/bg_villa_nova_poster.jpg" fetchpriority="high">
        <?php wp_head(); ?>
        <script src="<?php echo get_template_directory_uri(); ?>/js/slick.min.js"></script>
        <script src="<?php echo get_template_directory_uri(); ?>/js/aos.min.js"></script>
        <script src="<?php echo get_template_directory_uri(); ?>/js/index.js"></script>
        <!-- Google Tag Manager -->
        <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
                j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
                'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
            })(window,document,'script','dataLayer','GTM-M96PJ2JS');</script>
        <!-- End Google Tag Manager -->
        <!-- Google tag (gtag.js) -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=AW-306505567"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'AW-306505567');
        </script>
        <!-- Facebook Pixel Code -->
        <script>
            !function(f,b,e,v,n,t,s)
            {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
                n.callMethod.apply(n,arguments):n.queue.push(arguments)};
                if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
                n.queue=[];t=b.createElement(e);t.async=!0;
                t.src=v;s=b.getElementsByTagName(e)[0];
                s.parentNode.insertBefore(t,s)}(window,document,'script',
                'https://connect.facebook.net/en_US/fbevents.js');

            fbq('init', '1437740186617074');
            fbq('track', 'PageView');
        </script>
        <noscript>
            <img height="1" width="1" src="https://www.facebook.com/tr?id=1437740186617074&ev=PageView&noscript=1" alt="Facebook Pixel"/>
        </noscript>
        <!-- End Facebook Pixel Code -->
    </head>
    <body <?php body_class(); ?>>
        <header id="header" role="banner">
            <div class="container">
                <div class="top-bar">
                    <div class="header-col left">
                        <svg width="15" height="18" viewBox="0 0 15 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M4.51636 7.50095C4.51636 5.84425 5.85216 4.50122 7.49995 4.50122C8.29124 4.50122 9.05013 4.81726 9.60966 5.37982C10.1692 5.94238 10.4835 6.70537 10.4835 7.50095C10.4835 9.15766 9.14774 10.5007 7.49995 10.5007C5.85216 10.5007 4.51636 9.15766 4.51636 7.50095ZM6.00815 7.50095C6.00815 8.32931 6.67605 9.00082 7.49995 9.00082C8.32384 9.00082 8.99174 8.32931 8.99174 7.50095C8.99174 6.6726 8.32384 6.00109 7.49995 6.00109C6.67605 6.00109 6.00815 6.6726 6.00815 7.50095Z" fill="#1E1E1E"/>
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M4.28444 16.35C5.02696 17.3915 6.22553 18.0065 7.5 17.9999C8.77447 18.0065 9.97304 17.3915 10.7156 16.35C13.5582 12.4076 15 9.44391 15 7.54058C15 3.37603 11.6421 0 7.5 0C3.35786 0 0 3.37603 0 7.54058C0 9.44391 1.44182 12.4076 4.28444 16.35ZM1.6268 7.54208C1.6305 4.28239 4.25786 1.64082 7.5 1.6371C10.7421 1.64082 13.3695 4.28239 13.3732 7.54208C13.3732 9.04944 11.9612 11.8369 9.39831 15.3909C8.95697 16.0021 8.2512 16.3638 7.5 16.3638C6.7488 16.3638 6.04303 16.0021 5.60169 15.3909C3.03879 11.8369 1.6268 9.04944 1.6268 7.54208Z" fill="#1E1E1E"/>
                        </svg>
                        <p>ul. Przyczółkowa 219, 02-962 Warszawa</p>
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M5.99996 15.9999H0.666662C0.298475 15.9999 0 15.7016 0 15.3335C0 14.9654 0.298475 14.667 0.666662 14.667H5.99996C6.36815 14.667 6.66662 14.9654 6.66662 15.3335C6.66662 15.7016 6.36815 15.9999 5.99996 15.9999Z" fill="#1E1E1E"/>
                            <path d="M4.66664 13.3342H0.666662C0.298475 13.3342 0 13.0358 0 12.6677C0 12.2996 0.298475 12.0012 0.666662 12.0012H4.66664C5.03482 12.0012 5.3333 12.2996 5.3333 12.6677C5.3333 13.0358 5.03482 13.3342 4.66664 13.3342Z" fill="#1E1E1E"/>
                            <path d="M3.33331 10.6682H0.666662C0.298475 10.6682 0 10.3698 0 10.0017C0 9.6336 0.298475 9.33521 0.666662 9.33521H3.33331C3.7015 9.33521 3.99997 9.6336 3.99997 10.0017C3.99997 10.3698 3.7015 10.6682 3.33331 10.6682Z" fill="#1E1E1E"/>
                            <path d="M8.6666 15.97C8.29841 15.9864 7.98665 15.7013 7.97027 15.3332C7.95389 14.9651 8.23908 14.6534 8.60726 14.6371C12.1175 14.316 14.7711 11.3186 14.6633 7.79633C14.5556 4.27409 11.7238 1.44438 8.2005 1.3383C4.67722 1.23222 1.68021 3.88643 1.36065 7.39581C1.32751 7.76242 1.00337 8.03276 0.636651 7.99963C0.269936 7.96651 -0.00048198 7.64245 0.0326549 7.27584C0.418904 3.01595 4.08951 -0.186053 8.36364 0.00840578C12.6378 0.202865 16.0023 3.72495 15.9999 8.0023C16.0211 12.1461 12.8563 15.6118 8.7266 15.9673C8.7066 15.9693 8.68593 15.97 8.6666 15.97Z" fill="#1E1E1E"/>
                            <path d="M7.99991 4.00342C7.63173 4.00342 7.33325 4.30181 7.33325 4.66989V8.00227C7.33329 8.17901 7.40355 8.34851 7.52858 8.47347L9.52857 10.4729C9.79016 10.7255 10.206 10.7219 10.4631 10.4648C10.7203 10.2077 10.7239 9.79201 10.4712 9.5305L8.66658 7.72635V4.66989C8.66658 4.30181 8.3681 4.00342 7.99991 4.00342Z" fill="#1E1E1E"/>
                        </svg>
                        <p><?php echo pll_e('Pn-Pt:');?> 9:00 - 21:00, <?php echo pll_e('Sb:');?> 9:00 - 15:00</p>
                    </div>
                    <div class="header-col right">
                        <p><?php echo pll_e('Znajdź nas w mediach społecznościowych:');?></p>
                        <a href="https://www.facebook.com/VillaNovaKlinikaDentystyczna/" target="_blank" rel="no">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M20 10.0608C20 15.082 16.3383 19.2446 11.5583 20V12.9885H13.8825L14.325 10.0876H11.5583V8.20541C11.5583 7.41144 11.945 6.63844 13.1833 6.63844H14.4408V4.16852C14.4408 4.16852 13.2992 3.97233 12.2083 3.97233C9.93 3.97233 8.44167 5.36156 8.44167 7.87592V10.0868H5.90917V12.9876H8.44167V19.9992C3.6625 19.2429 0 15.0811 0 10.0608C0 4.50472 4.4775 0 10 0C15.5225 0 20 4.50388 20 10.0608Z" fill="#1E1E1E"/>
                            </svg>
                        </a>
                        <a href="https://www.instagram.com/villanovadentalclinic/" target="_blank" rel="nofollow">
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M5.87667 0.06C6.94333 0.0116667 7.28417 0 10 0C12.7158 0 13.0567 0.0116667 14.1233 0.06C15.6642 0.13 17.2025 0.559167 18.3217 1.67833C19.4383 2.795 19.8692 4.33083 19.94 5.87667C19.9883 6.94333 20 7.28417 20 10C20 12.7158 19.9883 13.0567 19.94 14.1233C19.8692 15.6683 19.4442 17.1992 18.3217 18.3217C17.205 19.4383 15.6683 19.8692 14.1233 19.94C13.0567 19.9883 12.7158 20 10 20C7.28417 20 6.94333 19.9883 5.87667 19.94C4.33333 19.8692 2.79917 19.4425 1.67833 18.3217C0.5625 17.2067 0.130833 15.6675 0.06 14.1233C0.0116667 13.0567 0 12.7158 0 10C0 7.28417 0.0116667 6.94333 0.06 5.87667C0.130833 4.33167 0.556667 2.8 1.67833 1.67833C2.79583 0.560833 4.33083 0.130833 5.87667 0.06ZM14.0408 1.86C12.9867 1.81167 12.67 1.80167 10 1.80167C7.33 1.80167 7.01333 1.81167 5.95917 1.86C4.86833 1.91 3.7525 2.1525 2.9525 2.9525C2.16583 3.73917 1.90917 4.87917 1.86 5.95917C1.81167 7.01333 1.80167 7.33 1.80167 10C1.80167 12.67 1.81167 12.9867 1.86 14.0408C1.91 15.1275 2.155 16.25 2.9525 17.0475C3.735 17.8308 4.88333 18.0908 5.95917 18.14C7.01333 18.1883 7.33 18.1983 10 18.1983C12.67 18.1983 12.9867 18.1883 14.0408 18.14C15.135 18.09 16.2458 17.8492 17.0475 17.0475C17.8367 16.2583 18.0908 15.125 18.14 14.0408C18.1883 12.9867 18.1983 12.67 18.1983 10C18.1983 7.33 18.1883 7.01333 18.14 5.95917C18.09 4.86583 17.8492 3.75417 17.0475 2.9525C16.2533 2.15833 15.1308 1.91 14.0408 1.86Z" fill="#1E1E1E"/>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M4.86501 9.99999C4.86501 7.16416 7.16417 4.86499 10 4.86499C12.8358 4.86499 15.135 7.16416 15.135 9.99999C15.135 12.8358 12.8358 15.135 10 15.135C7.16417 15.135 4.86501 12.8358 4.86501 9.99999ZM6.66667 9.99999C6.66667 11.8408 8.15917 13.3333 10 13.3333C11.8408 13.3333 13.3333 11.8408 13.3333 9.99999C13.3333 8.15916 11.8408 6.66666 10 6.66666C8.15917 6.66666 6.66667 8.15916 6.66667 9.99999Z" fill="#1E1E1E"/>
                                <circle cx="15.3383" cy="4.66167" r="1.2" fill="#1E1E1E"/>
                            </svg>
                        </a>
                    </div>
                </div>
                <div class="header-content">
                    <div class="header-col left">
                        <div class="logo">
                            <?php the_custom_logo(); ?>
                        </div>
                        <nav class="navigation" role="navigation">
                            <?php
                                $locations = get_nav_menu_locations();
                                $menu_id   = $locations['top'] ?? 0;

                                if (!$menu_id) return;

                                $menu_items = wp_get_nav_menu_items($menu_id);
                                $menu_tree  = build_menu_tree($menu_items);

                                if ($menu_tree):
                                ?>
                                <div class="multi-level-menu">
                                    <?php render_menu_level($menu_tree); ?>
                                </div>
                                <?php endif; ?>
                        </nav>
                    </div>
                    <div class="header-col right">
                        <nav class="navigation" role="navigation">
                            <?php wp_nav_menu(array('theme_location' => 'header_right'));?>
                        </nav>
                    </div>
                </div>
            </div>
        </header>
        <header id="mobile-header" role="banner">
            <div class="container">
                <div class="mobile-header-content">
                    <div class="menu-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve" width="512" height="512">
                            <g>
                                <path fill="white" d="M480,224H32c-17.673,0-32,14.327-32,32s14.327,32,32,32h448c17.673,0,32-14.327,32-32S497.673,224,480,224z"/>
                                <path fill="white" d="M32,138.667h448c17.673,0,32-14.327,32-32s-14.327-32-32-32H32c-17.673,0-32,14.327-32,32S14.327,138.667,32,138.667z"/>
                                <path fill="white" d="M480,373.333H32c-17.673,0-32,14.327-32,32s14.327,32,32,32h448c17.673,0,32-14.327,32-32S497.673,373.333,480,373.333z"/>
                            </g>
                        </svg>
                    </div>
                    <div class="logo">
                        <?php the_custom_logo(); ?>
                    </div>
                    <div class="menu-icon"></div>
                </div>
            </div>
            <div class="mobile-menu" id="mobile-menu">
                <div class="column">
                    <div>
                        <div class="logo">
                            <div>
                                <?php the_custom_logo(); ?>
                            </div>
                            <div class="close-menu">
                                Zamknij
                            </div>
                        </div>
                        <nav class="navigation" role="navigation">

                            <?php
                                $locations = get_nav_menu_locations();
                                $menu_id   = $locations['top'] ?? 0;

                                if (!$menu_id) return;

                                $menu_items = wp_get_nav_menu_items($menu_id);
                                $menu_tree  = build_menu_tree($menu_items);

                                if ($menu_tree):
                                ?>
                                <div class="multi-level-menu">
                                    <?php render_menu_level($menu_tree); ?>
                                </div>
                                <?php endif; ?>
                        </nav>
                    </div>
                    <nav class="navigation" role="navigation">
                        <?php wp_nav_menu(array('theme_location' => 'header_right'));?>
                    </nav>
                </div>
            </div>
        </header>
