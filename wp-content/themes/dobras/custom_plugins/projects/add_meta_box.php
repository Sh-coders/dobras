<?php

new Meta_Box(array(
    'id_meta' => 'box_info_projects',
    'name_meta' => 'Информация о Проекте',
    'post_type' => 'projects',
    'script' => 'meta_box',
    'style' => 'admin_items',
    'meta_array' => array(
        'desired_amount' => array(
            'clone' => false,
            'input' => 'number',
            'required' => true,
            'title' => 'Нужно собрать',
            'placeholder' => ''
        ),
        'amount' => array(
            'clone' => true,
            'input' => 'number',
            'required' => false,
            'title' => 'Помощь',
            'placeholder' => ''
        ),
        'date_donors' => array(
            'clone' => true,
            'input' => 'date',
            'required' => false,
            'title' => 'Дата',
            'placeholder' => ''
        ),
        'name_donors' => array(
            'clone' => true,
            'input' => 'text',
            'required' => false,
            'title' => 'Имя волонтера',
            'placeholder' => ''
        ),
        'link_donors' => array(
            'clone' => true,
            'input' => 'url',
            'required' => false,
            'title' => 'Ссылка на волонтера',
            'placeholder' => ''
        ),
        'name_documents' => array(
            'clone' => true,
            'input' => 'text',
            'required' => false,
            'title' => 'Название документа',
            'placeholder' => ''
        ),
        'link_documents' => array(
            'clone' => true,
            'input' => 'url',
            'required' => false,
            'title' => 'Ссылка на документ',
            'placeholder' => ''
        ),
        'date_blog' => array(
            'clone' => true,
            'input' => 'date',
            'required' => false,
            'title' => 'Название документа',
            'placeholder' => ''
        ),
        'name_blog' => array(
            'clone' => true,
            'input' => 'text',
            'required' => false,
            'title' => 'Название документа',
            'placeholder' => ''
        ),
        'link_blog' => array(
            'clone' => true,
            'input' => 'url',
            'required' => false,
            'title' => 'Ссылка на документ',
            'placeholder' => ''
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