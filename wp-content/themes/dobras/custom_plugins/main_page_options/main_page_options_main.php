<?php

add_action('admin_menu', 'add_main_page_options');
function add_main_page_options()
{
    $page_title = 'Настройки главной страницы';
    $menu_title = 'Настройки главной страницы';
    $capability = 'edit_posts';
    $menu_slug = 'main_page_opt'; // url end
    $function = 'main_page_settings_page';
    $icon = 'dashicons-desktop';
    $position = 3;
    add_menu_page($page_title, $menu_title, $capability, $menu_slug, $function, $icon, $position);
}

include ('main_page_admin_scripts.php');
include ('main_page_init_settings.php');
include ('main_page_options_sections.php');
include ('main_page_options_fields_init.php');
