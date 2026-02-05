<?php get_header(); ?>

<div class="wrapper">
    <div class="page-banner" style="background-image: url('<?php echo get_field('background_image'); ?>');">
        <div class="mask"></div>
        <div class="info">
            <h1><?php esc_html_e('Page not found', 'wp-blank'); ?></h1>
            <a href="<?php echo esc_url(home_url()); ?>">
                <button class="button white">
                    <?php esc_html_e('Go to homepage', 'wp-blank'); ?>
                </button>
            </a>
        </div>
    </div>
    <div class="page-content">
        <?php the_content(); ?>
    </div>
</div>

<?php get_footer(); ?>

