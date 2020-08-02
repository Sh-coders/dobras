<?php
$options_page = 'theme_options_main.php';
// Добавляет страницу "Параметры темы" в пункт меню Настройки
function theme_options()
{
    global $options_page;
    add_options_page('Параметри теми', 'Параметри теми', 'manage_options',
        $options_page, 'theme_options_page');
}

add_action('admin_menu', 'theme_options');

get_template_part('back/theme_options/theme_options_page');
get_template_part('back/theme_options/theme_options_sections');
get_template_part('back/theme_options/theme_options_fields_init');
?>