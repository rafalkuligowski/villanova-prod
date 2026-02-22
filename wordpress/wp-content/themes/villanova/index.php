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
                    <div class="banner-description"><?php echo wp_kses_post( $short_description ); ?></div>
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
                        <?php while ( $the_query->have_posts() ) : $the_query->the_post();
                        $args = [
                            'link'  => get_permalink(),
                            'thumb' => get_the_post_thumbnail_url(get_the_ID(), 'large'),
                            'title' => get_the_title(),
                            'short' => get_the_excerpt(),
                            'date'  => get_the_date(),
                        ];

                        get_template_part('template-parts/post-card', null, $args);
                        ?>

                        <?php $i++; ?>
                        <?php endwhile; ?>
                    </div>
                    <div class="pagination">
                        <?php
                        the_posts_pagination([
                            'mid_size'  => 2,
                            'prev_text' => '«',
                            'next_text' => '»',
                        ]);
                        ?>
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
