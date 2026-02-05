<?php get_header(); ?>
<div class="wrapper">
    <div class="page-banner">
        <div class="mask"></div>
        <div class="container">
            <div class="info">
                <h1 class="title">Nasi ambasadorzy</h1>
            </div>
        </div>
    </div>
    <div class="page-content">
        <section id="member">
            <div class="container">
                <div class="member-wrapper">
                    <div class="description-wrapper">
                        <div class="page-title-bar">
                            <h2 class="title"><?php the_title(); ?></h2>
                        </div>
                        <div class="description">
                            <?php the_content(); ?>
                        </div>
                    </div>
                    <div class="photo-wrapper">
                        <img style="width: auto; height: auto; max-width: 100%; max-height: 450px; margin: 20px auto; border-radius: 20px; display: block;" src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" />
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

<?php get_footer(); ?>
