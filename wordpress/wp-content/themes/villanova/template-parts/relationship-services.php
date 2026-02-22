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
    <aside class="relationship-services">
        <h2>
            <?php esc_html(pll_e('To może Cię zainteresować', 'villanova')); ?>
        </h2>
        <div class="services">

        <?php foreach( $services_posts as $item ):

            $post_id = is_object($item) ? $item->ID : $item;
            if ($post_id):

                $args = [
                    'title' => get_the_title($post_id),
                    'link'  => get_permalink($post_id),
                    'thumb' => get_the_post_thumbnail_url($post_id, 'medium'),
                    'short' => get_field('short-description', $post_id),
                ];

                get_template_part('template-parts/service-card', null, $args);

            endif;
        endforeach; ?>
        </div>
    </aside>
<?php endif; ?>
