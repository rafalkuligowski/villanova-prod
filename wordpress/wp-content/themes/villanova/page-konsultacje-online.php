<?php /* Template Name: Konsultacje */ ?>
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
        <section id="consultation-page">
            <div class="container">
                <div class="consultation-wrapper">
                    <div class="action-wrapper">
                        <?php if( have_rows('opcje_do_wyboru') ): ?>
                            <?php while ( have_rows('opcje_do_wyboru') ) : the_row(); ?>
                                <a href="<?php if(the_sub_field('link')){the_sub_field('link');}else{the_sub_field('podstrona');} ?>" class="select-box">
                                    <div class="icon">
                                        <img src="<?php the_sub_field('ikona'); ?>" />
                                    </div>
                                    <p class="title"><?php the_sub_field('tytul'); ?></p>
                                </a>
                            <?php endwhile;?>
                        <?php endif; ?>
                    </div>
                    <div class="photo-wrapper" style="background-image: url('<?php echo get_the_post_thumbnail_url(); ?>');">
                        <div class="row">

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
<?php get_footer(); ?>
