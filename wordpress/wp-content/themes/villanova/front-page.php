<?php get_header(); ?>
    <section id="hero" style="background-image: url('https://villanova.pl/wp-content/uploads/2023/09/343CD308-89E5-4F15-B402-19FC9FEB749F-scaled-e1694008542470.webp');">
        <video class="videobg" width="100%" autoplay muted loop playsinline>
            <source src="https://villanova.pl/wp-content/uploads/2023/08/bg_villa_nova.webm" type="video/webm">
            <source src="https://villanova.pl/wp-content/uploads/2023/10/bg_villa_nova.mp4" type="video/mp4">
        </video>
        <div class="videobg-filter"></div>
        <div class="container center">
            <?php
                $hero = get_field('hero');
            ?>
            <p class="subtitle"><?php echo $hero['label']; ?></p>
            <p class="title"><?php echo $hero['tytul']; ?></p>
            <p class="description"><?php echo $hero['opis']; ?></p>
            <div class="buttons">
                <?php if($hero['przycisk_cta']['wyswietl']): ?>
                    <a href="<?php echo $hero['przycisk_cta']['odnosnik_do_strony']; ?>">
                        <button class="button filled primary"><?php echo $hero['przycisk_cta']['tekst_przycisku']; ?></button>
                    </a>
                <?php endif; ?>
                <?php if($hero['przycisk_2']['wyswietl']): ?>
                    <a href="<?php echo $hero['przycisk_2']['odnosnik_do_strony']; ?>">
                        <button class="button clear light"><?php echo $hero['przycisk_2']['tekst_przycisku']; ?></button>
                    </a>
                <?php endif; ?>
            </div>
            <div class="partners">
                <div class="list">
                    <?php foreach($hero['partnerzy'] as $parnter): ?>
                    <div class="slide">
                        <a href="<?php echo $parnter['strona']; ?>">
                            <img class="partner" alt="partner" src="<?php echo $parnter['img']; ?>" />
                        </a>
                    </div>
                    <?php endforeach; ?>
                </div>
                <script>
                    $('.list').slick({
                        slidesToShow: 5,
                        slidesToScroll: 1,
                        autoplay: true,
                        autoplaySpeed: 2000,
                        infinite: true,
                        arrows: false,
                        dots: false,
                        responsive: [
                            {
                                breakpoint: 1024,
                                settings: {
                                    slidesToShow: 4
                                }
                            },
                            {
                                breakpoint: 880,
                                settings: {
                                    slidesToShow: 3
                                }
                            }
                        ]
                    });
                </script>
            </div>
        </div>
        <img class="scroll-down" alt="scroll down" src="<?php echo get_template_directory_uri(); ?>/assets/icons/scroll-down.svg" />
    </section>
    <section id="services">
        <div class="container">
            <?php
                $services = get_field('uslugi');
            ?>
            <div class="page-title-bar">
                <div class="title"><?php echo $services['tytul_sekcji']; ?></div>
                <?php if($services['przycisk']['wyswietl']): ?>
                    <a href="<?php echo $services['przycisk']['odnosnik_do_strony']; ?>">
                        <button class="button outline primary"><?php echo $services['przycisk']['tekst_przycisku']; ?></button>
                    </a>
                <?php endif; ?>
            </div>
            <?php
            $args = array(
                'post_type' => 'usluga',
                'posts_per_page' => 10,
                'post_parent' => 0,
                'order' => 'ASC',
                'orderby' => 'title'
            );
            $the_query = new WP_Query( $args ); ?>
            <?php if ( $the_query->have_posts() ) : ?>
                <div class="services-slider">
                    <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                        <a href="<?php echo get_permalink(); ?>" class="service">
                            <div class="photo" style="background-image: url('<?php echo get_the_post_thumbnail_url(); ?>');">
                                <div class="filter"></div>
                            </div>
                            <div class="details">
                                <h2 class="title"><?php the_title(); ?></h2>
                                <div class="description"><?php echo get_field('short-description'); ?></div>
                            </div>
                            <div class="show-more"><?php echo pll_e('Czytaj więcej');?></div>
                        </a>
                    <?php endwhile; ?>
                </div>
                <script>
                    $('.services-slider').slick({
                        slidesToShow: 4,
                        slidesToScroll: 4,
                        autoplay: true,
                        autoplaySpeed: 4000,
                        infinite: true,
                        arrows: false,
                        dots: true,
                        responsive: [
                            {
                                breakpoint: 1024,
                                settings: {
                                    slidesToShow: 3,
                                    slidesToScroll: 3
                                }
                            },
                            {
                                breakpoint: 880,
                                settings: {
                                    slidesToShow: 2,
                                    slidesToScroll: 2
                                }
                            },
                            {
                                breakpoint: 420,
                                settings: {
                                    slidesToShow: 1,
                                    slidesToScroll: 1
                                }
                            }
                        ]
                    });
                </script>
                <?php wp_reset_postdata(); ?>

            <?php else: ?>
                <div class="no-content-info">
                    Brak usług do wyświetlenia. Prosimy wrócić później.
                </div>
            <?php endif; ?>
        </div>
    </section>
    <section id="star-banner">
    <div class="container">
        <div class="banner">
            <div class="content">
                <?php
                $banner_2 = get_field('banner_2');
                ?>
                <p class="subtitle"><?php echo $banner_2['label']; ?></p>
                <h2 class="title"><?php echo $banner_2['tytul']; ?></h2>
                <div class="buttons">
                    <?php if($banner_2['przycisk_cta']['wyswietl']): ?>
                        <a href="<?php echo $banner_2['przycisk_cta']['odnosnik_do_strony']; ?>">
                            <button class="button filled black"><?php echo $banner_2['przycisk_cta']['tekst_przycisku']; ?></button>
                        </a>
                    <?php endif; ?>
                    <?php if($banner_2['przycisk_2']['wyswietl']): ?>
                        <a href="<?php echo $banner_2['przycisk_2']['odnosnik_do_strony']; ?>">
                            <button class="button clear primary"><?php echo $banner_2['przycisk_2']['tekst_przycisku']; ?></button>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
            <div class="photo">
                <img src="<?php echo $banner_2['zdjecie']; ?>" alt="banner-image"/>
            </div>
        </div>
    </div>
