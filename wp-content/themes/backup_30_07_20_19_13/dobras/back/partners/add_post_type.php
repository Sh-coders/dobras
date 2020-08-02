<?php
// Создает и регистрирует новый тип постов 'partners'
function partners_register_post_type()
{
    $labels = [
        'name' => 'Партнери', // основное название для типа записи
        'singular_name' => 'Партнер', // название для одной записи этого типа
        'add_new' => 'Додати список партнерів', // для добавления новой записи
        'add_new_item' => 'Додавання партнера', // заголовка у вновь создаваемой записи в админ-панели.
        'edit_item' => 'Редагування списку партнерів', // для редактирования типа записи
        'new_item' => 'Новий партнер', // текст новой записи
        'view_item' => 'Дивитися партнерів на сайті', // для просмотра записи этого типа.
        'search_items' => 'Шукати партнерів', // для поиска по этим типам записи
        'not_found' => 'Партнерів не знайдено', // если в результате поиска ничего не было найдено
        'menu_name' => 'Партнери', // сылка в меню в админке
    ];

    $args = [
        'labels' => $labels,
        'public' => true,
        'menu_position' => 30,
        'menu_icon' => 'dashicons-money',
        'supports' => ['author', 'title'], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
        'has_archive' => true,
    ];

    register_post_type('partners', $args);
}

add_action('init', 'partners_register_post_type');

get_template_part('back/partners/add_meta_box');
?>