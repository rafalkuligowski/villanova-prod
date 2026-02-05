<?php /* Template Name: O nas */ ?>
<?php get_header(); ?>
<div class="wrapper">
    <div class="page-banner" style="background-image: url('<?php echo get_the_post_thumbnail_url(); ?>');">
        <div class="mask"></div>
        <div class="container">
            <div class="info">
                <h1 class="title"><?php the_title(); ?></h1>
                <p class="description"><?php echo get_field('short_description'); ?></p>
            </div>
        </div>
    </div>
    <div class="page-content">
        <section id="about">
            <div class="container">
                <div class="about-wrapper">
                    <div class="content">
                        <?php
                            $about = get_field('o_nas');
                        ?>
                        <p class="subtitle"><?php echo $about['label']; ?></p>
                        <h2 class="title"><?php echo $about['tytul']; ?></h2>
                        <div class="description">
                            <?php echo $about['opis']; ?>
                        </div>
                    </div>
                    <div class="photo" style="background-image: url('<?php echo $about['obraz']; ?>');">
                    </div>
                </div>
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
                            'title' => 'ASC'
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
        <section id="media">
            <div class="container">
                <?php
                    $media = get_field('media');
                ?>
                <div class="page-title-bar">
                    <div class="title"><?php echo $media['tytul_sekcji']; ?></div>
                    <?php if($media['przycisk']['wyswietl']): ?>
                        <a href="<?php echo $media['przycisk']['odnosnik_do_strony']; ?>">
                            <button class="button outline primary"><?php echo $media['przycisk']['tekst_przycisku']; ?></button>
                        </a>
                    <?php endif; ?>
                </div>
                <?php
                $args = array(
                    'post_type' => 'media',
                    'posts_per_page' => 100
                );
                $the_query = new WP_Query( $args ); ?>
                <?php if ( $the_query->have_posts() ) : ?>
                    <div class="media-slider">
                        <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                            <div>
                                <img class="logo" src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" />
                            </div>
                        <?php endwhile; ?>
                    </div>
                    <script>
                        $('.media-slider').slick({
                            slidesToShow: 5,
                            slidesToScroll: 1,
                            autoplay: false,
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
                                        slidesToShow: 2
                                    }
                                }
                            ]
                        });
                    </script>
                <?php wp_reset_postdata(); ?>

                <?php else: ?>
                    <div class="no-content-info">
                        Brak mediów do wyświetlenia. Prosimy wrócić później.
                    </div>
                <?php endif; ?>
            </div>
        </section>
        <section id="about-ambasadors">
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
                    'posts_per_page' => 100
                );
                $the_query = new WP_Query( $args ); ?>
                <?php if ( $the_query->have_posts() ) : ?>
                    <div class="ambasadors">
                        <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                            <div class="ambasador">
                                <a href="<?php echo get_permalink(); ?>">
                                    <div class="photo" style="background-image: url('<?php echo get_the_post_thumbnail_url(); ?>');"></div>
                                </a>
                                <a href="<?php echo get_permalink(); ?>">
                                    <div class="details">
                                        <h2 class="title"><?php the_title(); ?></h2>
                                        <div class="description"><?php echo get_field('krotki_opis'); ?></div>
                                        <a class="show-more" href="<?php echo get_permalink(); ?>">Czytaj więcej</a>
                                    </div>
                                </a>
                            </div>
                        <?php endwhile; ?>
                    </div>
                <?php wp_reset_postdata(); ?>

                <?php else: ?>
                    <div class="no-content-info">
                        Brak ambasadorów do wyświetlenia. Prosimy wrócić później.
                    </div>
                <?php endif; ?>
            </div>
        </section>
    </div>
</div>

<?php get_footer(); ?>
