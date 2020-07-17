<?php
// Создает и регистрирует новый тип постов 'partners'
function partners_register_post_type()
{
    $labels = [
        'name' => 'Партнеры', // основное название для типа записи
        'singular_name' => 'Партнер', // название для одной записи этого типа
        'add_new' => 'Добавить список партнеров', // для добавления новой записи
        'add_new_item' => 'Добавление партнера', // заголовка у вновь создаваемой записи в админ-панели.
        'edit_item' => 'Редактирование списка партнеров', // для редактирования типа записи
        'new_item' => 'Новый партнер', // текст новой записи
        'view_item' => 'Смотреть партнеров на сайте', // для просмотра записи этого типа.
        'search_items' => 'Искать партнеров', // для поиска по этим типам записи
        'not_found' => 'Партнеров не найдено', // если в результате поиска ничего не было найдено
        'not_found_in_trash' => 'В корзине нет партнеров', // если не было найдено в корзине
        'menu_name' => 'Партнеры', // сылка в меню в админке
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