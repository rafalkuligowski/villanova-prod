<?php
function build_menu_tree($menu_items, $parent_id = 0) {
    $branch = [];

    foreach ($menu_items as $item) {
        if ((int) $item->menu_item_parent === (int) $parent_id) {
            $children = build_menu_tree($menu_items, $item->ID);

            $branch[] = [
                'ID'       => $item->ID,
                'title'    => $item->title,
                'url'      => get_field('is_clickable', $item) ? $item->url : '',
                'is_two_columns' => get_field('is_two_columns', $item->ID),
                'children' => $children
            ];
        }
    }

    return $branch;
}

function render_menu_level($items, $level = 1) {
    if (!$items) return;

    // Add class to identify level
    echo '<ul class="menu-level menu-level-' . esc_attr($level) . '">';

    foreach ($items as $item) {
        $has_children = !empty($item['children']);
        // First-level items get menu-level-1 class for hover CSS
        $classes = ['menu-item'];
        if ($level === 1) {
            $classes[] = 'menu-level-1';
        }
        if ($has_children) {
            $classes[] = 'has-children';
        }
        if (!empty($item['is_two_columns'])) {
            $classes[] = 'is-two-columns';
        }

        echo '<li class="' . implode(' ', $classes) . '">';
        echo '<div class="menu-item-inner">';
        if ($item['url']) {
            echo '<a href="' . esc_url($item['url']) . '" class="menu-link">' . esc_html($item['title']) . '</a>';
            if ($has_children and $level === 1) {
                echo '<button class="menu-arrow menu-arrow-btn">
                        <svg class="" width="10" height="6" viewBox="0 0 10 6" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path d="M1 1L5 5L9 1" stroke="currentColor" stroke-width="1.5" fill="none" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </button>';
            }
        } else {
            echo '<span class="menu-link no-link">' . esc_html($item['title']) . '</span>';
            if ($has_children and $level === 1) {
                echo '<button class="menu-arrow menu-arrow-btn">
                        <svg class="" width="10" height="6" viewBox="0 0 10 6" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path d="M1 1L5 5L9 1" stroke="currentColor" stroke-width="1.5" fill="none" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        </button>';
            }
        }
        echo '</div>';

        // Recursive render for children
        if (!empty($item['children'])) {
            render_menu_level($item['children'], $level + 1);
        }

        echo '</li>';
    }

    echo '</ul>';
}
?>
