<?php
namespace Elementor;

// Create Category into Elementor.
function init_item_lists_category() {
    Plugin::instance()->elements_manager->add_category(
        'item-lists', [
            'title' => esc_html__('Item Lists Element', ILE_DOMAIN),
            'icon' => 'font'
        ], 1
    );
}

add_action('elementor/init', 'Elementor\init_item_lists_category');
?>