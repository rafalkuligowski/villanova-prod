<?php get_header(); ?>
<div class="wrapper">
    <div class="page-banner" style="background-image: url('/wp-content/uploads/2023/09/blog_bg.webp');">
        <div class="mask"></div>
        <div class="container">
            <div class="info">
                <h1 class="title">Blog</h1>
                <?php
                $short_description = get_field('short_description', 26);

                if (!empty( $short_description)) : ?>
                    <p class="banner-description"><?php echo esc_html( $short_description ); ?></p>
                <?php endif; ?>

                <?php if (function_exists('custom_breadcrumbs')) custom_breadcrumbs(); ?>
            </div>
        </div>
    </div>
    <div class="page-content">
        <section id="posts">
            <div class="container">
                <?php
                $args = array(
                    'post_type' => 'post',
                    'posts_per_page' => 21,
                    'paged'          => get_query_var( 'paged' ),
                );
                $the_query = new WP_Query( $args ); ?>
                <?php if ( $the_query->have_posts() ) : ?>
                    <div class="posts-wrapper">
                        <?php $i = 0; ?>
                        <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                            <a href="<?php echo get_permalink(); ?>" class="post">
                                <div class="image" style="background-image: url('<?php echo get_the_post_thumbnail_url(); ?>');"></div>
                                <div class="title"><?php the_title(); ?></div>
                                <div class="excerpt">
                                    <?php echo wp_trim_words( get_the_excerpt(), 20, '…' ); ?>
                                </div>
                                <div class="date">
                                    Dodano dnia: <?php echo get_the_date(); ?>
                                </div>
                                <button class="button clear dark" style="margin: 15px 0;">Czytaj więcej</button>
                            </a>
                        <?php $i++; ?>
                        <?php endwhile; ?>
                    </div>
                    <div class="pagination">
                        <?php wp_pagenavi(); ?>
                    </div>
                    <?php wp_reset_postdata(); ?>

                <?php else: ?>
                    <div class="no-content-info">
                        Brak aktualności do wyświetlenia. Prosimy wrócić później.
                    </div>
                <?php endif; ?>
            </div>
        </section>
    </div>
</div>

<?php get_footer(); ?>
