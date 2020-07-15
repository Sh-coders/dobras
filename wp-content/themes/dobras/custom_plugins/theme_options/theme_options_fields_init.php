<?php
add_action('admin_init', 'add_theme_option_fields');

function add_theme_option_fields() {
    global $options_page;

    $args = [
        ['theme_section_1', 'Название для блока контактов на сайте', 'company_footer_fields_title', '',
            'По умолчанию - Контакти', 'input',  'Введите название блока контактов'],
        
        ['theme_section_1', 'Номер телефона 1 для блока контактов на сайте', 'company_footer_phone1', 30,
            'Пример +38 123 45 67', 'input', 'Введите номер телефона'],
        
        ['theme_section_1', 'Номер телефона 2 для блока контактов на сайте', 'company_footer_phone2', 30,
            'Пример +38 123 45 67', 'input', 'Введите номер телефона'],

        ['theme_section_1', 'Номер телефона 3 для блока контактов на сайте', 'company_footer_phone3', 30,
            'Пример +38 123 45 67', 'input', 'Введите номер телефона'],

        ['theme_section_1', 'Почтовый индекс, страна, город', 'company_country_town', '',
            'Пример 76000, Україна, Івано-Франківськ', 'input', 'Введите номер индекса, название страны, название города'],

        ['theme_section_1', 'Улица, номер дома', 'company_street', '',
            'Пример вул. Дністровська 49', 'input', 'Введите название улицы и номер дома'],

        ['theme_section_2', 'Понедельник', 'company_schedule_monday_start', '', 'от', 'select', ''],
        
        ['theme_section_2', '', 'company_schedule_monday_finish', '', 'до', 'select', ''],
        
        ['theme_section_2', 'Вторник', 'company_schedule_tuesday_start', '', 'от', 'select', ''],
        
        ['theme_section_2', '', 'company_schedule_tuesday_finish', '', 'до', 'select', ''],

        ['theme_section_2', 'Среда', 'company_schedule_wednesday_start', '', 'от', 'select', ''],

        ['theme_section_2', '', 'company_schedule_wednesday_finish', '', 'до', 'select', ''],

        ['theme_section_2', 'Четверг', 'company_schedule_thursday_start', '', 'от', 'select', ''],

        ['theme_section_2', '', 'company_schedule_thursday_finish', '', 'до', 'select', ''],

        ['theme_section_2', 'Пятница', 'company_schedule_friday_start', '', 'от', 'select', ''],

        ['theme_section_2', '', 'company_schedule_friday_finish', '', 'до', 'select', ''],

        ['theme_section_2', 'Суббота', 'company_schedule_saturday_start', '', 'от', 'select', ''],

        ['theme_section_2', '', 'company_schedule_saturday_finish', '', 'до', 'select', ''],

        ['theme_section_2', 'Воскресенье', 'company_schedule_sunday_start', '', 'от', 'select', ''],

        ['theme_section_2', '', 'company_schedule_sunday_finish', '', 'до', 'select', ''],

        ['theme_section_3', 'Текст кнопки на ленте над блоком контактов', 'tape_btn_text', 30,
            'По умолчанию - Пожертвувати', 'input', 'Введите текст кнопки на ленте над блоком контактов (не больше 30 символов)'],

        ['theme_section_3', 'Гипперссылка для кнопки на ленте над блоком контактов', 'tape_btn_link', '',
            '', 'url', 'Введите гипперссылку на внешний ресурс или страницу сайта'],

        ['theme_section_3', 'Текст кнопки помощи на странице публикации', 'article_btn_text', 30,
            'По умолчанию - Допомогти', 'input', 'Введите текст кнопки помощи на странице публикации (не больше 30 символов)'],

        ['theme_section_3', 'Гипперссылка для кнопки помощи на странице публикации', 'article_btn_link', '',
            '', 'url', 'Введите гипперссылку на внешний ресурс или страницу сайта'],

        ['theme_section_3', 'Текст кнопки загрузки на странице отчетов', 'reports_btn_text', 30,
            'По умолчанию - Завантажити', 'input', 'Введите текст кнопки загрузки на странице отчетов (не больше 30 символов)'],

        ['theme_section_3', 'Текст кнопки загрузки на странице русурсов', 'resourses_btn_text', 30,
            'По умолчанию - Перейти', 'input', 'Введите текст кнопки загрузки на странице русурсов (не больше 30 символов)'],

        ['theme_section_4', 'Название для блока отображения других записей', 'field_see_also', 40,
            'По умолчанию - Дивіться також', 'input', 'Введите название блока ототбражения на странице других записей (не больше 40 символов)'],

        ['theme_section_4', 'Текст ленты над блоком контактов', 'field_top_contacts', 40,
            'По умолчанию - Допомогти так легко', 'input', 'Введите текст, который выводится на ленте над блоком контактов (не больше 40 символов)'],

    ];

    foreach ($args as $field) {
        make_theme_option_field($field[0], $field[1], $field[2], $field[3], $field[4], $field[5], $field[6],  $options_page);
    }
}

include_once get_stylesheet_directory().'/custom_plugins/make_field.php';
include_once get_stylesheet_directory().'/custom_plugins/render_settings.php';
