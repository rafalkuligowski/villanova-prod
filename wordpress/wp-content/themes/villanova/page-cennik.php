<?php /* Template Name: Cennik */ ?>
<?php get_header(); ?>
<div class="wrapper">
    <div class="page-banner" style="background-image: url('<?php echo get_the_post_thumbnail_url(); ?>');">
        <div class="mask"></div>
        <div class="container">
            <div class="info">
                <h1 class="title"><?php the_title(); ?></h1>
                <p class="description"><?php echo get_field('short_description'); ?></p>
                <?php if (function_exists('custom_breadcrumbs')) custom_breadcrumbs(); ?>
            </div>
        </div>
    </div>
    <div class="page-content">
        <section id="pricing">
            <div class="container">
                <?php if(have_rows('cennik')): ?>
                    <div class="pricing-wrapper">
                        <?php while ( have_rows('cennik') ) : the_row(); ?>
                            <div class="price-category">
                                <div style="display: flex; justify-content: space-between; align-items: center" class="price-category-header">
                                    <h2 class="category-name"><?php the_sub_field('nazwa'); ?></h2>
                                    <svg class="arrow" xmlns="http://www.w3.org/2000/svg" width="20" height="11" viewBox="0 0 20 11" fill="none">
                                        <path d="M19.5057 0.630962C19.374 0.49818 19.2173 0.392788 19.0446 0.320865C18.872 0.248943 18.6868 0.211914 18.4998 0.211914C18.3128 0.211914 18.1276 0.248943 17.955 0.320865C17.7824 0.392788 17.6257 0.49818 17.494 0.630962L11.0057 7.1193C10.874 7.25208 10.7173 7.35747 10.5446 7.42939C10.372 7.50131 10.1868 7.53834 9.99982 7.53834C9.8128 7.53834 9.62764 7.50131 9.455 7.42939C9.28237 7.35747 9.12569 7.25208 8.99399 7.1193L2.50565 0.630962C2.37396 0.49818 2.21727 0.392788 2.04464 0.320865C1.872 0.248943 1.68684 0.211914 1.49982 0.211914C1.3128 0.211914 1.12764 0.248943 0.955004 0.320865C0.78237 0.392788 0.625685 0.49818 0.493987 0.630962C0.230132 0.896392 0.0820313 1.25545 0.0820312 1.62971C0.0820313 2.00397 0.230132 2.36303 0.493987 2.62846L6.99649 9.13096C7.79337 9.92685 8.87357 10.3739 9.99982 10.3739C11.1261 10.3739 12.2063 9.92685 13.0032 9.13096L19.5057 2.62846C19.7695 2.36303 19.9176 2.00397 19.9176 1.62971C19.9176 1.25545 19.7695 0.896392 19.5057 0.630962Z" fill="black"/>
                                    </svg>
                                </div>
                                <div class="pricing-services">
                                    <?php if(have_rows('uslugi')): ?>
                                        <?php while ( have_rows('uslugi') ) : the_row(); ?>
                                            <div class="pricing-service">
                                                <h3 class="service-name"><?php the_sub_field('nazwa'); ?></h3>
<!--                                                <div class="dots"></div>-->
                                                <p class="price"><?php the_sub_field('cena'); ?></p>
                                            </div>
                                        <?php endwhile;?>
                                    <?php else: ?>
                                        <div class="no-content-info">
                                            Brak usług w tej kategorii
                                        </div>
                                    <?php endif;?>
                                </div>
                            </div>
                        <?php endwhile;?>
                    </div>
                <?php else: ?>
                    <div class="no-content-info">
                        Cennik jest chwilowo pusty. Prosimy wrócić później.
                    </div>
                <?php endif;?>
                <?php the_content(); ?>
            </div>
        </section>
    </div>
</div>

<?php get_footer(); ?>
