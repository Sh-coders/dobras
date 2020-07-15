<?php
function my_taxonomies_projects() {
    $labels = array(
        'name'              => _x( 'Категории проекта', 'taxonomy general name' ),
        'singular_name'     => _x( 'Категории проекта', 'taxonomy singular name' ),
        'search_items'      => __( 'Найти категории' ),
        'all_items'         => __( 'Все катагории'),
        'parent_item'       => __( 'Родительская категория' ),
        'parent_item_colon' => __( 'Родительская категория:' ),
        'edit_item'         => __( 'Редактировать' ),
        'update_item'       => __( 'Изменить' ),
        'add_new_item'      => __( 'Добавить новую категорию' ),
        'new_item_name'     => __( 'Добавить новую категорию' ),
        'menu_name'         => __( 'Категории проекта' )
    );
    $args = array(
        'labels' => $labels,
        'hierarchical' => true,
    );
    register_taxonomy('projects_category', 'projects', $args);
}
add_action('init', 'my_taxonomies_projects', 0);