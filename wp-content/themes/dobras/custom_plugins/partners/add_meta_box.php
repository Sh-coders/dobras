<?php

require_once  get_stylesheet_directory() .'/custom_plugins/MetaBox.php';

new Meta_Box(array(
    'id_meta' => 'partners_info',
    'name_meta' => 'Информация о партнере',
    'post_type' => 'partners',
    'script' => 'meta_box_admin_items',
    'style' => 'admin_items',
    'meta_array' => array(
        'partner_name' => array(
            'clone' => true,
            'input' => 'text',
            'title' => 'Название',
            'placeholder' => ''
        ),
        'partner_link' => array(
            'clone' => true,
            'input' => 'url',
            'title' => 'Ссылка',
            'placeholder' => ''
        ),
        'partner_image' => array(
            'clone' => true,
            'input' => 'img',
            'title' => 'Изображение',
            'placeholder' => ''
        ),
    ),
    'groups' => array(
        array( 'partner_name', 'partner_link', 'partner_image'),
    ),
));
