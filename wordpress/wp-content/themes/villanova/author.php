<?php get_header(); ?>
<div class="wrapper">
    <div class="page-banner" style="background-image: url('/wp-content/uploads/2023/09/blog_bg.webp');">
        <div class="mask"></div>
        <div class="container">
            <div class="info">
                <h1 class="title"><?php echo esc_html( get_the_author() ); ?></h1>
                <?php if (function_exists('custom_breadcrumbs')) custom_breadcrumbs(); ?>
            </div>
        </div>
    </div>
    <div class="page-content">
        <div class="container">
            <div class="page-author">
                <div class="author-avatar"><?php echo get_avatar($author_id, 150); ?></div>
                <?php if ( $bio = get_the_author_meta( 'description' ) ) : ?>
                    <div class="author-bio">
                        <?php echo esc_html( $bio ); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>
