<?php
## создаем мета бокс
$theme_all_options = get_option('theme_options');

new Meta_Box(array(
    'id_meta' => 'box_info_projects',
    'name_meta' => 'Інформація про Проект',
    'post_type' => 'projects',
    'script' => array( 'meta_box' ),
    'style' => array( 'admin_items' ),
    'meta_array' => array(
        'desired_amount' => array(
            'clone' => false,
            'delete' => true,
            'input' => 'number',
            'required' => true,
            'title' => $theme_all_options['projects_admin_money_sum'],
            'placeholder' => '',
            'class' => '',

        ),
        'amount' => array(
            'clone' => true,
            'delete' => true,
            'input' => 'number',
            'required' => false,
            'title' => $theme_all_options['projects_admin_money_in'],
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
            'title' => $theme_all_options['projects_admin_volonter'],
            'placeholder' => '',
            'class' => '',

        ),
        'name_documents' => array(
            'clone' => true,
            'delete' => true,
            'input' => 'text',
            'required' => false,
            'title' => $theme_all_options['projects_admin_doc_name'],
            'placeholder' => '',
            'class' => '',

        ),
        'link_documents' => array(
            'clone' => true,
            'delete' => true,
            'input' => 'url',
            'required' => false,
            'title' => $theme_all_options['projects_admin_doc_file'],
            'placeholder' => '',
            'class' => '',

        ),
        'date_blog' => array(
            'clone' => true,
            'delete' => true,
            'input' => 'date',
            'required' => false,
            'title' => 'Дата',
            'placeholder' => '',
            'class' => '',

        ),
        'name_blog' => array(
            'clone' => true,
            'delete' => true,
            'input' => 'text',
            'required' => false,
            'title' => 'Назва блогу',
            'placeholder' => '',
            'class' => '',

        ),
        'link_blog' => array(
            'clone' => true,
            'delete' => true,
            'input' => 'url',
            'required' => false,
            'title' => 'Посилання на блог',
            'placeholder' => '',
            'class' => '',

        ),
    ),
    'groups' => array(
        array( 'desired_amount' ),
        array( 'date_donors', 'name_donors', 'amount' ),
        array( 'name_documents', 'link_documents' ),
        array( 'date_blog', 'name_blog', 'link_blog' ),
    ),
    'title_group' => array(
        $theme_all_options['projects_tab1_text'],
        '',
        $theme_all_options['projects_tab3_text'],
        $theme_all_options['projects_tab2_text']
    ),
));
?>