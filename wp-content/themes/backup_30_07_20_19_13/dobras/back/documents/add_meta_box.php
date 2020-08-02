<?php

## создаем мета бокс
new Meta_Box(array(
    'id_meta' => 'box_info_documents',
    'name_meta' => 'Інформація про документи',
    'post_type' => 'page',
    'file_name' => 'page-resources.php',
    'meta_array' => array(
        'name' => array(
            'clone' => false,
            'delete' => true,
            'input' => 'text',
            'required' => true,
            'title' => 'Назва',
            'placeholder' => '',
            'class' => '',
        ),
        'link' => array(
            'clone' => true,
            'delete' => true,
            'input' => 'url',
            'required' => true,
            'title' => 'Посилання',
            'placeholder' => '',
            'class' => '',
        ),
    ),
    'groups' => array(
        array( 'name', 'link' ),
    ),
));
?>