<?php
/*
Plugin Name: Custom Theme Menu
Author:
Description:
Plugin URI:
Version: 1.0.0
*/

add_action('admin_menu', 'custom_menu_register_admin_page');
function custom_menu_register_admin_page()
{
    add_menu_page(
        'Настройки темы',
        'Настройки темы',
        'manage_options',
        'manage_theme_options',
        'render_manage_theme_options',
        'dashicons-admin-generic'
    );
}

//register settings
add_action( 'admin_init', 'register_custom_menu_admin_page' );
function register_custom_menu_admin_page() {
    register_setting( 'test-plugin-settings-group', 'new_option_name' );
}

function render_manage_theme_options()
{
    echo "
    <div class='wrapper'>
     <h2>Пользовательские настройки темы</h2>";
        echo " </div>";
}


add_action('add_meta_boxes', 'metatest_init');


function metatest_init() {
    add_meta_box('metatest', 'MetaTest-параметры поста',
        'metatest_showup', 'array', 'side', 'default');
}

function metatest_showup() {
    echo '<p>Содержимое метабокса расположено тут</p>';
}


//function prefix_register_meta_boxes( $meta_boxes ) {
//
//    $prefix = 'field_prefix_';
//
//    $meta_boxes[] = array(
//        'id'         => 'personal',
//        'title'      => 'Личная информация',
//        'post_types' => 'post',
//        'context'    => 'normal',
//        'priority'   => 'high',
//
//        'fields' => array(
//            array(
//                'name'  => 'Как Вас зовут?',
//                'desc'  => 'Формат: {Имя} {Фамилия} {Отчество}',
//                'id'    => $prefix . 'name',
//                'type'  => 'text',
//            ),
//        )
//    );
//
//    // Ещё метабоксы
//    // $meta_boxes[] = ...
//
//    return $meta_boxes;
//}
