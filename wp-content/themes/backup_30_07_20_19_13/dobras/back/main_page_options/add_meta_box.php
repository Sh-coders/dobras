<?php

// Создает мета бокс для настроек главной страницы
new Meta_Box(array(
        'id_meta' => 'frontpage_info',
        'name_meta' => 'Налаштування відображення головної сторінки',
        'post_type' => 'page',
        'file_name' => 'page-home.php',
        'meta_array' => array(
            'h2_text' => array(
                'input' => 'text',
                'title' => 'Текст заголовку h2',
                'size' => 25,
                'class' => 'large-text',
                'maxlength' => 20,
                'placeholder' => 'Введіть текст заголовку h2 (максимум 20 символів)'
            ),
            'h3_text' => array(
                'input' => 'text',
                'title' => 'Текст заголовку h3',
                'class' => 'large-text',
                'size' => 35,
                'maxlength' => 30,
                'placeholder' => 'Введіть текст заголовку h3 (максимум 30 символів)'
            ),
            'short_text' => array(
                'input' => 'text',
                'title' => 'Текст короткого опису',
                'class' => 'large-text',
                'placeholder' => 'Введіть текст короткого опису після заголовку h3'
            ),
            'main_page_btn1_text' => array(
                'input' => 'text',
                'maxlength' => 30,
                'title' => 'Текст допомоги першої кнопки',
                'placeholder' => 'Введіть текст допомоги першої кнопки (не більш ніж 30 символів)'
            ),
            'main_page_btn1_link' => array(
                'input' => 'text',
                'class' => 'large-text',
                'title' => 'Гіперпосилання для першої кнопки допомоги',
                'placeholder' => 'Введіть гіперпосилання на зовнішній ресурс або сторінку сайту'
            ),
            'main_page_btn2_text' => array(
                'input' => 'text',
                'maxlength' => 30,
                'title' => 'Текст допомоги другої кнопки',
                'placeholder' => 'Введіть текст допомоги другої кнопки (не більш ніж 30 символів)'
            ),
            'main_page_btn2_link' => array(
                'input' => 'text',
                'class' => 'large-text',
                'title' => 'Гіперпосилання для другої кнопки допомоги',
                'placeholder' => 'Введіть гіперпосилання на зовнішній ресурс або сторінку сайту'
            ),
            'main_page_num_projects' => array(
                'input' => 'number',
                'title' => 'Кількість проектів, що відображаються в слайдері',
                'min' => 0,
            ),
            'main_page_slider_btn_text' => array(
                'input' => 'text',
                'maxlength' => 30,
                'title' => 'Текст кнопки на слайдері',
                'placeholder' => 'Введіть текст для кнопки на слайдері (не більш ніж 30 символів)'
            ),
            'main_page_slider_btn_link' => array(
                'input' => 'text',
                'class' => 'large-text',
                'title' => 'Гіперпосилання для кнопки на слайдері',
                'placeholder' => 'Введіть гіперпосилання на зовнішній ресурс або сторінку сайту'
            ),
            'four_img_block_h3_text' => array(
                'input' => 'text',
                'class' => 'large-text',
                'title' => 'Текст заголовку h3 блоку з 4 зображеннями',
                'placeholder' => 'Введіть текст заголовка h3 для блоку з 4 зображеннями (не більш ніж 30 символів)'
            ),
            'four_block_btn_text' => array(
                'input' => 'text',
                'title' => 'Текст для кнопки блоку з 4 зображеннями',
                'placeholder' => 'Введіть текст для кнопки блоку з 4 зображеннями (не більш ніж 30 символів)'
            ),
            'four_block_btn_link' => array(
                'input' => 'text',
                'class' => 'large-text',
                'title' => 'Гіперпосилання для кнопки блоку з 4 зображеннями',
                'placeholder' => 'Введіть гіперпосилання на зовнішній ресурс або сторінку сайту'
            ),
            'point_title' => array(
                'clone' => true,
                'delete' => true,
                'input' => 'text',
                'maxlength' => 5,
                'title' => 'Назва поїнта',
                'placeholder' => 'Введіть заголовок поїнта (максимум 5 символів)'
            ),
            'point_value' => array(
                'clone' => true,
                'delete' => true,
                'class' => 'large-text',
                'input' => 'text',
                'maxlength' => 50,
                'title' => 'Текст поїнта',
                'placeholder' => 'Введіть текст поїнта (максимум 50 символів)'
            ),
            'title_news_block' => array(
                'input' => 'text',
                'title' => 'Заголовок блоку новин',
                'maxlength' => 30,
                'placeholder' => 'Введіть заголовок для блоку новин (не більш ніж 30 символів)'
            ),
            'title_projects_block' => array(
                'input' => 'text',
                'title' => 'Заголовок блоку проектів',
                'maxlength' => 30,
                'placeholder' => 'Введіть заголовок для блоку проектів (не більш ніж 30 символів)'
            ),
            'title_partners_block' => array(
                'input' => 'text',
                'title' => 'Заголовок блоку партнерів',
                'maxlength' => 30,
                'placeholder' => 'Введіть заголовок для блоку партнерів (не більш ніж 30 символів)'
            ),
        ),
        'groups' => array(
            array('h2_text', 'h3_text'),
            array('short_text'),
            array('main_page_btn1_text', 'main_page_btn1_link'),
            array('main_page_btn2_text', 'main_page_btn2_link'),
            array('main_page_num_projects', 'main_page_slider_btn_text', 'main_page_slider_btn_link'),
            array('four_img_block_h3_text'),
            array('four_block_btn_text', 'four_block_btn_link'),
            array('point_title', 'point_value'),
            array('title_news_block', 'title_projects_block', 'title_partners_block'),
        ),
        'title_group' => array(
            'Перший екран',
            '',
            '',
            '',
            'Слайдер "Наші проекти"',
            'Блок "Кому ми допомагаємо"',
            '',
            '',
            'Заголовки інших блоків'
        ),
    )
);
?>