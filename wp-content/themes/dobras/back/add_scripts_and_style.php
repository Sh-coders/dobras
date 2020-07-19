<?php
// Добавляет js скрипты общего характера
function load_scripts()
{
    wp_enqueue_script('jquery');
    wp_enqueue_script('scroll', get_template_directory_uri() . '/js/scroll.js');
}

add_action( 'wp_enqueue_scripts', 'load_scripts' );

// Добавляет js скрипты для админпанели
function admin_script(){
    wp_enqueue_media();
    wp_enqueue_script('admin_media_library', get_template_directory_uri() . '/js/wp_media.js', array('jquery'));
    wp_enqueue_script('meta_box',get_template_directory_uri() . '/js/meta_box.js');
}

add_action( 'admin_enqueue_scripts', 'admin_script' );


// Добавляет стили css для админпанели
function admin_style() {
    wp_enqueue_style('admin_items', get_template_directory_uri().'/css/admin_items.css');
}

add_action( 'admin_head', 'admin_style' );
?>