</section>
    <section id="clinic">
        <div class="container">
            <?php
                $gallery = get_field('galeria');
            ?>
            <div class="page-title-bar">
                <div class="title"><?php echo $gallery['tytul_sekcji']; ?></div>
                <?php if($gallery['przycisk']['wyswietl']): ?>
                    <a href="<?php echo $gallery['przycisk']['odnosnik_do_strony']; ?>">
                        <button class="button outline primary"><?php echo $gallery['przycisk']['tekst_przycisku']; ?></button>
                    </a>
                <?php endif; ?>
            </div>
            <div class="gallery">
                <?php echo do_shortcode('[aigpl-gallery id="208"]'); ?>
            </div>
        </div>
    </section>
    <section>
    <div class="container">
        <div class="banner">
            <div class="content">
                <?php
                $banner_1 = get_field('banner_1');
                ?>
                <p class="subtitle"><?php echo $banner_1['label']; ?></p>
                <h2 class="title"><?php echo $banner_1['tytul']; ?></h2>
                <div class="buttons">
                    <?php if($banner_1['przycisk_cta']['wyswietl']): ?>
                        <a href="<?php echo $banner_1['przycisk_cta']['odnosnik_do_strony']; ?>">
                            <button class="button filled black"><?php echo $banner_1['przycisk_cta']['tekst_przycisku']; ?></button>
                        </a>
                    <?php endif; ?>
                    <?php if($banner_1['przycisk_2']['wyswietl']): ?>
                        <a href="<?php echo $banner_1['przycisk_2']['odnosnik_do_strony']; ?>">
                            <button class="button clear primary"><?php echo $banner_1['przycisk_2']['tekst_przycisku']; ?></button>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
            <div class="photo">
                <img src="<?php echo $banner_1['zdjecie']; ?>" alt="banner-image"/>
            </div>
        </div>
    </div>
