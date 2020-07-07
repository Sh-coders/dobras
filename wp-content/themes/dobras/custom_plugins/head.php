<?php
add_action( 'wp_head', 'action_head_css' );
function action_head_css(){
    wp_enqueue_style( 'style', get_stylesheet_uri() );
    wp_enqueue_style( 'media', get_template_directory_uri() . '/css/media.css' );
    wp_enqueue_style( 'header', get_template_directory_uri() . '/css/header.css' );
    wp_enqueue_style( 'nav_menu', get_template_directory_uri() . '/css/nav.css' );
    wp_enqueue_style( 'footer', get_template_directory_uri() . '/css/footer.css' );
    wp_enqueue_style( 'font-1', 'https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,600;0,900;1,600&display=swap' );
    wp_enqueue_style( 'font-1' );
    wp_enqueue_style( 'font-2', 'https://fonts.googleapis.com/css2?family=Montserrat:wght@100;900&display=swap' );
    wp_enqueue_style( 'font-2' );
    wp_enqueue_style( 'font-3', 'https://fonts.googleapis.com/css2?family=Montserrat:wght@300&display=swap' );
    wp_enqueue_style( 'font-3' );
}