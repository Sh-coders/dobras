<?php
// Добавляет дополнительные секции на странице настроек в админпанели
function add_main_page_option_sections()
{
    register_setting("main_page_theme_options", "main_page_theme_options", "save_options");

    $args = [
        ['main_page_theme_options', 'Настройки главной страницы'],
        ['main_page_slider_options', 'Дополнительные настройки секции с слайдером (блок проектов)'],
        ['main_page_four_images_options', 'Дополнительные настройки секции с 4 изображениями'],
        ['main_page_partners_options', 'Дополнительные настройки блока партнеров'],
        ['main_page_additional_options', 'Дополнительные настройки отображения'],
    ];

    foreach ($args as $item) {
        add_settings_section($item[0], $item[1], null, 'main_page_opt');
    }
}

add_action('admin_init', 'add_main_page_option_sections');
?>