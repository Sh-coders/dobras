<?php
/*поключаем основные стили*/
add_action( 'wp_head', 'action_head_css' );
function action_head_css(){
    wp_enqueue_style( 'style', get_stylesheet_uri() );
    wp_enqueue_style( 'media', get_template_directory_uri() . '/css/media.css' );
    wp_enqueue_style( 'header', get_template_directory_uri() . '/css/header.css' );
    wp_enqueue_style( 'nav_menu', get_template_directory_uri() . '/css/nav.css' );
    wp_enqueue_style( 'footer', get_template_directory_uri() . '/css/footer.css' );
}
?>