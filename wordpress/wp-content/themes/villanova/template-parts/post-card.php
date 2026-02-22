<?php
$link  = $args['link']  ?? '#';
$thumb = $args['thumb'] ?? '';
$title = $args['title'] ?? '';
$short = $args['short'] ?? '';
$date  = $args['date'] ?? '';
?>

<a href="<?php echo esc_url($link); ?>" class="post">

    <?php if ($thumb) : ?>

    <div class="image" style="background-image: url('<?php echo esc_url($thumb); ?>');"></div>
    <?php endif; ?>

    <div class="content">

        <?php if ($title) : ?>
            <h3 class="title">
                <?php echo esc_html($title); ?>
            </h3>
        <?php endif; ?>

        <?php if ($short) : ?>
            <div class="excerpt">
                <?php echo esc_html( wp_trim_words($short, 20, '…') ); ?>
            </div>
        <?php endif; ?>

        <?php if ($date) : ?>
            <div class="date">
                Dodano dnia: <?php echo esc_html($date); ?>
            </div>
        <?php endif; ?>

        <span class="button clear dark">
            Czytaj więcej
        </span>

    </div>
</a>
