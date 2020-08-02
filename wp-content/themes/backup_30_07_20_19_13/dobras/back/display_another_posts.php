<?php
// здесь указать тип страниц, постов, название кастомного поста в админке которыйх будет доступен мета-блок
$types = ['page', 'post'];

// Создает мета-бокс в правой боковой панеле для указанных типов страниц, постов
function display_another_posts ($types)
{
    global $post;
    if ("page-home.php" !== get_post_meta($post->ID, '_wp_page_template', true)) {
        do_action('add_custom_meta_box', 'display_another_posts', 'Показати блок "Дивіться також"',
            'admin_render_checkbox', $types, 'side', 'high', 'another_posts');
    }
}

add_action('add_meta_boxes', 'display_another_posts');

get_template_part('back/render_checkbox');
?>