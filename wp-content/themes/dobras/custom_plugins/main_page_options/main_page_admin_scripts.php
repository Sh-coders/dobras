<?php
function add_admin_scripts()
{
    wp_enqueue_media();
    wp_register_script('meta_box_admin_script', get_template_directory_uri() . '/js/meta_box_admin_items.js', array('jquery'));
    wp_enqueue_script('meta_box_admin_script');
}

add_action('admin_enqueue_scripts', 'add_admin_scripts');
