<?php get_header(); ?>
<div class="wrapper">
    <div class="page-banner" style="background-image: url('https://villanova.imperit.pl/wp-content/uploads/2023/09/zespol_bg.png');">
        <div class="mask"></div>
        <div class="container">
            <div class="info">
                <h1 class="title">Nasz zespół</h1>
                <?php if (function_exists('custom_breadcrumbs')) custom_breadcrumbs(); ?>
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
                        <img class="photo" src="<?php echo get_the_post_thumbnail_url(); ?>" alt="<?php the_title(); ?>" />
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

<?php get_footer(); ?>
