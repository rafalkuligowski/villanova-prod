<?php /* Template Name: Usługi */ ?>
<?php get_header(); ?>
<div class="wrapper page-services">
    <div class="page-banner" style="background-image: url('<?php echo get_the_post_thumbnail_url(); ?>');">
        <div class="mask"></div>
        <div class="container">
            <div class="info">
                <h1 class="title"><?php the_title(); ?></h1>
                <?php if (function_exists('custom_breadcrumbs')) custom_breadcrumbs(); ?>
            </div>
        </div>
    </div>
    <div class="page-content">
        <div class="container">
            <div style="color: #656565; font-size: 14px;">
                <?php the_content(); ?>
            </div>
            <div class="services">
                <?php
                $args = array(
                    'post_type' => 'usluga',
                    'posts_per_page' => 21,
                    'post_parent' => 0,
                    'order' => 'ASC',
                    'orderby' => 'title'
                );
                $the_query = new WP_Query( $args ); ?>

                <?php if ( $the_query->have_posts() ) : ?>
                    <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                        <div class="service service-card">
                            <a href="<?php echo get_permalink(); ?>">
                                <div class="photo-outer">
                                    <div class="photo" style="background-image: url('<?php echo get_the_post_thumbnail_url(); ?>');">
                                        <div class="filter"></div>
                                    </div>
                                </div>
                                <div class="details">
                                    <h2 class="title"><?php the_title(); ?></h2>
                                    <div class="description"><?php echo esc_html(get_the_excerpt()); ?></div>

                                    <div class="show-more"><?php echo pll_e('Czytaj więcej');?></div>
                                </div>
                            </a>
                            <div>
                                <?php
                                $child_args = array(
                                    'post_type'      => 'usluga',
                                    'posts_per_page' => -1,
                                    'post_parent'    => get_the_ID(),
                                    'orderby' => 'menu_order',
                                    'order' => 'ASC',
                                );
                                $child_query = new WP_Query($child_args);
                                ?>
                                <?php if ($child_query->have_posts()) : ?>
                                    <ul class="child-services">
                                        <?php $i = 0; while ($child_query->have_posts()) : $child_query->the_post(); $i++ ?>
                                            <li <?php if ($i > 4) echo 'class="hidden-service" style="display:none;"'; ?>>
                                                <a href="<?php echo esc_url(get_permalink()); ?>">
                                                    <?php the_title(); ?>
                                                </a>
                                            </li>
                                        <?php endwhile; ?>
                                    </ul>
                                    <?php if ($i > 4) : ?>
                                        <button class="button outline primary small show-more-services hidden-services-btn">
                                            <?php echo esc_html( pll_e('Zobacz wszystkie') ); ?>
                                        </button>
                                    <?php endif; ?>
                                <?php endif; ?>
                                <?php wp_reset_postdata(); ?>
                            </div>
                        </div>
                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>
                <?php else: ?>
                    <div class="no-content-info">
                        Brak usług do wyświetlenia. Prosimy wrócić później.
                    </div>
                <?php endif; ?>
                <div class="banner" style="margin-top: 60px;">
                    <div class="content">
                        <?php
                            $banner = get_field('banner');
                        ?>
                        <h2 class="title"><?php echo $banner['tytul']; ?></h2>
                        <p class="subtitle"><?php echo $banner['label']; ?></p>
                        <div class="buttons">
                            <?php if($banner['przycisk_cta']['wyswietl']): ?>
                                <a href="<?php echo $banner['przycisk_cta']['odnosnik_do_strony']; ?>">
                                    <button class="button filled black"><?php echo $banner['przycisk_cta']['tekst_przycisku']; ?></button>
                                </a>
                            <?php endif; ?>
                            <?php if($banner['przycisk_2']['wyswietl']): ?>
                                <a href="<?php echo $banner['przycisk_2']['odnosnik_do_strony']; ?>">
                                    <button class="button clear primary"><?php echo $banner['przycisk_2']['tekst_przycisku']; ?></button>
                                </a>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="photo">
                        <img src="https://villanova.imperit.pl/wp-content/uploads/2023/09/smile.webp" alt="banner-image"/>
                    </div>
                </div>
            </div>
            <!--TODO: Podtytuł - zmienić treść w panelu-->
            <h2 class="page-services-title">
                <?php echo esc_html( pll_e('Tytuł h2 dla strony usługi') ); ?>
            </h2>
            <p class="description"><?php echo get_field('short_description'); ?></p>
        </div>
    </div>
</div>

<?php get_footer(); ?>
