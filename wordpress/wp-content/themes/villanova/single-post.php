<?php get_header(); ?>
<div class="wrapper">
    <div class="page-banner" style="background-image: url('<?php echo get_the_post_thumbnail_url(); ?>');">
        <div class="mask"></div>
        <div class="container">
            <div class="info">
                <h1 class="title"><?php the_title(); ?></h1>
                <?php if (function_exists('custom_breadcrumbs')) custom_breadcrumbs(); ?>
            </div>
        </div>
    </div>
    <div class="page-content">
        <div class="post-container container">


            <div class="content">

                <?php if ( $excerpt = get_post()->post_excerpt ) : ?>
                    <p class="lead"><?php echo esc_html( $excerpt ); ?></p>
                <?php endif; ?>

                <?php
                $content = apply_filters( 'the_content', get_the_content() );

                $cta = '
                    <div class="banner post-banner">
                        <div class="content">
                            <h2 class="title">"Uśmiech to najpiękniejsze, co możemy podarować!"</h2>
                            <p class="subtitle">dr n. med. Emma Kiworkowa</p>
                            <a class="button filled black" href="https://villanova.imperit.pl/kontakt/">
                                Kontakt
                            </a>
                        </div>
                    </div>
                ';

                // Split content by h2
                $parts = preg_split( '/(<h2[^>]*>)/i', $content, -1, PREG_SPLIT_DELIM_CAPTURE );

                if ( count( $parts ) > 2 ) {
                    // Insert CTA before second h2
                    $content_with_cta =
                        $parts[0] .              // before first h2
                        $parts[1] . $parts[2] .  // first h2 + its content
                        $cta .                   // CTA inserted here
                        implode( '', array_slice( $parts, 3 ) );
                } else {
                    // Not enough headings → fallback
                    $content_with_cta = $content;
                }

                echo $content_with_cta;
                ?>

                <div class="author-info">
                    <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>">
                        <div class="author-avatar"><?php echo get_avatar($author_id, 150); ?></div>
                    </a>
                    <a class="author-details" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>">
                        <div class="author-name"><?php echo esc_html( get_the_author() ); ?></div>
                        <?php if ( $bio = get_the_author_meta( 'description' ) ) : ?>
                            <div class="author-bio">
                                <?php echo esc_html( $bio ); ?>
                            </div>
                        <?php endif; ?>
                    </a>
                </div>

            </div>
            <div class="sidebar">
                <div class="sidebar-cta">
                    <?php
                    if(pll_current_language() === 'pl'){
                        $contactUrl = 'kontakt';
                    }else{
                        $contactUrl = 'contact';
                    }
                    ?>
                    <a href="<?php echo home_url().'/'.$contactUrl; ?>">
                        <img src="<?php echo home_url().'/wp-content/uploads/2023/09/dremmafooter-.webp'; ?>" alt="cta" />
                        <button class="button filled black" style="width: 100%; display: block;"><?php echo pll__('Umów wizytę'); ?></button>
                    </a>
                </div>
        </div>
    </div>
    <?php
    $args = array(
        'post_type' => 'post',
        'posts_per_page' => 3,
        'post__not_in'   => array( get_the_ID() ),
    );
    $the_query = new WP_Query( $args ); ?>
    <?php if ( $the_query->have_posts() ) : ?>
        <section id="posts">
            <div class="container">
                <?php
                $news = get_field('aktualnosci');
                ?>
                <div class="page-title-bar">
                    <h2 class="title"><?php echo pll__('Zobacz inne wpisy'); ?></h2>
                    <?php
                    if(pll_current_language() === 'pl'){
                        $blogUrl = 'blog';
                    }else{
                        $blogUrl = 'blog';
                    }
                    ?>
                    <a href="<?php echo home_url().'/'.$blogUrl; ?>">
                        <button class="button outline primary"><?php echo pll__('Zobacz wszystkie'); ?></button>
                    </a>
                </div>
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
                <?php wp_reset_postdata(); ?>
            </div>
        </section>
    <?php endif; ?>
</div>

<?php get_footer(); ?>
