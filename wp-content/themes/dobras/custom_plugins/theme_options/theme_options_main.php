<?php
$options_page = 'theme_options_main.php';
/*
 * Функция, добавляющая страницу в пункт меню Настройки
 */
add_action('admin_menu', 'theme_options');

function theme_options()
{
    global $options_page;
    add_options_page('Параметры темы', 'Параметры темы', 'manage_options',
        $options_page, 'theme_options_page');
}

include 'theme_options_page.php';
include 'theme_options_sections.php';
include 'theme_options_fields_init.php';
