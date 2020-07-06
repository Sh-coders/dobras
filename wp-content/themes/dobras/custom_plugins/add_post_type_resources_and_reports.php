<?php
function register_types_res_rep() {
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
        'menu_position' => 2,
        'supports'      => array( 'title', 'editor' ),
        'has_archive'   => true,
    );
    register_post_type( 'res_and_rep', $args);
}
add_action('init', 'register_types_res_rep');

function details_box(){
    add_meta_box( 'meta-box', 'Details', 'details_box_content', 'res_and_rep',
        'normal', 'high'
    );
}

function details_box_content(){
    wp_nonce_field(plugin_basename(__FILE__), 'details_box_content_nonce');

}