<?php /* Template Name: Zespół */ ?>
<?php get_header(); ?>
<div class="wrapper">
    <div class="page-banner" style="background-image: url('<?php echo get_the_post_thumbnail_url(); ?>');">
        <div class="mask"></div>
        <div class="container">
            <div class="info">
                <h1 class="title"><?php the_title(); ?></h1>
                <p class="description"><?php echo get_field('short-description'); ?></p>
            </div>
        </div>
    </div>
    <div class="page-content">
        <div class="container">
            <div style="color: #656565; font-size: 14px; margin-bottom: 40px;">
                <?php the_content(); ?>
            </div>
                <?php
                $taxonomies = get_terms(
                            array(
                                'taxonomy' => 'stanowisko',
                                'meta_key' => 'kolejnosc',
                                'order' => 'ASC',
                                'orderby' => 'meta_value',
                                'hide_empty' => true
                            )
                    );
                ?>
                <?php if ( $taxonomies ) : ?>
                    <?php foreach ( $taxonomies as $taxonomy ): ?>
                        <div class="page-title-bar">
                            <div class="title"><?php echo $taxonomy->name; ?></div>
                        </div>
                        <div class="team-wrapper" style="margin-bottom: 40px;">
                            <?php
                            $args = array(
                                'post_type' => 'zespol',
                                'posts_per_page' => 100,
                                'meta_key' => 'pin_to_top',
                                'orderby' => array(
                                    'meta_value' => 'DESC',
                                    'date' => 'ASC'
                                ),
                                'tax_query' => array(
                                    array (
                                        'taxonomy' => 'stanowisko',
                                        'field' => 'slug',
                                        'terms' => $taxonomy->slug
                                    )
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
                                'posts_per_page' => 100,
                                'order' => 'ASC',
                                'orderby' => 'title',
                                'tax_query' => array(
                                    array (
                                        'taxonomy' => 'stanowisko',
                                        'field' => 'slug',
                                        'terms' => $taxonomy->slug
                                    )
                                ),
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

                            <?php else: ?>
                                <div class="no-content-info">
                                    Brak lekarzy do wyświetlenia. Prosimy wrócić później.
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>
