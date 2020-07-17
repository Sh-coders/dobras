<?php

## создаем мета бокс
new Meta_Box(array(
    'id_meta' => 'box_info_projects',
    'name_meta' => 'Информация о Проекте',
    'post_type' => 'projects',
    'script' => array( 'meta_box' ),
    'style' => array( 'admin_items' ),
    'meta_array' => array(
        'desired_amount' => array(
            'clone' => false,
            'delete' => true,
            'input' => 'number',
            'required' => true,
            'title' => 'Нужно собрать',
            'placeholder' => '',
            'class' => '',

        ),
        'amount' => array(
            'clone' => true,
            'delete' => true,
            'input' => 'number',
            'required' => false,
            'title' => 'Помощь',
            'placeholder' => '',
            'class' => '',

        ),
        'date_donors' => array(
            'clone' => true,
            'delete' => true,
            'input' => 'date',
            'required' => false,
            'title' => 'Дата',
            'placeholder' => '',
            'class' => '',

        ),
        'name_donors' => array(
            'clone' => true,
            'delete' => true,
            'input' => 'text',
            'required' => false,
            'title' => 'Имя волонтера',
            'placeholder' => '',
            'class' => '',

        ),
        'link_donors' => array(
            'clone' => true,
            'delete' => true,
            'input' => 'url',
            'required' => false,
            'title' => 'Ссылка на волонтера',
            'placeholder' => '',
            'class' => '',

        ),
        'name_documents' => array(
            'clone' => true,
            'delete' => true,
            'input' => 'text',
            'required' => false,
            'title' => 'Название документа',
            'placeholder' => '',
            'class' => '',

        ),
        'link_documents' => array(
            'clone' => true,
            'delete' => true,
            'input' => 'url',
            'required' => false,
            'title' => 'Ссылка на документ',
            'placeholder' => '',
            'class' => '',

        ),
        'date_blog' => array(
            'clone' => true,
            'delete' => true,
            'input' => 'date',
            'required' => false,
            'title' => 'Название документа',
            'placeholder' => '',
            'class' => '',

        ),
        'name_blog' => array(
            'clone' => true,
            'delete' => true,
            'input' => 'text',
            'required' => false,
            'title' => 'Название документа',
            'placeholder' => '',
            'class' => '',

        ),
        'link_blog' => array(
            'clone' => true,
            'delete' => true,
            'input' => 'url',
            'required' => false,
            'title' => 'Ссылка на документ',
            'placeholder' => '',
            'class' => '',

        ),
    ),
    'groups' => array(
        array( 'desired_amount' ),
        array( 'date_donors', 'name_donors', 'amount' ),
        array( 'link_donors' ),
        array( 'name_documents', 'link_documents' ),
        array( 'date_blog', 'name_blog', 'link_blog' ),
    ),
));
?>