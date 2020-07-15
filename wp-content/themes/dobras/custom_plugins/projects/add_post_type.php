<?php
function register_projects() {
    $labels = array(
        'name'               => _x( 'Проекты', 'post type general name' ),
        'singular_name'      => _x( 'Проекты', 'post type singular name' ),
        'add_new'            => _x( 'Добавить Проект', 'resource_report' ),
        'add_new_item'       => __( 'Добавить Проекты'),
        'edit_item'          => __( 'Редактировать Проект' ),
        'new_item'           => __( 'Новые Проекты' ),
        'all_items'          => __( 'Все Проекты' ),
        'view_item'          => __( 'Смотреть Проекты' ),
        'search_items'       => __( 'Искать Проект' ),
        'not_found'          => __( 'Не найдено' ),
        'not_found_in_trash' => __( 'Не найдено в корзине' ),
        'parent_item_colon'  => '',
        'menu_name'          => 'Проекты'
    );

    $args = array(
        'labels'        => $labels,
        'description'   => 'Описываем Проекты',
        'public'        => true,
        'menu_position' => 5,
        'menu_icon' => 'dashicons-clipboard',
        'supports'      => array( 'title', 'editor', 'excerpt', 'thumbnail'  ),
        'has_archive'   => true
    );
    register_post_type( 'projects', $args);
}
add_action('init', 'register_projects');