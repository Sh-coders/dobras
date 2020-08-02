<?php
// Добавляет js скрипты общего характера
function load_scripts()
{
    global $DIR;
    wp_enqueue_script('jquery');
    wp_enqueue_script('scroll', $DIR . '/js/scroll.js');
}

add_action( 'wp_enqueue_scripts', 'load_scripts' );

// Добавляет js скрипты для админпанели
function admin_script(){
    global $DIR;
    wp_enqueue_media();
    wp_enqueue_script('admin_media_library', $DIR . '/js/admin/wp_media.js', array('jquery'));
    wp_enqueue_script('meta_box',$DIR . '/js/admin/meta_box.js');
    wp_enqueue_script('gallery',$DIR . '/js/gallery/gallery.js');
    wp_enqueue_script('time',$DIR . '/js/admin/add_time_class.js');
}

add_action( 'admin_enqueue_scripts', 'admin_script' );


// Добавляет стили css для админпанели
function admin_style() {
    global $DIR;
    wp_enqueue_style('admin_items', $DIR.'/css/admin_items.css');
    wp_enqueue_style('gallery', $DIR.'/css/gallery.css');
}

add_action( 'admin_head', 'admin_style' );
?>