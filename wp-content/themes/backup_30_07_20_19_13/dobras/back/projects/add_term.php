<?php
## создаем таксономию
function my_taxonomies_projects() {
    $labels = array(
        'name'              => _x( 'Категорії Проектів', 'taxonomy general name' ),
        'singular_name'     => _x( 'Категорія Проекту', 'taxonomy singular name' ),
        'search_items'      => __( 'Знайти категорії' ),
        'all_items'         => __( 'Всі катагорії'),
        'parent_item'       => __( 'Батьківська категорія' ),
        'parent_item_colon' => __( 'Батьківська категорія:' ),
        'edit_item'         => __( 'Редагувати' ),
        'update_item'       => __( 'Обновити' ),
        'add_new_item'      => __( 'Додати нову категорію' ),
        'new_item_name'     => __( 'Додати нову категорію' ),
        'menu_name'         => __( 'Категорії Проектів' )
    );
    $args = array(
        'labels' => $labels,
        'hierarchical' => true,
    );
    register_taxonomy('projects_category', 'projects', $args);
}
add_action('init', 'my_taxonomies_projects', 0);
?>