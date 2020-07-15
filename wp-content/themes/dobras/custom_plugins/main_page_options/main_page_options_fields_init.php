<?php
add_action('admin_init', 'main_page_custom_setting');

function main_page_custom_setting()
{
    $args = [
        ['main_page_theme_options', 'Изображение главной страницы', 'main_page_image', '', '', 'img-main-page',  ''],

        ['main_page_theme_options', 'Текст заголовка h2', 'h2_text', 20,
            'По умолчанию - Допоможемо', 'input',  'Введите текст заголовка h2 (не больше 20 символов)'],

        ['main_page_theme_options', 'Изображение главной страницы', 'h3_text', 30,
            'По умолчанию - тим, хто цього потребує', 'input',  'Введите текст заголовка h3 (не больше 30 символов)'],

        ['main_page_theme_options', 'Текст краткого описания', 'short_text', '',
            'По умолчанию - Надаємо допомогу соціально-незахищеним верствам населення, а саме : багатодітні родини, 
            одинокі матері, людям з інвалідністю', 'input',  'Введите текст краткого описания после заголовка h3'],

        ['main_page_theme_options', 'Текст помощи первой кнопки', 'main_page_btn1_text', 30,
            'По умолчанию - Ми допоможемо', 'input',  'Введите текст помощи первой кнопки (не больше 30 символов)'],

        ['main_page_theme_options', 'Гипперссылка для первой кнопки помощи', 'main_page_btn1_link', '',
            '', 'url',  'Введите гипперссылку на внешний ресурс или страницу сайта'],

        ['main_page_theme_options', 'Текст помощи второй кнопки', 'main_page_btn2_text', 30,
            'По умолчанию - Хочу допомогти', 'input',  'Введите текст помощи второй кнопки (не больше 30 символов)'],

        ['main_page_theme_options', 'Гипперссылка для второй кнопки помощи', 'main_page_btn2_link', '',
            '', 'url',  'Введите гипперссылку на внешний ресурс или страницу сайта'],

        ['main_page_slider_options', 'Гипперссылка для второй кнопки помощи', 'main_page_num_projects', '',
            'Для отображения всех существующих проектов оставьте поле незаполненным (по умолчанию)', 'number',  'Введите количество'],

        ['main_page_slider_options', 'Текст кнопки на слайдере', 'main_page_slider_btn_text', 30,
            'По умолчанию - Хочу допомогти', 'input', 'Введите текст для кнопки на слайдере (не больше 30 символов)'],

        ['main_page_slider_options', 'Гипперссылка для кнопки на слайдере', 'main_page_slider_btn_link', '',
            '', 'url',  'Введите гипперссылку на внешний ресурс или страницу сайта'],

        ['main_page_four_images_options', 'Текст заголовка h3 блока с 4 изображениями', 'four_img_block_h3_text', 30,
            'По умолчанию - кому допомагаємо', 'input', 'Введите текст заголовка h3 для блока с 4 изображениями (не больше 30 символов)'],

        ['main_page_four_images_options', 'Первое (основное) изображение блока 4 с картинками', 'four_block_image1', '',
            '', 'img-main-page',  'Введите гипперссылку на внешний ресурс или страницу сайта'],

        ['main_page_four_images_options', 'Второе (правый верхний угол) изображение блока 4 с картинками',
            'four_block_image2', '', '', 'img-main-page',  'Введите гипперссылку на внешний ресурс или страницу сайта'],

        ['main_page_four_images_options', 'Третье (левый нижний угол) изображение блока 4 с картинками',
            'four_block_image3', '', '', 'img-main-page',  'Введите гипперссылку на внешний ресурс или страницу сайта'],

        ['main_page_four_images_options', 'Четвертое (правый нижний угол) изображение блока 4 с картинками',
            'four_block_image4', '', '', 'img-main-page',  'Введите гипперссылку на внешний ресурс или страницу сайта'],

        ['main_page_four_images_options', 'Текст для кнопки блока с 4 изображениями', 'four_block_btn_text', 30,
            'По умолчанию - Ми допоможемо', 'input', 'Введите текст для кнопки блока с 4 изображениями (не больше 30 символов)'],

        ['main_page_four_images_options', 'Гипперссылка для кнопки блока с 4 изображениями', 'set_field_four_block_btn_link', '',
            '', 'url',  'Введите гипперссылку на внешний ресурс или страницу сайта'],

        ['main_page_four_images_options', 'Тексты поинтов', 'main_page_points', '', '', 'array',  ''],

        ['main_page_partners_options', 'Текст заголовка для блока партнеров', 'title_partners_block', 30,
            'По умолчанию - Наші партнери', 'input', 'Введите текст заголовка для блока партнеров (не больше 30 символов)'],

        ['main_page_partners_options', 'Показывать на странице блок партнеров', 'display_partners_block', '',
            'Показать', 'checkbox', ''],

        ['main_page_additional_options', 'Показывать над блоком контактов дополнительную ленту', 'display_additional_tape', '',
            'Показать', 'checkbox', ''],
    ];

    foreach ($args as $field) {
        make_theme_option_field($field[0], $field[1], $field[2], $field[3], $field[4], $field[5], $field[6], 'main_page_opt');
    }
}

include_once get_stylesheet_directory().'/custom_plugins/make_field.php';
include_once get_stylesheet_directory().'/custom_plugins/render_settings.php';
