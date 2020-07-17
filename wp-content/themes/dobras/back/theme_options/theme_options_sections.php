<?php
// Создает секции для страницы настроек админпанели "Настройки" -> "Параметры темы"
function add_theme_option_sections()
{
    global $options_page;
    register_setting('theme_options', 'theme_options');

    $args = [
        ['theme_section_1', 'Данные о компании'],
        ['theme_section_2', 'График работы'],
        ['theme_section_3', 'Текст кнопок страниц сайта (для главной страницы - смотреть в настройках главной страницы)'],
        ['theme_section_4', 'Другие параметры'],
    ];

    foreach ($args as $item) {
        add_settings_section($item[0], $item[1], '', $options_page);
    }
}

add_action('admin_init', 'add_theme_option_sections');
?>