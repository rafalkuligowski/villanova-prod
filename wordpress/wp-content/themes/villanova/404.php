<?php get_header(); ?>

<div class="wrapper">
    <div class="page-banner" style="background-image: url('<?php echo get_field('background_image'); ?>');">
        <div class="mask"></div>
        <div class="info container">
            <h1><?php esc_html_e('Strony nie znaleziono', 'wp-blank'); ?></h1>
            <a href="<?php echo esc_url(home_url()); ?>">
                <button class="button white">
                    <?php esc_html_e('Powrót na stronę główną', 'wp-blank'); ?>
                </button>
            </a>
        </div>
    </div>
</div>

<?php get_footer(); ?>
