<?php
new Meta_Box(array(
    'id_meta' => 'box_info_documents',
    'name_meta' => 'Информация о Документах',
    'post_type' => 'documents',
    'script' => 'meta_box',
    'style' => 'admin_items',
    'meta_array' => array(
        'name' => array(
            'clone' => false,
            'input' => 'text',
            'title' => 'Название',
            'placeholder' => ''
        ),
        'link' => array(
            'clone' => true,
            'input' => 'url',
            'title' => 'Ссылка',
            'placeholder' => ''
        ),
    ),
    'groups' => array(
        array( 'name', 'link' ),
    ),
));