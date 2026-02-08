<?php get_header(); ?>
<div class="wrapper">
    <div class="page-banner" style="background-image: url('https://villanova.imperit.pl/wp-content/uploads/2023/09/tlo-uslugi-scaled.webp');">
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
        <div class="container">
            <?php
            $args = array(
                'post_type' => 'usluga',
                'post_parent' => get_the_ID(),
                'posts_per_page' => 100
            );
            $the_query = new WP_Query( $args ); ?>
            <?php if ( $the_query->have_posts() ) : ?>
                <div style="color: #1E1E1E; margin-top: 20px;"><b>To może Cię zainteresować:</b></div>
                <div class="featured-menu">
                    <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                        <a href="<?php echo get_permalink(); ?>">
                            <button class="button filled primary"><?php the_title(); ?></button>
                        </a>
                    <?php endwhile; ?>
                </div>
                <?php wp_reset_postdata(); ?>
            <?php endif; ?>
            <?php if ( get_the_post_thumbnail_url() ): ?>
                <img src="<?php echo get_the_post_thumbnail_url(); ?>" class="single-thumbnail"/>
            <?php endif; ?>
            <?php the_content(); ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>
