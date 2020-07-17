<?php
// здесь указать тип страниц, постов, название кастомного поста в админке которыйх будет доступен мета-блок
$post_type = [
    'page',
    'post',
];

// Создает мета-бокс в правой боковой панеле для указанных типов страниц, постов
function display_additional_tape_field($post_type) {
    add_meta_box( 'display_additional_tape',
        'Показывать над блоком контактов дополнительную ленту',
        'admin_render_checkbox', $post_type, 'side', 'high', 'additional_tape');
}

add_action('add_meta_boxes', 'display_additional_tape_field');
?>