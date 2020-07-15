<?php
function register_documents() {
$labels = array(
'name'               => _x( 'Ресурсы и Отчеты', 'post type general name' ),
'singular_name'      => _x( 'Ресурс/Отчет', 'post type singular name' ),
'add_new'            => _x( 'Добавить Ресурсы/Отчеты', 'resource_report' ),
'add_new_item'       => __( 'Добавить Ресурсы/Отчеты'),
'edit_item'          => __( 'Редактировать Ресурсы/Отчеты' ),
'new_item'           => __( 'Новые Ресурсы/Отчеты' ),
'all_items'          => __( 'Все Ресурсы и Отчеты' ),
'view_item'          => __( 'Смотреть Ресурсы/Отчеты' ),
'search_items'       => __( 'Искать Ресурсы/Отчеты' ),
'not_found'          => __( 'Не найдено' ),
'not_found_in_trash' => __( 'Не найдено в корзине' ),
'parent_item_colon'  => '',
'menu_name'          => 'Ресурсы и Отчеты'
);

$args = array(
'labels'        => $labels,
'description'   => 'Описываем ресур или отчет',
'public'        => true,
'menu_position' => 4,
'menu_icon' => 'dashicons-book-alt',
'supports'      => array( 'title'),
'has_archive'   => true
);
register_post_type( 'documents', $args);
}

add_action('init', 'register_documents');