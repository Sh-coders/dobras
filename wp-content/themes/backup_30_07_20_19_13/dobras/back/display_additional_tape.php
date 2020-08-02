<?php
// здесь указать тип страниц, постов, название кастомного поста в админке которыйх будет доступен мета-блок
$types = ['page', 'post'];

// Создает мета-бокс в правой боковой панеле для указанных типов страниц, постов
function display_additional_tape_field($types)
{
    global $post;
    if ("page-home.php" !== get_post_meta($post->ID, '_wp_page_template', true)) {
        do_action('add_custom_meta_box', 'display_additional_tape', 'Показати блок "Допомогти"',
            'admin_render_checkbox', $types, 'side', 'high', 'additional_tape');
    }
}

add_action('add_meta_boxes', 'display_additional_tape_field');
?>