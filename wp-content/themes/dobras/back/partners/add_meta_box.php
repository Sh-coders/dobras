<?php
// Создает новый класс для добавления пользователських метабоксов (массив meta_array) для админапанели,
// кастомный пост тип "Партнеры" (partners)

new Meta_Box(array(
    'id_meta' => 'partners_info',
    'name_meta' => 'Информация о партнере',
    'post_type' => 'partners',
    'script' => array ('meta_box'),
    'style' => 'admin_items',
    'meta_array' => array(
        'partner_name' => array(
            'clone' => true,
            'required' => true,
            'delete' => true,
            'input' => 'text',
            'title' => 'Название',
            'placeholder' => ''
        ),
        'partner_link' => array(
            'clone' => true,
            'required' => true,
            'delete' => true,
            'label' => true,
            'input' => 'url',
            'title' => 'Ссылка',
            'placeholder' => ''
        ),
        'partner_image' => array(
            'clone' => true,
            'required' => true,
            'delete' => true,
            'input' => 'img',
            'title' => 'ID изображения',
            'placeholder' => '',
            'class' => 'meta-image',
            'button' => array(
                'title' => 'Выбрать файл',
                'class' => 'img-button',
            ),
       ),
    ),
    'groups' => array(
        array( 'partner_name', 'partner_link', 'partner_image'),
    ),
));
?>