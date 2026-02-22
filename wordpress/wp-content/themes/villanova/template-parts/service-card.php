<?php
$link  = $args['link']  ?? '';
$thumb = $args['thumb'] ?? '';
$title = $args['title'] ?? '';
$short = $args['short'] ?? '';
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

            <?php if ($short): ?>
                <div class="description">
                    <?php echo esc_html(mb_strimwidth( wp_strip_all_tags($short), 0, 200, '…' )); ?>
                </div>
            <?php endif; ?>

            <div class="show-more">
                <?php echo pll__('Czytaj więcej'); ?>
            </div>
        </div>

    </a>
</div>
