<?php
/*поключаем скрипты*/
function my_scripts()
{
    wp_enqueue_script('jquery');
    wp_enqueue_script('scroll', get_template_directory_uri() . '/js/scroll.js');
}

add_action( 'wp_enqueue_scripts', 'my_scripts' );
?>