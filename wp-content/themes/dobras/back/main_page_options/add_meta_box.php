<?php

// Создает мета бокс для настроек главной страницы
new Meta_Box(array(
        'id_meta' => 'frontpage_info',
        'name_meta' => 'Настройки отображения главной страницы',
        'post_type' => 'page',
        'file_name' => 'front-page.php',
        'meta_array' => array(
            'main_page_image' => array(
                'input' => 'img',
                'title' => 'Изображение главной страницы',
                'placeholder' => '',
                'class' => 'meta-image',
                'button' => array(
                    'title' => 'Выбрать файл',
                    'class' => 'img-button',
                ),
            ),
            'h2_text' => array(
                'input' => 'text',
                'title' => 'Текст заголовка h2',
                'class' => 'large-text',
                'placeholder' => 'Введите текст заголовка h2 (не больше 20 символов)'
            ),
            'h3_text' => array(
                'input' => 'text',
                'title' => 'Текст заголовка h3',
                'class' => 'large-text',
                'placeholder' => 'Введите текст заголовка h3 (не больше 30 символов)'
            ),
            'short_text' => array(
                'input' => 'text',
                'title' => 'Текст краткого описания',
                'class' => 'large-text',
                'placeholder' => 'Введите текст краткого описания после заголовка h3'
            ),
            'main_page_btn1_text' => array(
                'input' => 'text',
                'title' => 'Текст помощи первой кнопки',
                'placeholder' => 'Введите текст помощи первой кнопки (не больше 30 символов)'
            ),
            'main_page_btn1_link' => array(
                'input' => 'text',
                'class' => 'large-text',
                'title' => 'Гипперссылка для первой кнопки помощи',
                'placeholder' => 'Введите гипперссылку на внешний ресурс или страницу сайта'
            ),
            'main_page_btn2_text' => array(
                'input' => 'text',
                'title' => 'Текст помощи второй кнопки',
                'placeholder' => 'Введите текст помощи второй кнопки (не больше 30 символов)'
            ),
            'main_page_btn2_link' => array(
                'input' => 'text',
                'class' => 'large-text',
                'title' => 'Гипперссылка для второй кнопки помощи',
                'placeholder' => 'Введите гипперссылку на внешний ресурс или страницу сайта'
            ),
            'main_page_num_projects' => array(
                'input' => 'number',
                'title' => 'Количество проектов отображаемых на главной',
                'placeholder' => 'Введите количество'
            ),
            'main_page_slider_btn_text' => array(
                'input' => 'text',
                'title' => 'Текст кнопки на слайдере',
                'placeholder' => 'Введите текст для кнопки на слайдере (не больше 30 символов)'
            ),
            'main_page_slider_btn_link' => array(
                'input' => 'text',
                'class' => 'large-text',
                'title' => 'Гипперссылка для кнопки на слайдере',
                'placeholder' => 'Введите гипперссылку на внешний ресурс или страницу сайта'
            ),
            'four_block_image1' => array(
                'input' => 'img',
                'title' => 'Первое (основное) изображение блока 4 с картинками',
                'placeholder' => '',
                'class' => 'meta-image',
                'button' => array(
                    'title' => 'Выбрать файл',
                    'class' => 'img-button',
                ),
            ),
            'four_block_image2' => array(
                'input' => 'img',
                'title' => 'Второе (правый верхний угол) изображение блока 4 с картинками',
                'placeholder' => '',
                'class' => 'meta-image',
                'button' => array(
                    'title' => 'Выбрать файл',
                    'class' => 'img-button',
                ),
            ),
            'four_block_image3' => array(
                'input' => 'img',
                'title' => 'Третье (левый нижний угол) изображение блока 4 с картинками',
                'placeholder' => '',
                'class' => 'meta-image',
                'button' => array(
                    'title' => 'Выбрать файл',
                    'class' => 'img-button',
                ),
            ),
            'four_block_image4' => array(
                'input' => 'img',
                'title' => 'Четвертое (правый нижний угол) изображение блока 4 с картинками',
                'placeholder' => '',
                'class' => 'meta-image',
                'button' => array(
                    'title' => 'Выбрать файл',
                    'class' => 'img-button',
                ),
            ),
            'four_img_block_h3_text' => array(
                'input' => 'text',
                'title' => 'Текст заголовка h3 блока с 4 изображениями',
                'placeholder' => 'Введите текст заголовка h3 для блока с 4 изображениями (не больше 30 символов)'
            ),
            'four_block_btn_text' => array(
                'input' => 'text',
                'title' => 'Текст для кнопки блока с 4 изображениями',
                'placeholder' => 'Введите текст для кнопки блока с 4 изображениями (не больше 30 символов)'
            ),
            'four_block_btn_link' => array(
                'input' => 'text',
                'class' => 'large-text',
                'title' => 'Гипперссылка для кнопки блока с 4 изображениями',
                'placeholder' => 'Введите гипперссылку на внешний ресурс или страницу сайта'
            ),
            'point_title' => array(
                'clone' => true,
                'delete' => true,
                'input' => 'text',
                'title' => 'Название поинта',
                'placeholder' => 'Введите название поинта (не больше 5 символов)'
            ),
            'point_value' => array(
                'clone' => true,
                'delete' => true,
                'class' => 'large-text',
                'input' => 'text',
                'title' => 'Текст поинта',
                'placeholder' => 'Введите текст поинта (не больше 50 символов)'
            ),
            'title_partners_block' => array(
                'input' => 'text',
                'title' => 'Заголовок блока партнеров',
                'placeholder' => 'Введите заголовок для блока партнеров (не больше 30 символов)'
            ),

//            'test_checkbox' => array(
//                'input' => 'checkbox',
//                'title' => 'checkbox',
//            ),
        ),
        'groups' => array(
            array('main_page_image'),
            array('h2_text', 'h3_text'),
            array('short_text'),
            array('main_page_btn1_text', 'main_page_btn1_link'),
            array('main_page_btn2_text', 'main_page_btn2_link'),
            array('main_page_num_projects', 'main_page_slider_btn_text', 'main_page_slider_btn_link'),
            array('four_block_image1'),
            array('four_block_image2'),
            array('four_block_image3'),
            array('four_block_image4'),
            array('four_img_block_h3_text'),
            array('four_block_btn_text', 'four_block_btn_link'),
            array('point_title', 'point_value'),
            array('title_partners_block'),
        )
    )
);
?>