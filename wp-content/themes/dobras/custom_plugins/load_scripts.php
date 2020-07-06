<?php
function my_scripts()
{
    wp_enqueue_style('footer_style', get_template_directory_uri() . '/css/footer.css');
    wp_enqueue_style('header_style', get_template_directory_uri() . '/css/header.css');
    wp_enqueue_style('nav_style', get_template_directory_uri() . '/css/nav.css');
}

add_action( 'wp_enqueue_scripts', 'my_scripts' );

