<nav class="multi-level-menu">
    <button class="menu-toggle">Menu</button> <!-- Mobile toggle -->
    <ul class="menu-level menu-level-1">
        <?php foreach ($menu_tree as $item1): ?>
            <li class="menu-item">
                <?php if ($item1['url']): ?>
                    <a href="<?php echo esc_url($item1['url']); ?>" class="menu-link"><?php echo esc_html($item1['title']); ?></a>
                <?php else: ?>
                    <span class="menu-link no-link"><?php echo esc_html($item1['title']); ?></span>
                <?php endif; ?>

                <?php if (!empty($item1['children'])): ?>
                    <ul class="menu-level menu-level-2">
                        <?php foreach ($item1['children'] as $item2): ?>
                            <li class="menu-item">
                                <?php if ($item2['url']): ?>
                                    <a href="<?php echo esc_url($item2['url']); ?>" class="menu-link"><?php echo esc_html($item2['title']); ?></a>
                                <?php else: ?>
                                    <span class="menu-link no-link"><?php echo esc_html($item2['title']); ?></span>
                                <?php endif; ?>

                                <?php if (!empty($item2['children'])): ?>
                                    <ul class="menu-level menu-level-3">
                                        <?php foreach ($item2['children'] as $item3): ?>
                                            <li class="menu-item">
                                                <a href="<?php echo esc_url($item3['url']); ?>" class="menu-link"><?php echo esc_html($item3['title']); ?></a>
                                            </li>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php endif; ?>

                            </li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>

            </li>
        <?php endforeach; ?>
    </ul>
</nav>
