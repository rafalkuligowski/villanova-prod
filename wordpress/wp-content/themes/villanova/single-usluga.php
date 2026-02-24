<?php get_header(); ?>
<article class="wrapper page-service">
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
    <div class="container">
        <?php if ( $excerpt = get_post()->post_excerpt ) : ?>
            <p class="lead"><?php echo esc_html( $excerpt ); ?></p>
        <?php endif; ?>

        <?php
        $content = get_the_content();
        $content = apply_filters('the_content', $content);

        // Extract all h2 tags
        preg_match_all('/<h2[^>]*>(.*?)<\/h2>/i', $content, $matches);

        // Check if there are any h2 tags
        if (count($matches[1]) > 1) :
            echo '<div class="table-of-contents">';
            echo '<h2>Spis treści</h2>'; // or "Table of Contents"
            echo '<ul>';

            foreach ($matches[1] as $index => $heading) {
                $heading_text = strip_tags($heading);
                $heading_id = 'heading-' . ($index + 1);

                echo '<li><a href="#' . $heading_id . '">' . $heading_text . '</a></li>';

                $content = preg_replace(
                    '/<h2([^>]*)>' . preg_quote($heading, '/') . '<\/h2>/i',
                    '<h2$1 id="' . $heading_id . '">' . $heading . '</h2>',
                    $content,
                    1
                );
            }

            echo '</ul>';
            echo '</div>';
        endif;
        ?>

        <img src="<?php echo get_the_post_thumbnail_url(); ?>" class="single-thumbnail"/>
        <div class="page-content">
            <?php

            if (count($matches[1]) <= 1) {
                $content = apply_filters('the_content', get_the_content());
            }

            // Inject CTA after every 2nd paragraph
            ob_start();
            get_template_part('template-parts/banner-cta');
            $cta = ob_get_clean();

            $paragraphs = explode('</p>', $content);
            $new_content = '';

            foreach ($paragraphs as $index => $paragraph) {

                if (trim($paragraph)) {
                    $new_content .= $paragraph . '</p>';
                }

                if (($index + 1) % 7 === 0) {
                    $new_content .= $cta;
                }
            }

            echo $new_content;

            ?>
        </div>

        <?php get_template_part('template-parts/faq'); ?>
        <?php get_template_part('template-parts/relationship-services'); ?>

    </div>
</article>

<?php get_footer(); ?>
