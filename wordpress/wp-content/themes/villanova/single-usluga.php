<?php get_header(); ?>
<div class="wrapper page-service">
    <div class="page-banner" style="background-image: url('/wp-content/uploads/2023/09/tlo-uslugi-scaled.webp');">
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
                'posts_per_page' => 100,
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

            <?php
            $services_posts = [];

            $relationship_services = get_field('relationship_uslugi');

            if( $relationship_services ) {

                $services_posts = $relationship_services;

            } else {

                $current_id = get_the_ID();
                $parent_id  = wp_get_post_parent_id($current_id);

                $base_args = [
                    'post_type'      => 'usluga',
                    'posts_per_page' => 4,
                    'orderby'        => 'menu_order',
                    'order'          => 'ASC',
                ];

                $children_args = $base_args;
                $children_args['post_parent'] = $current_id;

                $query = new WP_Query($children_args);

                if ($query->have_posts()) {

                    $services_posts = $query->posts;

                } else {

                    $siblings_args = $base_args;
                    $siblings_args['post_parent']  = $parent_id ? $parent_id : 0;
                    $siblings_args['post__not_in'] = [$current_id];

                    $query = new WP_Query($siblings_args);

                    if ($query->have_posts()) {
                        $services_posts = $query->posts;
                    }
                }

                wp_reset_postdata();
            }

            ?>

            <?php if( !empty($services_posts) ): ?>
                <div class="relationship-services">
                    <h2>Sprawdź inne usługi</h2>
                    <div class="services">

                    <?php foreach( $services_posts as $item ):
                        $post_id = is_object($item) ? $item->ID : $item;

                        $title = get_the_title($post_id);
                        $link  = get_permalink($post_id);
                        $thumb = get_the_post_thumbnail_url($post_id, 'medium');
                        $short = get_field('short-description', $post_id);
                    ?>

                        <div class="service">
                            <a href="<?php echo esc_url($link); ?>">
                                <?php if($thumb): ?>
                                    <div class="photo" style="background-image: url('<?php echo esc_url($thumb); ?>');">
                                        <div class="filter"></div>
                                    </div>
                                <?php endif; ?>

                                <div class="details">
                                    <h3 class="title"><?php echo esc_html($title); ?></h3>

                                    <?php if($short): ?>
                                        <div class="description">
                                            <?php echo esc_html($short); ?>
                                        </div>
                                    <?php endif; ?>

                                    <div class="show-more">
                                        <?php echo pll__('Czytaj więcej'); ?>
                                    </div>
                                </div>

                            </a>
                        </div>

                    <?php endforeach; ?>

                    </div>
                </div>
                <?php wp_reset_postdata(); ?>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>
