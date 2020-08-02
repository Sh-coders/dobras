<?php
/*поключаем основные стили*/
global $DIR;
$DIR = get_template_directory_uri();

add_action( 'wp_head', 'action_head_css' );
function action_head_css()
{
    global $DIR;
    wp_enqueue_style('style', get_stylesheet_uri());
    wp_enqueue_style('media', $DIR . '/css/media.css');
    wp_enqueue_style('header', $DIR . '/css/header.css');
    wp_enqueue_style('nav_menu', $DIR . '/css/nav.css');
    wp_enqueue_style('footer', $DIR . '/css/footer.css');
    wp_enqueue_style('leaflet_css', $DIR. '/css/leaflet.css');
    wp_enqueue_style('fancybox_css', $DIR . '/css/jquery.fancybox.min.css');
}
?>