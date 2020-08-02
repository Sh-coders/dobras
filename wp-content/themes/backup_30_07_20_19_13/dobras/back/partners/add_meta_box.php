<?php
// Создает новый класс для добавления пользователських метабоксов (массив meta_array) для админапанели,
// кастомный пост тип "Партнеры" (partners)

new Meta_Box(array(
    'id_meta' => 'partners_info',
    'name_meta' => 'Інформація про партнерів',
    'post_type' => 'page',
    'file_name' => 'page-partners.php',

    'meta_array' => array(
        'partner_name' => array(
            'clone' => true,
            'required' => true,
            'delete' => true,
            'input' => 'text',
            'title' => 'Назва',
            'placeholder' => ''
        ),

        'partner_link' => array(
            'clone' => true,
            'required' => true,
            'delete' => true,
            'label' => true,
            'input' => 'url',
            'title' => 'Посилання',
            'placeholder' => ''
        ),

        'partner_image' => array(
            'clone' => true,
            'delete' => true,
            'input' => 'img',
            'size' => 'medium',
            'title' => '',
            'placeholder' => '',
            'class' => 'meta-image hidden',
            'button' => array(
                'title' => 'Вибрати файл зображення',
                'class' => 'img-button',
            ),
        ),
    ),

    'groups' => array(
        array('partner_name', 'partner_link', 'partner_image'),
    ),
));
?>