<?php
## содаем костомный тип поста
function register_projects() {
    $labels = array(
        'name'               => _x( 'Проекти', 'post type general name' ),
        'singular_name'      => _x( 'Проекти', 'post type singular name' ),
        'add_new'            => _x( 'Додати Проект', 'resource_report' ),
        'add_new_item'       => __( 'Додати Проект'),
        'edit_item'          => __( 'Редагувати Проект' ),
        'new_item'           => __( 'Нові Проекты' ),
        'all_items'          => __( 'Всі Проекти' ),
        'view_item'          => __( 'Дивитись Проекти' ),
        'search_items'       => __( 'Шукати Проект' ),
        'not_found'          => __( 'Не знайдено' ),
        'not_found_in_trash' => __( 'Не знайдено в кошику' ),
        'parent_item_colon'  => '',
        'menu_name'          => 'Проекти'
    );

    $args = array(
        'labels'        => $labels,
        'description'   => 'Короткий опис Проекта',
        'public'        => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-clipboard',
        'supports'      => array( 'title', 'editor', 'excerpt', 'thumbnail'  ),
        'has_archive'   => true
    );
    register_post_type( 'projects', $args);
}
add_action('init', 'register_projects');
?>