</section>
    <section id="ambasadors">
        <div class="container">
            <?php
                $ambasadors = get_field('ambasadorzy');
            ?>
            <div class="page-title-bar">
                <div class="title"><?php echo $ambasadors['tytul_sekcji']; ?></div>
                <?php if($ambasadors['przycisk']['wyswietl']): ?>
                    <a href="<?php echo $ambasadors['przycisk']['odnosnik_do_strony']; ?>">
                        <button class="button outline primary"><?php echo $ambasadors['przycisk']['tekst_przycisku']; ?></button>
                    </a>
                <?php endif; ?>
            </div>
            <?php
            $args = array(
                'post_type' => 'ambasadorzy',
                'posts_per_page' => 10
            );
            $the_query = new WP_Query( $args ); ?>
            <?php if ( $the_query->have_posts() ) : ?>
                <div class="ambasadors-slider">
                    <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                        <div class="ambasador">
                            <div class="top">
                                <div class="photo" style="background-image: url('<?php echo get_the_post_thumbnail_url(); ?>');"></div>
                                <div class="details">
                                    <h2 class="title"><?php the_title(); ?></h2>
                                    <p class="subtitle"><?php echo get_field('zawod'); ?></p>
                                </div>
                            </div>
                            <div class="description"><?php echo get_field('krotki_opis'); ?></div>
                            <a class="show-more" href="<?php echo get_permalink(); ?>"><?php echo pll_e('Czytaj więcej');?></a>
                        </div>
                    <?php endwhile; ?>
                </div>
                <script>
                    $('.ambasadors-slider').slick({
                        slidesToShow: 3,
                        slidesToScroll: 3,
                        autoplay: true,
                        autoplaySpeed: 4000,
                        infinite: true,
                        arrows: false,
                        dots: true,
                        responsive: [
                            {
                                breakpoint: 1024,
                                settings: {
                                    slidesToShow: 2,
                                    slidesToScroll: 2
                                }
                            },
                            {
                                breakpoint: 640,
                                settings: {
                                    slidesToShow: 1,
                                    slidesToScroll: 1
                                }
                            }
                        ]
                    });
                </script>
                <?php wp_reset_postdata(); ?>

            <?php else: ?>
                <div class="no-content-info">
                    Brak ambasadorów do wyświetlenia. Prosimy wrócić później.
                </div>
            <?php endif; ?>
        </div>
    </section>
    <section id="team">
        <div class="container">
            <?php
                $zespol = get_field('zespol');
            ?>
            <div class="page-title-bar">
                <div class="title"><?php echo $zespol['tytul_sekcji']; ?></div>
                <?php if($zespol['przycisk']['wyswietl']): ?>
                    <a href="<?php echo $zespol['przycisk']['odnosnik_do_strony']; ?>">
                        <button class="button outline primary"><?php echo $zespol['przycisk']['tekst_przycisku']; ?></button>
                    </a>
                <?php endif; ?>
            </div>
            <div class="team-slider">
                <?php
                $args = array(
                    'post_type' => 'zespol',
                    'posts_per_page' => 10,
                    'meta_key' => 'pin_to_top',
                    'orderby' => array(
                        'meta_value' => 'DESC',
                        'date' => 'ASC'
                    ),
                );
                $the_query = new WP_Query( $args ); ?>
                <?php if ( $the_query->have_posts() ) : ?>
                    <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                        <?php if(get_field('pin_to_top')): ?>
                            <a href="<?php echo get_permalink(); ?>" class="team">
                                <div class="photo">
                                    <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" />
                                </div>
                                <div class="details">
                                    <h2 class="title"><?php the_title(); ?></h2>
                                    <div class="description"><?php echo get_the_content(); ?></div>
                                </div>
                                <div class="show-more"><?php echo pll_e('Czytaj więcej');?></div>
                            </a>
                        <?php endif; ?>
                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>
                <?php endif; ?>
                <?php
                $args = array(
                    'post_type' => 'zespol',
                    'posts_per_page' => 10,
                    'order' => 'ASC',
                    'orderby' => 'title',
                );
                $the_query = new WP_Query( $args ); ?>
                <?php if ( $the_query->have_posts() ) : ?>
                    <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                        <?php if(!get_field('pin_to_top')): ?>
                            <a href="<?php echo get_permalink(); ?>" class="team">
                                <div class="photo">
                                    <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" />
                                </div>
                                <div class="details">
                                    <h2 class="title"><?php the_title(); ?></h2>
                                    <div class="description"><?php echo get_the_content(); ?></div>
                                </div>
                                <div class="show-more"><?php echo pll_e('Czytaj więcej');?></div>
                            </a>
                        <?php endif; ?>
                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>
                <?php endif; ?>
            </div>
            <script>
            $('.team-slider').slick({
                slidesToShow: 4,
                slidesToScroll: 4,
                autoplay: false,
                infinite: true,
                arrows: false,
                dots: true,
                responsive: [
                    {
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 3
                        }
                    },
                    {
                        breakpoint: 880,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 2
                        }
                    },
                    {
                        breakpoint: 420,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    }
                ]
            });
        </script>
    </div>
    </section>
<?php
$args = array(
    'post_type' => 'post',
    'posts_per_page' => 4
);
$the_query = new WP_Query( $args ); ?>
<?php if ( $the_query->have_posts() ) : ?>
    <section id="posts">
        <div class="container">
            <?php
                $news = get_field('aktualnosci');
            ?>
            <div class="page-title-bar">
                <div class="title"><?php echo $news['tytul_sekcji']; ?></div>
                <?php if($news['przycisk']['wyswietl']): ?>
                    <a href="<?php echo $news['przycisk']['odnosnik_do_strony']; ?>">
                        <button class="button outline primary"><?php echo $news['przycisk']['tekst_przycisku']; ?></button>
                    </a>
                <?php endif; ?>
            </div>
                <div class="posts-wrapper">
                    <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                        <a href="<?php echo get_permalink(); ?>" class="post" style="background-image: url('<?php echo get_the_post_thumbnail_url(); ?>');">
                            <div class="filter"></div>
                            <div class="title-bar">
                                <div class="title"><?php the_title(); ?></div>
                                <button class="button clear light"><?php echo pll_e('Czytaj więcej');?></button>
                            </div>
                        </a>
                    <?php endwhile; ?>
                </div>
            <?php wp_reset_postdata(); ?>
        </div>
    </section>
<?php endif; ?>
<?php get_footer(); ?>
