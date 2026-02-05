<?php get_header(); ?>
<div class="wrapper">
    <div class="page-banner" style="background-image: url('https://villanova.imperit.pl/wp-content/uploads/2023/09/blog_bg.webp');">
        <div class="mask"></div>
        <div class="container">
            <div class="info">
                <h1 class="title">Blog</h1>
            </div>
        </div>
    </div>
    <div class="page-content">
        <?php
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        ?>
        <?php if($paged == 1): ?>
        <section id="posts">
            <div class="container">
                <div class="page-title-bar">
                    <div class="title">Najnowszy artykuł</div>
                </div>
                <?php
                $args = array(
                    'post_type' => 'post',
                    'posts_per_page' => 1
                );
                $the_query = new WP_Query( $args ); ?>
                <?php if ( $the_query->have_posts() ) : ?>
                    <div class="posts-wrapper">
                        <?php $i = 0; ?>
                        <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                            <a href="<?php echo get_permalink(); ?>" class="post" style="width: 100%; background-image: url('<?php echo get_the_post_thumbnail_url(); ?>');">
                                <div class="filter"></div>
                                <div class="title-bar">
                                    <div class="title"><?php the_title(); ?></div>
                                    <button class="button clear light">Czytaj więcej</button>
                                </div>
                            </a>
                            <?php $i++; ?>
                        <?php endwhile; ?>
                    </div>
                    <?php wp_reset_postdata(); ?>

                <?php else: ?>
                    <div class="no-content-info">
                        Brak aktualności do wyświetlenia. Prosimy wrócić później.
                    </div>
                <?php endif; ?>
            </div>
        </section>
        <?php endif; ?>
        <section id="posts">
            <div class="container">
                <div class="page-title-bar">
                    <div class="title">Wszystkie artykuły</div>
                </div>
                <?php
                $args = array(
                    'post_type' => 'post',
                    'posts_per_page' => 10,
                    'paged'          => get_query_var( 'paged' ),
                );
                $the_query = new WP_Query( $args ); ?>
                <?php if ( $the_query->have_posts() ) : ?>
                    <div class="posts-wrapper">
                        <?php $i = 0; ?>
                        <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
                            <a href="<?php echo get_permalink(); ?>" class="post" style="background-image: url('<?php echo get_the_post_thumbnail_url(); ?>');">
                                <div class="filter"></div>
                                <div class="title-bar">
                                    <div class="title"><?php the_title(); ?></div>
                                    <button class="button clear light">Czytaj więcej</button>
                                </div>
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
