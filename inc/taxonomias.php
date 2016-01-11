<?php

// Register Custom Favorito
function euam_favoritos() {

    $labels = array(
        'name' => _x('Taxonomies', 'Favorito General Name', 'euam'),
        'singular_name' => _x('Favorito', 'Favorito Singular Name', 'euam'),
        'menu_name' => __('Favoritos', 'euam'),
        'all_items' => __('Todos os itens', 'euam'),
        'parent_item' => __('Parent Item', 'euam'),
        'parent_item_colon' => __('Parent Item:', 'euam'),
        'new_item_name' => __('New Item Name', 'euam'),
        'add_new_item' => __('Add New Item', 'euam'),
        'edit_item' => __('Edit Item', 'euam'),
        'update_item' => __('Update Item', 'euam'),
        'view_item' => __('View Item', 'euam'),
        'separate_items_with_commas' => __('Separate items with commas', 'euam'),
        'add_or_remove_items' => __('Add or remove items', 'euam'),
        'choose_from_most_used' => __('Choose from the most used', 'euam'),
        'popular_items' => __('Popular Items', 'euam'),
        'search_items' => __('Search Items', 'euam'),
        'not_found' => __('Not Found', 'euam'),
        'no_terms' => __('No items', 'euam'),
        'items_list' => __('Items list', 'euam'),
        'items_list_navigation' => __('Items list navigation', 'euam'),
    );
    $args = array(
        'labels' => $labels,
        'hierarchical' => true,// determina se será tags ou categoria
        'public' => true,
        'show_ui' => true,
        'show_admin_column' => true,
        'show_in_nav_menus' => true,
        'show_tagcloud' => true,
    );
    register_taxonomy('favoritos', array('post'), $args);
}

add_action('init', 'euam_favoritos', 0);
