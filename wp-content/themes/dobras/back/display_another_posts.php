<?php
// здесь указать тип страниц, постов, название кастомного поста в админке которыйх будет доступен мета-блок
$post_type = [
   'page',
   'post',
];

// Создает мета-бокс в правой боковой панеле для указанных типов страниц, постов
function display_another_posts_field($post_type) {
    add_meta_box( 'display_another_posts', 'Показывать блок "Смотреть также"',
        'admin_render_checkbox', $post_type, 'side', 'high' , 'another_posts' );
}

add_action('add_meta_boxes', 'display_another_posts_field');

get_template_part('back/render_checkbox');
?>