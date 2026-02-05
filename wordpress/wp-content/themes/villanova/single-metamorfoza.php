<?php get_header(); ?>
<div class="wrapper">
    <div class="page-banner" style="background-image: url('https://villanova.imperit.pl/wp-content/uploads/2023/09/zespol_bg.png');">
        <div class="mask"></div>
        <div class="container">
            <div class="info">
                <h1 class="title">Metamorfoza</h1>
            </div>
        </div>
    </div>
    <div class="page-content">
        <section id="metamofroza">
            <div class="container">
                <div class="metamofroza-wrapper">
                    <div class="description-wrapper">
                        <div class="page-title-bar">
                            <h2 class="title"><?php the_title(); ?></h2>
                            <?php if(get_field('wiek')): ?>
                                <p><?php echo get_field('wiek'); ?> lat</p>
                            <?php endif; ?>
                        </div>
                        <div class="description">
                            <?php the_content(); ?>
                        </div>
                    </div>
                    <?php if(get_field('tryb_suwaka')): ?>
                    <div class="photo-wrapper">
                        <?php
                            $shortcode = '[twenty20 img1="'.get_field('zdjecie_przed')['id'].'" img2="'.get_field('zdjecie_po')['id'].'" direction="horizontal" offset="0.5" align="right" width="100%" before="Przed" after="Po" hover="false"]';
                            echo do_shortcode($shortcode);
                        ?>
                    </div>
                    <?php else: ?>
                    <div class="photo-wrapper">
                        <div class="before">
                            <img class="photo" src="<?php echo get_field('zdjecie_przed')['url']; ?>" />
                        </div>
                        <div class="after">
                            <img class="photo" src="<?php echo get_field('zdjecie_po')['url']; ?>" />
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </section>
    </div>
</div>

<?php get_footer(); ?>
