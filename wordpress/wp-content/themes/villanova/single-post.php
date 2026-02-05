<?php get_header(); ?>
<div class="wrapper">
    <div class="page-banner" style="background-image: url('<?php echo get_the_post_thumbnail_url(); ?>');">
        <div class="mask"></div>
        <div class="container">
            <div class="info">
                <h1 class="title"><?php the_title(); ?></h1>
                <p class="description"><?php echo get_field('short_description'); ?></p>
            </div>
        </div>
    </div>
    <div class="page-content">
        <div class="container">
            <?php the_content(); ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>
