<?php

## создаем мета бокс
new Meta_Box(array(
    'id_meta' => 'box_info_documents',
    'name_meta' => 'Информация о Документах',
    'post_type' => 'page',
    'file_name' => 'documents.php',
    'script' =>  'meta_box',
    'style' => 'admin_items',
    'meta_array' => array(
        'name' => array(
            'clone' => false,
            'delete' => true,
            'input' => 'text',
            'required' => true,
            'title' => 'Название',
            'placeholder' => '',
            'class' => '',
        ),
        'link' => array(
            'clone' => true,
            'delete' => true,
            'input' => 'url',
            'required' => true,
            'title' => 'Ссылка',
            'placeholder' => '',
            'class' => '',
        ),
    ),
    'groups' => array(
        array( 'name', 'link' ),
    ),
));
?>