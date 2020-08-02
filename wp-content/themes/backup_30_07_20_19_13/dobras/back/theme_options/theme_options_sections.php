<?php
// Создает секции для страницы настроек админпанели "Настройки" -> "Параметры темы"
function add_theme_option_sections()
{
    global $options_page;
    register_setting('theme_options', 'theme_options');

    $args = [
        ['theme_section_1', 'Відомості про компанію'],
        ['theme_section_2', 'Режим роботи'],
        ['theme_section_3', 'Тексти кнопок сторінок сайту'],
        ['theme_section_4', 'Налаштування для сторінки з проектами'],
        ['theme_section_5', 'Інші параметри'],
    ];

    foreach ($args as $item) {
        add_settings_section($item[0], $item[1], '', $options_page);
    }
}

add_action('admin_init', 'add_theme_option_sections');
?>