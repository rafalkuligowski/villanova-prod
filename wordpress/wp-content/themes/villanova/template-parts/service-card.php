<?php
$link  = $args['link']  ?? '';
$thumb = $args['thumb'] ?? '';
$title = $args['title'] ?? '';
$short = $args['short'] ?? '';
$excerpt = $args['excerpt'] ?? '';
?>

<div class="service">
    <a href="<?php echo esc_url($link); ?>">

        <?php if ($thumb): ?>
            <div class="photo-outer" style="overflow: hidden;">
                <div class="photo" style="background-image: url('<?php echo esc_url($thumb); ?>');">
                    <div class="filter"></div>
                </div>
            </div>
        <?php endif; ?>

        <div class="details">
            <h3 class="title"><?php echo esc_html($title); ?></h3>

            <?php if ($excerpt): ?>
                <div class="description">
                    <?php echo esc_html($excerpt); ?>
                </div>
            <?php endif; ?>

            <div class="show-more">
                <?php echo pll__('Czytaj więcej'); ?>
            </div>
        </div>

    </a>
</div>
