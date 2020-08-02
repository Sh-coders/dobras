<?php
// Создает новый мета-бокс через хук
function add_custom_meta_box ($id, $title, $callback, $screen, $context, $priority, $callback_args) {
    add_meta_box( $id, $title, $callback, $screen, $context, $priority, $callback_args);
}
// Регистрируем хук
add_action('add_custom_meta_box', 'add_custom_meta_box', 10, 7);
?>